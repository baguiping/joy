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
		}
		else{
			$("#userpwdErr").html("");
			$("#userpwdErr").css("display","none");
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
		if(username != ""){
			$.ajax({ 
				type:"POST",   
				url:"__URL__/checkusername",//路径  
				data:"username="+username, 
				success:function (result)
				{
					 if(result.status ==1)
					 {
						$("#usernameErr").html("用户名不能重复,请重新输入！");
						$("#usernameErr").css("display","inline");
						$("#username").focus();
						alert("false");
						return false;
					 }
					 else
					 {
						$("#usernameErr").html("");
						$("#usernameErr").css("display","none");
						document.getElementById("addform").submit();
						return true;
					 }
				}  
			});
		}	
	}
	

</script>
</head>
<body>
<div>
<div style="height:630px;overflow-y:auto;">
<form onsubmit="" method="post" id="addform" name ="addform" action="<?php echo U('User/usersave');?>">
     <div class="item">
     <span class="title">用户名称:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="username" id="username"><span class="lr" id="usernameErr"></span>
   </div>
 	 <div class="item">
     <span class="title">用户密码:</span>
     <input type="password"  class="text_2" value="" maxlength="20" name="userpwd" id="userpwd"><span class="lr" id="userpwdErr"></span>
   </div>
   
   <div class="item">
     <span class="title">确认密码:</span>
     <input type="password"  class="text_2" value="" maxlength="20" name="repwd" id="repwd"><span class="lr" id="repwdErr"></span>
   </div>
   <div class="item">
     <span class="title">手机号码:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="phone" id="phone">
   </div>
	<div class="item">
		<span class="title">选择角色:</span>
		<select name="role" id="role" onchange="chgrole(this.options[this.options.selectedIndex].value)">
		<option value="1">管理员</option>
		<option value="2"  selected = selected>用户</option>
		</select>
	</div>
	<div class="item" id="disnateadmin">
     <span class="title">指定管理员:</span>
	 <select name="admin" id="admin">
		<option value="0"><span style="color:gray;">--默认--</span></option>	
		<?php if(is_array($adminlist)): $i = 0; $__LIST__ = $adminlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["userid"]); ?>"><?php echo ($vo["username"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
   </div>
    <div class="item">
     <span class="title">备注:</span>
     <input type="text"  class="text_2" value="" name="remark" id="remark">
   </div> 
<div style="height:40px;text-align:right;" class="item">
<input type="button" style="margin-top:30px;margin-right:150px;" class="submit_1" value="提交" onclick="submitForm()" id= "subbtn" >
</div>
</form>
</div>
</div>
</body>
</html>