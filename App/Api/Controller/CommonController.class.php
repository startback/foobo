<?php
namespace Api\Controller;
use Think\Controller;
class CommonController extends Controller {

    public function __construct(){
        parent::__construct();
		
		$this->check_key_pass();
		
    }

    // 没有些方法 跳转404
    public function _empty(){
        echo 'Api no this way run common';
    }
	
	
	//检测密钥
	public function check_key_pass(){
		$key = 'asdfasdfasdfas';     //密钥
		
		$get_rand_num = isset($_REQUEST['rand_num'])?trim($_REQUEST['rand_num']):'';   //随机数或字符串
		$get_rand_key = isset($_REQUEST['rand_key'])?trim($_REQUEST['rand_key']):'';   //加密后的数
		
		
	}
	

}

