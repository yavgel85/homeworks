<?php
/**
 * Created by PhpStorm.
 * User: Evgeniy
 * Date: 30.04.2016
 * Time: 3:23
 */

// очистка принимаемых данных
function clearData($var){
    $var = trim(mysql_real_escape_string($var));
    return $var;
}

// очистка выводимых данных для клиента(браузера)
function clearDataClient($var){
    $var = htmlspecialchars($var);
    return $var;
}

// добавление сообщения
function addPost($name, $email, $msg){
    // очищаем данные
    $name = clearData($name);
    $email = clearData($email);
    $msg = clearData($msg);

    // проверяем данные пользователя: имя и адрес почты(необязательные поля), если нет - заполним данными по-умолчанию
    if(empty($name)) $name = 'Гость';
    if(empty($email)) $email = '[E-Mail не указан]';

    // проверка текстовой области: если не пусто - запишем сообщение в БД; если пусто - ничего не добавляем в БД
    if(!empty($msg)) {
        $query = "INSERT INTO post (name, email, post) VALUES ('$name', '$email', '$msg')";
        mysql_query($query);
        // проверяем прошел ли запрос
        if(mysql_affected_rows() > 0) {
            $result = 'Сообщение добавлено!';
        } else {
            $result = 'Ошибка добавления сообщения!';
        }
     } else {
        $result = FALSE;
    }
    return $result;
}

// выборка сообщений
function selectAll(){
    $posts = [];
    // запрос на выборку данных о комментариях и сортировка в обратном порядке для отображения последних комментариев первыми
    $query = "SELECT id, name, email, post, date FROM post ORDER BY date DESC";
    $res = mysql_query($query);
    //выбираем все данные
    while($row = mysql_fetch_assoc($res)){
        $posts[] = $row;
    }
    return $posts;
}

// удаление комментариев
function delPost($id){
    $id = (int) $id;
    $query = "DELETE FROM post WHERE id=$id";
    mysql_query($query);
}

// добавление BB-тегов
function bbTags($str){
    // поступающие BB-теги
    $bb = array(':)', ';)', 'censure', 'scold', 'coffee', '[B]', '[/B]');
    // аналоги BB-тегов
    $tag = array(
                '<img src="smiles/smile.gif">',
                '<img src="smiles/wink.gif">',
                '<img src="smiles/censure.gif">',
                '<img src="smiles/scold.gif">',
                '<img src="smiles/coffee.gif">',
                '<strong>',
                '</strong>'
    );
    
    // замена массива BB-тегов их аналогами
    return str_ireplace($bb, $tag, $str);
}

// преобразование в заглавные буквы (в начале каждого предложения)
function fixText($str) {
    return preg_replace_callback('#((?:[.!?]|^)\s*)(\w)#us', function($matches) {
        return $matches[1] . mb_strtoupper($matches[2]);
    }, $str);
}

// цензура комментариев
function censure($str, $bad_words, $replace_str){
    $replace_str = "CENSURE";
    $bad_words = array('ass','bitch','fuck','suck','sucks');

    if (!is_array($bad_words)){ $bad_words = explode(',', $bad_words); }
    for ($x=0; $x < count($bad_words); $x++){
        $fix = isset($bad_words[$x]) ? $bad_words[$x] : '';
        $_replace_str = $replace_str;
        if (strlen($replace_str)==1){ 
            $_replace_str = str_pad($_replace_str, strlen($fix), $replace_str);
        }
        $str = preg_replace('/'.$fix.'/i', $_replace_str, $str);
    }
    return $str;
}