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


$GLOBALS['TL_LANG']['tl_content']['ytParams'] = array('Parameter','Einige der YouTube Player Parameter (https://developers.google.com/youtube/player_parameters)');
$GLOBALS['TL_LANG']['tl_content']['ytParamsReference'] = array
(
	'cc'       => 'Untertitel anzeigen',
	'white'    => 'Weißer Fortschrittsbalken',
	'fs'       => 'Vollbild nicht erlauben',
	'iv'       => 'Erläuterungen deaktivieren',
	'modest'   => 'Modest branding',
	'rel'      => 'Verwandte Videos deaktivieren',
	'showinfo' => 'Titel und Beschreibung nicht anzeigen'
);
$GLOBALS['TL_LANG']['tl_content']['ytStart'] = array('Startpunkt','Optionaler Startpunkt des Videos in Sekunden.');
$GLOBALS['TL_LANG']['tl_content']['ytEnd'] = array('Endpunkt','Optionaler Endpunkt des Videos in Sekunden.');
$GLOBALS['TL_LANG']['tl_content']['ytForceLang'] = array('Seitensprache forcieren','Forciert die verwendete Sprache des Players auf die der Seite.');
$GLOBALS['TL_LANG']['tl_content']['doctype_not_supported'] = 'Die <i>youtube_iframe</i> Extension unterstützt als Ausgabeformat im Seitenlayout nur <i>"HTML"</i>.';
