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
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>管理员修改</strong>
    
  </div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Auth/managerEdit');?>">  
      <div class="form-group">
        <div class="label">
          <label>用户名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo ($list['mg_name']); ?>" name="mg_name" data-validate="required:请输入用户名" readonly="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>登录密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" value="" name="mg_pwd"/>
          <div class="tips">不修改密码则为空</div>
        </div>
      </div>
       <div class="form-group">
        <div class="label">
          <label>Email地址：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo ($list['mg_email']); ?>" name="mg_email" data-validate="email:请输入合法邮箱"/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>所属角色：</label>
        </div>
        <div class="field">
          <select name="mg_role" class="input w50">
            <?php echo ($str); ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <input type="hidden" name="mg_id" value="<?php echo ($list['mg_id']); ?>">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body></html>