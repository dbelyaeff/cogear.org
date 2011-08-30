<?php
/**
 * 
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Product_Menu extends Menu_Auto {
    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct('product', 'Product.menu');
        hook('menu',array($this,'output'));
    }
}