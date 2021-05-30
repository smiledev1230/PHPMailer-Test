<?php

$default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'INFDB3',
		'login' => 'emailc',
		'password' => 'jAnup3ya!',
		'database' => 'emailconf',
		'prefix' => '',
		//'encoding' => 'utf8',
	);

$link = mysql_connect($default['host'], $default['login'], $default['password']) or die('Error while connecting to DB: '.mysql_error());

mysql_select_db($default['database'], $link) or die('Error while selecting DB: '.mysql_error());


echo 'No errors.';
?>