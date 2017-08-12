<?php
/**
 * FastCGI Cache Bust plugin for Craft CMS
 *
 * Bust the Nginx FastCGI Cache when entries are saved or created.
 *
 * @author    nystudio107
 * @copyright Copyright (c) 2017 nystudio107
 * @link      https://nystudio107.com
 * @package   FastcgiCacheBust
 * @since     1.0.0
 */

namespace Craft;

class FastcgiCacheBustPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init()
    {
        parent::init();
        craft()->on('elements.onSaveElement', function (Event $event) {
            $element = $event->params['element'];
            $isNewElement = $event->params['isNewElement'];
            craft()->fastcgiCacheBust->clearAll();
        });
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('FastCGI Cache Bust');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Bust the Nginx FastCGI Cache when entries are saved or created.');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/nystudio107/fastcgicachebust/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/nystudio107/fastcgicachebust/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.2';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'nystudio107';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'https://nystudio107.com';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    protected function defineSettings()
    {
        return array(
            'cachePath' => array(AttributeType::String, 'label' => 'FastCGI Cache Path', 'default' => ''),
        );
    }

    /**
     * @inheritdoc
     */
    public function getSettings()
    {
        $settings = parent::getSettings();
        $base = $this->defineSettings();

        foreach ($base as $key => $row) {
            $override = craft()->config->get($key, 'fastcgicachebust');

            if (!is_null($override) && !empty($override)) {
                $settings->$key = $override;
            }
        }

        return $settings;
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        return craft()->templates->render('fastcgicachebust/FastcgiCacheBust_Settings', [
            'settings' => $this->getSettings(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function prepSettings($settings)
    {
        // Modify $settings here...

        return $settings;
    }

    /**
     * Adds the FastCGI Cache path to the list of things the Clear Caches tool can delete.
     *
     * @return array
     */
    public function registerCachePaths()
    {
        $cachePaths = array();
        $settings = $this->getSettings();
        if (!empty($settings)) {
            if (!empty($settings->cachePath)) {
                $cachePaths = array_merge(
                    $cachePaths,
                    array(
                        $settings->cachePath => Craft::t('FastCGI Cache'),
                    )
                );
            }
        }

        return $cachePaths;
    }
}