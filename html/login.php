<?php include("../lib/start.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录页面</title>
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

	$con = mysqli_connect("localhost","root","","test");
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$username = mysqli_real_escape_string($con,$username);
	$sql = "SELECT * FROM user WHERE name = '$username'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	//print_r($row);
	if($row){
		if($row['pwd'] == $password){
			session_regenerate_id();
			$_SESSION['name'] = $username;
			header('location:http://www.test.com/html/index.php');
			exit;
		}
		else{
			$error = "密码不对！";
		}
	}
	else{
		$error = "用户名不对！";
	}
	mysqli_free_result($result);
	mysqli_close($con);
}
elseif( isset($_POST["submit"]) ) {
	$error = "请输入用户名和密码！";
}
?>
<div class="layout">
<form id="form1" name="form1" method="post" action="">
	<fieldset>
	<legend>Login</legend>
	<p><label><input type="text" value="" placeholder="请输入用户名" name="username" /></label></p>
	<p><label><input type="password" value="" placeholder="请输入密码" name="password" /></label></p>
	</fieldset>
	<p style="margin-top:10px;"><input name="submit" type="submit" value="提交" /><span style="margin-left:20px; color:#f00;"><?php echo $error; ?></span></p>
</form>
</div>
</body>
</html>