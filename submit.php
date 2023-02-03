<?php
require_once('./config.php');
require_once('./function.php');
require_once('./check.php');
$name = $_POST['name'];
$osname = $_POST['osname'];
$content = $_POST['content'];
$user = $_POST['username'];
//获取传值
if (empty($name) || empty($osname) || empty($content)) {
  echo "请检查表单是否填写完整呀!填写完整才能让对方找到你呀!";
  exit();
}
if (strlen($name) > 100 || strlen($osname) > 100) {
  echo "呀!你或对方的名字超过长度限制了!";
  exit();
}
if (strlen($content) > 5000) {
  echo "呀!你给TA发的话超过长度限制了!";
  exit();
}
if(!empty($ban[$ip]))
{
  echo "呀!你的IP被封禁了";
  exit();
}
if (!empty($ip)) {
  $sql = "SELECT * FROM `emlog_love` where ip = '$ip'";
  $commd = mysqli_query($conn,$sql);
  $result = mysqli_fetch_assoc($commd);
  if (!empty($result)) {
    $timel = $result['time'];
    if (($time - $timel) <= 3600) {
      echo "呀!每小时只能表白一次呀!";
      exit();
    }
  }
}

if (!empty($name)) {
  $sql = "SELECT no FROM `emlog_user` where username = '$user'";
  $commd = mysqli_query($conn,$sql);
  $result = mysqli_fetch_assoc($commd);
  if (!empty($result)) {
    $no = $result['no'];
    if ($no=='3') {
      echo "你被封号了!";
      exit();
    }
  }
}

$checkname=check($name);
$checkosname=check($osname);
$checkcontent=check($content);

if($checkname!=200)
{
		$sql = "update emlog_user set no=no+'1' where username = '$user'";
mysqli_query($conn,$sql);
	echo $checkname;
	exit();
}
else if($checkosname!=200)
{
		$sql = "update emlog_user set no=no+'1' where username = '$user'";
mysqli_query($conn,$sql);
	echo $checkosname;
	exit();
}
else if($checkcontent!=200)
{
		$sql = "update emlog_user set no=no+'1' where username = '$user'";
mysqli_query($conn,$sql);
	echo $checkcontent;
	exit();
}
else
{
$sql = "INSERT INTO emlog_love(uid,`to`,content,`from`,ip,time,username,addr) VALUES(uuid(),'$osname','$content','$name','$ip','$time','$user','".addr($_SERVER['HTTP_ALI_CDN_REAL_IP'])."')";
@mysqli_query($conn,$sql);
echo 200;
}
?>