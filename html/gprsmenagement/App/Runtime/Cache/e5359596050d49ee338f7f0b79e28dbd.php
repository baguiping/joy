<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>修改维护信息</title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<script type="text/javascript">	
</script>
</head>
<body>
<div>
<div style="height:250px;overflow-y:auto;">
<form onSubmit="" method="post" name ="addform" action="">
   <div class="item">
		<span class="title">保养类型:</span>
		<select name="type" id="type" disabled="disabled" style="width:180px;">
		<option value="0" selected="true">定期保养</option>
		<option value="1">更换机油</option>
		<option value="2">轮胎检查</option>
		<option value="3">刹车检查</option>
		</select>
	</div>
	<div class="item">
     <span class="title">提醒时间间隔:</span>
     <input type="text"  class="text_2" value="30" maxlength="20" name="intervaltime" id="intervaltime"> (天)
   </div>
<div style="height:40px;text-align:right;" class="item">
<input type="submit" style="margin-top:30px;margin-right:150px;" class="submit_1" value="提交" id= "submit" >
</div>
</form>
</div>
</div>
</body>
</html>