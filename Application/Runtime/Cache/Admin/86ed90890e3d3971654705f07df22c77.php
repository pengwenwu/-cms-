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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>权限修改</strong>
    
  </div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Auth/authEdit');?>">  
      <div class="form-group">
        <div class="label">
          <label>权限名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo ($info['auth_name']); ?>" name="auth_name" data-validate="required:请输入权限名" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>操作/方法：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo ($info['auth_c_a']); ?>" name="auth_c_a" data-validate="required:请输入操作方法" />
          <div class="tips">样例：Index/index;顶级权限：Index</div>
        </div>
      </div>
       <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo ($info['auth_order_by']); ?>" name="auth_order_by"/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>上级权限：</label>
        </div>
        <div class="field">
          <select name="auth_pid" class="input w50">
              <option value="0" <?php if($p_id == 0): ?>selected='selected'<?php endif; ?> >顶级分类</option>
            <?php if(is_array($p_list)): foreach($p_list as $k=>$v): ?><option value="<?php echo ($k); ?>" <?php if($p_id == $k): ?>selected='selected'<?php endif; ?> ><?php echo ($v); ?></option><?php endforeach; endif; ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <input type="hidden" name="auth_id" value="<?php echo ($info['auth_id']); ?>">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body></html>