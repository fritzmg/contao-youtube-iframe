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


class YouTubeIframe
{
	public function parseTemplate( \Template $objTemplate )
	{
		// check if this template has all required parameters
		if( !$objTemplate->youtube || $objTemplate->type != 'youtube' )
			return;

		// generate parameters
		$ytParams = deserialize( $objTemplate->ytParams );
		$ytParams = is_array( $ytParams ) ? array_map(function($v){ return  $GLOBALS['YT_PARAMS_MAPPING'][$v]; }, $ytParams) : array();
		if( $objTemplate->autoplay    ) $ytParams[] = 'autoplay=1';
		if( $objTemplate->ytEnd       ) $ytParams[] = 'end='.$objTemplate->ytEnd;
		if( $objTemplate->ytStart     ) $ytParams[] = 'start='.$objTemplate->ytStart;
		if( $objTemplate->ytForceLang ) $ytParams[] = 'hl='.$GLOBALS['TL_LANGUAGE'];
		$objTemplate->ytStrParams = $ytParams ? '?'.implode('&amp;', $ytParams) : '';

		// generate size information
		$size = deserialize( $objTemplate->playerSize );
		$objTemplate->arClass = '';
		$objTemplate->size = '';
		if( $size[0] > 0 && $size[1] > 0 )
		{
			$objTemplate->size = ' width="'.$size[0].'" height="'.$size[1].'"';
			$ratio = $size[0] / $size[1];
			    if( $ratio > 2.3 ) $objTemplate->arClass = ' ar219';
			elseif( $ratio > 1.7 ) $objTemplate->arClass = ' ar169';
			elseif( $ratio > 1.5 ) $objTemplate->arClass = ' ar1610';
			elseif( $ratio > 1.3 ) $objTemplate->arClass = ' ar43';
			else                   $objTemplate->arClass = ' ar11';
		}
	}

	public function getPageLayout( \PageModel $objPageModel, \LayoutModel $objLayout, \PageRegular $objPage )
	{
		if( $objLayout->ytUseCSS )
			$GLOBALS['TL_CSS'][] = 'system/modules/youtube_iframe/assets/video-wrapper.css|all|static';
	}
}
