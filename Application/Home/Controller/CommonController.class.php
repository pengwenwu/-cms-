<?php
namespace Home\Controller;
use \Think\Controller;
use \Think\Cache\Driver\Redis;

class CommonController extends Controller{
	function __construct(){
		parent::__construct();
		$web_info = M('Setting')->find();
		$p_list = M('Column')->where('col_level = 0')->order('col_order_by')->select();
		
		$redis = new Redis();
 		$redis->select(0);
 		$redis->set('web_info',$web_info);
 		$redis->set('p_list', $p_list);

		$this->assign('p_list', $redis->get('p_list'));
    	$this->assign('web_info',$redis->get('web_info'));
	}
	
}