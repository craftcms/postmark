<?php
/**
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 */

namespace craftcms\postmark;

use Craft;
use craft\behaviors\EnvAttributeParserBehavior;
use craft\mail\transportadapters\BaseTransportAdapter;
use Postmark\Transport;

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
    public $token;

    /**
     * @var string
     */
    public $messageStream;

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
    public function behaviors()
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
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [['token'], 'required'];
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        return Craft::$app->getView()->renderTemplate('postmark/settings', [
            'adapter' => $this,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function defineTransport()
    {
        return [
            'class' => Transport::class,
            'constructArgs' => [Craft::parseEnv($this->token), ['X-PM-Message-Stream' => Craft::parseEnv($this->messageStream)]],
        ];
    }
}
