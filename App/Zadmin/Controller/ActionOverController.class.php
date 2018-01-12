<?php
namespace Zadmin\Controller;
use Think\Controller;
class ActionOverController extends CommonController {

    //集锦列表
    public function over_list(){
echo 111;
        // $is_show = isset($_GET['is_show'])?$_GET['is_show']:'-1';
        // $is_good = isset($_GET['is_good'])?$_GET['is_good']:'-1';
        // $is_hot = isset($_GET['is_hot'])?$_GET['is_hot']:'-1';
        // $is_over = isset($_GET['is_over'])?$_GET['is_over']:'-1';
        // $type_id = isset($_GET['type_id'])?$_GET['type_id']:'-1';
        // $keywords = isset($_GET['keywords'])?$_GET['keywords']:'';

        // $where = '1=1 and is_del=0 ';
        // if($is_show != '-1') $where .= ' and is_show='.$is_show;
        // if($is_good != '-1') $where .= ' and is_good='.$is_good;
        // if($is_hot != '-1') $where .= ' and is_hot='.$is_hot;
        // if($is_over != '-1') $where .= ' and is_over='.$is_over;
        // if($type_id != '-1') $where .= ' and type_id='.$type_id;
        // if($keywords) $where .= " and (left_player like '%".$keywords."%' || right_player like '%".$keywords."%' || act_name like '%".$keywords."%')";

        // $search_state['is_show'] = $is_show;
        // $search_state['is_good'] = $is_good;
        // $search_state['is_hot'] = $is_hot;
        // $search_state['is_over'] = $is_over;
        // $search_state['type_id'] = $type_id;
        // $search_state['keywords'] = $keywords;

        // $page = isset($_GET['p'])?$_GET['p']:1;
        // $search_state['page'] = $page;
        // $limit = D('action')->get_limit($page);
        // $page_info = D('action')->get_page_list($search_state,$where);
        // $action_list = D('action')->get_action_list($limit,$where);
		// if($action_list){
			// foreach($action_list as $key=>$value){
				// if($value['act_platform']) $action_list[$key]['act_platform_arr'] = json_decode($value['act_platform'],true);
			// }
		// }

        // $types_arr = array();
        // $types = M('action_type')->where('is_show=1')->select();
        // if($types){
            // foreach($types as $val){
                // $types_arr[$val['type_id']]['type_id'] = $val['type_id'];
                // $types_arr[$val['type_id']]['type_name'] = $val['type_name'];
            // }
        // }

        // $state = array(
            // '0'  =>  '否',
            // '1'  =>  '是'
        // );

        // $this->assign('state',$state);
        // $this->assign('types',$types_arr);
        // $this->assign('page_info',$page_info);
        // $this->assign('action_list',$action_list);
        // $this->assign('search_state',$search_state);

        // $this->display();
    }


    //发布集锦
    public function over_add(){
        // if($_POST){
            // $data['act_name'] = isset($_POST['act_name'])?trim($_POST['act_name']):'';
            // $data['type_id'] = isset($_POST['type_id'])?intval($_POST['type_id']):0;
            // $data['act_time'] = isset($_POST['act_time'])?trim($_POST['act_time']):'';
            // $data['is_good'] = isset($_POST['is_good'])?intval($_POST['is_good']):0;
            // $data['is_hot'] = isset($_POST['is_hot'])?intval($_POST['is_hot']):0;
            // $data['is_show'] = isset($_POST['is_show'])?intval($_POST['is_show']):0;
            // $data['is_over'] = isset($_POST['is_over'])?intval($_POST['is_over']):0;
            // $data['add_time'] = date('Y-m-d H:i:s',time());
            // $data['admin_id'] = $_SESSION['zadmin']['info']['admin_id'];

			// $data['left_num'] = isset($_POST['left_num'])?intval($_POST['left_num']):0;
			// $data['right_num'] = isset($_POST['right_num'])?intval($_POST['right_num']):0;
			// $data['left_player'] = isset($_POST['left_player'])?trim($_POST['left_player']):'';
			// $data['right_player'] = isset($_POST['right_player'])?trim($_POST['right_player']):'';
			// $data['status_desc'] = isset($_POST['status_desc'])?trim($_POST['status_desc']):'';
			
			// $act_platform = $_POST['act_platform'];
			// $act_platform_url = $_POST['act_platform_url'];
			// if($act_platform){
				// $act_platform_arr = array();
				// foreach($act_platform as $key=>$value){
					// $act_platform_arr[$key]['name'] = $value;
					// $act_platform_arr[$key]['url'] = $act_platform_url[$key];
				// }
				// $data['act_platform'] = json_encode($act_platform_arr,JSON_UNESCAPED_UNICODE);
			// }
			
            // if($_FILES){
                // $images = com_save_file($_FILES,'/Upload/zhibo');
                // $data['left_player_logo'] = $images[0];
                // $data['right_player_logo'] = $images[1];
            // }

            // if(D('action')->action_add($data)){
                // $this->success('发表成功',__ROOT__.'/index.php?m=zadmin&c=action&a=action_list');
            // }else{
                // $this->error('发表失败');
            // }
        // }else{
            // $types = M('action_type')->where('is_show=1')->select();
            // $this->assign('types',$types);
            // $this->display();
        // }
    }



    //编辑集锦
    public function over_edit(){
        // if($_POST){
            // $act_id = intval($_POST['act_id']);
			
            // $data['act_name'] = isset($_POST['act_name'])?trim($_POST['act_name']):'';
            // $data['type_id'] = isset($_POST['type_id'])?intval($_POST['type_id']):0;
            // $data['act_time'] = isset($_POST['act_time'])?trim($_POST['act_time']):'';
            // $data['is_good'] = isset($_POST['is_good'])?intval($_POST['is_good']):0;
            // $data['is_hot'] = isset($_POST['is_hot'])?intval($_POST['is_hot']):0;
            // $data['is_show'] = isset($_POST['is_show'])?intval($_POST['is_show']):0;
            // $data['is_over'] = isset($_POST['is_over'])?intval($_POST['is_over']):0;

			// $data['left_num'] = isset($_POST['left_num'])?intval($_POST['left_num']):0;
			// $data['right_num'] = isset($_POST['right_num'])?intval($_POST['right_num']):0;
			// $data['left_player'] = isset($_POST['left_player'])?trim($_POST['left_player']):'';
			// $data['right_player'] = isset($_POST['right_player'])?trim($_POST['right_player']):'';
			// $data['status_desc'] = isset($_POST['status_desc'])?trim($_POST['status_desc']):'';
			
			// $act_platform = $_POST['act_platform'];
			// $act_platform_url = $_POST['act_platform_url'];
			// if($act_platform){
				// $act_platform_arr = array();
				// foreach($act_platform as $key=>$value){
					// $act_platform_arr[$key]['name'] = $value;
					// $act_platform_arr[$key]['url'] = $act_platform_url[$key];
				// }
				// $data['act_platform'] = json_encode($act_platform_arr,JSON_UNESCAPED_UNICODE);
			// }
			
            // if($_FILES && ($_FILES['image']['name'][0] || $_FILES['image']['name'][1])){
                // $images = com_save_file($_FILES,'/Upload/zhibo');
                // if($_FILES['image']['name'][0]) $data['left_player_logo'] = $images[0];
                // if($_FILES['image']['name'][1]) $data['right_player_logo'] = $images[1];
            // }			
			
			
            // if(D('action')->action_edit($act_id,$data)){
                // $this->success('编辑成功',__ROOT__.'/index.php?m=zadmin&c=action&a=action_list');
            // }else{
                // $this->error('编辑失败');
            // }


        // }else{
            // $action_id = $_GET['id'] ? $_GET['id'] : '';
            // if (empty($action_id)) {
                // $this->error('没有此直播');
                // exit;
            // }

			// $action['act_platform_arr'] = '';
            // $action = M('action')->where('act_id='.$action_id)->find();
			// if($action['act_platform']) $action['act_platform_arr'] = json_decode($action['act_platform'],true);		
			
            // $types_arr = array();
            // $types = M('action_type')->where('is_show=1')->select();
            // if($types){
                // foreach($types as $val){
                    // $types_arr[$val['type_id']]['type_id'] = $val['type_id'];
                    // $types_arr[$val['type_id']]['type_name'] = $val['type_name'];
                // }
            // }

            // $this->assign('types',$types_arr);
            // $this->assign('action',$action);
            // $this->display();
        // }
    }


    //删除集锦
    public function over_del(){
        $ids = isset($_POST['ids'])?$_POST['ids']:'';
        // if($ids){
            // if(D('action')->action_del($ids)){
                // echo 1;
            // }
        // }
    }












}