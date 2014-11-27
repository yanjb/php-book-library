<?php
	$login = '';
	if(isset($_SESSION['name'])){
		$login = $_SESSION["name"] . ' | <a href="quit.php">退出</a>';
		//echo $_COOKIE[session_name()];
	}
	else {
		$login = '<a href="login.php">登录</a> | <a href="regist.php">注册</a>';
	}
?>
<style type="text/css">
.header { height:24px; margin:10px; padding:10px; background:#CC0;}
.header .nav { float:left;}
.login { float:right;}
</style>
<div class="header">
	<p class="nav"><a href="index.php">首页</a> | <a href="admin.php">已借阅</a> | <a href="admin.php">管理</a></p>
	<p class="login"><?php echo $login; ?></p>
</div>
