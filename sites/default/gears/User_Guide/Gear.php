<?php

/**
 * User_Guide gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		User_Guide
 * @subpackage
 * @version		$Id$
 */
class User_Guide_Gear extends Gear {

    protected $name = 'User Guide';
    protected $description = 'Documentation management.';
    /**
     * Menu
     * 
     * @param string $name
     * @param object $menu 
     */
    public function menu($name,$menu){
        switch($name){
            case 'product':
                $link = Url::gear('user_guide');
                $menu->{$link} = t('User Guide');
                $menu->{$link}->order = 3;
                break;
        }
    }
    /**
     * Dispatcher
     */
    public function index(){

    }
}