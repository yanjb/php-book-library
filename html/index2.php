<?php
	include("../lib/start.php");
	issession();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
<link href="../css/base.css" rel="stylesheet" type="text/css" />
<script src="/js/jquery-1.9.1.js" type="text/javascript"></script>
<style type="text/css">
body { padding:20px;}
table td { border:1px solid #ccc; padding:5px;}
</style>
</head>

<body>
<?php
	include("../lib/include.php");
?>
<?php
    //phpinfo();

    // Create connection
	$con = mysqli_connect("localhost","root","","test");

	// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql = "SELECT * FROM book_v";

	$result = mysqli_query($con,$sql);

	echo "<table width='100%'>";
	echo "<th><td></td></th>"
	
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<tr>";
		//echo $row['bid'] . " " . $row['title'];
		foreach($row as $key=>$val){
			echo "<td>";
			echo $key . " : " . $val . "<br>";
			echo "</td>";
		}
		echo "</tr>";
		
	}

	echo "</table>";

	mysqli_free_result($result);
	
	mysqli_close($con);
?>
</body>
</html>