<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @package   z_tablet_layout
 * @author    Jan Zimpel
 * @license   GNU/LGPL
 * @copyright Jan Zimpel 2017
 */


use BugBuster\MobileDetection\Mobile_Detection;



class TabletLayout
{
	public function getPageLayout( PageModel &$objPage, LayoutModel &$objLayout, PageRegular &$objPageRegular )
	{
		if ($objPage->tabletLayout && (new Mobile_Detection)->isTablet())
		{
			// load mobile layout
			if (($objMobile = \LayoutModel::findByPk($objPage->tabletLayout)) !== null) {
				$objLayout = $objMobile;

				$objPageRegular->setCookie('TL_VIEW', 'mobile', 0);

				$objPage->hasJQuery = $objLayout->addJQuery;
				$objPage->hasMooTools = $objLayout->addMooTools;
				$objPage->isMobile = true;
			}
		}
	}
}
