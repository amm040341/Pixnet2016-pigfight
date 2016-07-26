<?php
	
	//此頁不顯示

	header("Content-Type: text/html; charset=utf-8");
	require_once("connMysql.php");
	session_start();
	//header("Location: test.php");
	//檢查是否經過登入，若有登入則重新導向
	if(isset($SESSION["account"])&&($_SESSION["account"]!=""))
	{
		header("Location: member_center.php");
	}

	//執行會員登入
	if(isset($_POST["account"])&&isset($_POST["password"]))
	{
		//查詢登入會員資料
		$sql = "SELECT * FROM `member` WHERE `Account`='".$_POST["account"]."'";
		$RecLogin = mysql_query($sql); //執行$sql指令		
		$row_RecLogin = mysql_fetch_assoc($RecLogin); //執行$RecLogin後，取得一筆(列)資料，assoc指可按欄位名稱查詢
		$account = $row_RecLogin["Account"]; //查詢account欄位名稱
		$password = $row_RecLogin["Password"];
		
		//比對密碼後，若登入成功則呈現登入狀態。
		if($_POST["password"]==$password)
		{
			//設定登入者的名稱及等級
			$_SESSION["account"]=$account;
			
			//使用COKKIE紀錄登入資料
			if(isset($_POST["rememberme"])&&($_POST["rememberme"]=="true"))
			{
				setcookie("account",$_POST["account"],time()+365*24*60*60);
				setcookie("password",$_POST["password"],time()+365*24*60*60);
			}
			else{
				if(isset($_COOKIE["account"]))
				{
					setcookie("account",$_POST["account"],time()-100);
					setcookie("password",$_POST["password"],time()-100);
				}
			}

			header("Location: member_center.php");
		}
		else{
			header("Location: index.php?errCode=1");
		}



	}

?>