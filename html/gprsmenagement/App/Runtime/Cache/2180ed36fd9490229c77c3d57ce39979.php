<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>修改电池信息</title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<script type="text/javascript">	
</script>
</head>
<body>
<div>
<div style="height:630px;overflow-y:auto;">
<form onSubmit="" method="post" name ="addform" action="">
     <div class="item">
     <span class="title">电池厂商:</span>
     <input type="text"  class="text_2" value="南孚" maxlength="20" name="batteryfactory" id="batteryfactory">
   </div>
 	 <div class="item">
     <span class="title">电池型号:</span>
     <input type="text"  class="text_2" value="SIZE 1" maxlength="20" name="batteryno" id="batteryno">
   </div>
   <div class="item">
     <span class="title">电池标称电压:</span>
     <input type="text"  class="text_2" value="1.5V" maxlength="20" name="batteryV" id="batteryV">
   </div>
   <div class="item">
     <span class="title">电池容量:</span>
     <input type="text"  class="text_2" value="10000A" maxlength="20" name="batterycapacty" id="batterycapacty">
   </div>
	<div class="item">
     <span class="title">电池形状:</span>
     <input type="text"  class="text_2" value="圆柱形" maxlength="20" name="batteryshape" id="batteryshape">
   </div>
   <div class="item">
     <span class="title">维护人员:</span>
     <input type="text"  class="text_2" value="王先生" maxlength="20" name="matenman" id="matenman">
   </div>
   <div class="item">
     <span class="title">维护人联系方式:</span>
     <input type="text"  class="text_2" value="13366666666" maxlength="20" name="phone" id="phone">
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