<?php
/*
* Модуль: Антилич
* Автор: andrey3761
* Website: http://radio-hobby.org/
*/

include_once '../../../include/cp_header.php';
include_once '../include/functions.php';

function antileech_adm_header($page_id = 1) {

	global $xoopsModule;
	$page = array_fill(1, 3, '');
	$page[$page_id] = ' class="current"';
	
	xoops_cp_header();
	
	echo '
<style type="text/css">
	@import url('.XOOPS_URL.'/modules/antileech/admin/admin.css);
</style>
	
<div id="adm-header">
 <ul id="toplist">
  <li><a href="../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod='.$xoopsModule->getVar('mid').'">' . _AM_ANTILEECH_GENERALSET . '</a></li>
 </ul>
 <ul id="buttonlist">
  <li'.$page[1].'><a href="'.XOOPS_URL.'/modules/antileech/admin/index.php"><span>'._AM_ANTILEECH_INDEX.'</span></a></li>
  <li'.$page[2].'><a href="'.XOOPS_URL.'/modules/antileech/admin/images.php"><span>'._AM_ANTILEECH_IMAGES.'</span></a></li>
 </ul>
</div>
<div style="clear:both;"></div>
<br />';

}

function antileech_adm_footer() {
	
	xoops_cp_footer();

}



?>