<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;

/**
 * 后台管理员控制器
 */
class AdminController extends CommonController{
	public function login(){
		if (IS_POST) {
			//验证码校验
			$admin_name = I('post.mg_name');
			$admin_pwd = md5(I('post.mg_pwd') . 'salt');
			$verify = new \Think\Verify();
			if ($verify -> check(I('post.code'))) {
				$res = M('Manager')->where("mg_name = '$admin_name'")->field('mg_id,mg_name,mg_pwd,mg_role,mg_loading_count')->find();
				if ($res && $admin_pwd === $res['mg_pwd']) { 
					//验证成功，给用户分配标识
					session('admin_id',$res['mg_id']);
					cookie('admin_id',$res['mg_id'],3600*6); //用来控制管理员的在线时间
					session('admin_name', $res['mg_name']);
					$id = $res['mg_role'];
					$auth_list = M('Role')->field('role_auth_list')->where("role_id = $id")->find();
					session('auth_list',$auth_list['role_auth_list']);

					//更新登录次数，以及登录时间
					$res['mg_loading_date'] = time();
					$res['mg_loading_count'] = $res['mg_loading_count'] + 1 ;
					M('Manager')->save($res);
					$this -> redirect('Index/index');
					exit();
				} else {
					$msg ='用户名或密码错误';
				}
			} else {
				$msg ='验证码错误';
			}
		} else {
			$msg = '';
		}
		
		$this->assign('msg',$msg);
		$this->display();
	}

	/**
	 * 验证码
	 * @return [type] [description]
	 */
	public function verifyImg(){
		$config = array(
	        'imageH'    =>  0,               // 验证码图片高度,为0自动计算
	        'imageW'    =>  0,               // 验证码图片宽度
	        'length'    =>  4,               // 验证码位数
	        'fontttf'   =>  '4.ttf',         // 验证码字体，不设置则随机获取
			);
		//实例化verify类对象，对象调用成员方法即可
		//$verify = new \Think\Verify($config);	//完全限定名称方式 元素访问
		$verify = new \Think\Verify($config);
		$verify -> entry();
	}

	function logout(){
		session(null);
		$this->redirect('Admin/login');
	}
}	