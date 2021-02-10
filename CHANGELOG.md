# Release Notes for Postmark for Craft CMS

## 2.1.0 - 2021-02-10

### Added
- Added the **Message Stream ID** setting. ([#12](https://github.com/craftcms/postmark/pull/12))

## 2.0.3 - 2020-12-17

### Added
- Added support for specifying a [Message Stream](https://postmarkapp.com/message-streams) ID on the email settings page.

## 2.0.2 - 2019-08-07

### Fixed
- Fixed a where the project config could leave old plugin settings in-tact even though they’re not needed anymore. ([#10](https://github.com/craftcms/postmark/issues/10))

## 2.0.1 - 2019-02-22

### Fixed
- Fixed a bug where `craftcms\postmark\Adapter` wasn’t triggering the `defineBehaviors` event.

## 2.0.0 - 2019-02-19

> {note} The plugin’s package name has changed to `craftcms/postmark`. After updating to Postmark 2.0 or later, make sure you remove the old package by running `composer remove flipboxfactory/craft-postmark` from your terminal.

### Removed
- Removed support for `config/postmark.php`.

## 1.0.1 - 2019-02-07

### Added
- Server Token can now be set to an environment variable.

### Changed
- Postmark now requires Craft 3.1.0.

## 1.0.0 - 2018-10-15

### Added
- Settings which allows for token override

### Changed
- Using Postmark's first party library

## 1.0.0-rc.1.2 - 2017-12-13

### Changed
- Min requirement of Craft

## 1.0.0-rc.1.1 - 2017-12-05

### Changed
- Min requirement of Craft RC1

## 1.0.0-rc.1 - 2017-12-04

Initial release. Inspired by Wildbit and Craft CMS at Peers Conference 2017.
