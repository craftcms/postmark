<?php

namespace craftcms\postmark\migrations;

use Craft;
use craft\db\Migration;

/**
 * m190727_220415_drop_plugin_settings migration.
 */
class m190727_220415_drop_plugin_settings extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): bool
    {
        // Don't make the same config changes twice
        $projectConfig = Craft::$app->getProjectConfig();
        $schemaVersion = $projectConfig->get('plugins.postmark.schemaVersion', true);

        if (version_compare($schemaVersion, '2.0.1', '<')) {
            $projectConfig->remove('plugins.postmark.settings');
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): bool
    {
        echo "m190727_220415_drop_plugin_settings cannot be reverted.\n";
        return false;
    }
}
