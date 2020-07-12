<?php
/*
* Модуль: Антилич
* Автор: andrey3761
* Website: http://radio-hobby.org/
*/

if (!defined('XOOPS_ROOT_PATH')) {
	die('XOOPS root path not defined');
}

$modversion['name'] = _MI_ANTILEECH_NAME;
$modversion['version'] = 1.1;
$modversion['description'] = _MI_ANTILEECH_DSC;
$modversion['credits'] = 'http://radio-hobby.org & http://xoops2.ru';
$modversion['author'] = 'andrey3761';
$modversion['help'] = '';
$modversion['license'] = 'GNU/GPL';
$modversion['official'] = 0;
$modversion['image'] = 'images/logo.png';
$modversion['dirname'] = 'antileech';

//SQL
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';

// Tables created by sql file (without prefix!)
$modversion['tables'][0] = 'antileech_log';

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

// Templates
$modversion['templates'][1]['file'] = 'antileech_file.html';
$modversion['templates'][1]['description'] = _MI_ANTILEECH_TEMPLATE1;

// Menu
$modversion['hasMain'] = 1;

// Search
$modversion['hasSearch'] = 0;

// Comments
$modversion['hasComments'] = 0;

// Settings
// Вести лог
$modversion['config'][1]['name']		= 'enablelog';
$modversion['config'][1]['title']		= '_MI_ANTILEECH_ENABLELOG';
$modversion['config'][1]['description']	= '_MI_ANTILEECH_ENABLELOGDSC';
$modversion['config'][1]['formtype']	= 'yesno';
$modversion['config'][1]['valuetype']	= 'int';
$modversion['config'][1]['default']		= 0;

// Число лога для показа
$modversion['config'][2]['name']		= 'numlog';
$modversion['config'][2]['title']		= '_MI_ANTILEECH_NUMLOG';
$modversion['config'][2]['description']	= '_MI_ANTILEECH_NUMLOGDSC';
$modversion['config'][2]['formtype']	= 'textbox';
$modversion['config'][2]['valuetype']	= 'int';
$modversion['config'][2]['default']		= '20';

// Заголовок
$modversion['config'][3]['name']		= 'filetitle';
$modversion['config'][3]['title']		= '_MI_ANTILEECH_FILETITLE';
$modversion['config'][3]['description']	= '_MI_ANTILEECH_FILETITLEDSC';
$modversion['config'][3]['formtype']	= 'textbox';
$modversion['config'][3]['valuetype']	= 'text';
$modversion['config'][3]['default']		= 'Title';

// Сообщение
$modversion['config'][4]['name']		= 'filemsg';
$modversion['config'][4]['title']		= '_MI_ANTILEECH_FILEMSG';
$modversion['config'][4]['description']	= '_MI_ANTILEECH_FILEMSGDSC';
$modversion['config'][4]['formtype']	= 'textarea';
$modversion['config'][4]['valuetype']	= 'text';
$modversion['config'][4]['default']		= '<p> You have come to us from a site <a href = "http://<{domain}>"> <{domain}> </a> and have tried to download a file <{requested}>. At download a file it is checked referer, i.e. it is possible to download files only from our site. Take advantage of search to find page of loading of a file, or click <a href = "<{requested}>"> here </a> that it to download. </p>';

// Notification
$modversion['hasNotification'] = 0;
?>