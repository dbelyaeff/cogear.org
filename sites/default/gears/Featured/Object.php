<?php

/**
 *  Featured object 
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Featured
 * @version		$Id$
 */
class Featured_Object extends Db_Item {

    protected $template = 'Featured.item';

    /**
     * Constructor
     * 
     * @param   boolean $autoinit
     */
    public function __construct() {
        parent::__construct('featured');
    }

}