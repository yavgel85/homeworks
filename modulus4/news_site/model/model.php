<?php

class model{

    protected $db;

    public function __construct(){
        $this->db = mysqli_connect(HOST, USER, PASSWORD, DB);
        if (!$this->db){
            exit('Ошибка подключения (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        }
        mysqli_query($this->db, "SET NAMES 'UTF8'");
    }

    public function get_header(){
        return true;
    }

    public function get_left_bar(){
        $query = "SELECT id_category, name_category, parent_id FROM category";
        $result = mysqli_query($this->db, $query);
        if (!$result) exit(mysqli_connect_error());

        for ($i=0; $i<mysqli_num_rows($result); $i++){
            $rows[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }

        $result1 = mysqli_query($this->db, $query);
        $arr = $this->getTree($result1);
        $menu_tree = $this->getCatTree($arr);

        return compact('rows', 'menu_tree');
    }

    protected function getTree($array) {
        $arr_cat = [];
        if (mysqli_num_rows($array) != 0){
            for ($i=0; $i<mysqli_num_rows($array); $i++){
                $row = mysqli_fetch_array($array, MYSQLI_ASSOC);
                if (empty( $arr_cat[$row['parent_id']])){
                    $arr_cat[$row['parent_id']] = [];
                }
                $arr_cat[$row['parent_id']][] = $row;
            }
        }
        return  $arr_cat;
    }

    protected function getCatTree($arr, $parent_id = 0){
        if (empty($arr[$parent_id])) return;

        echo "<ul>";
        for ($i=0; $i < count($arr[$parent_id]); $i++){
            echo "<li style='list-style-type: none;'>
                <a style='font-size: 11px;' href='?option=category&id_cat=" .$arr[$parent_id][$i]['id_category']. "&parent_id=" .$parent_id. "' >"
                .$arr[$parent_id][$i]['name_category']. "</a>";
            $this->getCatTree($arr, $arr[$parent_id][$i]['id_category']);
            echo "</li>";
        }
        echo "</ul>";
    }

    public function menu_array(){
        $query = "SELECT id_menu, name_menu FROM menu";
        $result = mysqli_query($this->db, $query);
        if (!$result) exit(mysqli_connect_error());

        $row = [];
        for ($i=0; $i<mysqli_num_rows($result); $i++){
            $row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        return $row;
    }

    public function get_main_content(){
        // pagination
        $perpage = 5; //кол-во записей на стр.
        if (empty($_GET['page']) || $_GET['page'] <= 0) $page = 1;
        else $page = (int)$_GET['page']; // номер текущей стр.
        $count = $this->get_row(); // общее кол-во записей в БД
        $pages_count = ceil($count / $perpage); // общее кол-во стр.
        if ($page > $pages_count) $page = $pages_count; // если запрашиваемая стр > больше общего кол-ва стр.
        $start_pos = ($page - 1) * $perpage;

        $query = "SELECT id, title, description, `date`, img_src FROM statti ORDER BY `date` DESC LIMIT $start_pos, $perpage";
        $result = mysqli_query($this->db, $query);
        if (!$result) exit(mysqli_error($this->db));

        for ($i=0; $i<mysqli_num_rows($result); $i++){
            $row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        return $row;
    }

    public function get_category($id_cat){
        $query = "SELECT id, title, description, `date`, img_src 
                              FROM statti 
                              WHERE cat = '$id_cat' 
                              ORDER BY `date` DESC";
        $result = mysqli_query($this->db, $query);
        if (!$result) exit(mysqli_error($this->db));

        $row = [];
        for ($i=0; $i<mysqli_num_rows($result); $i++){
            $row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        return $row;
    }

    public function get_menu($id_menu){
        $query = "SELECT id_menu, name_menu, text_menu FROM menu WHERE id_menu = '$id_menu'";
        $result = mysqli_query($this->db, $query);
        if (!$result) exit(mysqli_error($this->db));
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $row;
    }

    public function get_view($id_text){
        $query = "SELECT id, title, text, `date`, img_src FROM statti WHERE id = '$id_text'";
        $result = mysqli_query($this->db, $query);
        if (!$result) exit(mysqli_error($this->db));
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $row;
    }

    public function process_form_login(){
        $login = strip_tags(mysqli_real_escape_string($this->db, $_POST['login']));
        $password = strip_tags(mysqli_real_escape_string($this->db, $_POST['password']));

        if (!empty($login) && !empty($password)) {
            $password = md5($password);

            $query = "SELECT id FROM users WHERE login='$login' AND password='$password'";
            $result = mysqli_query($this->db, $query);

            if (!$result) exit(mysqli_error($this->db));

            if (mysqli_num_rows($result) == 1){
                $_SESSION['user'] = true;
                header("Location: ?option=admin");
                exit();
            }
            else exit('Такого пользователя нет');
        }
        else exit('Введите корректный логин и/или пароль');
    }

    // ВСПОМАГАТЕЛЬНЫЕ ФУНКЦИИ
    public function get_row(){
        $query = "SELECT COUNT(id) FROM statti";
        $result = mysqli_query($this->db, $query);
        $count_row = mysqli_fetch_row($result);
        if ($count_row <= 0) exit(mysqli_error($this->db));
        return $count_row[0];
    }

    public function pagination($page, $pages_count){
        for ($i=1; $i <= $pages_count; $i++){
            if ($i == $page) echo "<a class='nav_active'>$i</a>";
            else echo "<a class='nav_link' href='?page=$i'>$i</a>";
        }
        return true;
    }

}
