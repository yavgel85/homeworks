<?php

abstract class ACore {

    // объект модели
    protected $m;

    public function __construct(){
        $this->m = new model();
    }

    protected function get_header(){
        return $result = $this->m->get_header();
    }

    protected function get_left_bar(){
        return $result = $this->m->get_left_bar();
    }

    protected function get_menu(){
        return $row = $this->m->menu_array();
    }

    protected function get_footer(){
        return $row = $this->m->menu_array();
    }
    
    public function getBody($tpl){

        if ($_POST) $this->process_form();

        $header = $this->get_header();
        $left_bar = $this->get_left_bar();
        $menu_top = $this->get_menu();
        $content = $this->get_content();
        $footer = $this->get_footer();

        include('view/index.php');
    }

    abstract function get_content();
}
