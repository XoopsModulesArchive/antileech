<?php
/*
* Модуль: Антилич
* Автор: andrey3761
* Website: http://radio-hobby.org/
*
* При обращении к файлу записывается лог и отображается картинка антилича
*/

include_once '../../mainfile.php';
include_once 'include/functions.php';

// Получение ссылки на запрос картинки
//$requested = isset($_GET['url']) ? trim($_GET['url']) : '';

$img_cache_limit = 3600 ; // default 3600sec == 1hour
$time = time();
$referer		= xoops_getenv('HTTP_REFERER');
$useragent		= xoops_getenv('HTTP_USER_AGENT');
$ip				= xoops_getenv('REMOTE_ADDR');
$requested		= xoops_getenv('REQUEST_URI');
$img_fullpath = 'images/antileech.png' ;

// Запись в лог	
if ($xoopsModuleConfig['enablelog'] == 1){
	antileech_insert_log($time, $referer, $useragent, $ip, $requested);
}

session_cache_limiter('public');
header("Expires: ".date('r',intval(time()/$img_cache_limit)*$img_cache_limit+$img_cache_limit));
header("Cache-Control: public, max-age=$img_cache_limit");
header("Last-Modified: ".date('r',intval(time()/$img_cache_limit)*$img_cache_limit));
header("Content-type: image/png");

readfile($img_fullpath);

?>