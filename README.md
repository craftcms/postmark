<p align="center"><img src="./src/icon.svg" width="100" height="100" alt="Postmark icon"></p>

<h1 align="center">Postmark for Craft CMS</h1>

This plugin provides a [Postmark](http://www.postmarkapp.com/) integration for [Craft CMS](https://craftcms.com/).

## Requirements

This plugin requires Craft CMS 3.1.5 or later.

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
./craft install/plugin postmark
```

## Setup

Once Postmark is installed:

1. Go to **Settings** → **Email**.
2. Change the **Transport Type** setting to **Postmark**.
3. Enter your **Postmark Server Token** (which you can get from your [server](https://account.postmarkapp.com/servers/) page under “API Tokens”).
4. [Optional] Enter the [**Stream ID** for the Message Stream](https://postmarkapp.com/support/article/1207-how-to-create-and-send-through-message-streams) you’d like to use. (The default transactional Message Stream will be used if this is left blank.)
5. Click **Save**.

> **Tip:** The Server Token and Message Stream ID settings can be set using environment variables. See [Environmental Configuration](https://docs.craftcms.com/v3/config/environments.html) in the Craft docs to learn more about that.
