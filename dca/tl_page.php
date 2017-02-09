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

$GLOBALS['TL_DCA']['tl_page']['subpalettes']['includeLayout'] .= ',tabletLayout';

$GLOBALS['TL_DCA']['tl_page']['fields']['tabletLayout'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_page']['tabletLayout'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'foreignKey'              => 'tl_layout.name',
    'options_callback'        => array('tl_page', 'getPageLayouts'),
    'eval'                    => array('includeBlankOption' => true, 'chosen'=>true, 'tl_class'=>'w50'),
    'sql'                     => "int(10) unsigned NOT NULL default '0'",
    'relation'                => array('hasOne' => 'lazy'),
);