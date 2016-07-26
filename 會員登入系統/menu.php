<?php
	
	require_once("connMysql.php");
	//session_start();

	$query_RecMember = "SELECT * FROM `member` WHERE `Account` = '".$_SESSION["account"]."'";
	$RecMember = mysql_query($query_RecMember);
	$row_RecMember = mysql_fetch_assoc($RecMember);

?>

<div align="center">
	<p>會員名稱：
		<strong><?php echo $row_RecMember["Name"]?></strong>
	</p>

	<p align="center">
		<a href="member_center.php">會員中心</a><br>
		<a href="member_update_form.php">修改會員資料</a><br>
		<a href="member_change_password_form.php">修改會員密碼</a><br>
		<a href="member_delete.php">刪除會員帳號</a><br>
		<a href="logout.php">登出系統</a><br>
	</p>
</div>