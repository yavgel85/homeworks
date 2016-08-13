<?php

class delete_statti extends ACoreAdmin{
    public function get_content(){
        if ($_GET['id_text']) {
            $id_text = (int)$_GET['id_text'];
            $result = $this->m->get_delete_statti($id_text);
        }
        else exit('Некорректные данные для данной страницы');
    }
}
