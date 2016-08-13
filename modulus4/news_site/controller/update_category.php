<?php

class update_category extends ACoreAdmin {
	
	protected function process_form() {
        // загрузка полей формы на сервер
		$id = $_POST['id'];
		$title = $_POST['title'];
        $parent_id = $_POST['parent_id'];

        // проверка на заполненость обязательных полей
		if(empty($title || empty($parent_id))) {
			exit("Не заполнены обязательные поля");
		}

        // вставка данных в БД
        $this->m->process_form_update_category($title, $parent_id, $id);
	}
	
	public function get_content() {
        if ($_GET['id_text']) $id_text = (int)$_GET['id_text'];
        else exit('Некорректные данные для данной страницы');
        //$cat = $this->m->get_categories();

		return $category = $this->m->get_text_category($id_text);
	}
}
