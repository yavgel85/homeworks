<div class="quick-bg">
    <div id="spacer" style="margin-bottom:15px;">
        <div id="rc-bg">Меню</div>
    </div>
    <?php extract($left_bar); ?>

    <?php foreach ($rows as $row) : ?>
        <div class='quick-links'>
            » <a href='?option=category&id_cat=<?= $row['id_category']; ?>'><?= $row['name_category']; ?></a>
        </div>
    <?php endforeach; ?>

    <?php $menu_tree; ?>
</div>
