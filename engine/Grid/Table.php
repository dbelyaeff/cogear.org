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
class Grid_Table extends Grid_Object {

    protected $template = 'Grid.table';

    /**
     * Render
     */
    public function render($template = NULL) {
        $template OR $template = $this->template;
        event('grid.render', $this);
        event('grid.render.' . $this->name, $this);
        foreach ($this as $item) {
            $this->filters && $item->filter($this->filters);
            $item->in_grid = TRUE;
        }
        !$this->count() && info(t('There is nothing to show.'));
        $tpl = new Template($template);
        $tpl->grid = $this;
        return $tpl->render();
    }

}
