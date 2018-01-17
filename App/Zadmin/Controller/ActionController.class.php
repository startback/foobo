<?php
namespace Zadmin\Controller;
use Think\Controller;
class ActionController extends CommonController {


    //直播分类列表
    public function atype(){
        $page = isset($_GET['p'])?$_GET['p']:1;
        $limit = D('action')->get_limit($page);
        $page_info = D('action')->get_page($page);
        $type_list = D('action')->get_type_list($limit);
        $type_state = array(
            '0'  => '否',
            '1'  => '是'
        );
        $this->assign('type_state',$type_state);
        $this->assign('page',$page_info);
        $this->assign('type_list',$type_list);
        $this->display();
    }


    //添加直播分类
    public function add_type(){
        if($_POST){
            $data['type_name'] = trim($_POST['type_name']);
            $data['type_desc'] = trim($_POST['type_desc']);
            $data['is_show'] = $_POST['is_show'];
            if(D('action')->add_type($data)){
                $this->success('添加成功!',U('action/atype'));
            }else{
                $this->error('添加失败');
            }
        }else{
            $this->display();
        }
    }


    //修改直播分类
    public function edit_type(){
        if($_POST){

            $type_id = $_POST['type_id'];
            $data['type_name'] = trim($_POST['type_name']);
            $data['type_desc'] = trim($_POST['type_desc']);
            $data['is_show'] = $_POST['is_show'];
            if(D('action')->edit_type($type_id,$data)){
                $this->success('修改成功!',U('action/atype'));
            }else{
                $this->error('修改失败');
            }
        }else {
            $type_id = $_GET['id'] ? $_GET['id'] : '';
            if (empty($type_id)) {
                $this->error('没有此分类');
                exit;
            }

            $type_info = M('action_type')->where('type_id='.$type_id)->find();

            $this->assign('type_info',$type_info);
            $this->display();
        }
    }


    //删除直播分类
    public function del_type(){
        $ids = isset($_POST['ids'])?$_POST['ids']:'';
        if($ids){
			if(D('action')->del_type($ids)){
				echo 1;
			}
        }
    }



    //直播列表
    public function action_list(){
		
        $is_show = isset($_GET['is_show'])?$_GET['is_show']:'-1';
        $is_good = isset($_GET['is_good'])?$_GET['is_good']:'-1';
        $is_hot = isset($_GET['is_hot'])?$_GET['is_hot']:'-1';
        $is_over = isset($_GET['is_over'])?$_GET['is_over']:'-1';
        $type_id = isset($_GET['type_id'])?$_GET['type_id']:'-1';
        $keywords = isset($_GET['keywords'])?$_GET['keywords']:'';

        $where = '1=1 and is_del=0 ';
        if($is_show != '-1') $where .= ' and is_show='.$is_show;
        if($is_good != '-1') $where .= ' and is_good='.$is_good;
        if($is_hot != '-1') $where .= ' and is_hot='.$is_hot;
        if($is_over != '-1') $where .= ' and is_over='.$is_over;
        if($type_id != '-1') $where .= ' and type_id='.$type_id;
        if($keywords) $where .= " and act_name like '%".$keywords."%'";

        $search_state['is_show'] = $is_show;
        $search_state['is_good'] = $is_good;
        $search_state['is_hot'] = $is_hot;
        $search_state['is_over'] = $is_over;
        $search_state['type_id'] = $type_id;
        $search_state['keywords'] = $keywords;

        $page = isset($_GET['p'])?$_GET['p']:1;
        $search_state['page'] = $page;
        $limit = D('action')->get_limit($page);
        $page_info = D('action')->get_page_list($search_state,$where);
        $action_list = D('action')->get_action_list($limit,$where);
		if($action_list){
			//球队列表
			$players_arr = array();
			$players = M('players')->select();
			if($players){
				foreach($players as $val){
					$players_arr[$val['p_id']] = $val;
				}
			}
			
			foreach($action_list as $key=>$value){
				if($value['act_platform']) $action_list[$key]['act_platform_arr'] = json_decode($value['act_platform'],true);
				if($players_arr){
					$action_list[$key]['left_player'] = $players_arr[$value['left_p_id']]['p_name'];
					$action_list[$key]['left_player_logo'] = $players_arr[$value['left_p_id']]['p_logo'];
					$action_list[$key]['right_player'] = $players_arr[$value['right_p_id']]['p_name'];
					$action_list[$key]['right_player_logo'] = $players_arr[$value['right_p_id']]['p_logo'];					
				}
			}
		}

        $types_arr = array();
        $types = M('action_type')->where('is_show=1')->select();
        if($types){
            foreach($types as $val){
                $types_arr[$val['type_id']]['type_id'] = $val['type_id'];
                $types_arr[$val['type_id']]['type_name'] = $val['type_name'];
            }
        }

        $state = array(
            '0'  =>  '否',
            '1'  =>  '是'
        );

        $this->assign('state',$state);
        $this->assign('types',$types_arr);
        $this->assign('page_info',$page_info);
        $this->assign('action_list',$action_list);
        $this->assign('search_state',$search_state);

        $this->display();
    }


    //发布直播
    public function action_add(){
        if($_POST){
            $data['act_id'] = isset($_POST['act_id'])?trim($_POST['act_id']):'';
			
			if(M('action')->where("act_id='".$data['act_id']."'")->find()){
				$this->error('该ID已存在，请重新填写');
				exit;
			}
			
            $data['act_name'] = isset($_POST['act_name'])?trim($_POST['act_name']):'';
            $data['type_id'] = isset($_POST['type_id'])?intval($_POST['type_id']):0;
            $data['act_time'] = isset($_POST['act_time'])?trim($_POST['act_time']):'';
            $data['is_good'] = isset($_POST['is_good'])?intval($_POST['is_good']):0;
            $data['is_hot'] = isset($_POST['is_hot'])?intval($_POST['is_hot']):0;
            $data['is_show'] = isset($_POST['is_show'])?intval($_POST['is_show']):0;
            $data['is_over'] = isset($_POST['is_over'])?intval($_POST['is_over']):0;
            $data['add_time'] = date('Y-m-d H:i:s',time());
            $data['admin_id'] = $_SESSION['zadmin']['info']['admin_id'];

			$data['left_num'] = isset($_POST['left_num'])?intval($_POST['left_num']):0;
			$data['right_num'] = isset($_POST['right_num'])?intval($_POST['right_num']):0;
			$data['left_p_id'] = isset($_POST['left_p_id'])?intval($_POST['left_p_id']):0;
			$data['right_p_id'] = isset($_POST['right_p_id'])?intval($_POST['right_p_id']):0;
			$data['status_desc'] = isset($_POST['status_desc'])?trim($_POST['status_desc']):'';
			
			$act_platform = $_POST['act_platform'];
			$act_platform_url = $_POST['act_platform_url'];
			if($act_platform){
				$act_platform_arr = array();
				foreach($act_platform as $key=>$value){
					$act_platform_arr[$key]['name'] = $value;
					$act_platform_arr[$key]['url'] = $act_platform_url[$key];
				}
				$data['act_platform'] = json_encode($act_platform_arr,JSON_UNESCAPED_UNICODE);
			}
			
            if(D('action')->action_add($data)){
                $this->success('发表成功',__ROOT__.'/index.php?m=zadmin&c=action&a=action_list');
            }else{
                $this->error('发表失败');
            }
        }else{
			
			$players = M('players')->select();
			$this->assign('players',$players);
            $types = M('action_type')->where('is_show=1')->select();
            $this->assign('types',$types);
            $this->display();
			
        }
    }

    //编辑直播
    public function action_edit(){
        if($_POST){
            $act_id = isset($_POST['act_id'])?trim($_POST['act_id']):'';
	
			if(!M('action')->where("act_id='".$data['act_id']."'")->find()){
				$this->error('没有此直播');
				exit;
			}
			
            $data['act_name'] = isset($_POST['act_name'])?trim($_POST['act_name']):'';
            $data['type_id'] = isset($_POST['type_id'])?intval($_POST['type_id']):0;
            $data['act_time'] = isset($_POST['act_time'])?trim($_POST['act_time']):'';
            $data['is_good'] = isset($_POST['is_good'])?intval($_POST['is_good']):0;
            $data['is_hot'] = isset($_POST['is_hot'])?intval($_POST['is_hot']):0;
            $data['is_show'] = isset($_POST['is_show'])?intval($_POST['is_show']):0;
            $data['is_over'] = isset($_POST['is_over'])?intval($_POST['is_over']):0;

			$data['left_num'] = isset($_POST['left_num'])?intval($_POST['left_num']):0;
			$data['right_num'] = isset($_POST['right_num'])?intval($_POST['right_num']):0;
			$data['left_p_id'] = isset($_POST['left_p_id'])?intval($_POST['left_p_id']):0;
			$data['right_p_id'] = isset($_POST['right_p_id'])?intval($_POST['right_p_id']):0;
			$data['status_desc'] = isset($_POST['status_desc'])?trim($_POST['status_desc']):'';
			
			$act_platform = $_POST['act_platform'];
			$act_platform_url = $_POST['act_platform_url'];
			if($act_platform){
				$act_platform_arr = array();
				foreach($act_platform as $key=>$value){
					$act_platform_arr[$key]['name'] = $value;
					$act_platform_arr[$key]['url'] = $act_platform_url[$key];
				}
				$data['act_platform'] = json_encode($act_platform_arr,JSON_UNESCAPED_UNICODE);
			}
			
            if(D('action')->action_edit($act_id,$data)){
                $this->success('编辑成功',__ROOT__.'/index.php?m=zadmin&c=action&a=action_list');
            }else{
                $this->error('编辑失败');
            }


        }else{
            $action_id = $_GET['id'] ? $_GET['id'] : '';
            if (empty($action_id)) {
                $this->error('没有此直播');
                exit;
            }

			$action['act_platform_arr'] = '';
            $action = M('action')->where('act_id='.$action_id)->find();
			if($action['act_platform']) $action['act_platform_arr'] = json_decode($action['act_platform'],true);		
			
            $types_arr = array();
            $types = M('action_type')->where('is_show=1')->select();
            if($types){
                foreach($types as $val){
                    $types_arr[$val['type_id']]['type_id'] = $val['type_id'];
                    $types_arr[$val['type_id']]['type_name'] = $val['type_name'];
                }
            }
			
			$players = M('players')->select();
			$this->assign('players',$players);
            $this->assign('types',$types_arr);
            $this->assign('action',$action);
            $this->display();
        }
    }


    //删除直播
    public function action_del(){
        $ids = isset($_POST['ids'])?$_POST['ids']:'';
        if($ids){
            if(D('action')->action_del($ids)){
                echo 1;
            }
        }
    }


	//球队列表
	public function players_list(){
		
        $page = isset($_GET['p'])?$_GET['p']:1;
        $limit = D('players')->get_limit($page);
        $page_info = D('players')->get_page($page);
        $players_list = D('players')->get_players_list($limit);

        $this->assign('page',$page_info);
        $this->assign('players_list',$players_list);
        $this->display();
	}

	//球队添加
	public function players_add(){
        if($_POST){
            $data['p_id'] = isset($_POST['p_id'])?intval($_POST['p_id']):0;
            $data['p_desc'] = isset($_POST['p_desc'])?trim($_POST['p_desc']):'';
            $data['p_name'] = isset($_POST['p_name'])?trim($_POST['p_name']):'';
            $data['add_time'] = date('Y-m-d H:i:s',time());
            $data['admin_id'] = $_SESSION['zadmin']['info']['admin_id'];
			
			if($data['p_id'] < 1){
				$this->error('ID不能小于1，请重新填写');
				exit;				
			}
			if(M('players')->where("p_id='".$data['p_id']."'")->find()){
				$this->error('该ID已存在，请重新填写');
				exit;
			}			
	
            if($_FILES){
                $images = com_save_file($_FILES,'/Upload/players');
                $data['p_logo'] = $images[0];
            }

            if(D('players')->players_add($data)){
                $this->success('添加成功',__ROOT__.'/index.php?m=zadmin&c=action&a=players_list');
            }else{
                $this->error('添加失败');
            }
        }else{

            $this->display();
        }
	}	

	//球队修改
	public function players_edit(){
		
        if($_POST){
            $p_id = isset($_POST['p_id'])?intval($_POST['p_id']):0;
			
            $data['p_desc'] = isset($_POST['p_desc'])?trim($_POST['p_desc']):'';
            $data['p_name'] = isset($_POST['p_name'])?trim($_POST['p_name']):'';
			
			if(!M('players')->where("p_id='".$p_id."'")->find()){
				$this->error('没有此球队');
				exit;
			}			
			
            if($_FILES && $_FILES['image']['name'][0]){
                $images = com_save_file($_FILES,'/Upload/players');
                $data['p_logo'] = $images[0];
            }				

            if(D('players')->players_edit($p_id,$data)){
                $this->success('修改成功',__ROOT__.'/index.php?m=zadmin&c=action&a=players_list');
            }else{
                $this->error('修改失败');
            }
        }else{
			
            $id = $_GET['id'] ? $_GET['id'] : '';
            if (empty($id)) {
                $this->error('没有此球队');
                exit;
            }
            $info = M('players')->where('p_id='.$id)->find();		
            $this->assign('info',$info);			
			
            $this->display();
        }	
		
	}

	//球队删除
	public function players_del(){
		
        $ids = isset($_POST['ids'])?$_POST['ids']:'';
        if($ids){
            if(D('players')->players_del($ids)){
                echo 1;
            }
        }		
		
	}





}