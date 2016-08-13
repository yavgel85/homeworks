<?php

class delete_category extends ACoreAdmin {
	public function get_content() {
        if ($_GET['del']) {
            $id_cat = (int)$_GET['del'];
            $result = $this->m->get_delete_category($id_cat);
        }
        else exit('Некорректные данные для данной страницы');
	}
}
