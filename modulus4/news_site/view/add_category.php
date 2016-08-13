    <div id="main">
        <?php if (@$_SESSION['res']) {
            echo "<p style='color: #00d95a'>" . $_SESSION['res'] . "</p>";
            unset($_SESSION['res']);
        } ?>

        <form action="" method="post">
            <p><b>Название категории:</b><br>
                <input type="text" name="title" style="width: 420px">
            </p>
            <p><b>Родительская категория:</b><br>
                <input type="number" name="parent_id" style="width: 420px">
            </p>
            <p><input type="submit" name="button" value="Сохранить"></p>
        </form>
    </div>
</div>
