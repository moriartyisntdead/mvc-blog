<?php

// Загрузка классов "на лету"
function __autoload($className) {
    $filename = strtolower($className) . '.php';
    // определяем класс и находим для него путь
    $expArr = explode('_', $className);
    if(empty($expArr[1]) OR $expArr[1] == 'Base'){
        $folder = 'classes';
    }else{

        switch(strtolower($expArr[0])){
            case 'controller':
                $folder = 'controllers';
                break;

            case 'model':
                $folder = 'models';
                break;

            default:
                $folder = 'classes';
                break;
        }
    }


    // путь до класса
    if ($filename == 'smarty.php' || $filename == 'smarty_internal_data.php' ) {

        $file = SITE_PATH  . DS . 'libs' . DS .'Smarty.class.php';
        require_once SITE_PATH  . DS . 'libs' . DS .'Smarty.class.php';
    }
    else {
        $file = SITE_PATH  . DS . $folder . DS . $filename;

        // проверяем наличие файла
        if (file_exists($file) == false) {
            return false;
        }
        // подключаем файл с классом

        else include ($file);
    }

}

/**
 * Debug
 * @param $data
 * @param bool $exit
 */
function debug($data, $exit=false){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    
    if ($exit) exit;
}

/**
 * Send json response
 * @param string $status
 * @param array|null $data
 * @return void
 */
 function jsonResponse($status, $data = null){
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: ' . date('D, d M Y H: i: s \G\M\T'));
    header('Content-type:application/json;charset=utf-8');

    echo json_encode(['status' => $status, 'data' => $data]);
    exit();
}

/**
 * Send success response
 * @param mixed|null $data
 */
function jsonSuccess($data = null){
    jsonResponse('success', $data);
}

/**
 * Send error response
 * @param mixed|null $data
 */
function jsonError($data = null){
    jsonResponse('error', $data);
}

//include (SITE_PATH.'/classes/Registry.php');
// запускаем реестр (хранилище)
$registry = new Registry;