<?php

class main extends ACore {

    public function get_content() {
        $result = $this->m->get_main_content();
        $count_row = $this->m->get_row();

        // pagination
        /*$perpage = 5; //кол-во записей на стр.
        if (empty($_GET['page']) || $_GET['page'] <= 0) $page = 1;
        else $page = (int)$_GET['page']; // номер текущей стр.
        $count = $this->m->get_row(); // общее кол-во записей в БД
        $pages_count = ceil($count / $perpage); // общее кол-во стр.
        if ($page > $pages_count) $page = $pages_count; // если запрашиваемая стр > больше общего кол-ва стр.
        $start_pos = ($page - 1) * $perpage;

        $pagination = $this->m->pagination($page, $pages_count);*/

        return compact('result', 'count_row');
    }

}
