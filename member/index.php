<html>
<head>
	
	<title>Pig_Fight_Member 首頁</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

</head>
<body>
	
	<form name="form1" method="post" action="login.php">
		<table width="250" border="1" align="center">
			<tr align="top">
			<td align="center">
				<p>會員管理系統</p>
				<p>帳號：<br>
					<input name="account" type="text" >
				</p>

				<p>密碼：<br>
					<input name="password" type="password" > 
				</p>

				<p>
					<input name="rememberme" Type="checkbox" value="true" checked>記住我的帳號密碼。
				</p>

				<p align="center">
					<input type="submit" name="login" value="登入">
				</p>

				<p>
					<a href="member_join_form.php">馬上申請會員!</a>
				</p>
			</td>
			</tr>
		</table>
	</form>
</body>
</html>


<!-- value="<?php echo $_COOKIE["account"];?>" -->
<!-- value="<?php echo $COOKIE["password"];?>"" -->