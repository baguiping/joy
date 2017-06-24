<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>修改人员信息</title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js" type="text/javascript"></script>
<script type="text/javascript">	
function checkValue(){
		var account = $("#account").val();
		var brithyday = $("#brithyday").val();
		var phoneno = $("#phoneno").val();
		var icno = $("#icno").val();
		if(account == ""){
			$("#accountErr").html("姓名不能为空!");
			$("#accountErr").css("display","inline");
			$("#account").focus();
			return false;
		}else{
			$("#accountErr").html("");
			$("#accountErr").css("display","none");
		}
		if(brithyday == ""){
			$("#brithydayErr").html("出生年月不能为空!");
			$("#brithydayErr").css("display","inline");
			$("#brithyday").focus();
			return false;
		}else{
			$("#brithydayErr").html("");
			$("#brithydayErr").css("display","none");
		}
		if(phoneno == ""){
			$("#phonenoErr").html("联系电话不能为空!");
			$("#phonenoErr").css("display","inline");
			$("#phoneno").focus();
			return false;
		}else{
			$("#phonenoErr").html("");
			$("#phonenoErr").css("display","none");
		}
		if(icno == ""){
			$("#icnoErr").html("IC卡编号不能为空!");
			$("#icnoErr").css("display","inline");
			$("#icno").focus();
			return false;
		}else{
			$("#icnoErr").html("");
			$("#icnoErr").css("display","none");
		}
		return true;
}

</script>
</head>
<body>
<div>
<div style="height:630px;overflow-y:auto;">
<form onSubmit="return checkValue();" method="post" name ="addform" action="">
    <div class="item">
     <span class="title"><span style="color:red;">* </span>姓名:</span>				
		 <input class="text_2" name="account" type="text" id="account" style="width:180px" value="张三"><span class="lr" id="accountErr"></span>	 	 
   </div>
 	 <div class="item">
     <span class="title"><span style="color:red;">* </span>出生年月:</span>
     <input type="text"  class="text_2" value="30" maxlength="20" name="brithyday" id="brithyday"><span class="lr" id="brithydayErr"></span>	 
   </div>
   <div class="item">
		<span class="title">性别:</span>
		<select name="name" id="name">
		<option value="0" selected="true">先生</option>
		<option value="1">女士</option>
		</select>
	</div>
	<div class="item">
     <span class="title">驾驶证信息:</span>
     <input type="text"  class="text_2" value="A类" maxlength="20" name="jiashizheng" id="jiashizheng">
   </div>
   <div class="item">
     <span class="title"><span style="color:red;">* </span>联系电话:</span>
     <input type="text"  class="text_2" value="13344556677" maxlength="11" name="phoneno" id="phoneno" onKeyUp="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)"><span class="lr" id="phonenoErr"></span>
   </div>
   <div class="item">
     <span class="title"><span style="color:red;">* </span>IC卡编号:</span>
     <input type="text"  class="text_2" value="123456" maxlength="20" name="icno" id="icno" onKeyUp="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)"><span class="lr" id="icnoErr"></span>
   </div>
   <div class="item">
		<span class="title">权限等级:</span>
		<select name="name" id="name">
		<option value="0" selected="true">管理员</option>
		<option value="1">司机</option>
		</select>
	</div>
	<div class="item">
     <span class="title">账户名称:</span>
     <input type="text"  class="text_2" value="aaaaa" maxlength="20" name="accountname" id="accountname">
   </div>
   <div class="item">
     <span class="title">账户密码:</span>
     <input type="password"  class="text_2" value="aaaaa" maxlength="20" name="password" id="password">
   </div>
  
   <div class="item">
     <span class="title">EMAIL:</span>
     <input type="text"  class="text_2" value="weichang@163.com" name="email" id="email">
   </div> 
    <div class="item">
     <span class="title">备注:</span>
     <input type="text"  class="text_2" value="" name="remark" id="remark">
   </div> 
<div style="height:40px;text-align:right;" class="item">
<input type="submit" style="margin-top:30px;margin-right:150px;" class="submit_1" value="提交" id= "submit" >
</div>
</form>
</div>
</div>
</body>
</html>