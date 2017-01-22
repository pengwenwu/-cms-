<?php
namespace Admin\Controller;
use Think\Controller;
use Tools\Verify;

/**
 * 后台通用控制器
 */

class CommonController extends Controller{
	/**
	 * 构造方法
	 */
	function __construct(){
		parent::__construct();//调用父级构造方法，防止功能丢失
		$ctl = CONTROLLER_NAME;
		$act = ACTION_NAME;
		$allow_ac = array('Admin/login', 'Admin/verifyImg');
		$current_ac = $ctl . '/' . $act; //此时的执行操作
		$uneed_controller = array('Index'); //无需验证的控制器
		$uneed_action = array('login','verifyImg','logout'); //无需验证的操作方法

		//首先判断有没有登录标识（session和cookie同时存在）
		//其次，为了避免登录页面一直重定向，需要将登陆页面操作和验证码排除在外
		if((empty(session('admin_id')) || empty(cookie('admin_id'))) && in_array($act,$uneed_action) === false){ 
			$url = U('Admin/login');
			$js = <<<eof
			<script tpye='text/javascript'>
				parent.location.href="$url";
			</script>
eof;
			echo $js;
		} else if(session('admin_id') && cookie('admin_id') && in_array($ctl,$uneed_controller) === false && session('auth_list') !== '*'){ 
			//有登录标识后需要验证权限,排除首页,排除超级管理员
			$auth_list = explode(',',session('auth_list'));
			$res = M('Auth')->where("auth_c_a = '$current_ac'")->field('auth_id')->find();
			if($res && in_array($res['auth_id'], $auth_list) === false){ //没有查询到结果以及权限id不在list中
				$this->redirect('Index/index',array() , 3,'没有权限！！！');
			}
		}

		
	}

}