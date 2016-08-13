<div id="main">
    <?php
    if (@$_SESSION['res']) {
        echo "<p style='color: #00d95a'>" . $_SESSION['res'] . "</p>";
        unset($_SESSION['res']);
    }

    print <<<HEREDOC
    <form action="" method="post">
        <p><b>Заголовок меню:</b><br>
            <input type="text" name="title" style="width: 420px" value="$content[name_menu]">
            <input type="hidden" name="id" style="width: 420px" value="$content[id_menu]">
        </p>
        <p><b>Текст:</b><br>
            <textarea name="text" cols="50" rows="7">$content[text_menu]</textarea>
        </p>
        <p><input type="submit" name="button" value="Сохранить"></p>
    </form>
</div>
</div>
HEREDOC;

?>
