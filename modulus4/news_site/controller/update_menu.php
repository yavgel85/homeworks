<?php

class update_menu extends ACoreAdmin{

    protected function process_form(){

        // загрузка полей формы на сервер
        $id = $_POST['id'];
        $title = $_POST['title'];
        $text = $_POST['text'];

        // проверка на заполненость обязательных полей
        if (empty($title) || empty($text))
            exit('Не заполнены обязательные поля формы');

        // вставка данных в БД
        $this->m->process_form_update_menu($title, $text, $id);
    }

    public function get_content(){
        if ($_GET['id_text']) $id_menu = (int)$_GET['id_text'];
        else exit('Некорректные данные для данной страницы');

        return $menu = $this->m->get_text_menu($id_menu);
    }
}
