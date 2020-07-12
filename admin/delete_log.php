<?php
/*
* Модуль: Редирект
* Автор: andrey3761
* Website: http://radio-hobby.org/
*/

include_once 'admin_header.php';

//Получаем параметры
$logids = $_POST['logids'];

//Составляем запрос
$sql = 'DELETE FROM '.$xoopsDB->prefix('antileech_log').' WHERE logid IN ('.implode(',', array_values($logids)).')';

if(!$xoopsDB->query($sql)) {
	redirect_header(XOOPS_URL.'/modules/antileech/admin/index.php', 2, _AM_ANTILEECH_RR_ERRORSAVE);
} else {
	redirect_header(XOOPS_URL.'/modules/antileech/admin/index.php', 2, _AM_ANTILEECH_RR_SUCCESSFUL);
}
?>