<?php
namespace Admin\Controller;
use Think\Controller;

/**
 *后台权限控制器 
 */

class AuthController extends CommonController{
	/**
	 * 管理员列表
	 * @return [type] [description]
	 */
	public function managerList(){
		$info = M('Manager')->field('mg_id,mg_name,mg_email,mg_register_date,mg_loading_date,mg_role')->select();
		$role = M('Role')->getField('role_id,role_name');
		if($info && $role){
			foreach ($info as $value) {
				$value['mg_role'] = $role[$value['mg_role']];
				$value['mg_register_date'] = date('Y-m-d H:i:s',$value['mg_register_date']);
				$value['mg_loading_date'] = date('Y-m-d H:i:s',$value['mg_loading_date']);
				$list[] = $value;
			}
		}
		$this->assign('list',$list);
		$this->display();
	}

	/**
	 * 管理员添加
	 * @return [type] [description]
	 */
	public function managerAdd(){
		if(IS_POST){
			$info = I('post.');
			$info['mg_pwd'] = md5($info['mg_pwd'] . 'salt');//登录密码加盐处理
			$info['mg_register_date'] = time();
			if(M('Manager')->add($info)){
				$this->success('添加成功',U('Auth/managerList'));
				exit();
			} else {
				$this->error('添加失败');
			}
		}
		$role_list = M('Role')->getField('role_id,role_name');
		$this->assign('role_list',$role_list);
		$this->display();
	}

	/**
	 * 管理员修改
	 * @return [type] [description]
	 */
	public function managerEdit(){
		if(IS_POST){
			$info = I('post.');
			$id = I('post.mg_id',0);
			if(empty($info['mg_pwd'])){
				$res1 = M('Manager')->where("mg_id = $id")->field('mg_email,mg_role')->save($info);
			} else {
				$info['mg_pwd'] = md5($info['mg_pwd'] . 'salt');
				$res2 = M('Manager')->where("mg_id = $id")->field('mg_email,mg_pwd,mg_role')->save($info);
			}
			if($res1 || $res2){
				$this->success('修改成功',U('Auth/managerList'));
				exit();
			} else {
				$this->error('修改失败');
			}
		}
		$id = I('get.mg_id', 0);
		$list = M('Manager')->field('mg_id,mg_name,mg_pwd,mg_email,mg_role')->find($id);
		$list['mg_id'] = $id;
		$role = M('Role')->getField('role_id,role_name');
		$str = ''; //下拉框选项
		foreach ($role as $key => $value) {
			if($key == $list['mg_role']){
				$str_select = " selected='selected' ";
			} else {
				$str_select = ''; //是否默认选中
			}
			$str .= "<option value=$key $str_select>$value</option>";
		}
		$this->assign('str', $str);
		$this->assign('list', $list);
		$this->display();
	}

	/**
	 * 管理员删除
	 * @return [type] [description]
	 */
	public function managerDel(){
		$id= I('get.mg_id', 0);
		if(M('Manager')->delete($id) && $id != 1){
			$this->success('删除成功',U('Auth/managerList'));
		} else {
			$this->error('删除失败');
		}
	}

	/**
	 * 角色列表
	 * @return [type] [description]
	 */
	public function roleList(){
		$list = M('Role')->field('role_id,role_name,role_desc')->select();
		$this->assign('list',$list);
		$this->display();
	}

	/**
	 * 权限列表
	 * @return [type] [description]
	 */
	public function authList(){
		$p_auth = M('Auth')->where('auth_level = 0')->select();
		$s_auth = M('Auth')->where('auth_level = 1')->select();

		$this->assign('p_auth',$p_auth);
		$this->assign('s_auth',$s_auth);
		$this->display();
	}

	public function authAdd(){
		if(IS_POST){
			$info = I('post.');
			$info['auth_level'] = $info['auth_pid'] != 0 ? 1 : 0;
			if(M('Auth')->add($info)){
				$this->success('添加成功',U('Auth/authList'));exit();
			} else {
				$this->error('添加失败');
			}
		}
		$auth_opt = M('Auth')->where('auth_level = 0')->field('auth_id,auth_name')->select();
		$this->assign('auth_opt',$auth_opt);
		$this->display();
	}

	public function authDel(){
		$id = I('get.auth_id',0);
		if(M('Auth')->where("auth_pid = $id")->count()){
			$this->error('删除失败，请先删除子权限！');
		} else {
			if(M('Auth')->where("auth_id = $id")->delete()){
				$this->success('删除成功', U('Auth/authList'));exit();
			} else {
				$this->error('删除失败');
			}
		}
	}

	public function authEdit(){
		if(IS_POST){
			$data = I('post.');
			$id = $data['auth_id'];
			$data['auth_level'] = $data['auth_pid'] != 0 ? 1 : 0;
			if(M('Auth')->where("auth_id = $id")->save($data)){
				$this->success('修改成功',U('Auth/authList'));exit();
			} else {
				$this->error('修改失败');
			}
		}
		
		$id = I('get.auth_id',0);
		$info = M('Auth')->where("auth_id = $id")->find();
		$info['auth_id'] = $id;
		$p_auth = M('Auth')->where('auth_level = 0')->getField('auth_id,auth_name');
		$p_id = M('Auth')->where("auth_id = $id")->getField('auth_pid');

		$this->assign('info',$info);
		$this->assign('p_list',$p_auth);
		$this->assign('p_id', $p_id);
		$this->assign('str',$str);
		$this->display();
	}

	public function roleAdd(){
		if(IS_POST){
			$info = I('post.');
			$info['role_auth_list'] = implode(',', $info['auth']);
			if(M('Role')->add($info)){
				$this->success('添加成功', U('Auth/roleList'));exit();
			} else {
				$this->error('添加失败');
			}
		}
		$p_auth = M('Auth')->where('auth_level = 0')->field('auth_id,auth_name')->select();
		$s_auth = M('Auth')->where('auth_level = 1')->field('auth_id,auth_name,auth_pid')->select();
		$this->assign('p_auth',$p_auth);
		$this->assign('s_auth',$s_auth);
		$this->display();
	}

	public function roleDel(){
		$id = I('get.role_id',0);
		$res = M('Manager')->where("mg_role = $id")->count();
		if($res == 0){
			if(M('Role')->where("role_id = $id")->delete()){
				$this->success('删除成功', U('Auth/roleList'));
			} else {
				$this->error('删除失败');
			}
		} else {
			$this->error('删除失败，请先删除成员！');
		}
	}

	public function roleEdit(){
		if(IS_POST){
			$data = I('post.');
			$data['role_auth_list'] = implode(',', $data['auth']);
			if(M('Role')->save($data)){
				$this->success('修改成功', U('Auth/roleList'));exit();
			} else {
				$this->error('修改失败');
			}
		}
		$id = I('get.role_id',0);
		$info = M('Role')->where("role_id = $id")->find();
		$info['role_id'] = $id;
		$info['role_auth_list'] = explode(',', $info['role_auth_list']);
		$p_auth = M('Auth')->where('auth_level = 0')->field('auth_id,auth_name')->select();
		$s_auth = M('Auth')->where('auth_level = 1')->field('auth_id,auth_name,auth_pid')->select();
		
		$this->assign('info',$info);
		$this->assign('p_auth',$p_auth);
		$this->assign('s_auth',$s_auth);
		$this->display();
	}
}