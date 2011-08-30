<?php

/**
 * Product gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Product
 * @subpackage
 * @version		$Id$
 */
class Product_Gear extends Gear {

    protected $name = 'Product';
    protected $description = 'Show product info';
    protected $order = 5;
    
    /**
     * Init
     */
    public function init(){
        parent::init();
        new Product_Menu();
        $this->assets->styles->screen->deleteByKey('user_menu');
        $this->router->addRoute(':index', array($this, 'index'), TRUE);
    }
    /**
     * Menu
     *  
     * @param string $name
     * @param object $menu 
     */
    public function menu($name,$menu){
        switch($name){
            case 'product':
                $menu->{'/'} = t('Product');
                $menu->{'/'}->order = 0;
                break;
        }
    }
    
    /**
     * Dispatcher
     */
    public function index(){
        
    }
}