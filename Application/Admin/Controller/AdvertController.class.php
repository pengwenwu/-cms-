<?php
namespace Admin\Controller;

class AdvertController extends CommonController{
	public function advertList(){
		$info = M('Advert')->select();
		$this->assign('info', $info);
		$this->display();
	}

	public function advertAdd(){
		if(IS_POST){
			$info = I('post.');
			$info['adv_date'] = strtotime($info['adv_date']);
			if(M('Advert')->add($info)){
				$this->success('添加成功',U('Advert/advertList'));exit();
			} else {
				$this->error('添加失败');
			}
		}
		$this->display();
	}

	public function advertEdit(){
		if(IS_POST){
			$data = I('post.');
			$data['adv_date'] = strtotime($data['adv_date']);
			if(M('Advert')->save($data)){
				$this->success('修改成功', U('Advert/advertList'));exit();
			} else {
				$this->error('修改失败');
			}
		}
		$id = I('get.adv_id',0);
		$info = M('Advert')->find($id);
		$this->assign('info',$info);
		$this->display();
	}

	public function advertDel(){
		$id = I('get.adv_id',0);
		if(M('Advert')->delete($id)){
			$this->success('删除成功', U('Advert/advertList'));exit();
		} else {
			$this->error('删除失败');
		}
	}
}