<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="/Public/css/pintuer.css">
<link rel="stylesheet" href="/Public/css/admin.css">
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/pintuer.js"></script>
</head>
<body>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 管理员列表</strong> <a href="<?php echo U('Class/classList');?>" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="<?php echo U('Auth/managerAdd');?>"> 管理员添加</a> </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="70" style="text-align:left; padding-left:20px;">ID</th>
        <th width="10%">用户名</th>
        <th width="15%">所属角色</th>
        <th>Email地址</th>
        <th width="15%">注册时间</th>
        <th width="15%">最近登录时间</th>
        <th width="15%">操作</th>
      </tr>
      <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
          <td style="text-align:left; padding-left:20px;"><?php echo ($v['mg_id']); ?></td>
          <td><?php echo ($v['mg_name']); ?></td>
          <td><?php echo ($v['mg_role']); ?></td>
          <td><?php echo ($v['mg_email']); ?></td>
          <td><?php echo date('Y-m-d H:i:s' ,$v['mg_register_date']);?></td>
          <td><?php echo ($v['mg_loading_date']); ?></td>
          <td>
          	<div class="button-group"> 
          	<a class="button border-main" href="<?php echo U('Auth/managerEdit',array('mg_id'=>$v['mg_id']));?>">
          		<span class="icon-edit"></span> 修改</a>
          	<?php if($v['mg_name'] != 'admin'): ?><a class="button border-red" href="<?php echo U('Auth/managerDel',array('mg_id'=>$v['mg_id']));?>" onclick="return confirm('你确定要删除这条记录吗？')"><span class="icon-trash-o"></span> 删除</a> </div></td><?php endif; ?>
        </tr><?php endforeach; endif; ?>
    </table>
  </div>
</form>
</body>
</html>