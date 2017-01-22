<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>网站信息</title>  
    <link rel="stylesheet" href="/Public/css/pintuer.css">
    <link rel="stylesheet" href="/Public/css/admin.css">
    <script src="/Public/js/jquery.js"></script>
    <script src="/Public/js/pintuer.js"></script>
    <script charset="UTF-8" src="/Public/js/editor/kindeditor-min.js"></script>
<script charset="UTF-8" src="/Public/js/editor/lang/zh_CN.js"></script>
<script>
  //加入在线编辑器
  var editor;
  KindEditor.ready(function(K) {
      editor = K.create('textarea[name="set_content"]', {
          allowFileManager : true
      });
  });
</script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 网站信息</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Setting/index');?>" enctype="multipart/form-data">
      <div class="form-group">
        <div class="label">
          <label>网站标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="set_title" value="<?php echo ($list['set_name']); ?>" data-validate="required:请输入网站标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站LOGO：</label>
        </div>
        <div class="field">
          <input type="text" id="url1" name="" class="input tips" style="width:25%; float:left;" value="<?php echo ($list['set_logo']); ?>"/>
          <input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传" onClick="javascript:uploadFile();">
          <input type="file" name='set_logo' id='file_upload' style="display: none">
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站域名：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="set_domain" value="<?php echo ($list['set_domain']); ?>" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站关键字：</label>
        </div>
        <div class="field">
          <textarea class="input" name="set_keywords" style="height:80px"><?php echo ($list['set_keywords']); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站描述：</label>
        </div>
        <div class="field">
          <textarea class="input" name="set_desc"><?php echo ($list['set_desc']); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站内容：</label>
        </div>
        <div class="field">
          <textarea class="input" name="set_content" style="width: 700px;height: 300px;visibility: hidden;"><?php echo ($list['set_content']); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>联系人：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="set_contacts" value="<?php echo ($list['set_contacts']); ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>手机：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="set_phone" value="<?php echo ($list['set_phone']); ?>"/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>电话：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="set_tel" value="<?php echo ($list['set_tel']); ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>QQ：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="set_qq" value="<?php echo ($list['set_qq']); ?>" data-validate="qq:输入合法QQ"/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>Email：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="set_email" value="<?php echo ($list['set_email']); ?>" data-validate="email:输入合法邮箱"/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>地址：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="set_addr" value="<?php echo ($list['set_addr']); ?>" />
          <div class="tips"></div>
        </div>
      </div>  
              
      <div class="form-group">
        <div class="label">
          <label>底部信息：</label>
        </div>
        <div class="field">
          <textarea name="set_footer" class="input" style="height:120px;"><?php echo ($list['set_footer']); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <input type="hidden" name="set_id" value="<?php echo ($list['set_id']); ?>">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
function uploadFile(){
  document.getElementById('file_upload').click();
}
document.getElementById("file_upload").onchange = function () {
    document.getElementById("url1").value = this.value;
};
</script>
</body></html>