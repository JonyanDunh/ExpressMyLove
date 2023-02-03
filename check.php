<?php
require_once('./checktext.php');
function check($content){
switch (checktext($content)) {
			case 'spam':
	return "请不要发表垃圾信息哦~站长会生气滴!";
		break;
			case 'ad':
	return "请不要私自发小广告哟~要发请联系站长!不然站长会很!生!气!";
		break;
			case 'politics':
	return "这只是个表白网站,请不要发表有关政治的内容哟~";
		break;
			case 'terrorism':
	return "你发的东西有点恐怖呀😱😱😱!请不要发恐怖信息哟~";
		break;
			case 'abuse':
	return "骂人是不对滴~你以后一定要改哦~";
		break;
			case 'porn':
	return "你不要那么色好不好呀~要是想开车的话找站长~";
		break;
			case 'flood':
	return "请不要发灌水无意义内容哦~这样你还怎么向TA表白成功呢?";
		break;
			case 'contraband':
	return "发违禁信息是不好的行为哟~被小姐姐看到了后果很严重滴!";
		break;
			case 'meaningless':
	return "你发表的内容意义不大呀~这样你还怎么向TA表白成功呢?";
		break;
			case 'customized':
	return "你发表的内容内含有些被限制的词语哦~请把他去掉哦~";
		break;
			case 'normal':
	return 200;
		break;
		
};
}

?>