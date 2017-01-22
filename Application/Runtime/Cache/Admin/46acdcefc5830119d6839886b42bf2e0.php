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
<style type="text/css">
ul.group-list {
    width: 96%;min-width: 1000px; margin: auto 5px;list-style: disc outside none;
}
ul.group-list li {
    white-space: nowrap;float: left;
    width: 150px; height: 40px;
    padding: 3px 5px;list-style-type: none;
    list-style-position: outside;border: 0px;margin: 0px;
}
</style>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>角色添加</strong>
  </div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Auth/roleAdd');?>">  
      <table class="" style="width:100%;">
        <tr>
          <td style="font-weight: bold;">角色名称:</td>
          <td><input type="text" class="form-control" name="role_name" id="role_name" value=""></td>
          <td style="font-weight: bold;">角色描述:</td>
          <td><textarea rows="2" cols="50" name="role_desc"></textarea></td>
        </tr>
      </table>
      <h4 style="margin-top: 20px;"><b>权限分配：</b><input type="checkbox" onclick="checkAll()">全选</h4>
      
      <table class="tab2" style="width:100%;margin-top: 20px;">
        <?php if(is_array($p_auth)): foreach($p_auth as $key=>$v1): ?><tr style="height: 40px;line-height: 40px;">
            <td class="title left" style="padding-right:50px;">
              <b><?php echo ($v1['auth_name']); ?>：</b>
              <label class="right"><input type="checkbox" name="auth[]" value="<?php echo ($v1['auth_id']); ?>"></label>
            </td>
          </tr>
          <tr style="height: 40px;line-height: 40px;">
            <td>
              <ul class="group-list">
                <?php if(is_array($s_auth)): foreach($s_auth as $key=>$v2): if($v2['auth_pid'] == $v1['auth_id']): ?><li><label><input type="checkbox" name="auth[]" value="<?php echo ($v2['auth_id']); ?>"><?php echo ($v2['auth_name']); ?></label></li><?php endif; endforeach; endif; ?>
              </ul>
            </td>
          </tr><?php endforeach; endif; ?>
        <tr style="height:100px;line-height: 100px;">
          <td>
            <button class="button bg-main icon-check-square-o" type="reset" style="margin-left: 200px;"> 重置</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
          </td>
        </tr>
      </table>
      
    </form>
  </div>
</div>
<script type="text/javascript">
function checkAll(){
  $("input[name='auth[]']").each(function(){
    if (this.checked) {
      this.checked = false;
    }
    else {
      this.checked = true;
    }
  });
}
</script>
</body></html>