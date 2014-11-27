<?php include("../lib/start.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册页面</title>
<link href="../css/base.css" rel="stylesheet" type="text/css" />
<script src="/js/jquery-1.9.1.js" type="text/javascript"></script>
</head>

<body>
<?php include("../lib/header.php"); ?>

<?php
$error = '';

if( isset($_POST["submit"]) && !empty($_POST['username']) && !empty($_POST['password']) ){
	//print_r($_POST);

	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	$password2 = trim($_POST["password2"]);

	$con = mysqli_connect("localhost","root","","test");
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$username = mysqli_real_escape_string($con,$username);
	$password = mysqli_real_escape_string($con,$password);
	$password2 = mysqli_real_escape_string($con,$password2);
	
	$sql = "SELECT * FROM user WHERE name = '$username'";
	$result = mysqli_query($con,$sql);
	$isname = mysqli_num_rows($result);
	if($isname){
		$error = "用户名重复！";
	}
	else {
		$sql = "INSERT INTO user(name,pwd) VALUES('$username','$password')";
		if (!mysqli_query($con,$sql))
		{
			die('Error: ' . mysqli_error($con));
		}
		echo "你的注册用户名：" . $username;
	}
	mysqli_free_result($result);
	mysqli_close($con);
}
elseif ( isset($_POST["submit"]) ){
	$error = "请输入用户名和密码！";
}
?>
<div class="layout">
<form id="form1" name="form1" method="post" action="">
	<fieldset>
	<legend>Register User</legend>
	<p><label><input type="text" value="" placeholder="请输入用户名" name="username" /></label></p>
	<p><label><input type="password" value="" placeholder="请输入密码" name="password" /></label></p>
	<p><label><input type="password" value="" placeholder="请重新输入密码" name="password2" /></label></p>
	</fieldset>
	<p style="margin-top:10px;"><input name="submit" type="submit" value="提交" /><span style="margin-left:20px; color:#f00;"><?php echo $error; ?></span></p>
</form>
</div>
</body>
</html>