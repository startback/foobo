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
			$do_id = isset($_POST['do_id'])?intval($_POST['do_id']):99;
			
			if($do_id == 1){
				$act_id = isset($_POST['act_id'])?trim($_POST['act_id']):'';
				
				if(isset($_POST['act_name'])) $data['act_name'] = trim($_POST['act_name']);
				if(isset($_POST['type_id'])) $data['type_id'] = intval($_POST['type_id']);
				if(isset($_POST['act_time'])) $data['act_time'] = date('Y-m-d H:i:s',trim($_POST['act_time']));
				if(isset($_POST['is_good'])) $data['is_good'] = intval($_POST['is_good']);
				if(isset($_POST['is_hot'])) $data['is_hot'] = intval($_POST['is_hot']);
				if(isset($_POST['is_show'])) $data['is_show'] = intval($_POST['is_show']);
				if(isset($_POST['status'])) $data['status'] = intval($_POST['status']);
				if(isset($_POST['left_num'])) $data['left_num'] = intval($_POST['left_num']);
				if(isset($_POST['right_num'])) $data['right_num'] = intval($_POST['right_num']);
				if(isset($_POST['left_p_id'])) $data['left_p_id'] = intval($_POST['left_p_id']);
				if(isset($_POST['right_p_id'])) $data['right_p_id'] = intval($_POST['right_p_id']);
				if(isset($_POST['left_name'])) $data['left_name'] = intval($_POST['left_name']);
				if(isset($_POST['right_name'])) $data['right_name'] = intval($_POST['right_name']);				
				if(isset($_POST['status_desc'])) $data['status_desc'] = trim($_POST['status_desc']);			
				if(isset($_POST['act_platform'])) $data['act_platform'] = trim($_POST['act_platform']);				
				
				if(M('action')->where("act_id='".$act_id."'")->save($data)){
					$res['msg'] = '更新数据成功';
				}else{
					$res['code'] = 1;
					$res['msg'] = '更新数据失败';
				}				
			}else if($do_id == 0){
				
				$data['act_name'] = isset($_POST['act_name'])?trim($_POST['act_name']):'';
				$data['type_id'] = isset($_POST['type_id'])?intval($_POST['type_id']):0;
				$data['act_time'] = isset($_POST['act_time'])?date('Y-m-d H:i:s',intval($_POST['act_time'])):'';
				$data['is_good'] = isset($_POST['is_good'])?intval($_POST['is_good']):0;
				$data['is_hot'] = isset($_POST['is_hot'])?intval($_POST['is_hot']):0;
				$data['is_show'] = isset($_POST['is_show'])?intval($_POST['is_show']):1;
				$data['status'] = isset($_POST['status'])?intval($_POST['status']):0;
				$data['left_num'] = isset($_POST['left_num'])?intval($_POST['left_num']):0;
				$data['right_num'] = isset($_POST['right_num'])?intval($_POST['right_num']):0;
				$data['left_p_id'] = isset($_POST['left_p_id'])?intval($_POST['left_p_id']):0;
				$data['right_p_id'] = isset($_POST['right_p_id'])?intval($_POST['right_p_id']):0;
				$data['left_name'] = isset($_POST['left_name'])?trim($_POST['left_name']):'';			
				$data['right_name'] = isset($_POST['right_name'])?trim($_POST['right_name']):'';			
				$data['status_desc'] = isset($_POST['status_desc'])?trim($_POST['status_desc']):'';			
				$data['act_platform'] = isset($_POST['act_platform'])?trim($_POST['act_platform']):'';				
				
				$data['act_id'] = isset($_POST['act_id'])?trim($_POST['act_id']):'';
				$data['add_time'] = date('Y-m-d H:i:s',time());
				$data['admin_id'] = 0;  //爬虫数据填充 待定	
				
				if(M('action')->where("act_id='".$data['act_id']."'")->find()){
					$res['code'] = 4;
					$res['msg'] = 'ID已存在，不能重复写入';
				}else{				
					if(M('action')->add($data)){
						$res['msg'] = '插入数据成功';
					}else{
						$res['code'] = 1;
						$res['msg'] = '插入数据失败';
					}	
				}			
			}else{
				$res['code'] = 3;
				$res['msg'] = '操作类型错误';				
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