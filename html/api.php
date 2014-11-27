<?php
	include("../lib/start.php");
	issession();
?>
<?php
	if( isset($_GET['type']) && $_GET['type'] == "borrow" && isset($_GET['bid']) ){
		
		$bid = $_GET['bid'];
		
		$con = mysqli_connect("localhost","root","","test");
		if (mysqli_connect_errno($con))
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	
		$sql = "Update book_v SET uname = '$username' WHERE bid = $bid AND uname=''";
		
		$result = mysqli_query($con,$sql);
		
		$row = mysqli_affected_rows($con);
		
		if (!$row) {
			echo "借阅程序错误...";
		}
		else {
			echo $username . " 借阅成功！" ;
		}
		
		//mysqli_free_result($result);
	
		mysqli_close($con);
	}
	elseif( isset($_GET['type']) && $_GET['type'] == "revert" && isset($_GET['bid']) ){
		
		$bid = $_GET['bid'];
		
		$con = mysqli_connect("localhost","root","","test");
		if (mysqli_connect_errno($con))
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	
		$sql = "Update book_v SET uname = '' WHERE bid = $bid AND uname='$username'";
		
		$result = mysqli_query($con,$sql);
		
		$row = mysqli_affected_rows($con);
		
		if (!$row) {
			echo "归还程序错误...";
		}
		else {
			echo $username . " 归还成功！" ;
		}
		
		//mysqli_free_result($result);
	
		mysqli_close($con);
	}
?>