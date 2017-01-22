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
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 留言管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="10%">ID</th>
        <th width="10%">姓名</th>       
        <th width="10%">邮箱</th>
        <th>内容</th>
        <th width="15%">留言时间</th>
        <th width="10%">操作</th>       
      </tr>
      <?php if(is_array($info)): foreach($info as $key=>$v): ?><tr>
          <td><input type="checkbox" name="id[]" value="1" /><?php echo ($v['m_id']); ?></td>
          <td><?php echo ($v['m_name']); ?></td>
          <td><?php echo ($v['m_email']); ?></td>  
          <td><?php echo ($v['m_content']); ?></td>
          <td><?php echo date('Y-m-d H:i:s',$v['m_date']);?></td>
          <td><div class="button-group"> <a class="button border-red" href="<?php echo U('Content/msgDel',array('msg_id'=>$v['m_id']));?>" onclick="return confirm('确认删除吗？')"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr><?php endforeach; endif; ?>      
        
      <tr>
        <td colspan="6"><div class="pagelist"><?php echo ($page); ?></div></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">


$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body></html>