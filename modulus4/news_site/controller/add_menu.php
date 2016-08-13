<?php

class add_menu extends ACoreAdmin{

    protected function process_form(){
        // загрузка полей формы на сервер
        $title = $_POST['title'];
        $text = $_POST['text'];

        // проверка на заполненость обязательных полей
        if (empty($title) || empty($text))
            exit('Не заполнены обязательные поля формы');

        // вставка данных в БД
        $this->m->process_form_add_menu($title, $text);
    }

    public function get_content(){
        return true;
    }
}
