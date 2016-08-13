<?php

class category extends ACore {

    public function get_content() {

        if (!isset($_GET['id_cat'])) echo 'Некорректные данные для вывода статей категории';
        else {
           $id_cat = (int)$_GET['id_cat'];
           if (!$id_cat) echo 'Некорректные данные для вывода статей категории';
           else return $result = $this->m->get_category($id_cat);
        }
    }

}
