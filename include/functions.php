<?php
/*
* Модуль: Антилич
* Автор: andrey3761
* Website: http://radio-hobby.org/
*/

// Получение домена из ссылки
function antileech_domain($url){

	$parts = parse_url($url);
	$host = $parts['host'];
	if (in_array("www", explode(".", $host))){
		$just_domain = explode("www.", $host);
		return $just_domain[1];
	} else {
		return $host;
	}
}

// Вставка лога
function antileech_insert_log($time=0, $referer='', $useragent='', $ip='', $requested='')
{
	global $xoopsDB;
	/*
	$referer		= xoops_getenv('HTTP_REFERER');
	$useragent		= xoops_getenv('HTTP_USER_AGENT');
	$ip				= xoops_getenv('REMOTE_ADDR');
	$requested		= xoops_getenv('REQUEST_URI');
	*/
	
	$sql = 'INSERT INTO '.$xoopsDB->prefix('antileech_log').'(time, referer, useragent, ip, requested) VALUES('.$xoopsDB->quoteString($time).', '.$xoopsDB->quoteString($referer).', '.$xoopsDB->quoteString($useragent).', '.$xoopsDB->quoteString($ip).', '.$xoopsDB->quoteString($requested).')';
	
	$result = $xoopsDB->queryF($sql);
	
	if(!$result)
		die("Error: ".mysql_error());
	else
		return $result;

}

// Число записей в логе
function antileech_count_log(){
	
	global $xoopsDB;
	$sql = 'SELECT * FROM `'.$xoopsDB->prefix('antileech_log').'`';
	$result = $xoopsDB->query($sql);
	$count = $xoopsDB->getRowsNum($result);
	return $count;
}

// Замена
/*
* <{referer}> - реферер
* <{domain}> - домен, с которого запросили файл
* <{useragent}> - юзерагент
* <{ip}> - IP
* <{requested}> - запрашиваемая ссылка
*/
function antileech_codedecoder($string){
	
	$string = preg_replace('/<{referer}>/i', xoops_getenv('HTTP_REFERER'), $string);
	$string = preg_replace('/<{domain}>/i', antileech_domain(xoops_getenv('HTTP_REFERER')), $string);
	$string = preg_replace('/<{useragent}>/i', xoops_getenv('HTTP_USER_AGENT'), $string);
	$string = preg_replace('/<{ip}>/i', xoops_getenv('REMOTE_ADDR'), $string);
	$string = preg_replace('/<{requested}>/i', xoops_getenv('REQUEST_URI'), $string);
	return $string;
}
  
?>