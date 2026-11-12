<p align="center"><img src="./src/icon.svg" width="100" height="100" alt="Postmark icon"></p>

<h1 align="center">Postmark for Craft CMS</h1>

This plugin provides a [Postmark](http://www.postmarkapp.com/) integration for [Craft CMS](https://craftcms.com/).

## Requirements

This plugin requires Craft CMS 4.0.0+ or 5.0.0+, or 6.0.0-beta.1+ with the `craftcms/yii2-adapter` package.

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

## Craft 6

Craft 6 sends email through [Laravel mailers](https://laravel.com/docs/mail). Laravel has its own Postmark driver, so you don’t need this plugin once you’ve configured it.

With the `craftcms/yii2-adapter` package installed, Craft can keep sending email through the Postmark settings in your project config, as the `craft-transport` mailer. Craft logs a deprecation warning while it does this.

To send email through this plugin, set `MAIL_MAILER=craft-transport` in your environment, or select `craft-transport` as the **Mailer** in Settings → Email. `MAIL_MAILER` applies to all email. The Settings → Email mailer applies to email that Craft sends, such as system messages and test emails. If you do neither, Craft only uses `craft-transport` while `MAIL_MAILER` isn’t set and `config/mail.php` still defaults to `log`. New Craft 6 projects set `MAIL_MAILER=log`, which writes email to the log instead of sending it.

To configure Laravel’s Postmark driver:

1. Require Symfony’s Postmark transport and HTTP client. Removing this plugin removes them too, otherwise.

   ```bash
   composer require symfony/postmark-mailer symfony/http-client
   ```

2. Check that the `mailers` array in `config/mail.php` has a `postmark` mailer. If you set a **Message Stream ID**, add `message_stream_id`, which Laravel’s default config leaves commented out. Without it, Postmark uses the default transactional Message Stream.

   ```php
   'postmark' => [
       'transport' => 'postmark',
       'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
   ],
   ```

3. Check that `config/services.php` has your Server Token. Projects upgraded from Craft 5 read `POSTMARK_TOKEN`, as below; new Craft 6 projects read `POSTMARK_API_KEY`, with a `key` setting. Either works.

   ```php
   'postmark' => [
       'token' => env('POSTMARK_TOKEN'),
   ],
   ```

4. Set the environment variables in `.env`.

   ```bash
   MAIL_MAILER=postmark
   POSTMARK_TOKEN=your-server-token
   POSTMARK_MESSAGE_STREAM_ID=your-message-stream-id
   ```

5. Send a test email from Settings → Email, or with `php artisan craft:mailer:test`.

Then uninstall the plugin and remove it from your project:

```bash
php artisan craft:plugin:uninstall postmark
composer remove craftcms/postmark
```
