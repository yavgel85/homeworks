    <div id="main">
        <?php if (@$_SESSION['res']) {
            echo "<p style='color: #00d95a'>" . $_SESSION['res'] . "</p>";
            unset($_SESSION['res']);
        } ?>

        <form action="" method="post" enctype="multipart/form-data">
            <p><b>Заголовок статьи:</b><br>
                <input type="text" name="title" style="width: 420px">
            </p>
            <p><b>Изображение:</b><br>
                <input type="file" name="img_src">
            </p>
            <p><b>Краткое описание:</b><br>
                <textarea name="description" cols="50" rows="7"></textarea>
            </p>
            <p><b>Текст:</b><br>
                <textarea name="text" cols="50" rows="7"></textarea>
            </p>
            <select name="cat">
                <?php foreach ($content as $item) {
                    echo "<option value='" .$item['id_category']. "'>" .$item['name_category']. "</option>";
                } ?>
            </select>
            <p><input type="submit" name="button" value="Сохранить"></p>
        </form>
    </div>
</div>
