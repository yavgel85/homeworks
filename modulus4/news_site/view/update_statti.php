<div id="main">

    <?php
        if (@$_SESSION['res']) {
            echo "<p style='color: #00d95a'>" . $_SESSION['res'] . "</p>";
            unset($_SESSION['res']);
        }

        extract($content);

        print <<<HEREDOC
        <form action="" method="post" enctype="multipart/form-data">
            <p><b>Заголовок статьи:</b><br>
                <input type="text" name="title" style="width: 420px" value="$text[title]">
                <input type="hidden" name="id" style="width: 420px" value="$text[id]">
            </p>
            <p><b>Изображение:</b><br>
                <input type="file" name="img_src">
            </p>
            <p><b>Краткое описание:</b><br>
                <textarea name="description" cols="50" rows="7">$text[description]</textarea>
            </p>
            <p><b>Текст:</b><br>
                <textarea name="text" cols="50" rows="7">$text[text]</textarea>
            </p>
            <select name="cat">
HEREDOC;

            foreach ($cat as $item){
                if ($text['cat'] == $item['id_category'])
                    echo "<option selected value='" .$item['id_category']. "'>" .$item['name_category']. "</option>";
                else
                    echo "<option value='" .$item['id_category']. "'>" .$item['name_category']. "</option>";
            }
    ?>

            </select>
            <p><input type="submit" name="button" value="Сохранить"></p>
        </form>
    </div>
</div>
