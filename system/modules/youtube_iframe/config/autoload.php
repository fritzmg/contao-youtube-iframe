<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @package   youtube_iframe
 * @author    Fritz Michael Gschwantner <https://github.com/fritzmg>
 * @license   LGPL-3.0+
 * @copyright Fritz Michael Gschwantner 2016-2017
 */


/**
 * Register the class
 */
ClassLoader::addClasses(array
(
	'YouTubeIframe'  => 'system/modules/youtube_iframe/classes/YouTubeIframe.php',
));


/**
 * Register the templates
 */
if( version_compare( VERSION, '3.5', '>=' ) )
	TemplateLoader::addFiles(array('ce_player' => 'system/modules/youtube_iframe/templates/c35'));
elseif( version_compare( VERSION, '3.3', '>=' ) )
	TemplateLoader::addFiles(array('ce_player' => 'system/modules/youtube_iframe/templates/c33'));
else
	TemplateLoader::addFiles(array('ce_player' => 'system/modules/youtube_iframe/templates/c30'));
