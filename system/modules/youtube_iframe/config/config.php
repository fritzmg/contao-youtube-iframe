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
 * Hooks
 */
$GLOBALS['TL_HOOKS']['getPageLayout'][] = array('YouTubeIframe','getPageLayout');
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('YouTubeIframe','parseTemplate');


/**
 * Custom configuration
 */
$GLOBALS['YT_PARAMS'] = array
(
	'showinfo',
	'rel',
	'white',
	'modest',
	'fs',
	'iv',
	'cc',
);

$GLOBALS['YT_PARAMS_MAPPING'] = array
(
	'cc'       => 'cc_load_policy=1',
	'white'    => 'color=white',
	'fs'       => 'fs=0',
	'iv'       => 'iv_load_policy=3',
	'modest'   => 'modestbranding=1',
	'rel'      => 'rel=0',
	'showinfo' => 'showinfo=0'
);
