    <div id="main">
        <?php
            extract($content);

            //pagenation
            $perpage = 5; //кол-во записей на стр.

            if (empty($_GET['page']) || $_GET['page'] <= 0) $page = 1;
            else $page = (int)$_GET['page']; // номер текущей стр.

            $count = $count_row; // общее кол-во записей в БД
            $pages_count = ceil($count / $perpage); // общее кол-во стр.

            if ($page > $pages_count) $page = $pages_count; // если запрашиваемая стр > больше общего кол-ва стр.

            $start_pos = ($page - 1) * $perpage; // начальная позиция для запроса

            function pagination($page, $pages_count){
                for ($i=1; $i <= $pages_count; $i++){
                    if ($i == $page) echo "<a class='nav_active'>$i</a>";
                    else echo "<a class='nav_link' href='?page=$i'>$i</a>";
                }
                return true;
            }
        ?>

       <?php foreach ($result as $row) : ?>
           <div style="margin: 10px; border-bottom: 2px solid #c2c2c2">
                <h2><?= $row['title']; ?></h2>
                <p><?= $row['date']; ?></p>
                <p><img style="margin-right: 5px" width="150px" align="left" src="<?= $row['img_src']; ?>" alt=""><?= $row['description']; ?></p>
                <p style="color: red"><a href="?option=view&id_text=<?= $row['id']; ?>">Читать далее ...</a></p>
            </div>
        <?php endforeach; ?>

        <?php pagination($page, $pages_count); ?>
    </div>
</div>
