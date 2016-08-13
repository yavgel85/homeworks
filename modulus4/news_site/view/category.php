<div id="main">
    <?php if(!empty($content)) :?>
        <?php foreach ($content as $row) : ?>
            <div style="margin: 10px; border-bottom: 2px solid #c2c2c2">
                <h2><?= $row['title']; ?></h2>
                <p><?= $row['date']; ?></p>
                <p><img style="margin-right: 5px" width="150px" align="left" src="<?= $row['img_src']; ?>" alt=""><?= $row['description']; ?></p>
                <p style="color: red"><a href="?option=view&id_text=<?= $row['id']; ?>">Читать далее ...</a></p>
            </div>
        <?php endforeach; ?>
    <?php else: echo '<h3>В данной категории нет статей</h3>'; ?>
    <?php endif; ?>
</div>
</div>