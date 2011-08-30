<?php
/**
 * Grid Object
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Grid
 * @subpackage
 * @version		$Id$
 */
class Grid_Object extends Options {
    protected $name;
    protected $template = 'Grid.grid';
    protected $item_template;
    protected $filters;
    /**
     * Constructor
     * 
     * @param string $name 
     */
    public function __construct($name) {
        $this->name = $name;
    }
    /**
     * Set template for items looping render
     * 
     * @param string $template
     * @return Grid_Object 
     */
    public function setItemTemplate($template){
        $this->item_template = $template;
        return $this;
    }
    /**
     * Set filters
     * 
     * @param array $filters 
     */
    public function setFilters($filters = NULL){
        $this->filters = $filters;
    }
    /**
     * Render
     */
    public function render($template = NULL){
        $template OR $template = $this->template;
        event('grid.render',$this);
        event('grid.render.'.$this->name,$this);
        $output = new Core_ArrayObject();
        foreach($this as $item){
            $this->filters && $item->filter($this->filters);
            $item->in_grid = TRUE;
            $output->append($item->render($this->item_template));
        }
        !$this->count() && info(t('There is nothing to show.'));
        $tpl = new Template($template);
        $tpl->grid = $this;
        $tpl->data = $output->toString();
        return $tpl->render();
    }
    
}
