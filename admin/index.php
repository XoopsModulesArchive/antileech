<?php
/*
* Модуль: Антилич
* Автор: andrey3761
* Website: http://radio-hobby.org/
*/

include_once 'admin_header.php';

// Подключаем пагинатор
include_once XOOPS_ROOT_PATH.'/class/pagenav.php';

$start = isset($_GET['start']) ? intval($_GET['start']) : 0;

// Асоциируем пагинотор
$pagenav = new XoopsPageNav(antileech_count_log(), intval($xoopsModuleConfig['numlog']), $start, 'start');

// Вывод заголовка админки
antileech_adm_header(1);

//Выбираем логи
$result = $xoopsDB->query('SELECT logid, time, referer, useragent, ip, requested FROM '.$xoopsDB->prefix('antileech_log').' ORDER BY logid DESC', intval($xoopsModuleConfig['numlog']), $start);
if($xoopsDB->getRowsNum($result) == 0) {
	//Лога базе нет
	echo '<h1>'._AM_ANTILEECH_NOT_LOG.'</h1>';
} else {
	//Есть логи - выводим
	$oddeven = 'even';
	echo '
<form name="antileech_log" action="delete_log.php" method="post">
<table cellpadding="0" cellspacing="1" class="outer">
 <tr>
  <th>'._AM_ANTILEECH_LOGID.'</th>
  <th>'._AM_ANTILEECH_DATE.'</th>
  <th>'._AM_ANTILEECH_DOMAIN.'</th>
  <th>'._AM_ANTILEECH_REFERER.'</th>
  <th>'._AM_ANTILEECH_USERAGENT.'</th>
  <th>'._AM_ANTILEECH_IP.'</th>
  <th>'._AM_ANTILEECH_REQUESTED.'</th>
  <th><input type="checkbox" onclick="xoopsCheckAll(antileech_log, this)" /></th>
 </tr>';
	while($row = $xoopsDB->fetchArray($result)) {
		$oddeven = ($oddeven == 'even') ? 'odd' : 'even';
		echo '
 <tr class="'.$oddeven.'">
  <td align="center">'.$row['logid'].'</td>
  <td>'.date("Y/m/d H:i:s", $row['time']).'</td>
  <td><a href="http://'.antileech_domain($row['referer']).'/">'.antileech_domain($row['referer']).'</a></td>
  <td><a href="'.$row['referer'].'">'.$row['referer'].'</a></td>
  <td>'.$row['useragent'].'</td>
  <td><a href="http://whois.domaintools.com/'.$row['ip'].'">'.$row['ip'].'</a></td>
  <td><a href="'.$row['requested'].'">'.$row['requested'].'</a></td>
  <td><input type="checkbox" name="logids[]" value="'.$row['logid'].'" /></td>
 </tr>';
	}
	echo '
 <tr class="foot">
  <td colspan="8"><input type="submit" value="'._AM_ANTILEECH_DELETE.'" /></td>
 </tr>
</table>
</form>';

// Выводим пагинатор
echo '<div align="right">'.$pagenav->renderNav().'</div>';
}

// Вывод подвала админки
antileech_adm_footer();
?>