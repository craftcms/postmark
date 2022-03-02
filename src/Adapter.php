<?php
/**
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 */

namespace craftcms\postmark;

use Craft;
use craft\behaviors\EnvAttributeParserBehavior;
use craft\helpers\App;
use craft\mail\transportadapters\BaseTransportAdapter;
use Symfony\Component\Mailer\Bridge\Postmark\Transport\PostmarkApiTransport;

/**
 * Adapter represents the Postmark mail adapter.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 1.0
 */
class Adapter extends BaseTransportAdapter
{
    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return 'Postmark';
    }

    /**
     * @var string
     */
    public ?string $token = null;

    /**
     * @var string|null
     */
    public ?string $messageStream = null;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'token' => Craft::t('postmark', 'Token'),
            'messageStream' => Craft::t('postmark', 'Message Stream ID'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors['parser'] = [
            'class' => EnvAttributeParserBehavior::class,
            'attributes' => [
                'token',
                'messageStream',
            ],
        ];
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    protected function defineRules(): array
    {
        return [
            [['token'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml(): ?string
    {
        return Craft::$app->getView()->renderTemplate('postmark/settings', [
            'adapter' => $this,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function defineTransport(): array|\Symfony\Component\Mailer\Transport\AbstractTransport
    {
        $transport = new PostmarkApiTransport(App::parseEnv($this->token));

        if ($this->messageStream) {
            $transport->setMessageStream(App::parseEnv($this->messageStream));
        }

        return $transport;
    }
}
