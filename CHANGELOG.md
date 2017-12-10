# FastCGI Cache Bust Changelog

## 1.0.4 -- 2017.12.10
### Added
* You can have more than one cache to have it clear by separating the paths with a comma (`,`) in the config settings

## 1.0.3 -- 2017.11.27
### Added
* Don't bust the FastCGI Cache unless the element being saved is ENABLED or LIVE
* Don't bust the FastCGI Cache for certain custom ElementTypes

## 1.0.2 -- 2017.08.12
### Added
* Added 'FastCGI Cache' to the list of things that can be cleared via Craft's Clear Caches tool

## 1.0.1 -- 2017.06.18
### Added
* Added multi-environment config overrides via `fastcgicachebust.php`

## 1.0.0 -- 2017.06.15
### Added
* Initial release

Brought to you by [nystudio107](https://nystudio107.com)
