<?php
/**
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 */

namespace craftcms\postmark;

use Craft;
use craft\events\RegisterComponentTypesEvent;
use craft\helpers\MailerHelper;
use yii\base\Event;

/**
 * Plugin represents the Postmark plugin.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 1.0
 */
class Plugin extends \craft\base\Plugin
{
    /**
     * @var @inheritdoc
     */
    public $schemaVersion = '2.0.1';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Event::on(
            MailerHelper::class,
            MailerHelper::EVENT_REGISTER_MAILER_TRANSPORT_TYPES,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = Adapter::class;
            }
        );
    }
}
