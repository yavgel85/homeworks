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

// регистрация
function registration($post){
    $login = clean_data($post['reg_login']);
    $password = trim($post['reg_password']);
    $conf_pass = trim($post['reg_password_confirm']);
    $email = clean_data($post['reg_email']);

    $msg = '';
    if(empty($login)) $msg .= 'Введите логин<br>';
    if(empty($password)) $msg .= 'Введите пароль<br>';
    if(empty($email)) $msg .= 'Введите адрес почтового ящика<br>';
    
    if($msg){
        $_SESSION['reg']['login'] = $login;
        $_SESSION['reg']['email'] = $email;
        return $msg;
    }

    if($conf_pass == $password){
        $sql = "SELECT user_id FROM users WHERE login='%s'";
        $sql = sprintf($sql, mysql_real_escape_string($login));
        $result = mysql_query($sql);

        if(mysql_num_rows($result) > 0) {
            $_SESSION['reg']['email'] = $email;
            return "Пользователь с таким логином уже существует!";
        }

        $password = md5($password);
        $hash = md5(microtime());

        $query = "INSERT INTO users (login, password, email, hash) VALUES ('%s', '%s', '%s', '$hash')";
        $query = sprintf($query, mysql_real_escape_string($login), $password, mysql_real_escape_string($email));
        $result2 = mysql_query($query);

        if(!$result2) {
            $_SESSION['reg']['login'] = $login;
            $_SESSION['reg']['email'] = $email;
            return "Ошибка добавления пользователя в БД.";
        } else {
            $headers = '';
            $headers .= "From: Admin <admin@gmail.com> \r\n";
            $headers .= "Content-Type: text/plain; charset=utf-8";
            $tema = 'Registration';
            $mail_body = "Спасибо за регистрацию. Ваша ссылка для подтверждения учетной записи: http://localhost/guestbook_auth/confirm.php?hash=" .$hash;
            mail($email, $tema, $mail_body, $headers);

            return true;
        }
    } else {
        $_SESSION['reg']['login'] = $login;
        $_SESSION['reg']['email'] = $email;
        return "Пароли должны совпадать!";
    }
}

function clean_data($str){
    return strip_tags(trim($str));
}

function confirm(){
    $new_hash = clean_data($_GET['hash']);

    $query = "UPDATE users SET confirm='1' WHERE hash='%s'";
    $query = sprintf($query, mysql_real_escape_string($new_hash));
    $result = mysql_query($query);

    if(mysql_affected_rows() == 1) return true;
    else return "Неверный код подтверждения регистрации!";
}

function login($post){
    if(empty($_POST['login']) || empty($_POST['password'])) {
        return "Заполните поля";
    }

    $login = clean_data($post['login']);
    $password = md5(trim($post['password']));

    $sql = "SELECT user_id, confirm FROM users WHERE login='%s' AND password='%s'";
    $sql = sprintf($sql, mysql_real_escape_string($login), $password);
    $result = mysql_query($sql);

    if(!$result || mysql_num_rows($result) < 1){
        return "Неправильный логин и/или пароль!";
    }

    if(mysql_result($result, 0, 'confirm') == 0){
        return "Пользователь с таким логином ещё не подтвержден!";
    }

    $sess = md5(microtime());
    $sql_update = "UPDATE users SET sess='$sess' WHERE login='%s'";
    $sql_update = sprintf($sql_update, mysql_real_escape_string($login));
    if(!mysql_query($sql_update)){
        return "Ошибка авторизации пользователя.";
    }
    $_SESSION['sess'] = $sess;


    if($_POST['allow'] == 1){
        $time = time() + 10*24*3600; // куки на 10 дней
        setcookie('login', $login, $time);
        setcookie('password', $password, $time);
    }

    return true;
}

function checkUser(){
    if(isset($_SESSION['sess'])){
        $sess = $_SESSION['sess'];

        $sql = "SELECT user_id FROM users WHERE sess='$sess'";
        $result = mysql_query($sql);

        if(!$result || mysql_num_rows($result) < 1){
            return false;
        }
        return true;
    }
    elseif (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
        $login = $_COOKIE['login'];
        $password = $_COOKIE['password'];

        $sql = "SELECT user_id FROM users WHERE login='$login' AND password='$password' AND confirm='1'";
        $result2 = mysql_query($sql);

        if(!$result2 || mysql_num_rows($result2) < 1){
            return false;
        }

        $sess = md5(microtime());
        $sql_update = "UPDATE users SET sess='$sess' WHERE login='%s'";
        $sql_update = sprintf($sql_update, mysql_real_escape_string($login));
        if(!mysql_query($sql_update)){
        return "Ошибка авторизации пользователя.";
        }
        $_SESSION['sess'] = $sess;

        return true;
    }
    else return false;    
}

function logout(){
    unset($_SESSION['sess']);
    setcookie('login', '', time() - 3600);
    setcookie('password', '', time() - 3600);
    return true;
}

function getPassword($email){
    $email = clean_data($email);

    $sql = "SELECT user_id FROM users WHERE email='%s'";
    $sql = sprintf($sql, mysql_real_escape_string($email));
    $result = mysql_query($sql);

    if(!result){
        return "Не возможно сгенирировать новый пароль.";
    }

    if(mysql_num_rows($result) == 1){
        // строка для формирования пароля случайным образом
        $str = '234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';

        $pass = '';
        for ($i=0; $i < 6; $i++) { 
            $x = mt_rand(0, (strlen($str) - 1));

            // исключаем возможное совпадение 2-х символов, идущих друг за другом
            if($i != 0){ // исключаем 1-ю итерацию цикла, на ней мы просто добавим случайный символ - $pass .= $str[$x];
                if($pass[strlen($str)-1] == $str[$x]){ // проверим не равен ли следующий символ, выбранному ранее
                    $i--;
                    continue;
                }
            }
            $pass .= $str[$x];
        }
        // шифруем пароль
        $md5pass = md5($pass);

        $query = "UPDATE users SET password='$md5pass' WHERE user_id = '" . mysql_result($result, 0, 'user_id') . "'";
        $result2 = mysql_query($query);

        if(!$result2) return "Не возможно сгенирировать новый пароль.";

        // отправляем письмо
        $headers = '';
        $headers .= 'From Admin <admin@gmail.com>';
        $headers .= 'Content-Type: text/plain; charset=utf8';

        $subject = 'New Password';

        $mail_body = 'Ваш новый пароль: ' . $pass;

        mail($email, $subject, $mail_body, $headers);
        
        return true;
    }
    else return "Пользователя с таким почтовым ящиком нет";
}