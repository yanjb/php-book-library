<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP test</title>
</head>

<body>
<?php
$txt="Hello World";
print($txt);

$num="1234";
echo $txt . "-" . $num;

echo "<br>字符长度：".strlen($num); //定义字符长度
?>

<br /><br /><br />

<?php
$arr=array("one", "two", "three");

foreach ($arr as $value)
{
  echo "Value: " . $value . "<br />";
}
?>

<br /><br /><br />

<p>http://www.w3school.com.cn/welcome.php?name=Peter&amp;age=37</p>
Welcome <?php echo $_GET["name"]; ?>.<br />
You are <?php echo $_GET["age"]; ?> years old!

<br /><br /><br />

<?php
$tomorrow = mktime(0,0,0,date("m"),date("d")+1,date("Y"));
echo "明天是 ".date("Y/m/d", $tomorrow);
?>
</body>
</html>