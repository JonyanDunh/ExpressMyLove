<?php

include_once 'aliyun-php-sdk-core/Config.php';
use Green\Request\V20180509 as Green;


function checktext($content)
{
$iClientProfile = DefaultProfile::getProfile("cn-shenzhen", "LTAIVSPjazlvMo06", "3Iz2uuEjAGLdGYuYebQ2reVYIoLHCt");
DefaultProfile::addEndpoint("cn-shenzhen", "cn-shenzhen", "Green", "green.cn-shenzhen.aliyuncs.com");
$client = new DefaultAcsClient($iClientProfile);
$request = new Green\TextScanRequest();
$request->setMethod("POST");
$request->setAcceptFormat("JSON");
$task1 = array('dataId' =>  uniqid(),
    'content' => $content

);
$request->setContent(json_encode(array(
	"tasks" => array($task1),
    "scenes" => array("antispam"),
    "bizType" =>"deginx"
    )));
try {
    $response = $client->getAcsResponse($request);
    //$arr=json_decode($response);
    foreach($response->data as $v){   
    	$arr2=$v->results;
    }
    foreach($arr2 as $s){   
    	$checkresult=$s->label;
    }    
    return $checkresult;
    //print_r($response);
} catch (Exception $e) {
    print_r($e);
}
}
?>