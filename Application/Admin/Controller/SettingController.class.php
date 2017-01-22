<?php
namespace Admin\Controller;
use Think\Controller;

/**
 *后台站点设置控制器
 */
class SettingController extends CommonController{
	public function index(){
		if(IS_POST){
			$info = I('post.');
			$config = array(    
				'maxSize'    =>    3145728,
				'rootPath'   =>    './',
			    'savePath'   =>    '/Public/Uploads/Setting/',    
			    'saveName'   =>    array('uniqid',''),    
			    'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),    
			    'autoSub'    =>    true,    
			    'subName'    =>    array('date','Ymd'),
			    );
			$upload = new \Think\Upload($config);// 实例化上传类
			$result = $upload->uploadOne($_FILES['set_logo']);
			if(!$result){//上传错误，提示错误信息
				$this->error($upload->getError());
			} else { //上传成功，获取文件上传信息
				$info['set_logo'] = $result['savepath'] . $result['savename'];
			}
			$info['set_id'] = intval($info['set_id']);
			// var_dump($info);exit;
			if(M('Setting')->save($info)){
				$this->success('修改成功', U('Setting/index'));
				exit();
			} else {
				$this->error('修改失败');
			}
		}
		$list = M('Setting')->find();

		$this->assign('list',$list);
		$this->display();
	}
}