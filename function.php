<?php
$time = time();

if ($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"]) {
  $ip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];
} elseif ($HTTP_SERVER_VARS["HTTP_CLIENT_IP"]) {
  $ip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];
} elseif ($HTTP_SERVER_VARS["REMOTE_ADDR"]) {
  $ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
} elseif (getenv("HTTP_X_FORWARDED_FOR")) {
  $ip = getenv("HTTP_X_FORWARDED_FOR");
} elseif (getenv("HTTP_CLIENT_IP")) {
  $ip = getenv("HTTP_CLIENT_IP");
} elseif (getenv("REMOTE_ADDR")) {
  $ip = getenv("REMOTE_ADDR");
} else
{
  $ip = "Unknown";
}

$ban = array(
  "1.1.1.2" => "ban"
);
//ban用户数据库
function addr($ips) {
	$ak="lTkWA9ZpV1C87GDqzuKWGGzDZVqQrL6B";
	$url = "http://api.map.baidu.com/location/ip?ak=$ak&ip=$ips";
$ipinfo=json_decode(file_get_contents($url));
$location = $ipinfo->{'content'}->{'address'};
return $location;
	return $url;
}
  ?>
  