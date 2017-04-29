<?php

/**
 * @copyright  Copyright (c) Flipbox Digital Limited
 * @license    https://github.com/flipbox/postmark/blob/master/LICENSE.md
 * @link       https://github.com/flipbox/postmark
 */

namespace flipbox\postmark;

use Craft;
use craft\mail\transportadapters\BaseTransportAdapter;

/**
 * @author Flipbox Factory <hello@flipboxfactory.com>
 * @since 1.0.0
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
    public function rules()
    {
        return [
            [
                [
                    'token'
                ],
                'required'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        return Craft::$app->getView()->renderTemplate('postmark/settings', [
            'adapter' => $this
        ]);
    }

    /**
     * @inheritdoc
     */
    public function defineTransport()
    {
        return [
            'class' => Transport::class,
            'constructArgs' => [$this->token]
        ];
    }

}
