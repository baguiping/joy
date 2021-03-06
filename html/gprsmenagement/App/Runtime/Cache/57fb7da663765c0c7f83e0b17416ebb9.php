<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>添加用户信息</title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js" type="text/javascript">
</script>
<script type="text/javascript">	
function chgrole(v){     
    if(v == 1){
		$("#disnateadmin").css("display","none");
	}
	else{
		$("#disnateadmin").css("display","block");
	}
}

function submitForm(){
		var username = $("#username").val();
		var userpwd = $("#userpwd").val();
		var repwd = $("#repwd").val();
		if(username == ""){
			$("#usernameErr").html("用户名不能为空!");
			$("#usernameErr").css("display","inline");
			$("#username").focus();
			return false;
		}else{
			$("#usernameErr").html("");
			$("#usernameErr").css("display","none");
		}
		if(userpwd == ""){
			$("#userpwdErr").html("用户密码不能为空!");
			$("#userpwdErr").css("display","inline");
			$("#userpwd").focus();
			return false;
		}else{
			$("#userpwdErr").html("");
			$("#userpwdErr").css("display","none");
		}
		if(repwd == ""){
			$("#repwdErr").html("确认密码不能为空!");
			$("#repwdErr").css("display","inline");
			$("#repwd").focus();
			return false;
		}else{
			$("#repwdErr").html("");
			$("#repwdErr").css("display","none");
		}		
		if(repwd != userpwd){
			$("#repwdErr").html("两次输入的密码不一致!");
			$("#repwdErr").css("display","inline");
			$("#repwd").focus();
			return false;
		}else{
			$("#repwdErr").html("");
			$("#repwdErr").css("display","none");
		}	
		return true;
	}
	
$(document).ready(	function()
{   
   if(<?php echo ($userinfo["role"]); ?> != 2)//只有用户需要指定管理员
   {
	   $("#disnateadmin").css("display","none");
   }
   else{
   var $optin=$( "#admin" ).find("option");
   var adminid = <?php echo ($userinfo["admin"]); ?>;
   for(var i = 0; i < $optin.length; i++) {
	  var opvalue = $optin.eq(i).attr("value");
	  if(opvalue == adminid)
	  {
		  $optin.eq(i).attr("selected",true);
		  break;
	  }
   }
   }
});
</script>
</head>
<body>
<div>
<div style="height:630px;overflow-y:auto;">
<form onsubmit="return submitForm()" method="post" name ="addform" action="<?php echo U('User/editsave');?>">
     <div class="item">
     <span class="title">用户名称:</span>
     <input type="text"  class="text_2" value="<?php echo ($userinfo["username"]); ?>" maxlength="20" name="username" id="username"><span class="lr" id="usernameErr"></span>
   </div>
    <div class="item">
     <span class="title">用户密码:</span>
     <input type="password"  class="text_2" value="<?php echo ($userinfo["password"]); ?>" maxlength="20" name="userpwd" id="userpwd"><span class="lr" id="userpwdErr"></span>
   </div>
   
   <div class="item">
     <span class="title">确认密码:</span>
     <input type="password"  class="text_2" value="<?php echo ($userinfo["password"]); ?>" maxlength="20" name="repwd" id="repwd"><span class="lr" id="repwdErr"></span>
   </div>
   
   <div class="item">
     <span class="title">手机号码:</span>
     <input type="text"  class="text_2" value="<?php echo ($userinfo["phone"]); ?>" maxlength="20" name="phone" id="phone">
   </div>
	<div class="item">
		<span class="title">选择角色:</span>
		<select name="role" id="role" disabled="true">
		
		<option value="1" <?php if($userinfo["role"] == 1): ?>selected="true"<?php endif; ?>>管理员</option>
		<option value="2" <?php if($userinfo["role"] == 2): ?>selected="true"<?php endif; ?>>用户</option>
		</select>
	</div>
	<div class="item" id="disnateadmin">
     <span class="title">指定管理员:</span>
	 <select name="admin" id="admin">
		<?php if(is_array($adminlist)): $i = 0; $__LIST__ = $adminlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["userid"]); ?>" ><?php echo ($vo["username"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
	</div> 
    <div class="item">
     <span class="title">备注:</span>
     <input type="text"  class="text_2" value="<?php echo ($userinfo["remark"]); ?>" name="remark" id="remark">
   </div> 
<div style="height:40px;text-align:right;" class="item">
 <input type="hidden"  class="text_2" value="<?php echo ($userinfo["role"]); ?>" name="userrole" id="userrole">
 <input type="hidden"  class="text_2" value="<?php echo ($userinfo["userid"]); ?>"  name="userid" id="userid">
<input type="submit" style="margin-top:30px;margin-right:150px;" class="submit_1" value="提交" id= "submit" >
</div>
</form>
</div>
</div>
</body>
</html>