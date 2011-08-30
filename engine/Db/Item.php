<?php

class Db_Item extends Db_ORM implements Interface_Render {

    protected $template = 'Db.item';

    /**
     * Render
     * 
     * @param type $template 
     */
    public function render($template = NULL) {
        $template OR $template = $this->template;
        $tpl = new Template($template);
        $tpl->item = $this;
        return $tpl->render();
    }

}