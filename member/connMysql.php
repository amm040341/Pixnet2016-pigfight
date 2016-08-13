<?php
	
	//此頁不顯示
	//header("Content-Type: text/html; charset=utf-8");

	//資料庫主機設定
	$db_host = "192.168.100.66";
	$db_table = "pig";
	$db_username = "pigfight2016";
	$db_password = "2016fightpig";
	
	//設定資料連線
	if(!mysql_connect($db_host, $db_username, $db_password)){
		die("Select FAIL!!QAO...");
	}

	//連結資料庫
	if(!mysql_select_db($db_table)){
		die("Select FAIL!!QAO");
	}

	//設定字元即與連線校對
	mysql_query("SET NAMES 'utf8'");



?>