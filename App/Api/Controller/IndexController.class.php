<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends CommonController {

	//直播插入爬虫数据
    public function action_bug(){
		
		$res['code'] = 0;
		$res['msg'] = '成功';
		$res['data'] = array();
		
        if($_POST){
            $data['act_name'] = isset($_POST['act_name'])?trim($_POST['act_name']):'';
            $data['type_id'] = isset($_POST['type_id'])?intval($_POST['type_id']):0;
            $data['act_time'] = isset($_POST['act_time'])?trim($_POST['act_time']):'';
            $data['is_good'] = isset($_POST['is_good'])?intval($_POST['is_good']):0;
            $data['is_hot'] = isset($_POST['is_hot'])?intval($_POST['is_hot']):0;
            $data['is_show'] = isset($_POST['is_show'])?intval($_POST['is_show']):0;
            $data['is_over'] = isset($_POST['is_over'])?intval($_POST['is_over']):0;
            $data['add_time'] = date('Y-m-d H:i:s',time());
            $data['admin_id'] = 0;  //爬虫数据填充 待定
			$data['left_num'] = isset($_POST['left_num'])?intval($_POST['left_num']):0;
			$data['right_num'] = isset($_POST['right_num'])?intval($_POST['right_num']):0;
			$data['left_player'] = isset($_POST['left_player'])?trim($_POST['left_player']):'';
			$data['right_player'] = isset($_POST['right_player'])?trim($_POST['right_player']):'';
			$data['status_desc'] = isset($_POST['status_desc'])?trim($_POST['status_desc']):'';			
			$data['act_platform'] = isset($_POST['act_platform'])?trim($_POST['act_platform']):'';
			
            if($_FILES){
                $images = com_save_file($_FILES,'/Upload/zhibo');
                $data['left_player_logo'] = $images[0];
                $data['right_player_logo'] = $images[1];
            }

            if(M('action')->add($data)){
                
            }else{
				$res['code'] = 1;
				$res['msg'] = '插入数据失败';
            }
        }else{
			$res['code'] = 2;
			$res['msg'] = '请求方式错误';
        }		
		
		echo json_encode($res,JSON_UNESCAPED_UNICODE);

    }

	
	//集锦插入爬虫数据
    public function action_over_bug(){
		
		$res['code'] = 0;
		$res['msg'] = '成功';
		$res['data'] = array();		
		
        if($_POST){
            $data['title'] = isset($_POST['title'])?trim($_POST['title']):'';
            $data['desc'] = isset($_POST['desc'])?trim($_POST['desc']):'';
            $data['play_url'] = isset($_POST['play_url'])?trim($_POST['play_url']):'';
            $data['is_good'] = isset($_POST['is_good'])?intval($_POST['is_good']):0;
            $data['is_hot'] = isset($_POST['is_hot'])?intval($_POST['is_hot']):0;
            $data['is_show'] = isset($_POST['is_show'])?intval($_POST['is_show']):0;
            $data['add_time'] = date('Y-m-d H:i:s',time());
            $data['admin_id'] = 0;  //爬虫数据填充 待定
			
            if($_FILES){
                $images = com_save_file($_FILES,'/Upload/over');
                $data['pic_url'] = $images[0];
            }

            if(M('action_over')->add($data)){

            }else{
				$res['code'] = 1;
				$res['msg'] = '插入数据失败';
            }
        }else{
			$res['code'] = 2;
			$res['msg'] = '请求方式错误';
        }		
		
		echo json_encode($res,JSON_UNESCAPED_UNICODE);	
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}