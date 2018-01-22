<?php
namespace Zadmin\Controller;
use Think\Controller;
class ActionOverController extends CommonController {

    //集锦列表
    public function over_list(){

        $is_show = isset($_GET['is_show'])?$_GET['is_show']:'-1';
        $is_good = isset($_GET['is_good'])?$_GET['is_good']:'-1';
        $is_hot = isset($_GET['is_hot'])?$_GET['is_hot']:'-1';
        $keywords = isset($_GET['keywords'])?$_GET['keywords']:'';

        $where = '1=1 and is_del=0 ';
        if($is_show != '-1') $where .= ' and is_show='.$is_show;
        if($is_good != '-1') $where .= ' and is_good='.$is_good;
        if($is_hot != '-1') $where .= ' and is_hot='.$is_hot;
        if($keywords) $where .= " and title like '%".$keywords."%'";

        $search_state['is_show'] = $is_show;
        $search_state['is_good'] = $is_good;
        $search_state['is_hot'] = $is_hot;
        $search_state['keywords'] = $keywords;

        $page = isset($_GET['p'])?$_GET['p']:1;
        $search_state['page'] = $page;
        $limit = D('action_over')->get_limit($page);
        $page_info = D('action_over')->get_page_list($search_state,$where);
        $over_list = D('action_over')->get_over_list($limit,$where);

        $state = array(
            '0'  =>  '否',
            '1'  =>  '是'
        );

        $this->assign('state',$state);
        $this->assign('page_info',$page_info);
        $this->assign('over_list',$over_list);
        $this->assign('search_state',$search_state);

        $this->display();
    }


    //发布集锦
    public function over_add(){
        if($_POST){
            $data['title'] = isset($_POST['title'])?trim($_POST['title']):'';
            $data['desc'] = isset($_POST['desc'])?trim($_POST['desc']):'';
            $data['play_url'] = isset($_POST['play_url'])?trim($_POST['play_url']):'';
            $data['is_good'] = isset($_POST['is_good'])?intval($_POST['is_good']):0;
            $data['is_hot'] = isset($_POST['is_hot'])?intval($_POST['is_hot']):0;
            $data['is_show'] = isset($_POST['is_show'])?intval($_POST['is_show']):0;
            $data['add_time'] = date('Y-m-d H:i:s',time());
            $data['admin_id'] = $_SESSION['zadmin']['info']['admin_id'];
			
            if($_FILES){
                $images = com_save_file($_FILES,'/Upload/over');
                $data['pic_url'] = $images[0];
            }

            if(D('action_over')->over_add($data)){
                $this->success('发布成功',__ROOT__.'/index.php?m=zadmin&c=action_over&a=over_list');
            }else{
                $this->error('发布失败');
            }
        }else{

            $this->display();
        }
    }



    //编辑集锦
    public function over_edit(){
        if($_POST){
            $id = intval($_POST['id']);
			
            $data['title'] = isset($_POST['title'])?trim($_POST['title']):'';
            $data['desc'] = isset($_POST['desc'])?trim($_POST['desc']):'';
            $data['play_url'] = isset($_POST['play_url'])?trim($_POST['play_url']):'';
            $data['is_good'] = isset($_POST['is_good'])?intval($_POST['is_good']):0;
            $data['is_hot'] = isset($_POST['is_hot'])?intval($_POST['is_hot']):0;
            $data['is_show'] = isset($_POST['is_show'])?intval($_POST['is_show']):0;
			
            if($_FILES && $_FILES['image']['name'][0]){
                $images = com_save_file($_FILES,'/Upload/over');
                $data['pic_url'] = $images[0];
            }		
			
			
            if(D('action_over')->over_edit($id,$data)){
                $this->success('编辑成功',__ROOT__.'/index.php?m=zadmin&c=action_over&a=over_list');
            }else{
                $this->error('编辑失败');
            }

        }else{
            $id = $_GET['id'] ? $_GET['id'] : '';
            if (empty($id)) {
                $this->error('没有此集锦');
                exit;
            }
            $action = M('action_over')->where('id='.$id)->find();		
            $this->assign('action',$action);
            $this->display();
        }
    }


    //删除集锦
    public function over_del(){
        $ids = isset($_POST['ids'])?$_POST['ids']:'';
		$data['status'] = 0;
		$data['info'] = '删除失败';		
        if($ids){
            if(D('action_over')->over_del($ids)){
                $data['status'] = 1;
                $data['info'] = '删除成功';
            }
        }
		echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }












}