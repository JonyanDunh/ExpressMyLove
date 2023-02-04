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
require_once("/www/wwwroot/blog.deginx.com/include/lib/mysql.php");
require_once("/www/wwwroot/blog.deginx.com/include/lib/mysqlii.php");
class Database {

    public static function getInstance() {
        if (class_exists('mysqli', FALSE)) {
            return MySqlii::getInstance();
        }
        else if (class_exists('mysql', FALSE)) {
            return MySql::getInstance();
        }
    }

}
function emHash($data) {
        $key = AUTH_KEY;
        return hash_hmac('md5', $data, $key);
    }
function getUserDataByLogin($userLogin) {
        $DB = Database::getInstance();
        if (empty($userLogin)) {
            return false;
        }
        $userData = false;
        if (!$userData = $DB->once_fetch_array("SELECT * FROM ".DB_PREFIX."user WHERE username = '$userLogin'")) {
            return false;
        }
        $userData['nickname'] = htmlspecialchars($userData['nickname']);
        $userData['username'] = htmlspecialchars($userData['username']);
        return $userData;
    }
function validateAuthCookie($cookie = '') {
        if (empty($cookie)) {
            return false;
        }

        $cookie_elements = explode('|', $cookie);
        if (count($cookie_elements) != 3) {
            return false;
        }
        
        
		global $username;
		
		
        list($username, $expiration, $hmac) = $cookie_elements;

        if (!empty($expiration) && $expiration < time()) {
            return false;
        }

        $key = emHash($username . '|' . $expiration);
        $hash = hash_hmac('md5', $username . '|' . $expiration, $key);

        if ($hmac != $hash) {
            return false;
        }
        $user = getUserDataByLogin($username);
        if (!$user) {
            return false;
        }
        return $user;
    }
function isLogin() {
        if(isset($_COOKIE[AUTH_COOKIE_NAME])) {
            $auth_cookie = $_COOKIE[AUTH_COOKIE_NAME];
        } elseif (isset($_POST[AUTH_COOKIE_NAME])) {
            $auth_cookie = $_POST[AUTH_COOKIE_NAME];
        } else{
            return false;
        }
		global $userData;	
        if(($userData = validateAuthCookie($auth_cookie)) === false) {
            return false;
        }else{
            return true;
        }
    }

?>