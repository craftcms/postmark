# Postmark for Craft CMS
[![Join the chat at https://gitter.im/flipboxfactory/craft-postmark](https://badges.gitter.im/flipboxfactory/craft-postmark.svg)](https://gitter.im/flipboxfactory/craft-postmark?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Latest Version](https://img.shields.io/github/release/flipboxfactory/craft-postmark.svg?style=flat-square)](https://github.com/flipboxfactory/craft-postmark/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/flipboxfactory/craft-postmark/master.svg?style=flat-square)](https://travis-ci.org/flipboxfactory/craft-postmark)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/flipboxfactory/craft-postmark.svg?style=flat-square)](https://scrutinizer-ci.com/g/flipboxfactory/craft-postmark/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/flipboxfactory/craft-postmark.svg?style=flat-square)](https://scrutinizer-ci.com/g/flipboxfactory/craft-postmark)
[![Total Downloads](https://img.shields.io/packagist/dt/flipboxfactory/craft-postmark.svg?style=flat-square)](https://packagist.org/packages/flipboxfactory/craft-postmark)

This plugin provides a [Postmark](http://www.postmarkapp.com/) integration for [Craft CMS](https://craftcms.com/).


## Requirements

This plugin requires Craft CMS 3.0.0 RC1 or later.


## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require flipboxfactory/craft-postmark

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Postmark.

## Setup

Once Postmark is installed, go to Settings → Email, and change the “Transport Type” setting to “Postmark”. Enter your server Postmark API Key (which you can get from your [server](https://account.postmarkapp.com/servers/) page) and click Credentials.
