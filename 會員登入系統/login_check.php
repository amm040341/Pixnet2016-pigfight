<?php

	//檢查是否經過登入
	if(!isset($_SESSION["account"]) || ($_SESSION["account"]==""))
	{
		header("Location: index.php");
	}

?>