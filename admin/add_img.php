<?php
/*
* Модуль: Антилич
* Автор: andrey3761
* Website: http://radio-hobby.org/
*/

include_once 'admin_header.php';

// Проверка типа файла
if($_FILES['antileechimg']['type'] != 'image/png'){
	redirect_header(XOOPS_URL.'/modules/antileech/admin/images.php', 2, _AM_ANTILEECH_RR_ERRORTYPE);
	exit();
}

// Если есть картинка, то удалить
if(file_exists(XOOPS_ROOT_PATH.'/modules/antileech/images/antileech.png')) unlink(XOOPS_ROOT_PATH.'/modules/antileech/images/antileech.png');

// Запись файла
if(move_uploaded_file($_FILES['antileechimg']['tmp_name'], XOOPS_ROOT_PATH.'/modules/antileech/images/antileech.png')){
	redirect_header(XOOPS_URL.'/modules/antileech/admin/images.php', 2, _AM_ANTILEECH_RR_IMGLOADSUC);
} else redirect_header(XOOPS_URL.'/modules/antileech/admin/images.php', 2, _AM_ANTILEECH_RR_IMGLOADERR);

?>