<?php
	include("../lib/start.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
<link href="../css/base.css" rel="stylesheet" type="text/css" />
<script src="/js/jquery-1.9.1.js" type="text/javascript"></script>
<style type="text/css">
table td, table th { border:1px solid #ccc; padding:5px;}
table th { background:#999;}
</style>
</head>

<body>
<?php
	include("../lib/header.php");
?>
<?php
    //phpinfo();

	$con = mysqli_connect("localhost","root","","test");
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql = "SELECT * FROM book_v";

	$result = mysqli_query($con,$sql);

	$gather = array(); //结果集收集器
	
	while($row = mysqli_fetch_assoc($result)) {
		array_push($gather,$row); //插入数组
	}
	
	//print_r($gather);

	mysqli_free_result($result);
	
	mysqli_close($con);
?>
<div class="layout" data-id="">
	<table>
		<tr>
			<th width="5%">ID</th>
			<th width="20%">书名</th>
			<th width="13%">ISDN号</th>
			<th width="7%">价格</th>
			<th width="7%">分类</th>
			<th width="30%">作者</th>
			<th width="13%">出版社</th>
			<th width="5%" align="center">借阅人</th>
		</tr>
		<?php
			foreach($gather as $arr){
				//print_r($arr);
				$uname = $arr['uname'];
				echo "<tr>";
				echo "<td>" . $arr['bid'] . "</td>";
				echo "<td>" . $arr['title'] . "</td>";
				echo "<td>" . $arr['isbn'] . "</td>";
				echo "<td>" . $arr['price'] . "</td>";
				echo "<td>" . $arr['sort'] . "</td>";
				echo "<td>" . $arr['author'] . "</td>";
				echo "<td>" . $arr['press'] . "</td>";
				if( isset($username) && empty($uname) ){
					echo '<td align="center"><a href="javascript:void(0)" class="borrow" data-id="' . $arr['bid'] . '">借阅</a></td>';
				}
				elseif( isset($username) && $uname == $username) {
					echo '<td align="center"><a href="javascript:void(0)" class="revert" style="color:#f00;" data-id="' . $arr['bid'] . '">归还</a></td>';
				}
				else {
					echo '<td align="center">' . $arr['uname'] . "</td>";
				}
				echo "</tr>";
			}
		?>
	</table>
</div>
<script>
$(function(){
	$(".borrow").click(function(){
		var bid = $(this).attr("data-id");
		$.get("api.php",{"type":"borrow","bid":bid},function(data){
			alert(data);
			window.location.reload();
		});
	});
	$(".revert").click(function(){
		var bid = $(this).attr("data-id");
		$.get("api.php",{"type":"revert","bid":bid},function(data){
			alert(data);
			window.location.reload();
		});
	});
});
</script>
</body>
</html>