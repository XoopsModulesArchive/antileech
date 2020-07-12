<?php
/*
* Модуль: Антилич
* Автор: andrey3761
* Website: http://radio-hobby.org/
*/

include_once 'admin_header.php';

// Подключаем формы
include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
$myts = MyTextSanitizer :: getInstance();

// Вывод заголовка админки
antileech_adm_header(2);

// Антилич картинка
echo '<img src="'.XOOPS_URL.'/modules/antileech/images/antileech.png" />';

// Форма отправки файла
$antileech_img = new XoopsFormFile(_AM_ANTILEECH_FORM_IMGUPL, 'antileechimg', 1000000);
$antileech_img -> setDescription(_AM_ANTILEECH_FORM_IMGUPLDSC);

$form = new XoopsThemeForm(_AM_ANTILEECH_FORM_IMAGES, 'add_img', 'add_img.php');
$form->setExtra('enctype="multipart/form-data"');
$form->addElement($antileech_img);
$form->addElement(new XoopsFormButton('', 'submit', _GO, 'submit'));
$form->display();

// Вывод подвала админки
antileech_adm_footer();
?>