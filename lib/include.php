<ul style="background:#eee;">
	<li><a href="index.php">index</a></li>
	<li><a href="login.php">login</a></li>
	<li><a href="regist.php">register</a></li>
	<li><a href="quit.php">quit</a></li>
</ul>
<?php
	if(isset($_SESSION['name'])){
		echo 'session["name"]=' . $_SESSION["name"] . '<br>';
		echo $_COOKIE[session_name()] . '<br>';
	}
	else {
		echo "你还未登录！";
	}
	echo "<hr>";
?>