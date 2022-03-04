<p align="center"><img src="./src/icon.svg" width="100" height="100" alt="Postmark icon"></p>

<h1 align="center">Postmark for Craft CMS</h1>

This plugin provides a [Postmark](http://www.postmarkapp.com/) integration for [Craft CMS](https://craftcms.com/).

## Requirements

This plugin requires Craft CMS 4.0 or later.

## Installation

You can install this plugin from the Plugin Store or with Composer.

#### From the Plugin Store

Go to the Plugin Store in your project’s Control Panel and search for “Postmark”. Then click on the “Install” button in its modal window.

#### With Composer

Open your terminal and run the following commands:

```bash
# go to the project directory
cd /path/to/my-project.test

# tell Composer to load the plugin
composer require craftcms/postmark

# tell Craft to install the plugin
./craft plugin/install postmark
```

## Setup

Once Postmark is installed:

1. Go to **Settings** → **Email**.
2. Change the **Transport Type** setting to **Postmark**. Also, ensure that your System Email Address in your Craft Email Settings matches your confirmed [Sender Signature email address in Postmark](https://account.postmarkapp.com/signature_domains). 
3. Enter your **Server Token** (which you can get from your [server](https://account.postmarkapp.com/servers/) page under “API Tokens”).
4. If you wish to send mail using a custom [Message Stream](https://postmarkapp.com/support/article/1207-how-to-create-and-send-through-message-streams), set the **Message Stream ID**. (The default transactional Message Stream will be used if this is left blank.)
5. Click **Save**.

> **Tip:** The Server Token and Message Stream ID settings can be set using environment variables. See [Environmental Configuration](https://craftcms.com/docs/3.x/config/#environmental-configuration) in the Craft docs to learn more about that.
