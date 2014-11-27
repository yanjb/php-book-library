<?php
	include("../lib/start.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>退出登录页面</title>
<link href="../css/base.css" rel="stylesheet" type="text/css" />
<script src="/js/jquery-1.9.1.js" type="text/javascript"></script>
</head>

<body>
<?php
	include("../lib/header.php");
?>

<?php
	if(isset($_SESSION['name'])){
		$_SESSION = array();
		if( isset($_COOKIE[session_name()]) ) {
			setcookie(session_name(), '', time()-86400, '/');
		}
		session_destroy();
	}
	header('location:http://www.test.com/html/index.php');
	exit;
?>
</body>
</html>