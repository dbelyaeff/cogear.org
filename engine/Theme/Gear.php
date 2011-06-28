<?php

/**
 * Theme gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Theme
 * @version		$Id$
 */
class Theme_Gear extends Gear {

    protected $name = 'Theme gear';
    protected $description = 'Manage themes';
    protected $type = Gear::CORE;
    protected $package = '';
    protected $order = -1000;
    public $current;
    const SUFFIX = '_Theme';

    /**
     * Init
     */
    public function init() {
        $cogear = getInstance();
        hook('gear.request', array($this, 'handleGearRequest'));
        if ($favicon = $cogear->get('theme.favicon')) {
            hook('theme.head.meta.after', array($this, 'renderFavicon'));
        }
        parent::init();
    }
    /**
     * Handle gear request
     * 
     * Set theme, initialize it.
     * 
     * @param   object  $Gear
     */
    public function handleGearRequest($Gear) {
        $this->theme($Gear->settings->theme);
    }
    
    /**
     * Init current theme
     *  
     * @param type $theme 
     */
    public function theme($theme = NULL){
        $theme OR $theme = config('theme.current','Theme_Default');
        $class = self::themeToClass($theme);
        if(!class_exists($class)){
            error(t('Theme <b>%s</b> doesn\'t exist.','Theme',$theme));
            $class = 'Theme_Default_Theme';
        }
        $this->current = new $class();
        $this->current->init();
        $this->current->activate();
        cogear()->gears->$theme = $this->current;
    }
    /**
     *
     * @param type $theme 
     */
    public function set($theme){
        $cogear = getInstance();
        $cogear->set('theme.current',$theme);
    }
    /**
     * Transform theme name to class name
     * 
     * @param   string  $theme
     */
    public static function themeToClass($theme){
        return $theme.self::SUFFIX;
    }
    /**
     * Transform class name to theme name
     * 
     * @param   string  $theme
     */
    public static function classToTheme($class){
        return substr($class,0,  strrpos($class, self::SUFFIX));
    }
    /**
     * Render favicon
     */
    public function renderFavicon() {
        echo '<link rel="shortcut icon" href="' . Url::toUri(UPLOADS) . cogear()->get('theme.favicon') . '" />' . "\n";
    }

    /**
     * Default dispatcher
     * 
     * @param string $type 
     */
    public function admin($action = '', $subaction = NULL) {
        $form = new Form('Admin.theme');

        if ($form->is_ajaxed) {
            if ($form->elements->logo->is_ajaxed) {
                $cogear->set('theme.logo', '');
            }
            if ($form->elements->favicon->is_ajaxed) {
                $cogear->set('theme.favicon', '');
            }
        } else {
            $form->setValues(array(
                'logo' => config('theme.logo'),
                'favicon' => config('theme.favicon'),
            ));
        }
        if ($result = $form->result()) {
            $result->logo && $cogear->set('theme.logo', $result->logo);
            $result->favicon && $cogear->set('theme.favicon', $result->favicon);
        }
        append('content', $form->render());
    }

}

function append($name, $value) {
    $cogear = getInstance();
    if (!$cogear->theme->current->regions->$name)
        return;
    $cogear->theme->current->regions->$name->append($value);
}
function prepend($name, $value) {
    $cogear = getInstance();
    if (!$cogear->theme->current->regions->$name)
        return;
    $cogear->theme->current->regions->$name->prepend($value);
}
function inject($name, $value, $position = 0) {
    $cogear = getInstance();
    if (!$cogear->theme->current->regions->$name)
        return;
    $cogear->theme->current->regions->$name->inject($value,$position);
}