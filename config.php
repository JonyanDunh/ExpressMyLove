<?php


//mysql database address
define('DB_HOST','127.0.0.1');
//mysql database user
define('DB_USER','blog_deginx_com');
//database password
define('DB_PASSWD','4mJ5bbXj8W');
//database name
define('DB_NAME','blog_deginx_com');
//database prefix
define('DB_PREFIX','emlog_');
//auth key
define('AUTH_KEY','g$9)di&wqKJa^(PG^bM$hz5f$5(Vcfwjcb384af735a32ae9f7dd00610b90f927');
//cookie name
define('AUTH_COOKIE_NAME','EM_AUTHCOOKIE_SBsG78cnfLs1zSaVfDvGcmWEenaw8xeX');
$conn=mysqli_connect("127.0.0.1","blog_deginx_com","4mJ5bbXj8W","blog_deginx_com");
$conns=mysqli_connect("127.0.0.1","blog_deginx_com","4mJ5bbXj8W","information_schema");
//你的数据库信息
$px=25              
//每页显示表白数
?>