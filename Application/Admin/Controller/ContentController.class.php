<?php
namespace Admin\Controller;

/**
* 后台内容控制器
*/
class ContentController extends CommonController
{
	public function columnList(){
		$p_list = M('Column')->where('col_level=0')->order('col_order_by')->select();
		$s_list = M('Column')->where('col_level=1')->order('col_order_by')->select();
		$this->assign('p_list',$p_list);
		$this->assign('s_list',$s_list);
		$this->display('columnList');
	}

	public function columnAdd(){
		if(IS_POST){
			$info = I('post.');
			$info['col_level'] = $info['col_pid'] == 0 ? 0 : 1;
			if(M('Column')->add($info)){
				$this->success('添加成功', U('Content/columnList'));exit();
			} else {
				$this->error('添加失败');
			}
		}
		$p_list = M('Column')->where('col_level=0')->order('col_order_by')->getField('col_id,col_name');
		$this->assign('p_list',$p_list);
		$this->display();
	}

	public function columnDel(){
		$id = I('get.column_id',0);
		$res = M('Column')->where("col_pid = $id")->count();
		if($res == 0){
			if(M('Column')->delete($id)){
				$this->success('删除成功', U('Content/columnList'));
			} else {
				$this->error('删除失败');
			}
		} else {
			$this->error('删除失败，请先删除子栏目！');
		}
	}

	public function columnEdit(){
		if(IS_POST){
			$data = I('post.');
			$data['col_level'] = $data['col_pid'] == 0 ? 0 : 1;
			if(M('Column')->save($data)){
				$this->success('修改成功', U('Content/columnList'));exit();
			} else {
				$this->error('修改失败');
			}
		}

		$id = I('get.column_id',0);
		$p_list = M('Column')->where('col_level=0')->order('col_order_by')->getField('col_id,col_name');
		$p_id = M('Column')->where("col_id = $id")->getField('col_pid');
		$info = M('Column')->where("col_id = $id")->field('col_id,col_name,col_order_by,col_action')->find();
		$this->assign('p_id',$p_id);
		$this->assign('p_list',$p_list);
		$this->assign('info',$info);
		$this->display();
	}

	public function memberList(){
		$info1 = M('Member')->order('m_order_by')->select();
		foreach ($info1 as $value) {
			$value['m_desc'] = htmlspecialchars_decode($value['m_desc']);
			$info[] = $value;
		}
		$this->assign('page',$show);
		$this->assign('info',$info);
		$this->display();
	}

	public function memberAdd(){
		if(IS_POST){
			$info = I('post.');
			//处理数据
			//文件上传参数
			$config = array(    
				'maxSize'    =>    3145728,
				'rootPath'   =>    './',
			    'savePath'   =>    '/Public/Uploads/Member/',    
			    'saveName'   =>    array('uniqid',''),    
			    'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),    
			    'autoSub'    =>    true,    
			    'subName'    =>    array('date','Ymd'),
			    );
			$upload = new \Think\Upload($config);// 实例化上传类
			$result = $upload->uploadOne($_FILES['m_pic']);
			if(!$result){//上传错误，提示错误信息
				$this->error($upload->getError());
			} else { //上传成功，获取文件上传信息
				$info['m_pic'] = $result['savepath'] . $result['savename'];
			}

			if(M('Member')->add($info)){
				$this->success('添加成功', U('Content/memberList'));exit;
			} else {
				$this->error('添加失败');
			}
		}

		$this->display();
	}

	public function memberEdit(){
		if(IS_POST){
			$data = I('post.');
			$config = array(    
				'maxSize'    =>    3145728,
				'rootPath'   =>    './',
			    'savePath'   =>    '/Public/Uploads/Member/',    
			    'saveName'   =>    array('uniqid',''),    
			    'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),    
			    'autoSub'    =>    true,    
			    'subName'    =>    array('date','Ymd'),
			    );
			$upload = new \Think\Upload($config);// 实例化上传类
			$result = $upload->uploadOne($_FILES['m_pic']);
			if(!$result){//上传错误，提示错误信息
				$this->error($upload->getError());
			} else { //上传成功，获取文件上传信息
				$data['m_pic'] = $result['savepath'] . $result['savename'];
			}

			if(M('Member')->save($data)){
				$this->success('修改成功', U('Content/memberList'));exit();
			} else {
				$this->error('修改失败');
			}

		}

		$id = I('get.member_id',0);
		$info = M('Member')->find($id);
		$this->assign('info', $info);
		$this->display();
	}

	public function newsList(){
		$count = M('News')->count(); //总记录条数
		$Page = new \Think\Page($count,5);//实例化一个分页类
		$info = M('News')->order('n_date')->limit($Page->firstRow.','.$Page->listRows)->select();
		$show = $Page->show();

		$this->assign('page',$show);
		$this->assign('info',$info);
		$this->display();
	}

	public function newsAdd(){
		if(IS_POST){
			$info = I('post.');
			$info['n_date'] = strtotime($info['n_date']);
			if(M('News')->add($info)){
				$this->success('添加成功', U('Content/newsList'));exit();
			} else {
				$this->error('添加失败');
			}
		}
		$this->display();
	}

	public function newsEdit(){
		if(IS_POST){
			$data = I('post.');
			$data['n_date'] = strtotime($data['n_date']);
			if(M('News')->save($data)){
				$this->success('修改成功',U('Content/newsList'));exit();
			} else {
				$this->error('修改失败');
			}
		}

		$id = I('get.news_id',0);
		$info = M('News')->find($id);
		$this->assign('info',$info);
		$this->display();
	}

	public function newsDel(){
		$id = I('get.news_id',0);
		if(M('News')->delete($id)){
			$this->success('删除成功',U('Content/newsList'));
		} else {
			$this->error('删除失败');
		}
	}

	public function msgList(){
		$count = M('Message')->count(); //总记录条数
		$Page = new \Think\Page($count,5);//实例化一个分页类
		$info = M('Message')->order('m_date desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$show = $Page->show();

		$this->assign('page',$show);
		$this->assign('info',$info);
		$this->display();
	}

	//文件上传方法
	public function uploadQN(){
		$setting = C('UPLOAD_SITEIMG_QINIU');
	    $Upload = new \Think\Upload($setting);
	    $info = $Upload->upload($_FILES);
	    return Qiniu_Sign($info['file']['url']);
	}

	public function resourceList(){
		$count = M('Resource')->count(); //总记录条数
		$Page = new \Think\Page($count,5);//实例化一个分页类
		$info = M('Resource')->order('r_date desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$show = $Page->show();

		$this->assign('page',$show);
		$this->assign('info',$info);
		$this->display();
	}

	public function resourceAdd(){
		if(IS_POST){
			$info = I('post.');
			$info['r_date'] = strtotime($info['r_date']);
			$info['r_size'] = round($_FILES['file']['size']/2024,2) . 'kb';
 			$info['r_url'] = $this->uploadQN();
			if(M('Resource')->add($info)){
				$this->success('添加成功',U('Content/resourceList'));
				exit();
			} else {
				$this->error('添加失败');
			}
		}
		$this->display();
	}

	public function resourceEdit(){
		if(IS_POST){
			$data = I('post.');
			$data['r_date'] = strtotime($data['r_date']);
			$data['r_size'] = round($_FILES['file']['size']/2024,2) . 'kb';
 			$data['r_url'] = $this->uploadQN();
			if(M('Resource')->save($data)){
				$this->success('修改成功',U('Content/resourceList'));exit();
			} else {
				$this->error('修改失败');
			}
		}

		$id = I('get.res_id',0);
		$info = M('Resource')->find($id);
		$this->assign('info',$info);
		$this->display();
	}

	public function resourceDel(){
		$id = I('get.res_id',0);
		if(M('Resource')->delete($id)){
			$this->success('删除成功',U('Content/resourceList'));
		} else {
			$this->error('删除失败');
		}
	}
}