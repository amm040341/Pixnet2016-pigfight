<html>
<head>


	<title>會員管理系統</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

	<script type="text/javascript">
		function checkForm(){

			if(document.form1.account.value=="")
			{
				alert("請填寫帳號!");
				document.form1.account.focus();
				return false;
			}else{
				uid=document.form1.account.value;
				if(uid.length>20){
					alert("帳號長度限定20個字以內!");
					document.form1.account.value="";
					document.form1.account.focus();
					return false;
				}
			}

			if(document.form1.password1.value=="" || document.form1.password2.value=="")
			{
				alert("密碼不可以為空白!");
				document.form1.password1.focus();

			}

			if(document.form1.password1.value!="" || document.form1.password2.value!="")
			{
				
				if(!check_password(document.form1.password1.value,document.form1.password2.value))
				{
					document.form1.password1.value="";
					document.form1.password2.value="";
					document.form1.password1.focus();
					return false;
				}
			}

			if(document.form1.name.value=="")
			{
				alert("請填寫姓名");
				document.form1.name.focus();
				return false;
			}

			return confirm('確定送出嗎?');
		}

		function check_password(pw1, pw2)
		{

			if(pw1=='')
			{
				alert("密碼不可以空白!");
				return false;
			}

			for(var idx=0; idx<pw1.length; idx++)
			{
				if(pw1.charAt(idx) =='' || pw1.charAt(idx) =='\"')
				{
					alert("密碼不可以含有空白或雙引號!\n");
					return false;
				}

				if(pw1.length<5 || pw1.length>20)
				{
					alert("密碼長度只能5~20個字母!\n");
					return false;
				}

				if(pw1!=pw2)
				{
					alert("密碼二次輸入不一樣, 請重新輸入! \n");
					return false;
				}
			}

			return true;
		}

	</script>
</head>

<body>
	<table width="800" border="0" align="center" cellpadding="4" cellspace="0">
		<tr valign="top">
		<td width="600">
			<form name="form1" method="post" action="member_join.php" onSubmit="return checkForm();">
				<p><font size="6" color="#FF0000">加入會員</font></p>

				<div>
					<hr size="1" />
					<p>
						<strong>使用帳號</strong>:
						<input type="text" name="account" value="">
						<font color="#FF0000">*</font>
					</p>
					<p>
						<strong>使用密碼</strong>:
						<input type="password" name="password1">
						<font color="#FF0000">*</font>
					</p>	
					<p>
						<strong>確認密碼</strong>:
						<input type="password" name="password2">
						<font color="#FF0000">*</font>
					</p>
					<p>
						<strong>真實姓名</strong>:
						<input type="text" name="name">
						<font color="#FF0000">*</font>
					</p>
					<p>
						<font color="#FF0000">*</font>表示為必填的欄位
					</p>
				</div>

				<hr size="1" />
				<p align="center">
					<input type="submit" name="join" value="加入會員">
					<input type="reset" name="reset" value="重設資料">
					<input type="button" name="back" value="回到登入畫面" onclick="location.href='index.php'">
				</p>
			</form>
		</td>	
		</tr>	
	</table>
</body>

</html>