<?php

/**
 * Team gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Team
 * @subpackage
 * @version		$Id$
 */
class Team_Gear extends Gear {

    protected $name = 'Team';
    protected $description = 'Team files.';
    /**
     * Menu
     * 
     * @param string $name
     * @param object $menu 
     */
    public function menu($name,$menu){
        switch($name){
            case 'product':
                $link = Url::gear('team');
                $menu->{$link} = t('Team');
                $menu->{$link}->order = 5;
                break;
        }
    }
}