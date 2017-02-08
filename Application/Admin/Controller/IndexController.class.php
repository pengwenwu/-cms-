<?php
/**
 * 后台首页控制器
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Cache\Driver\Redis;
class IndexController extends CommonController {
    public function index(){
    	//需要根据管理员的权限显示不同的菜单列表
    	$admin_id = session('admin_id');
    	$admin_info = M('Manager')->where("mg_id='$admin_id'")->field('mg_name')->find();

    	$top_menus = M('Auth')->where('auth_level=0')->order('auth_order_by')->select();
    	$menu_list = M('Auth')->where('auth_level=1')->order('auth_order_by')->select();
        if(session('auth_list') !== '*'){
            $auth_list = explode(',',session('auth_list'));
            foreach ($top_menus as $value) {
                if(in_array($value['auth_id'], $auth_list)){
                    $p_menu_list[] = $value;
                }
            }
            foreach ($menu_list as $value) {
                if(in_array($value['auth_id'], $auth_list)){
                    $s_menu_list[] = $value;
                }
            }
        } else {
            $p_menu_list = $top_menus;
            $s_menu_list = $menu_list;
        }
        $redis = new Redis();
        $redis->select(0);
        $redis->set('p_menu_list', $p_menu_list);
        $redis->set('s_menu_list', $s_menu_list);
        $redis->set('admin_info', $admin_info);
        $this->assign('p_menu_list',$redis->get('p_menu_list'));
    	$this->assign('s_menu_list',$redis->get('s_menu_list'));
    	$this->assign('admin_info',$redis->get('admin_info'));
    	$this->display();
    }
        
    public function right(){
        $admin_id = session('admin_id');
        $admin_info = M('Manager')->where("mg_id='$admin_id'")->field('mg_name,mg_register_date,mg_loading_date,mg_loading_count,mg_loading_ip,mg_role')->find();
        $admin_info['mg_register_date'] = date('Y-m-d H:i:s',$admin_info['mg_register_date']);
        $admin_info['mg_loading_date'] = date('Y-m-d H:i:s',$admin_info['mg_loading_date']);
        $this->assign('admin_info',$admin_info);
        $this->display();
    }

    public function editPwd(){
        if(IS_POST){
            $info = I('post.');
            $old_pwd = md5($info['old_pwd'] . 'salt');
            $id = session('admin_id');
            $res = M('Manager')->field('mg_pwd')->where("mg_id = $id")->find();
            if($res && $old_pwd == $res['mg_pwd']){
                $data['mg_pwd'] = md5($info['renew_pwd'] . 'salt');
                if(M('Manager')->where("mg_id = $id")->save($data)){
                    $this->success('密码修改成功');
                    exit();
                } else {
                    $this->error('修改失败，请重输');
                }
            } else {
                $this->error('原密码错误!');
            }
        }
        $admin_name = session('admin_name');
        $this->assign('admin_name',$admin_name);
        $this->display();
    }
}