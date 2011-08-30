<?php

/**
 * Tutorials gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Tutorials
 * @subpackage
 * @version		$Id$
 */
class Tutorials_Gear extends Gear {

    protected $name = 'Tutorials';
    protected $description = 'Expose engine tutorials.';
    /**
     * Menu
     * 
     * @param string $name
     * @param object $menu 
     */
    public function menu($name,$menu){
        switch($name){
            case 'product':
                $link = Url::gear('tutorials');
                $menu->{$link} = t('Tutorials');
                $menu->{$link}->order = 6;
                break;
        }
    }
}