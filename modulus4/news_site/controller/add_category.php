<?php

class add_category extends ACoreAdmin {
	
	protected function process_form() {
        // загрузка полей формы на сервер
        $title = $_POST['title'];
        $parent_id = $_POST['parent_id'];


        // проверка на заполненость обязательных полей
        if (empty($title) || empty($parent_id))
            exit('Не заполнены обязательные поля формы');

        // вставка данных в БД
        $this->m->process_form_add_category($title, $parent_id);
	}
	
	public function get_content() {
	    return true;
	}
}
