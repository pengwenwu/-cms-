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
<script charset="UTF-8" src="/Public/js/editor/kindeditor-min.js"></script>
<script charset="UTF-8" src="/Public/js/editor/lang/zh_CN.js"></script>
<script>
  //加入在线编辑器
  var editor;
  KindEditor.ready(function(K) {
      editor = K.create('textarea[name="c_content"]', {
          allowFileManager : true
      });
  });
</script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>课程添加</strong>
    
  </div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Class/classAdd');?>" enctype="multipart/form-data">  
      <div class="form-group">
        <div class="label">
          <label>上级分类：</label>
        </div>
        <div class="field">
          <select name="c_pid" class="input w50">
            <option value="0">默认顶级分类</option>
            <?php if(is_array($p_cat)): foreach($p_cat as $k=>$v): ?><option value="<?php echo ($k); ?>"><?php echo ($v); ?></option><?php endforeach; endif; ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="c_name" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
          <input type="text" id="url1" name="img" class="input tips" style="width:25%; float:left;"  value=""/>
          <input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  style="float:left;" onClick="javascript:uploadFile();" >
          <input type="file" name='c_pic' id='file_upload' style="display: none">
          <div class="tipss">图片尺寸：500*500</div>
        </div>
      </div>         
        <div class="form-group">
          <div class="label">
            <label>其他属性：</label>
          </div>
          <div class="field" style="padding-top:8px;"> 
            首页 <input id="ishome"  name='c_is_index' value='1' type="checkbox" />
            推荐 <input id="isvouch" name='c_is_hot' value='1' type="checkbox" />
            置顶 <input id="istop" name='c_is_top' value='1' type="checkbox" /> 
          </div>
        </div>
      <div class="form-group">
        <div class="label">
          <label>描述：</label>
        </div>
        <div class="field">
          <textarea name="c_desc" style="width: 300px;height: 50px"></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
          <textarea name="c_content" style="width: 700px;height: 300px;visibility: hidden;"></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="c_order_by" value="50"  data-validate="number:排序必须为数字" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>发布时间：</label>
        </div>
        <div class="field"> 
          <script src="/Public/js/laydate/laydate.js"></script>
          <input type="text" class="laydate-icon input w50" name="c_date" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" value=""  data-validate="required:日期不能为空" style="padding:10px!important; height:auto!important;border:1px solid #ddd!important;" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>作者：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="c_author" value="佚名"  />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>点击次数：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="c_count" value="0" data-validate="member:只能为数字"  />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
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