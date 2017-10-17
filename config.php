<?php
// Задаем константы:
define ('DS', DIRECTORY_SEPARATOR); // разделитель для путей к файлам
$sitePath = realpath(dirname(__FILE__) . DS);
define ('SITE_PATH', $sitePath); // путь к корневой папке сайта

// для подключения к бд
define('DB_USER', 'test0708');
define('DB_PASS', '1111111Ww');
define('DB_HOST', 'mysql.zzz.com.ua');
define('DB_NAME', 'test0708');