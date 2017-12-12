# FastCGI Cache Bust plugin for Craft CMS

Bust the Nginx FastCGI Cache when entries are saved or created.

Related: [FastCGI Cache Bust for Craft 3.x](https://github.com/nystudio107/craft3-fastcgicachebust)

## Installation

To install FastCGI Cache Bust, follow these steps:

1. Download & unzip the file and place the `fastcgicachebust` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/nystudio107/fastcgicachebust.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3.  -OR- install with Composer via `composer require nystudio107/fastcgicachebust`
4. Install plugin in the Craft Control Panel under Settings > Plugins
5. The plugin folder should be named `fastcgicachebust` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

FastCGI Cache Bust works on Craft 2.5.x and Craft 2.6.x.

## FastCGI Cache Bust Overview

FastCGI Cache Bust is a simple plugin that clears your entire FastCGI Cache any time an entry is saved. This is somewhat of a scortched earth approach to cache invalidation, but it ensure cache coherency.

Check out the article [Static Page Caching with Craft CMS](https://nystudio107.com/blog/static-caching-with-craft-cms) for details on how to set up FastCGI Cache on your website.

## Configuring FastCGI Cache Bust

Click on the gear icon next to the plugin to configure it by adding the full absolute path to your Nginx FastCGI Cache directory. If you require more than one FastCGI Cache directory cleared, separate the paths with a comma (`,`).

## Using FastCGI Cache Bust

FastCGI Cache Bust listens for elements being saved, and busts the entire FastCGI Cache automatically when that happens.

You can also manually clear the FastCGI Cache via Craft's 'Clear Caches' tool

## FastCGI Cache Bust Roadmap

Some things to do, and ideas for potential features:

* We could invalidate only affected caches onElementSave instead of the entire cache

Brought to you by [nystudio107](https://nystudio107.com)
