<script type="text/javascript">
	var rep = 0;
</script>

<?php

	header("Content-Type: text/html; charset=utf-8");
	require_once("connMysql.php");

	//確認帳號是否已註冊
	$sql = "SELECT `Account` FROM `member` WHERE `Account` = '".$_POST["account"]."'";
	$record = mysql_query($sql);

	if(mysql_num_rows($record)>0)
	{
		echo "<script type='text/javascript'>rep=1;</script>";
	}else{
		//若未註冊，則執行新增的動作
		$sql = "INSERT INTO `member` (`Name`,`Account`, `Password`) VALUES (";
		$sql .="'".$_POST["name"]."',";
		$sql .="'".$_POST["account"]."',";
		$sql .="'".$_POST["password1"]."')";
		mysql_query($sql);
	}

?>

<script type="text/javascript">

	if(rep == 0)
	{
		alert('會員新增成功\n請用申請的帳號密碼登入。');
		window.location.href='index.php';
	}
	else{
		alert("此帳號已註冊!");
		window.location.href='member_join_form.php';
	}

</script>