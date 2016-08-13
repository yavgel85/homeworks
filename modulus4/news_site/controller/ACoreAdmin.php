<?php

abstract class ACoreAdmin {

    // объект модели
    protected $m;

    public function __construct(){
        // закрываем админчасть от посторонних
        if (!$_SESSION['user']) header("Location: ?option=login");

        $this->m = new model_admin();
    }

    protected function get_header(){
        return true;
    }

    protected function get_left_bar(){
        return $result = $this->m->get_left_bar();
    }

    protected function get_menu(){
       return true;
    }

    protected function get_footer(){
        return true;
    }

    public function getBody($tpl){
        if ($_POST) $this->process_form();

        $this->get_header();
        $left_bar = $this->get_left_bar();
        $menu = $this->get_menu();
        $content = $this->get_content();
        $footer = $this->get_footer();

        include('view/index_admin.php');
    }

    abstract function get_content();

}
