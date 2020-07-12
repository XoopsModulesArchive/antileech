<?php
/*
* Модуль: Антилич
* Автор: andrey3761
* Website: http://radio-hobby.org/
*/

include_once '../../mainfile.php';
include_once XOOPS_ROOT_PATH.'/modules/antileech/include/functions.php';

$xoopsOption['template_main'] = 'antileech_file.html';
include_once XOOPS_ROOT_PATH.'/header.php';

$time = time();
$referer		= xoops_getenv('HTTP_REFERER');
$useragent		= xoops_getenv('HTTP_USER_AGENT');
$ip				= xoops_getenv('REMOTE_ADDR');
$requested		= xoops_getenv('REQUEST_URI');

// Запись в лог	
if ($xoopsModuleConfig['enablelog'] == 1){
	antileech_insert_log($time, $referer, $useragent, $ip, $requested);
}

//Ассоциируем
$xoopsTpl->assign('antileech_title', $xoopsModuleConfig['filetitle']);
$xoopsTpl->assign('antileech_message', antileech_codedecoder($xoopsModuleConfig['filemsg']));
$xoopsTpl->assign('xoops_pagetitle', $xoopsModuleConfig['filetitle']);



include_once XOOPS_ROOT_PATH.'/footer.php';

?>