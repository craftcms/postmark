<?php

/**
 * @copyright  Copyright (c) Flipbox Digital Limited
 * @license    https://github.com/flipboxfactory/craft-postmark/blob/master/LICENSE.md
 * @link       https://github.com/flipboxfactory/craft-postmark
 */

namespace flipbox\postmark;

use Craft;
use craft\base\Plugin;
use craft\events\RegisterComponentTypesEvent;
use craft\helpers\MailerHelper;
use yii\base\Event;

/**
 * @author Flipbox Factory <hello@flipboxfactory.com>
 * @since 1.0.0
 *
 * @method Settings getSettings()
 */
class Postmark extends Plugin
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Event::on(
            MailerHelper::class,
            MailerHelper::EVENT_REGISTER_MAILER_TRANSPORT_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = Adapter::class;
            }
        );
    }

    /*******************************************
     * SETTINGS
     *******************************************/

    /**
     * @inheritdoc
     * @return Settings
     */
    public function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * Logs an informative message.
     *
     * @param $message
     * @param string $category
     */
    public static function info($message, $category = 'postmark')
    {
        Craft::info($message, $category);
    }

    /**
     * Logs a warning message.
     *
     * @param $message
     * @param string $category
     */
    public static function warning($message, $category = 'postmark')
    {
        Craft::warning($message, $category);
    }

    /**
     * Logs an error message.
     *
     * @param $message
     * @param string $category
     */
    public static function error($message, $category = 'postmark')
    {
        Craft::error($message, $category);
    }
}
