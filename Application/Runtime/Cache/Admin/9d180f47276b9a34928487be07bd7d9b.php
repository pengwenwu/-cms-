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
    <div class="panel-head"><strong class="icon-reorder"> 权限列表</strong> <a href="<?php echo U('Class/classList');?>" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="<?php echo U('Auth/authAdd');?>"> 权限添加</a> </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="10%">ID</th>
        <th width="20%" style="text-align: left;">权限名</th>
        <th width="20%" style="text-align: left;">操作/方法</th>
        <th width="15%">分类等级</th>
        <th width="15%">排序</th>
        <th width="15%">操作</th>
      </tr>
      <?php if(is_array($p_auth)): foreach($p_auth as $key=>$v1): ?><tr>
          <td><?php echo ($v1['auth_id']); ?></td>
          <td style="text-align: left;"><?php echo ($v1['auth_name']); ?></td>
          <td style="text-align: left;"><?php echo ($v1['auth_c_a']); ?></td>
          <td><?php echo ($v1['auth_level']); ?></td>
          <td><?php echo ($v1['auth_order_by']); ?></td>
          <td>
          	<div class="button-group"> 
          	<a class="button border-main" href="<?php echo U('Auth/authEdit',array('auth_id'=>$v1['auth_id']));?>">
          		<span class="icon-edit"></span> 修改</a>
          	<a class="button border-red" href="<?php echo U('Auth/authDel',array('auth_id'=>$v1['auth_id']));?>" onclick="return confirm('你确定要删除这条记录吗？')"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
        <?php if(is_array($s_auth)): foreach($s_auth as $key=>$v2): if($v2['auth_pid'] == $v1['auth_id']): ?><tr>
            <td><?php echo ($v2['auth_id']); ?></td>
            <td style="text-align: left;"><?php echo str_repeat('&nbsp;', $v2['auth_level']*10); echo ($v2['auth_name']); ?></td>
            <td style="text-align: left;"><?php echo ($v2['auth_c_a']); ?></td>
            <td><?php echo ($v2['auth_level']); ?></td>
            <td><?php echo ($v2['auth_order_by']); ?></td>
            <td>
              <div class="button-group"> 
              <a class="button border-main" href="<?php echo U('Auth/authEdit',array('auth_id'=>$v2['auth_id']));?>">
                <span class="icon-edit"></span> 修改</a>
              <a class="button border-red" href="<?php echo U('Auth/authDel',array('auth_id'=>$v2['auth_id']));?>" onclick="return confirm('你确定要删除这条记录吗？')"><span class="icon-trash-o"></span> 删除</a> </div></td>
            </tr><?php endif; endforeach; endif; endforeach; endif; ?>
    </table>
  </div>
</form>
</body>
</html>