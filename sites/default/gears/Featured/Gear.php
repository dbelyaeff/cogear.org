<?php

/**
 * Featured gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Featured
 * @subpackage
 * @version		$Id$
 */
class Featured_Gear extends Gear {

    protected $name = 'Featured';
    protected $description = 'Show featuerd slider';
    protected $order = 0;

    /**
     * Init
     */
    public function init() {
        parent::init();
        hook('gear.request', array($this, 'render'));
    }

    /**
     * Menu builder
     * 
     * @param string $name
     * @param object $menu 
     */
    public function menu($name, $menu) {
        switch ($name) {
            case 'admin':
                $menu->{'featured'} = t('Featured');
                $menu->{'featured'}->order = 200;
                break;
            case 'tabs_admin_featured':
                $menu->{'/'} = t('List');
                $menu->{'add'} = t('Add');
                $menu->{'add'}->class = 'fl_r';
                break;
        }
    }

    /**
     * Dispatcher
     * 
     * @param   string  $action
     */
    public function admin($action = NULL) {
        new Menu_Tabs('admin_featured',Url::link('/admin/featured'));
        
        switch($action){
            case 'add':
                $form = new Form('Featured.createdit');
                if($result = $form->result()){
                    $feature = new Featured_Object();
                    $feature->attach($result);
                    if($feature->save()){
                        flash_success(t('New feature has been successfully added!'));
                        redirect(Url::link('/admin/featured/'));
                    }
                    else {
                        error(t('Couldn\'t add a new feature for some reasons'));
                    }
                }
                $form->show();
                break;
            default:
                $features = new Featured_Object();
                $grid = new Grid_Table('featured_admin');
                $grid->setFilters(array(
                    'body' => array('substr',0,255),
                ));
                $grid->adopt($features->findAll());
                $grid->show();
        }
    }

    /**
     * Render features
     */
    public function render($Gear) {
        if (!in_array($Gear->getGear(), array('Product'))) {
            return;
        }
        $featured = new Featured_Object();
        $grid = new Grid('featured');
        $this->db->orderBy('order', 'asc');
        $grid->adopt($featured->findAll());
        append('content', $grid->render('Featured.grid'), 0);
    }

}