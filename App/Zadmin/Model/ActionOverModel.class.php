<?php 
namespace Zadmin\Model;
use Think\Model;

class ActionOverModel extends Model {

//*********** 所有待做
    var $per_page;
	
	public function __construct(){
		$this->per_page = C('PAGE_ACTION_OVER');
	}	
	
    //增加集锦
	public function over_add($data){
		$in_id = M('action')->add($data);
        if($in_id){
			D('admin_log')->admin_log('增加直播，编号为:'.$in_id);
            return true;
        }else{
            return false;
        }
    }


    //获取limit
    public function get_limit($page){
        $start_num = ($page - 1) * $this->per_page;
        return $start_num.','.$this->per_page;
    }

    //获得页数
    public function get_page($page){
        $total_num = M('action_type')->count();
        $total_page = ceil($total_num/$this->per_page);
        $cur_page = $page;
        $pre_page = $cur_page - 1;
        if($pre_page < 1) $pre_page = 1;
        $next_page = $cur_page + 1;
        if($next_page > $total_page) $next_page = $total_page;

        $purl = __ROOT__.'/index.php?m=zadmin&c=action&a=atype&p=';

        $page_info = '<a href="'.$purl.'1">首页</a>';
        $page_info .= '<a href="'.$purl.$pre_page.'">上一页</a>';
        $page_info .= '<span class="current">'.$cur_page.'</span>';
        $page_info .= '<a href="'.$purl.$next_page.'">下一页</a>';
        $page_info .= '<a href="'.$purl.$total_page.'">尾页</a>';

        return $page_info;
    }


    //获取集锦列表
    public function get_over_list($limit,$where){
        return M('action')->field(C('DB_PREFIX').'action.*,'.C('DB_PREFIX').'admin.admin_account')->join('left join '.C('DB_PREFIX').'admin ON '.C('DB_PREFIX').'action.admin_id = '.C('DB_PREFIX').'admin.admin_id')->where($where)->limit($limit)->order('act_id desc')->select();
    }



    //获得页数
    public function get_page_list($page,$where){
        $total_num = M('action')->where($where)->count();
        $total_page = ceil($total_num/$this->per_page);
        $cur_page = $page['page'];
        $pre_page = $cur_page - 1;
        if($pre_page < 1) $pre_page = 1;
        $next_page = $cur_page + 1;
        if($next_page > $total_page) $next_page = $total_page;

        $base_purl = __ROOT__.'/index.php?m=zadmin&c=action&a=action_list&is_show='.$page['is_show'].'&is_hot='.$page['is_hot'].'&is_good='.$page['is_good'].'&is_over='.$page['is_over'].'&type_id='.$page['type_id'];

        if($page['keywords']){
            $purl = $base_purl.'&keywords='.$page['keywords'].'&p=';
        }else{
            $purl = $base_purl.'&p=';
        }

		$page_info .= '<span class="current">共'.$total_num.'记录--'.$total_page.'页</span>';
        $page_info .= '<a href="'.$purl.'1">首页</a>';
        $page_info .= '<a href="'.$purl.$pre_page.'">上一页</a>';
        $page_info .= '<span class="current">'.$cur_page.'</span>';
        $page_info .= '<a href="'.$purl.$next_page.'">下一页</a>';
        $page_info .= '<a href="'.$purl.$total_page.'">尾页</a>';

        return $page_info;
    }
	

	

	
}