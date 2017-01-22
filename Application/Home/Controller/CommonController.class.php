<?php
namespace Home\Controller;
use \Think\Controller;

class CommonController extends Controller{
	function __construct(){
		parent::__construct();
		$web_info = M('Setting')->find();
		$p_list = M('Column')->where('col_level = 0')->order('col_order_by')->select();
		
		$this->assign('p_list', $p_list);
    	$this->assign('web_info',$web_info);
	}
	
}