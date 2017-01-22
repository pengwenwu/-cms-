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
    <div class="panel-head"><strong class="icon-reorder"> 栏目列表</strong></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="<?php echo U('Content/columnAdd');?>"> 栏目添加</a> </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="10%">ID</th>
        <th width="30%">栏目名称</th>
        <th width="30%">操作方法</th>
        <th width="10%">排序</th>
        <th width="15%">操作</th>
      </tr>
      <?php if(is_array($p_list)): foreach($p_list as $key=>$v1): ?><tr>
          <td><?php echo ($v1['col_id']); ?></td>
          <td style="text-align:left;"><?php echo ($v1['col_name']); ?></td>
          <td><?php echo ($v1['col_action']); ?></td>
          <td><input type="text" name="sort[1]" value="<?php echo ($v1['col_order_by']); ?>" style="width:50px; text-align:center; border:1px solid #ddd; padding:7px 0;" /></td>
          <td>
          	<div class="button-group"> 
          	<a class="button border-main" href="<?php echo U('Content/columnEdit',array('column_id'=>$v1['col_id']));?>">
          		<span class="icon-edit"></span> 修改</a> 
          	<a class="button border-red" href="<?php echo U('Content/columnDel',array('column_id'=>$v1['col_id']));?>" onclick="return confirm('你确定要删除这条记录吗？')"><span class="icon-trash-o"></span> 删除</a> </div></td>
	    </tr>
      	<?php if(is_array($s_list)): foreach($s_list as $key=>$v2): if($v2['col_pid'] == $v1['col_id']): ?><tr>
	         <td><?php echo ($v2['col_id']); ?></td>
	          <td style="text-align: left;"><?php echo str_repeat('&nbsp;', $v2['col_level']*10); echo ($v2['col_name']); ?></td>
	          <td><?php echo ($v2['col_action']); ?></td>
	          <td><input type="text" name="sort[1]" value="<?php echo ($v2['col_order_by']); ?>" style="width:50px; text-align:center; border:1px solid #ddd; padding:7px 0;" /></td>
	          <td>
	          	<div class="button-group"> 
	          	<a class="button border-main" href="<?php echo U('Content/columnEdit',array('column_id'=>$v2['col_id']));?>">
	          		<span class="icon-edit"></span> 修改</a> 
	          	<a class="button border-red" href="<?php echo U('Content/columnDel',array('column_id'=>$v2['col_id']));?>" onclick="return confirm('你确定要删除这条记录吗？')"><span class="icon-trash-o"></span> 删除</a> </div></td>
	        </tr><?php endif; endforeach; endif; endforeach; endif; ?>
    </table>
  </div>
</form>
<script type="text/javascript">

//搜索
function changesearch(){	
		
}

//单个删除
function del(id,mid,iscid){
	if(confirm("您确定要删除吗?")){
		
	}
}

//全选
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

//批量删除
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
		$("#listform").submit();		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}


//批量首页显示
function changeishome(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}

//批量推荐
function changeisvouch(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");	
		
		return false;
	}
}

//批量置顶
function changeistop(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}


//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		
		return false;
	}
}

//批量复制
function changecopy(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		var i = 0;
	    $("input[name='id[]']").each(function(){
	  		if (this.checked==true) {
				i++;
			}		
	    });
		if(i>1){ 
	    	alert("只能选择一条信息!");
			$(o).find("option:first").prop("selected","selected");
		}else{
		
			$("#listform").submit();		
		}	
	}
	else{
		alert("请选择要复制的内容!");
		$(o).find("option:first").prop("selected","selected");
		return false;
	}
}

</script>
</body>
</html>