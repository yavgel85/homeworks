    <div id='main'>
        <a style='color: #0E5F84;' href='?option=add_category'>Добавить новую категорию</a><hr>

        <?php if (@$_SESSION['res']) {
            echo "<p style='color: #00d95a'>" . $_SESSION['res'] . "</p>";
            unset($_SESSION['res']);
        } ?>

        <?php foreach ($content as $row) : ?>
            <h3>
                <a style="color:#585858" href="?option=update_category&id_text=<?= $row['id_category']; ?>"><?= $row['name_category']; ?></a> |
                <a style="color:tomato" href="?option=delete_category&del=<?= $row['id_category']; ?>">Удалить</a>
            </h3>
        <?php endforeach; ?>
    </div>
</div>