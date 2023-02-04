<?php
require_once('islogin.php');
require_once("config.php");
require_once('function.php');
if(isLogin())
{
	$num = $_POST['num'];
	$checksql=" SELECT * FROM emlog_love WHERE num = '$num'";
	$result=mysqli_query($conn,$checksql);
	$row = mysqli_fetch_object($result);
	if($username==$row->username)
	{
$sql = "INSERT INTO emlog_love_del(uid,`to`,content,`from`,ip,time,username,num,addr) SELECT * FROM emlog_love WHERE num = '$num'";
$sql2 = "UPDATE `emlog_love_del` SET `deladmin` = '$username',`deltime`='".date("h:i:sa")."',`delip`='$ip',`deladdr`='".addr($_SERVER['HTTP_ALI_CDN_REAL_IP'])."' WHERE num = '$num'";
$sql3 ="DELETE FROM emlog_love WHERE num = '$num'";
if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sql2)&&mysqli_query($conn,$sql3))
{
	echo 200;
}else
{
echo "sql1:".$sql."<br>";
echo "sql2:".$sql2."<br>";
echo "sql3:".$sql3."<br>";	
}
}
else
{
	echo "你也是牛批了,这都能提交删除,可惜了你不是该表白的主人~";	
}
}else
{
echo "你还没登录就想删除呢?想屁事呢?";	
	
}
?>