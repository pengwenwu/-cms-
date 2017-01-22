<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>  
    <link rel="stylesheet" href="/Public/css/pintuer.css">
    <link rel="stylesheet" href="/Public/css/admin.css">
    <script src="/Public/js/jquery.js"></script>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
  <h1><img src="/Public/images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />欢迎您：<?php echo ($admin_info['mg_name']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;后台管理中心</h1>
  </div>
  <div class="head-l">
    <a class="button button-little bg-green" href="<?php echo U('Home/Index/index');?>">
      <span class="icon-home"></span> 前台首页
    </a> &nbsp;&nbsp;
    <a href="##" class="button button-little bg-blue">
      <span class="icon-wrench"></span> 清除缓存
    </a> &nbsp;&nbsp;
    <a class="button button-little bg-red" href="<?php echo U('Admin/logout');?>">
      <span class="icon-power-off"></span> 退出登录
    </a>
  </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <?php if(is_array($p_menu_list)): foreach($p_menu_list as $key=>$v1): ?><h2><span class="icon-user"></span> <?php echo ($v1["auth_name"]); ?></h2>
    <ul>
      <?php if(is_array($s_menu_list)): foreach($s_menu_list as $key=>$v2): if($v2['auth_pid'] == $v1['auth_id']): ?><li><a href="<?php echo U($v2['auth_c_a']);?>" target="right"><span class="icon-caret-right"></span><?php echo ($v2["auth_name"]); ?></a></li><?php endif; endforeach; endif; ?>
  </ul><?php endforeach; endif; ?>
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="<?php echo U('Index/right');?>" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
  <li><b>当前语言：</b><span style="color:red;">中文</span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="<?php echo U('Index/right');?>" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>