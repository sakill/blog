<?php
/**
 * User: SAKILL
 * Url：http://www.sakill.com
 * QQ : 1017615760;
 * Date: 2017/8/9
 */
session_start();
ob_start();
error_reporting(E_ALL& ~E_STRICT);
define('CORE_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR);
define('SITE_PATH',dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR);
require CORE_PATH.'configs/profile.inc.php';
//自动加载类k
function __autoload($_className) {
    //echo $_className.'</br>';
    $a = explode('\\', $_className);
    if (substr($_className, -6) == 'Action') {
        $flag = in_array($a[0], array('home', 'admin')) ? true : false;
        if ($flag) {
            require APP_PATH . $a[0] . '/controller/' . $a[1] . '.class.php';
        } else {
            require CORE_PATH . '/controller/' . $a[1] . '.class.php';
        }

    } elseif (substr($_className, -5) == 'Model') {
        $flag = in_array($a[0], array('home', 'admin')) ? true : false;
        if ($flag) {
            require APP_PATH . $a[0] . '/model/' . $a[1] . '.class.php';
        } else {
            require CORE_PATH . '/model/' . $a[1] . '.class.php';
        }
    }  elseif (substr($_className, -5) == 'Check') {
        require CORE_PATH . '/check/' . $a[1] . '.class.php';
    }elseif(file_exists(CORE_PATH . '/includes/' . $a[1] . '.class.php')){
        require CORE_PATH . '/includes/' . $a[1] . '.class.php';
    }
}
core\Factory::setAction()->run();