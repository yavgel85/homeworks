<?php

class menu extends ACore{

    public function get_content(){
        if (!isset($_GET['id_menu'])) echo 'Некорректные данные для вывода меню';
        else {
            $id_menu = (int)$_GET['id_menu'];
            if (!$id_menu) echo 'Некорректные данные для вывода меню';
            else return $row = $this->m->get_menu($id_menu);
        }
    }

}
