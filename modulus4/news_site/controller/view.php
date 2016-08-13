<?php

class view extends ACore{

    public function get_content(){
        if (!isset($_GET['id_text'])) echo 'Некорректные данные для вывода статьи';
        else {
            $id_text = (int)$_GET['id_text'];
            if (!$id_text) echo 'Некорректные данные для вывода статьи';
            else return $row = $this->m->get_view($id_text);
        }
    }

}
