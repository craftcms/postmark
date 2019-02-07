# Postmark for Craft CMS
[![Join the chat at https://gitter.im/benface/craft-postmark](https://badges.gitter.im/benface/craft-postmark.svg)](https://gitter.im/benface/craft-postmark?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Latest Version](https://img.shields.io/github/release/benface/craft-postmark.svg?style=flat-square)](https://github.com/benface/craft-postmark/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/benface/craft-postmark/master.svg?style=flat-square)](https://travis-ci.org/benface/craft-postmark)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/benface/craft-postmark.svg?style=flat-square)](https://scrutinizer-ci.com/g/benface/craft-postmark/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/benface/craft-postmark.svg?style=flat-square)](https://scrutinizer-ci.com/g/benface/craft-postmark)
[![Total Downloads](https://img.shields.io/packagist/dt/flipboxfactory/craft-postmark.svg?style=flat-square)](https://packagist.org/packages/flipboxfactory/craft-postmark)

This plugin provides a [Postmark](http://www.postmarkapp.com/) integration for [Craft CMS](https://craftcms.com/).


## Requirements

This plugin requires Craft CMS 3.1.0 or later.


## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require flipboxfactory/craft-postmark

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Postmark.

## Setup

Once Postmark is installed, go to Settings → Email, and change the “Transport Type” setting to “Postmark”. Enter your Postmark server API token (which you can get from your [server](https://account.postmarkapp.com/servers/) page, under “Credentials”). Note: This field can be set to an environment variable, such as `$POSTMARK_TOKEN`.
