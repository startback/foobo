<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {

	//直播
    public function index(){
		$now_time = date('Y-m-d H:i:s',time());
				
		$where = C('DB_PREFIX').'action.is_show=1 and '.C('DB_PREFIX').'action.is_del=0 ';
        $act_l = M('action')->field(C('DB_PREFIX').'action.*,'.C('DB_PREFIX').'action_type.type_name,'.C('DB_PREFIX').'action_type.type_desc')->join(C('DB_PREFIX').'action_type ON '.C('DB_PREFIX').'action.type_id = '.C('DB_PREFIX').'action_type.type_id')->where($where)->order('act_id desc')->select();
	
		$week_days = array(
			0  =>  '星期日',
			1  =>  '星期一',
			2  =>  '星期二',
			3  =>  '星期三',
			4  =>  '星期四',
			5  =>  '星期五',
			6  =>  '星期六'
		);
		
		if($act_l){
			foreach($act_l as $key=>$value){
				$dates = explode(' ',$value['act_time']);
				$act_l[$key]['date'] = $dates[0];
				$act_l[$key]['time'] = substr($dates[1] , 0 , 5);	
				$act_l[$key]['week'] = $week_days[date("w",strtotime($dates[0]))];	
				$act_l[$key]['is_start'] = 0;	
				if($now_time >= $value['act_time']) $act_l[$key]['is_start'] = 1;
			}
		}
	
		//球队列表
		$players_arr = array();
		$players = M('players')->select();
		if($players){
			foreach($players as $val){
				$players_arr[$val['p_id']] = $val;
			}
		}	
	
		$act_list = array();
		if($act_l){
			foreach($act_l as $value){			
				if($players_arr){
					if($value['left_p_id']){
						$value['left_player'] = $players_arr[$value['left_p_id']]['p_name'];
						$value['left_player_logo'] = $players_arr[$value['left_p_id']]['p_logo'];
					}
					if($value['right_p_id']){
						$value['right_player'] = $players_arr[$value['right_p_id']]['p_name'];
						$value['right_player_logo'] = $players_arr[$value['right_p_id']]['p_logo'];	
					}					
				}				

				if($value['left_p_id'] == 0){
					$value['left_player'] = $value['left_name'];
					$value['left_player_logo'] = "/Public/images/foot_default.png";
				}
				if($value['right_p_id'] == 0){
					$value['right_player'] = $value['right_name'];
					$value['right_player_logo'] = "/Public/images/foot_default.png";
				}				
				
				$value['act_desc'] = '';
				if($value['status'] == 2){
					$value['act_desc'] = $value['left_num'].":".$value['right_num'];
				}else{
					if($value['act_platform']){
						$act_arr = json_decode($value['act_platform'],true);
						foreach($act_arr as $val){
							$value['act_desc'] .= $val['name']." ";
						}
					}
				}
				$act_list[$value['date']]['data'][] = $value;
				$act_list[$value['date']]['week_day'] = $value['week'];
				$act_list[$value['date']]['month_date'] = date('m月d日',strtotime($value['act_time']));
			}	
			ksort($act_list);
		}
	
		//记录统计信息
		$data['ip_address'] = com_get_ip();
		$data['link_from'] = com_get_from();
		$data['add_time'] = date('Y-m-d H:i:s',time());
		M('statistics')->add($data);
	
		$this->assign('now_time',$now_time);
		$this->assign('act_list',$act_list);
		$this->display();
    }

	//直播详情
	public function info(){
		
		$act_id = isset($_GET['id'])?intval($_GET['id']):0;
		$info = array();
		if($act_id){
			
			//球队列表
			$players_arr = array();
			$players = M('players')->select();
			if($players){
				foreach($players as $val){
					$players_arr[$val['p_id']] = $val;
				}
			}				
			
			$where = C('DB_PREFIX').'action.act_id='.$act_id;
			$info = M('action')->field(C('DB_PREFIX').'action.*,'.C('DB_PREFIX').'action_type.type_name,'.C('DB_PREFIX').'action_type.type_desc')->join(C('DB_PREFIX').'action_type ON '.C('DB_PREFIX').'action.type_id = '.C('DB_PREFIX').'action_type.type_id')->where($where)->find();	
			
			$info['act_desc'] = '';
			if($info['act_platform']){
				$info['act_platform_arr'] = json_decode($info['act_platform'],true);
				foreach($info['act_platform_arr'] as $val){
					$info['act_desc'] .= $val['name']." ";
				}			
			}
		
			if($players_arr){
				if($info['left_p_id']){
					$info['left_player'] = $players_arr[$info['left_p_id']]['p_name'];
					$info['left_player_logo'] = $players_arr[$info['left_p_id']]['p_logo'];
				}
				if($info['right_p_id']){
					$info['right_player'] = $players_arr[$info['right_p_id']]['p_name'];
					$info['right_player_logo'] = $players_arr[$info['right_p_id']]['p_logo'];	
				}				
			}		
		
			if($info['left_p_id'] == 0){
				$info['left_player'] = $info['left_name'];
				$info['left_player_logo'] = "/Public/images/foot_default.png";
			}
			if($info['right_p_id'] == 0){
				$info['right_player'] = $info['right_name'];
				$info['right_player_logo'] = "/Public/images/foot_default.png";
			}		
		
			if($info['status'] == 2) $info['act_desc'] = $info['left_num'].":".$info['right_num'];
				
		}
		
		$this->assign('info',$info);
		$this->display();
	}
	
	
	//集锦
	public function aover(){
		
		$action = array();
		$where = "1=1";
        $action = M('action_over')->where($where)->order('id desc')->select();		
		
		$this->assign('action',$action);
		$this->display();
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}