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
    public function safeUp()
    {
        // Don't make the same config changes twice
        $projectConfig = Craft::$app->getProjectConfig();
        $schemaVersion = $projectConfig->get('plugins.postmark.schemaVersion', true);
        if (version_compare($schemaVersion, '2.0.1', '>=')) {
            return;
        }

        $projectConfig->remove('plugins.postmark.settings');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m190727_220415_drop_plugin_settings cannot be reverted.\n";
        return false;
    }
}
