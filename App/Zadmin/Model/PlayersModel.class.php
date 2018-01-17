<?php 
namespace Zadmin\Model;
use Think\Model;

class PlayersModel extends Model {

    var $per_page;
	public function __construct(){
		$this->per_page = C('PAGE_PLAYERS');
	}		

    //增加球队
	public function players_add($data){
        if(M('players')->add($data)){
			D('admin_log')->admin_log('增加球队，ID为:'.$data['p_id']);
            return true;
        }else{
            return false;
        }
    }

    //修改球队
    public function players_edit($p_id,$data){
        if(M('players')->where('p_id='.$p_id)->save($data)){
			D('admin_log')->admin_log('修改球队，ID为:'.$p_id);
            return true;
        }else{
            return false;
        }
    }
	
    //删除球队
    public function players_del($ids){
		if(M('players')->where('p_id in ('.$ids.')')->delete()){
			D('admin_log')->admin_log('删除球队，ID为:'.$ids);
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


    //获取球队列表
    public function get_players_list($limit){
        return M('players')->field(C('DB_PREFIX').'players.*,'.C('DB_PREFIX').'admin.admin_account')->join('left join '.C('DB_PREFIX').'admin ON '.C('DB_PREFIX').'players.admin_id = '.C('DB_PREFIX').'admin.admin_id')->limit($limit)->order('p_id asc')->select();		
    }



    //获得页数
    public function get_page($page){
        $total_num = M('players')->count();
        $total_page = ceil($total_num/$this->per_page);
        $cur_page = $page;
        $pre_page = $cur_page - 1;
        if($pre_page < 1) $pre_page = 1;
        $next_page = $cur_page + 1;
        if($next_page > $total_page) $next_page = $total_page;

        $purl = __ROOT__.'/index.php?m=zadmin&c=action&a=players_list&p=';

		$page_info .= '<span class="current">共'.$total_num.'记录--'.$total_page.'页</span>';
        $page_info .= '<a href="'.$purl.'1">首页</a>';
        $page_info .= '<a href="'.$purl.$pre_page.'">上一页</a>';
        $page_info .= '<span class="current">'.$cur_page.'</span>';
        $page_info .= '<a href="'.$purl.$next_page.'">下一页</a>';
        $page_info .= '<a href="'.$purl.$total_page.'">尾页</a>';

        return $page_info;
    }

	

	

	
}