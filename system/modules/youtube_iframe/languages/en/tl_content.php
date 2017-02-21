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


$GLOBALS['TL_LANG']['tl_content']['ytParams'] = array('Parameters','Some of the YouTube player parameters (https://developers.google.com/youtube/player_parameters)');
$GLOBALS['TL_LANG']['tl_content']['ytParamsReference'] = array
(
	'cc'       => 'Show closed captions by default',
	'white'    => 'White progress bar',
	'fs'       => 'Disallow fullscreen',
	'iv'       => 'Disable annotations by default',
	'modest'   => 'Modest branding',
	'rel'      => 'Disable related videos',
	'showinfo' => 'Disable information'
);
$GLOBALS['TL_LANG']['tl_content']['ytStart'] = array('Start time','Optional start of the video in seconds.');
$GLOBALS['TL_LANG']['tl_content']['ytEnd'] = array('End time','Optional end of the video in seconds.');
$GLOBALS['TL_LANG']['tl_content']['ytForceLang'] = array('Force page language','Force the language of the player to be the same as the page.');
$GLOBALS['TL_LANG']['tl_content']['doctype_not_supported'] = 'The <i>youtube_iframe</i> extension only supports <i>"HTML"</i> as the output format in the page layout.';
