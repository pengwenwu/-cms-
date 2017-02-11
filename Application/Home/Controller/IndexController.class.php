<?php
namespace Home\Controller;

class IndexController extends CommonController {
    public function index(){
    	$info = M('Class')->field('c_id,c_name,c_desc,c_pic')->where('c_level = 1')->order('c_order_by,c_date desc')->limit(6)->select();
        $advert_list = M('Advert')->order('adv_date desc')->limit(3)->select();
        $class_list = M('Class')->where('c_level = 1')->field('c_name')->order('c_date desc')->limit(3)->select();

        $this->assign('class_list',$class_list);
        $this->assign('adv_list', $advert_list);
    	$this->assign('info',$info);
    	$this->display();
    }

    public function about(){
    	$info = M('Setting')->field('set_content')->find();
    	$info['set_content'] = htmlspecialchars_decode($info['set_content']);
        $member_list1 = M('Member')->order('m_order_by')->select();
    	$member_list2 = M('Member')->order('m_order_by')->limit(4)->select();
        $news_list = M('News')->order('n_count desc')->limit(10)->select();
        foreach ($member_list1 as $value) {
            $value['m_desc'] = htmlspecialchars_decode($value['m_desc']);
            $member_list[] = $value;
        }

        $this->assign('news_list',$news_list);
    	$this->assign('info',$info);
        $this->assign('member_list',$member_list);
		$this->assign('member_list2',$member_list2);
    	$this->display();
    }

    public function contact(){
         if(IS_POST){
            $info = I('post.');
            $info['m_date'] = time();
            if(!empty($info['m_name']) && !empty($info['m_email']) && !empty($info['m_content']) && M('Message')->add($info)){
                $js = <<<EOF
                <script tpye='text/javascript'>
                alert('提交成功');
                </script>
EOF;
            echo $js;

            } else {
                $js = <<<EOF
                <script tpye='text/javascript'>
                alert('提交失败');
                </script>
EOF;
            echo $js;
            }
        }
        
    	$info = M('Setting')->field('set_addr,set_email,set_qq,set_tel')->find();
    	$this->assign('info',$info);
    	$this->display();
    }

    public function classes(){
        $id = I('get.class_id',0);
        $c_arr = M('Class')->where('c_level = 1')->order('c_date desc')->getField('c_id',true);
        if(in_array($id, $c_arr)){
            $info = M('Class')->field('c_id,c_name,c_pid,c_content,c_date,c_author,c_count')->find($id);
            $info['c_count']++;
            M('Class')->where("c_id = $id")->setField('c_count',$info['c_count']);
        } else {
            $info = M('Class')->field('c_id,c_name,c_pid,c_content,c_date,c_author,c_count')->find($c_arr[0]);
            $info['c_count']++;
            M('Class')->where("c_id = $c_arr[0]")->setField('c_count',$info['c_count']);
        }
        $p_list = M('Class')->where('c_level=0')->getField('c_id,c_name');
        $info['c_pname'] = $p_list[$info['c_pid']];
        $info['c_content'] = htmlspecialchars_decode($info['c_content']);

        $p_title = M('Class')->where('c_level = 0')->order('c_order_by')->select();
        $s_title = M('Class')->where('c_level = 1')->order('c_order_by')->select();
        $this->assign('info',$info);
        $this->assign('p_title',$p_title);
        $this->assign('s_title',$s_title);
        $this->display();
    }

    public function news(){
        $id = I('get.news_id',0);
        $info = M('News')->find($id);
        $info['n_content'] = htmlspecialchars_decode($info['n_content']);
        $info['n_count']++;
        M('News')->where("n_id = $id")->setField('n_count',$info['n_count']);
        
        $list = M('News')->order('n_date desc')->limit(15)->select();
        $this->assign('list',$list);
        $this->assign('info',$info);
        $this->display();
    }

    public function download(){
        $info = M('Resource')->order('r_date desc')->select();
        $this->assign('info',$info);
        $this->display();
    }
}