CREATE TABLE `antileech_log` (
  `logid` int(11) unsigned NOT NULL auto_increment,
  `time` int(10) unsigned NOT NULL,
  `referer` varchar(255) default NULL,
  `useragent` varchar(255) default NULL,
  `ip` varchar(15) NOT NULL default '0.0.0.0',
  `requested` varchar(255) default NULL,
  PRIMARY KEY  (`logid`)
) TYPE=MyISAM;