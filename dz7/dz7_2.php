<?php
/*
 * Следующие задания требуется воспринимать как ТЗ (Техническое задание)
 * p.s. Разработчик, помни! 
 * Лучше уточнить ТЗ перед выполнением у заказчика, если ты что-то не понял, чем сделать, переделать, потерять время, деньги, нервы, репутацию.
 * Не забывай о навыках коммуникации :)
 * 
 * 2) dz7_2.php Сохранять объявления в файлах
 */

define('SCRIPT_NAME', $_SERVER['SCRIPT_NAME']);
define('FILE_NAME', 'ads.txt');

require_once './functions_files.php';

if (isset($_GET['delete'])) {
    delete_ads();
}

if (!empty($_POST)) {

    if (isset($_POST['new'])) {
        header('Location: ' . SCRIPT_NAME);
    } else {

        $valid = validation($_POST);
        $valid_err = $valid['err'];
        $valid_post = $valid['valid'];

        if (!empty($valid_err)) {
            show_ads($valid_post, $valid_err);
        } else {
            add_ad($valid_post);
        }
    }
} else {
    if (isset($_GET['id'])) {
        show_ads($_GET['id']);
    } else {
        show_ads();
    }
}

// Список объявлений
echo '<h2><center>Объявления</center></h2><br>';
print_ads();