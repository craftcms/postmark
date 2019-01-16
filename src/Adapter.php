<?php

/**
 * @copyright  Copyright (c) Flipbox Digital Limited
 * @license    https://github.com/flipboxfactory/craft-postmark/blob/master/LICENSE.md
 * @link       https://github.com/flipboxfactory/craft-postmark
 */

namespace flipbox\postmark;

use Craft;
use craft\mail\transportadapters\BaseTransportAdapter;
use Postmark\Transport;

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
    private $token;

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
        $rules = parent::rules();

        if (!$this->tokenOverride()) {
            $rules = array_merge(
                $rules,
                [
                    [
                        [
                            'token'
                        ],
                        'required'
                    ]
                ]
            );
        }

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return array_merge(
            parent::attributes(),
            [
                'token'
            ]
        );
    }

    /**
     * @param string|null $token
     * @return $this
     */
    public function setToken(string $token = null)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Identify whether the token can be set (or if it has been set via config)
     *
     * @return bool
     */
    protected function tokenOverride(): bool
    {
        return !empty(Postmark::getInstance()->getSettings()->token);
    }

    /**
     * @inheritdoc
     * @throws \Twig_Error_Loader
     * @throws \yii\base\Exception
     */
    public function getSettingsHtml()
    {
        return Craft::$app->getView()->renderTemplate('postmark/settings', [
            'adapter' => $this,
            'settings' => Postmark::getInstance()->getSettings()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function defineTransport()
    {
        return [
            'class' => Transport::class,
            'constructArgs' => [Postmark::getInstance()->getSettings()->token ?: Craft::parseEnv($this->token)]
        ];
    }
}
