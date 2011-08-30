<?php

/**
 * Download gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Download
 * @subpackage
 * @version		$Id$
 */
class Download_Gear extends Gear {

    protected $name = 'Download';
    protected $description = 'Download files.';
    /**
     * Menu
     * 
     * @param string $name
     * @param object $menu 
     */
    public function menu($name,$menu){
        switch($name){
            case 'product':
                $link = Url::gear('download');
                $menu->{$link} = t('Download');
                $menu->{$link}->order = 2;
                break;
        }
    }
}