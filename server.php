<?php
opcache_reset();
header("Access-Control-Allow-Origin: *");
require_once("config.php");

$action = $_POST['action'];

/*if($action=='Get_Love')
{*/
	
class User {	
	public $uid;	
	public $to;	
	public $content;	
	public $from;
	//public $ip;
	public $time;
	//public $username;
	public $num;
	public $addr;
	
};
$data = array();

$comd = "SELECT * FROM emlog_love";
$sql = mysqli_query($conn,$comd);
$i=0;
while($row = mysqli_fetch_object($sql))
{
$user = new User();
$user->uid = $row->uid;	
$user->to = $row->to;	
$user->content = $row->content;		
$user->from = $row->from;
//$user->ip = $row->ip;
$user->time = date("Y-m-d",$row->time);
//$user->username =$row->username;
$user->num = $row->num;
$user->addr = $row->addr;
$data[]=$user;
$i++;
}

echo json_encode(array_reverse($data));

//}


?>