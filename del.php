<?php
require_once('islogin.php');
require_once("config.php");
require_once('function.php');
if(isLogin())
{
	if($userData['lover']=="1")
	{
$num = $_POST['num'];
$fuck = $_POST['fuck'];
$sql = "INSERT INTO emlog_love_del(uid,`to`,content,`from`,ip,time,username,num,addr) SELECT * FROM emlog_love WHERE num = '$num'";
$sql2 = "UPDATE `emlog_love_del` SET `deladmin` = '$username',`deltime`='".date("h:i:sa")."',`delip`='$ip',`deladdr`='".addr($_SERVER['HTTP_ALI_CDN_REAL_IP'])."' WHERE num = '$num'";
$sql3 ="DELETE FROM emlog_love WHERE num = '$num'";
if($fuck=='1')
{
$sql4 ="SELECT * FROM emlog_love WHERE num = '$num'";
$commd=mysqli_query($conn,$sql4);
$result = mysqli_fetch_assoc($commd);
$sql5 = "update emlog_user set no=no+'1' where username = '".$result['username']."'";
mysqli_query($conn,$sql5);
}
if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sql2)&&mysqli_query($conn,$sql3))
{
	echo 200;
}else
{
echo "删除失败,请把一下内容提交给作者~";		
echo "sql1:".$sql."<br>";
echo "sql2:".$sql2."<br>";
echo "sql3:".$sql3."<br>";	
}
}
else
{
	echo "你也是牛批了,这都能提交删除,可惜了你不是管理员~";	
}
}else
{
echo "你还没登录就想删除呢?想屁事呢?";	
	
}
?>