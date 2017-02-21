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
 * Config
 */
if( version_compare( VERSION, '3.1', '>=' ) )
{
    $arrCallbacks = array( array('tl_content_youtube_iframe', 'showJsLibraryHint') );
    foreach( $GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'] as $callback )
    {
        if( $callback instanceof Closure )
        {
            $arrCallbacks[] = $callback;
        }
        elseif( is_array( $callback ) && count( $callback ) > 0 )
        {
            if( $callback[1] != 'showJsLibraryHint' )
                $arrCallbacks[] = $callback;
        }
    }
    $GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'] = $arrCallbacks;
}

$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('tl_content_youtube_iframe','outputFormatMsg');



/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['youtube'] = str_replace('{poster_legend:hide},posterSRC;', '', $GLOBALS['TL_DCA']['tl_content']['palettes']['youtube']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['youtube'] = str_replace(',autoplay', ',autoplay,ytParams,ytStart,ytEnd,ytForceLang,ytUseCSS', $GLOBALS['TL_DCA']['tl_content']['palettes']['youtube']);


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['youtube']['save_callback'][] = array('tl_content_youtube_iframe','extractId');
$GLOBALS['TL_DCA']['tl_content']['fields']['youtube']['eval']['decodeEntities'] = true;

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


/**
 * Helper class
 */
class tl_content_youtube_iframe extends \Backend
{

    /**
     * Import the back end user object
     */
    public function __construct()
    {
        parent::__construct();
        $this->import('BackendUser', 'User');
    }


    /**
     * Show a hint if a JavaScript library needs to be included in the page layout
     *
     * @param object
     */
    public function showJsLibraryHint($dc)
    {
        if ($_POST || \Input::get('act') != 'edit')
        {
            return;
        }

        // Return if the user cannot access the layout module (see #6190)
        if (!$this->User->hasAccess('themes', 'modules') || !$this->User->hasAccess('layout', 'themes'))
        {
            return;
        }

        $objCte = \ContentModel::findByPk($dc->id);

        if ($objCte === null)
        {
            return;
        }

        switch ($objCte->type)
        {
            case 'gallery':
                \Message::addInfo(sprintf($GLOBALS['TL_LANG']['tl_content']['includeTemplates'], 'moo_mediabox', 'j_colorbox'));
                break;

            case 'sliderStart':
            case 'sliderStop':
                \Message::addInfo(sprintf($GLOBALS['TL_LANG']['tl_content']['includeTemplates'], 'moo_slider', 'j_slider'));
                break;

            case 'accordionSingle':
            case 'accordionStart':
            case 'accordionStop':
                \Message::addInfo(sprintf($GLOBALS['TL_LANG']['tl_content']['includeTemplates'], 'moo_accordion', 'j_accordion'));
                break;

            case 'player':
                \Message::addInfo(sprintf($GLOBALS['TL_LANG']['tl_content']['includeTemplate'], 'j_mediaelement'));
                break;

            case 'table':
                if ($objCte->sortable)
                {
                    \Message::addInfo(sprintf($GLOBALS['TL_LANG']['tl_content']['includeTemplates'], 'moo_tablesort', 'j_tablesort'));
                }
                break;
        }
    }


    /**
     * Extracts the YouTube video ID from the string.
     *
     * @param mixed $varValue
     * @param \DataContainer $dc
     *
     * @return mixed
     */
    public function extractId($varValue, $dc)
    {
        // http://stackoverflow.com/a/6382259/374996
        if( preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $varValue, $match) )
        {
            return $match[1];
        }

        return $varValue;
    }


    /**
     * Adds an error if the doctype is not supported.
     *
     * @param \DataContainer $dc
     *
     * @return void
     */
    public function outputFormatMsg($dc)
    {
        if( ( $objCte = \ContentModel::findByPk($dc->id) ) !== null )
        {
            if( $objCte->type != 'youtube' )
            {
                return;
            }
        }

        if( \DataBase::getInstance()->query("SELECT COUNT(*) as count FROM tl_layout WHERE doctype != 'html5'")->count > 0 )
        {
            \Message::addError($GLOBALS['TL_LANG']['tl_content']['doctype_not_supported']);
        }
    }
}