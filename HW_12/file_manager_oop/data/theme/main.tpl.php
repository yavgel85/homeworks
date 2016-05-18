<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Manager</title>
    <link href="<?= THEME; ?>css/style.css" rel="stylesheet">
</head>
<body>
<div id="header">
    <h1>ФАЙЛОВЫЙ МЕНЕДЖЕР</h1>
    <span id="header_text">Обзор содержимого папок и файлов</span>
</div>
<div id="zip_wrap">
    <div id="dirs_files">
        <h2>Содержимое каталога</h2>
        <table id="my_table">
            <thead>
                <td>Название</td>
                <td>Размер, байт</td>
            </thead>
            <tr>
                <td><a href="?do=main&path=<?= $res_arr['old_path']; ?>">Назад</a></td>
                <td></td>
            </tr>

            <!--Выводим папки-->
            <?php if (@$res_arr['dirs']) : ?>
                <?php foreach ($res_arr['dirs'] as $dirs) : ?>
                    <tr>
                        <?php foreach ($dirs as $my_dir => $val_dir) : ?>
                            <td>
                                <img src="<?= THEME; ?>images/dir2.png" align="left">
                                <a href="?do=main&path=<?= $val_dir; ?>"><?= $my_dir; ?></a>
                            </td>
                            <td> - </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            <!--Выводим файлы-->
            <?php if ($res_arr['files']) : ?>
                <?php foreach ($res_arr['files'] as $files) : ?>
                    <tr>
                        <?php foreach ($files as $my_file => $val_file) : ?>
                            <td>
                                <?php if(isset($val_file['type'])) : ?>
                                    <?php if($val_file['type'] == 'text') : ?>
                                        <!-- показываем содержимое файла -->
                                        <a href="?do=view&path=<?= $res_arr['path'].$my_file; ?>"><img src="<?= THEME; ?>images/file.png" align="left"><?= $my_file; ?></a>
                                    <?php elseif($val_file['type'] == 'img') : ?>
                                        <!-- показываем предпросмотр файла -->
                                        <a href="<?= $res_arr['path'].$my_file; ?>"><img style="width: 65px;" src="<?= $res_arr['path'].$my_file; ?>" align="middle"></a><?= $my_file; ?>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <img src="<?= THEME; ?>images/file.png" align="left"><?= $my_file; ?>
                                <?php endif; ?>
                            </td>
                            <td><?= $val_file['size']; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            <tbody>
            </tbody>
        </table>
    </div>
    <div id="zip_wrap_end">&nbsp;</div>
</div>
<div id="footer"></div>
</body>
</html>
