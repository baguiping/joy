<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>添加车辆信息</title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<script type="text/javascript">	
</script>
</head>
<body>
<div>
<div style="height:630px;overflow-y:auto;">
<form onSubmit="" method="post" name ="addform" action="">
    <div class="item">
     <span class="title">车牌号码:</span>				
		 <input class="text_2" name="vehicleno" type="text" id="vehicleno" style="width:180px">	 
   </div>
 	 <div class="item">
     <span class="title">所属车队:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="team" id="team">
   </div>
   <div class="item">
     <span class="title">终端编号:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="terminalid" id="terminalid">
   </div>
   <div class="item">
     <span class="title">SIM卡卡号:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="simno" id="simno">
   </div>
   <div class="item">
     <span class="title">MAC:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="mac" id="mac">
   </div>
   <div class="item">
     <span class="title">出厂时间:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="outtime" id="outtime">
   </div>
   <div class="item">
     <span class="title">车辆型号:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="model" id="model">
   </div>
   <div class="item">
		<span class="title">车辆颜色:</span>
		<select name="color" id="color">
		<option value="0">白色</option>
		<option value="1">红色</option>
		<option value="2">黑色</option>
		</select>
	</div>
   <div class="item">
     <span class="title">车架编号:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="frameno" id="frameno">
   </div>
   <div class="item">
     <span class="title">系统安装时间:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="setuptime" id="setuptime">
   </div>
   <div class="item">
     <span class="title">维护人姓名:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="nickname" id="nickname">
   </div>
   <div class="item">
     <span class="title">维护人联系方式:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="phone" id="phone">
   </div>
   <div class="item">
     <span class="title">叉车品牌:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="forklift" id="forklift">
   </div>
   <div class="item">
     <span class="title">备注:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="remark" id="remark">
   </div>
<div style="height:40px;text-align:right;" class="item">
<input type="submit" style="margin-top:30px;margin-right:150px;" class="submit_1" value="提交" id= "submit" >
</div>
</form>
</div>
</div>
</body>
</html>