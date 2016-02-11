<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   youtube_iframe
 * @author    Fritz Michael Gschwantner <https://github.com/fritzmg>
 * @license   LGPL-3.0+
 * @copyright Fritz Michael Gschwantner 2016
 */


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['youtube'] = str_replace('{poster_legend:hide},posterSRC;', '', $GLOBALS['TL_DCA']['tl_content']['palettes']['youtube']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['youtube'] = str_replace(',autoplay', ',autoplay,ytParams,ytStart,ytEnd,ytForceLang,ytUseCSS', $GLOBALS['TL_DCA']['tl_content']['palettes']['youtube']);


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['ytParams'] = array
(
    'label'         => &$GLOBALS['TL_LANG']['tl_content']['ytParams'],
    'exclude'       => true,
    'inputType'     => 'checkbox',
    'options'       => &$GLOBALS['YT_PARAMS'],
    'reference'     => &$GLOBALS['TL_LANG']['tl_content']['ytParamsReference'],
    'eval'          => array('multiple'=>true,'tl_class'=>'clr'),
    'sql'           => 'blob NULL'
);

$GLOBALS['TL_DCA']['tl_content']['fields']['ytStart'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ytStart'],
	'default'                 => 0,
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'nospace'=>true, 'tl_class'=>'w50'),
	'sql'                     => "int(10) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['ytEnd'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ytEnd'],
	'default'                 => 0,
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'nospace'=>true, 'tl_class'=>'w50'),
	'sql'                     => "int(10) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['ytForceLang'] = array
(
    'label'         => &$GLOBALS['TL_LANG']['tl_content']['ytForceLang'],
    'exclude'       => true,
    'inputType'     => 'checkbox',
    'default'       => false,
    'eval'          => array('tl_class'=>'w50'),
    'sql'           => "char(1) NOT NULL default ''"
);
