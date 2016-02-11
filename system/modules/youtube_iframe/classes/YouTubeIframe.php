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


class YouTubeIframe
{
	public function getPageLayout( \PageModel $objPageModel, \LayoutModel $objLayout, \PageRegular $objPage )
	{
		if( $objLayout->ytUseCSS )
			$GLOBALS['TL_CSS'][] = 'system/modules/youtube_iframe/assets/video-wrapper.css|all|static';
	}
}
