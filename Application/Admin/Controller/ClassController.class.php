<?php
/**
 *后台课程控制器
 */
namespace Admin\Controller;
use Think\Controller;

class ClassController extends CommonController{
	/**
	 * 课程列表
	 * @return [type] [description]
	 */
	public function classList(){
		
		$count = M('Class')->where('c_level=1')->count(); //总记录条数
		$Page = new \Think\Page($count,5);//实例化一个分页类
		$list = M('Class')->where('c_level=1')->order('c_order_by,c_date desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$show = $Page->show();
		$parent_cat = M('Class')->where('c_level=0')->order('c_order_by,c_date desc')->getField('c_id,c_name');

		$this->assign('page',$show);
		$this->assign('p_cat',$parent_cat);
		$this->assign('list',$list);
		$this->display();
	}

	/**
	 * 课程添加
	 * @return [type] [description]
	 */
	public function classAdd(){
		if(IS_POST){
			$info = I('post.');
			$info = $this->classFormHandle($info);
			//处理数据之后插入
			if(M('Class')->add($info)){
				$this->success('课程添加成功',U('Class/classList'));exit();
			} else {
				$this->error('添加失败');
			}
		}

		$parent_cat = M('Class')->where('c_level=0')->order('c_order_by,c_date desc')->getField('c_id,c_name');
		$this->assign('p_cat',$parent_cat);
		$this->display();
	}

	/**
	 * 课程删除
	 * @return [type] [description]
	 */
	public function classDel(){
		$id= I('get.class_id', 0);
		$Class = M('Class');
		$res = $Class->delete($id);
		if($res){
			$this->success('删除成功',U('Class/classList'));
		} else {
			$this->error('删除失败',U('Class/classList'));
		}
	}

	/**
	 * 课程修改
	 * @return [type] [description]
	 */
	public function classEdit(){
		if(IS_POST){
			$info = I('post.');
			$info = $this->classFormHandle($info);
			//处理数据之后插入
			if(M('Class')->save($info)){
				$this->success('课程修改成功',U('Class/classList'));
				exit();
			} else {
				$this->error('修改失败');
			}
		}

		$id = I('get.class_id',0);
		$info = M('Class')->where("c_id=$id")->find();
		$parent_cat = M('Class')->where('c_level=0')->order('c_order_by,c_date desc')->getField('c_id,c_name');
		$p_id = M('Class')->where("c_id = $id")->getField('c_pid');
		//处理复选框
		$str_is_index = $info['c_is_index'] == 1 ? "checked= 'checked'" : ''; 
		$str_is_hot = $info['c_is_hot'] == 1 ? "checked= 'checked'" : ''; 
		$str_is_top = $info['c_is_top'] == 1 ? "checked= 'checked'" : ''; 

		//处理时间
		$info['c_date'] = date('Y-m-d H:i:s',$info['c_date']);
		$info['c_count'] = intval($info['c_count']);

		$this->assign('str_is_index', $str_is_index);
		$this->assign('str_is_hot', $str_is_hot);
		$this->assign('str_is_top', $str_is_top);
		$this->assign('str', $str);
		$this->assign('p_cat',$parent_cat);
		$this->assign('p_id', $p_id);
		$this->assign('info',$info);
		$this->display();
	}

	/**
	 * 课程分类列表
	 * @return [type] [description]
	 */
	public function cateList(){
		$count = M('Class')->where('c_level=0')->count(); //总记录条数
		$Page = new \Think\Page($count,5);//实例化一个分页类
		$list = M('Class')->field('c_id,c_name,c_order_by')->where('c_level=0')->order('c_order_by,c_date desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$show = $Page->show();
		$parent_cat = M('Class')->where('c_level=0')->order('c_order_by,c_date desc')->getField('c_id,c_name');

		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display();
	}

	/**
	 * 课程分类添加
	 * @return [type] [description]
	 */
	public function cateAdd(){
		$info = I('post.');
		if(!empty($info['c_name'])){
			$cat_list[] = array('c_name'=>$info['c_name'], 'c_order_by'=>$info['c_order_by'], 'c_date'=>time());
		}
		if(!empty($info['c_names'])){
			$arr = explode(PHP_EOL, $info['c_names']);
			foreach($arr as $v){
				$cat_list[] = array('c_name'=>$v, 'c_order_by'=>$info['c_order_by'], 'c_date'=>time());
			}
		}
		if(!empty($cat_list)){
			if(M('Class')->addAll($cat_list)){
				$this->success('添加成功',U('Class/cateList'));
			} else {
				$this->error('添加失败');
			}
		} else {
			$this->error('添加失败');
		}
		
	}

	/**
	 * 课程分类删除
	 * @return [type] [description]
	 */
	public function cateDel(){
		$id= I('get.cate_id', 0);
		$res = M('Class')->where("c_pid = $id")->count();
		if($res == 0){
			if(M('Class')->delete($id)){
				$this->success('删除成功',U('Class/cateList'));
			} else {
				$this->error('删除失败');
			}
		} else {
			$this->error('删除失败，请先删除子课程！');
		}
	}

	/**
	 * 课程分类修改
	 * @return [type] [description]
	 */
	public function cateEdit(){
		if(IS_POST){
			$data = I('post.');
			if(M('Class')->save($data)){
				$this->success('修改成功',U('Class/cateList'));
				exit();
			} else {
				$this->error('修改失败');
			}
		}
		$id = I('get.cate_id', 0);
		$info = M('Class')->where("c_id=$id")->field('c_name, c_order_by')->find();
		$info['c_id'] = $id;
		$this->assign('info',$info);
		$this->display();
	}

	/**
	 * 对课程信息表单提交数据的处理
	 * @param  [type] $info [description]
	 * @return [type]       [description]
	 */
	//严格来讲这里的不是一个操作方法，应该在模型层中处理
	public function classFormHandle($info){
		$info['c_pid'] = intval($info['c_pid']);
			//处理数据
			//文件上传参数
			$config = array(    
				'maxSize'    =>    3145728,
				'rootPath'   =>    './',
			    'savePath'   =>    '/Public/Uploads/Class/',    
			    'saveName'   =>    array('uniqid',''),    
			    'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),    
			    'autoSub'    =>    true,    
			    'subName'    =>    array('date','Ymd'),
			    );
			$upload = new \Think\Upload($config);// 实例化上传类
			$result = $upload->uploadOne($_FILES['c_pic']);
			if(!$result){//上传错误，提示错误信息
				$this->error($upload->getError());
			} else { //上传成功，获取文件上传信息
				$info['c_pic'] = $result['savepath'] . $result['savename'];
			}
			$info['c_date'] = strtotime($info['c_date']);
			$info['c_level'] = $info['c_pid'] == 0 ? 0 : 1;

			return $info;
	}
}