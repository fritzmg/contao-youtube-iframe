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
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] = str_replace('loadingOrder', 'ytUseCSS,loadingOrder', $GLOBALS['TL_DCA']['tl_layout']['palettes']['default']);


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_layout']['fields']['ytUseCSS'] = array
(
    'label'         => &$GLOBALS['TL_LANG']['tl_layout']['ytUseCSS'],
    'exclude'       => true,
    'inputType'     => 'checkbox',
    'default'       => false,
    'sql'           => "char(1) NOT NULL default ''"
);
