<?php

class update_statti extends ACoreAdmin{

    protected function process_form(){
        // загрузка картинок на сервер
        if (!empty($_FILES['img_src']['tmp_name'])){
            if (!move_uploaded_file($_FILES['img_src']['tmp_name'], 'file/'.$_FILES['img_src']['name'])){
                exit('Не удалось загрузить изображение');
            }
            $img_src = 'file/'.$_FILES['img_src']['name'];
        }

        // загрузка остальных полей формы на сервер
        $id = $_POST['id'];
        $title = $_POST['title'];
        $date = date('Y-m-d', time());
        $description = $_POST['description'];
        $text = $_POST['text'];
        $cat = $_POST['cat'];

        // проверка на заполненость обязательных полей
        if (empty($title) || empty($description) || empty($text))
            exit('Не заполнены обязательные поля формы');

        // вставка данных в БД
        $this->m->process_form_update_statti($title, $img_src, $date, $text, $description, $cat, $id);
    }

    public function get_content(){
        if ($_GET['id_text']) $id_text = (int)$_GET['id_text'];
        else exit('Некорректные данные для данной страницы');
        $text = $this->m->get_text_statti($id_text);

        $cat = $this->m->get_categories();

        return compact('text', 'cat');
    }
}
