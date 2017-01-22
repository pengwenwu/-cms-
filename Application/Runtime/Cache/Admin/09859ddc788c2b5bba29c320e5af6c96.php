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
    <div class="panel-head"><strong class="icon-reorder"> 角色列表</strong> <a href="<?php echo U('Class/classList');?>" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="<?php echo U('Auth/roleAdd');?>"> 角色添加</a> </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="5%" style="text-align:left; padding-left:20px;">ID</th>
        <th width="20%">角色名</th>
        <th>描述</th>
        <th width="15%">操作</th>
      </tr>
      <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
          <td style="text-align:left; padding-left:20px;"><?php echo ($v['role_id']); ?></td>
          <td><?php echo ($v['role_name']); ?></td>
          <td><?php echo ($v['role_desc']); ?></td>
          <td>
            <?php if($v['role_id'] == 1): ?><div class="button-group"> 
            <a class="button border-main">
              <span class="icon-edit"></span> 无法编辑</a>
            </div>
            <?php else: ?>
            <div class="button-group"> 
          	<a class="button border-main" href="<?php echo U('Auth/roleEdit',array('role_id'=>$v['role_id']));?>">
          		<span class="icon-edit"></span> 修改</a>
          	<a class="button border-red" href="<?php echo U('Auth/roleDel',array('role_id'=>$v['role_id']));?>" onclick="return confirm('你确定要删除这条记录吗？')"><span class="icon-trash-o"></span> 删除</a> 
            </div><?php endif; ?>
          </td>
        </tr><?php endforeach; endif; ?>
    </table>
  </div>
</form>
</body>
</html>