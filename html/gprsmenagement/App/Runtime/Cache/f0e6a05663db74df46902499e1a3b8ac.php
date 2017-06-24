<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>添加租赁司机</title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 


 <script type="text/javascript">
 
    </script>
</head>
<body>
<div>
<div style="height:630px;overflow-y:auto;">
<form onSubmit="" method="post" name ="addform" action="">
   <div class="item">
     <span class="title">姓名:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="nickname" id="nickname">
   </div>
   <div class="item">
     <span class="title">联系方式:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="phone" id="phone">
   </div>
   <div class="item">
     <span class="title">IC卡编号:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="ICNO" id="ICNO">
   </div>
   <div class="item">
		<span class="title">权限等级:</span>
		<select name="level" id="level" disabled="true">
		<option value="0">租赁管理员</option>
		<option value="1" selected="true">租赁司机</option>
		</select>
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