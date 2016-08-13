<?php

class delete_menu extends ACoreAdmin{
    public function get_content(){
        if ($_GET['id_text']) {
            $id_menu = (int)$_GET['id_text'];
            $result = $this->m->get_delete_menu($id_menu);
        }
        else exit('Некорректные данные для данной страницы');
    }
}
