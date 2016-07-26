<?php

	session_start();
	//執行登出動作，將SESSION資料清除乾淨，並重新導回首頁。
	unset($_SESSION["account"]);
	header("Location: index.php");

?>