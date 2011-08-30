<?php
/**
 * Filter iterator
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Iterator_Filter_Key extends FilterIterator {
    /**
     * Mask
     * 
     * @var string
     */
    private $mask;
    /**
     * 
     *
     * @param Iterator $iterator
     * @param string $filter 
     */
    public function __construct(Iterator $iterator, $mask) {
        parent::__construct($iterator);
        $this->mask = str_replace(array(
            '.',
            '*',
        ),array(
            '\.',
            '.*',
        ),$mask);
    }
    /**
     * Accept
     * 
     * @return boolean
     */
    public function accept() {
        $key = $this->getInnerIterator()->key();
        return (boolean)preg_match('#'.$this->mask.'#',$key);
    }

}