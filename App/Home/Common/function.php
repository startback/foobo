<?php
/*****************    公用函数    *****************/

/*
 * 获取真实IP
 */
function com_get_ip(){ 
	if (getenv('HTTP_CLIENT_IP')){ 
		$ip = getenv('HTTP_CLIENT_IP'); 
		
	}elseif (getenv('HTTP_X_FORWARDED_FOR')){ 
		$ip = getenv('HTTP_X_FORWARDED_FOR'); 
		
	}elseif (getenv('HTTP_X_FORWARDED')){ 
		$ip = getenv('HTTP_X_FORWARDED'); 
		
	}elseif (getenv('HTTP_FORWARDED_FOR')){ 
		$ip = getenv('HTTP_FORWARDED_FOR'); 

	}elseif (getenv('HTTP_FORWARDED')){ 
		$ip = getenv('HTTP_FORWARDED'); 
		
	}else{ 
		$ip = $_SERVER['REMOTE_ADDR']; 
		
	} 
	
	return $ip; 
} 

/*
 * 判断连接端
 */
function com_get_from(){
	
	$res = 'unknow';
	
	$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	$is_pc = (strpos($agent, 'windows nt')) ? true : false;
	$is_mac = (strpos($agent, 'mac os')) ? true : false;
	$is_iphone = (strpos($agent, 'iphone')) ? true : false;
	$is_android = (strpos($agent, 'android')) ? true : false;
	$is_ipad = (strpos($agent, 'ipad')) ? true : false;
	 
	if($is_pc) $res = 'pc';
	if($is_mac) $res = 'mac';
	if($is_iphone) $res = 'iphone';
	if($is_android) $res = 'android';
	if($is_ipad) $res = 'ipad';
	
	return $res;
}








