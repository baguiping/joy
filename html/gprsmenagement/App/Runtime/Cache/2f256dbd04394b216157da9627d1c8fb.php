<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>添加组信息</title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js" type="text/javascript"></script>
<script type="text/javascript">	
function checkValue(){
		var groupname = $("#groupname").val();
		if(groupname == ""){
			$("#groupnameErr").html("组名称不能为空!");
			$("#groupnameErr").css("display","inline");
			$("#groupname").focus();
			return false;
		}else{
			$("#groupnameErr").html("");
			$("#groupnameErr").css("display","none");
		}
		return true;
}
</script>
</head>
<div style="height:630px;overflow-y:auto;">
<form onSubmit="return checkValue();" method="post" name ="addform" action="<?php echo U('Device/groupsave');?>">
	<div class="item">
     <span class="title"><span style="color:red;">* </span>组名称:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="groupname" id="groupname"><span class="lr" id="groupnameErr"></span>	
   </div>
 	 <div class="item">
     <span class="title">描述:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="remark" id="remark">
   </div>
<div style="height:40px;text-align:right;" class="item">
<input type="submit" style="margin-top:30px;margin-right:150px;" class="submit_1" value="提交" id= "submit" >
</div>
	</form>
</body>
</html>