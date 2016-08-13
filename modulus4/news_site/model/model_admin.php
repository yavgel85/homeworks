<?php

class model_admin{

    protected $db;

    public function __construct(){
        $this->db = mysqli_connect(HOST, USER, PASSWORD, DB);
        if (!$this->db){
            exit('Ошибка подключения (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        }
        mysqli_query($this->db, "SET NAMES 'UTF8'");
    }

    public function get_left_bar(){
        return true;
    }

    public function get_main_content(){

        $query = "SELECT id, title FROM statti";
        $result = mysqli_query($this->db, $query);
        if (!$result) exit(mysqli_error($this->db));

        for ($i=0; $i<mysqli_num_rows($result); $i++){
            $row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        return $row;
    }

    public function process_form_add_menu($title, $text){
        // вставка данных в БД
        $query = "INSERT INTO menu(name_menu, text_menu)
                  VALUES ('$title', '$text')";
        $result = mysqli_query($this->db, $query);

        if (!$result) exit(mysqli_error($this->db));
        else {
            $_SESSION['res'] = 'Изменения сохранены успешно';
            header('Location:?option=add_menu');
            exit();
        }
        return true;
    }

    public function process_form_add_category($title, $parent_id){
        // вставка данных в БД
        $query = " INSERT INTO category(name_category, parent_id) VALUES ('$title', '$parent_id')";
        $result = mysqli_query($this->db, $query);

        if (!$result) exit(mysqli_error($this->db));
        else {
            $_SESSION['res'] = 'Изменения сохранены успешно';
            header('Location:?option=add_category');
            exit();
        }
        return true;
    }

    public function process_form_add_statti($title, $img_src, $date, $text, $description, $cat){
        // вставка данных в БД
        $query = "INSERT INTO statti(title, img_src, date, text, description, cat)
                  VALUES ('$title', '$img_src', '$date', '$text', '$description', '$cat')";
        $result = mysqli_query($this->db, $query);

        if (!$result) exit(mysqli_error($this->db));
        else {
            $_SESSION['res'] = 'Изменения сохранены успешно';
            header('Location:?option=add_statti');
            exit();
        }
        return true;
    }

    public function get_delete_menu($id_menu){
        $query = "DELETE FROM menu WHERE id_menu = '$id_menu'";
        $result = mysqli_query($this->db, $query);

        if (!$result) exit('Ошибка при удалении записи' . mysqli_error($this->db));
        else {
            $_SESSION['res'] = 'Запись удалена успешно';
            header('Location:?option=edit_menu');
            exit();
        }
    }

    public function get_delete_category($id_cat){
        $query = "DELETE FROM category WHERE id_category = '$id_cat'";
        $result = mysqli_query($this->db, $query);

        if (!$result) exit('Ошибка при удалении записи' . mysqli_error($this->db));
        else {
            $_SESSION['res'] = 'Запись удалена успешно';
            header('Location:?option=edit_category');
            exit();
        }
    }

    public function get_delete_statti($id_text){
        $query = "DELETE FROM statti WHERE id = '$id_text'";
        $result = mysqli_query($this->db, $query);

        if (!$result) exit('Ошибка при удалении записи' . mysqli_error($this->db));
        else {
            $_SESSION['res'] = 'Запись удалена успешно';
            header('Location:?option=admin');
            exit();
        }
    }

    public function get_edit_menu(){
        $query = "SELECT id_menu, name_menu FROM menu";
        $result = mysqli_query($this->db, $query);
        if (!$result) exit(mysqli_error($this->db));

        for ($i=0; $i<mysqli_num_rows($result); $i++){
            $row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        return $row;
    }

    public function get_edit_category(){
        $query = "SELECT id_category,name_category FROM category";
        $result = mysqli_query($this->db, $query);
        if (!$result) exit(mysqli_error($this->db));

        for($i = 0; $i < mysqli_num_rows($result);$i++) {
            $row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        return $row;
    }

    public function process_form_update_menu($title, $text, $id){
        // вставка данных в БД
        $query = "UPDATE menu SET name_menu='$title',text_menu='$text' WHERE id_menu = '$id'";
        $result = mysqli_query($this->db, $query);

        if (!$result) exit(mysqli_error($this->db));
        else {
            $_SESSION['res'] = 'Изменения сохранены успешно';
            header('Location:?option=edit_menu');
            exit();
        }
        return true;
    }

    public function process_form_update_category($title, $parent_id, $id){
        // вставка данных в БД
        $query = "UPDATE category SET name_category='$title', parent_id='$parent_id' WHERE id_category='$id'";
        $result = mysqli_query($this->db, $query);

        if (!$result) exit(mysqli_error($this->db));
        else {
            $_SESSION['res'] = 'Изменения сохранены успешно';
            header('Location:?option=edit_category');
            exit();
        }
        return true;
    }

    public function process_form_update_statti($title, $img_src, $date, $text, $description, $cat, $id){
        // вставка данных в БД
        $query = "UPDATE statti
                  SET title='$title',img_src='$img_src',date='$date',text='$text',description='$description',cat='$cat'
                  WHERE id = '$id'";
        $result = mysqli_query($this->db, $query);

        if (!$result) exit(mysqli_error($this->db));
        else {
            $_SESSION['res'] = 'Изменения сохранены успешно';
            header('Location:?option=admin');
            exit();
        }
        return true;
    }



    // ВСПОМАГАТЕЛЬНЫЕ ФУНКЦИИ
    // для выпадающего списка
    public function get_categories(){
        $query = "SELECT id_category, name_category FROM category";
        $result = mysqli_query($this->db, $query);
        if (!$result) exit(mysqli_error($this->db));

        $row = [];
        for ($i=0; $i<mysqli_num_rows($result); $i++){
            $row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        return $row;
    }

    public function get_text_statti($id){
        $query = "SELECT id, title, description, text, cat FROM statti WHERE id='$id'";
        $result = mysqli_query($this->db, $query);
        if (!$result) exit(mysqli_error($this->db));

        $row = [];
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $row;
    }

    public function get_text_menu($id){
        $query = "SELECT id_menu, name_menu, text_menu FROM menu WHERE id_menu='$id'";
        $result = mysqli_query($this->db, $query);
        if (!$result) exit(mysqli_error($this->db));

        $row = [];
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $row;
    }

    public function get_text_category($id) {
        $query = "SELECT id_category, name_category FROM category WHERE id_category = '$id'";
        $result = mysqli_query($this->db, $query);
        if (!$result) exit(mysqli_error($this->db));

        $row = [];
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $row;
    }

}