<?php

namespace craftcms\postmark\migrations;

use Craft;
use craft\db\Migration;
use craftcms\postmark\Adapter;

/**
 * m190220_005730_update_email_settings migration.
 */
class m190220_005730_update_email_settings extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): bool
    {
        // Don't make the same config changes twice
        $projectConfig = Craft::$app->getProjectConfig();
        $schemaVersion = $projectConfig->get('plugins.postmark.schemaVersion', true);
        if (
            version_compare($schemaVersion, '2.0.0', '<') &&
            $projectConfig->get('email.transportType') === 'flipbox\\postmark\\Adapter'
        ) {
            $projectConfig->set('email.transportType', Adapter::class);
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): bool
    {
        echo "m190220_005730_update_email_settings cannot be reverted.\n";
        return false;
    }
}
