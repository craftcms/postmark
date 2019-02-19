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
    // Static
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return 'Postmark';
    }

    // Properties
    // =========================================================================

    /**
     * @var string
     */
    public $token;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'token' => Craft::t('postmark', 'Token')
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'parser' => [
                'class' => EnvAttributeParserBehavior::class,
                'attributes' => [
                    'token',
                ],
            ],
        ];
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
            'constructArgs' => [Craft::parseEnv($this->token)]
        ];
    }
}
