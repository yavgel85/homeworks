<div id="mainarea">
    <div class="heading">
        <div class="toplinks" style="padding-left:30px;"><a href="?option=main">Главная</a></div>
        <div class="sap2">::</div>

        <?php $i = 1; foreach ($menu_top as $item) : ?>
            <div class='toplinks'>
                <a href='?option=menu&id_menu=<?= $item['id_menu']; ?>'><?= $item['name_menu']; ?></a>
            </div>
            <?php if ($i != count($menu_top)) : ?>
                <div class='sap2'>::</div>
            <?php endif; $i++; ?>
        <?php endforeach; ?>
    </div>