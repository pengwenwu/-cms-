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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>公告修改</strong>
    
  </div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Advert/advertEdit');?>">  
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo ($info['adv_name']); ?>" name="adv_name" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>发布时间：</label>
        </div>
        <div class="field"> 
          <script src="/Public/js/laydate/laydate.js"></script>
          <input type="text" class="laydate-icon input w50" name="adv_date" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" value="<?php echo date('Y-m-d H:i:s', $info['adv_date']);?>"  data-validate="required:日期不能为空" style="padding:10px!important; height:auto!important;border:1px solid #ddd!important;" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
        <input type="hidden" name="adv_id" value="<?php echo ($info['adv_id']); ?>">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body></html>