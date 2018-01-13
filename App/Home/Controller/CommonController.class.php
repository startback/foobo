<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {

    public function __construct(){
        parent::__construct();
		
		$web_infos = array();
		$web_info = M('web_config')->select();
		if($web_info){
			foreach($web_info as $value){
				$web_infos[$value['key_name']] = $value['key_value'];
			}
		}
		$this->assign('web_infos',$web_infos);
    }


    // 没有些方法 跳转404
    public function _empty(){
        echo 'Home no this way run common';
    }

}

