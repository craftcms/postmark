Postmark for Craft CMS
=====================

This plugin provides a [Postmark](http://www.postmarkapp.com/) integration for [Craft CMS](https://craftcms.com/).


## Requirements

This plugin requires Craft CMS 3.0.0-beta.1 or later.


## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require flipbox/postmark

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Postmark.

## Setup

Once Postmark is installed, go to Settings → Email, and change the “Transport Type” setting to “Postmark”. Enter your server Postmark API Key (which you can get from your [server credentials](https://account.postmarkapp.com/servers/) page) and click Credentials.
