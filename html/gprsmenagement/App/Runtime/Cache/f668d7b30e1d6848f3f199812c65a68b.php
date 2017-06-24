<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>添加用户信息</title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js" type="text/javascript">
</script>
<script type="text/javascript">	

$(document).ready(	function()
{
   var $optin=$( "#admin" ).find("option");
   var adminid = <?php echo ($deviceinfo["adminid"]); ?>;
   for(var i = 0; i < $optin.length; i++) {
	  var opvalue = $optin.eq(i).attr("value");
	  if(opvalue == adminid)
	  {
		  $optin.eq(i).attr("selected",true);
		  break;
	  }
   }
});
</script>
</head>
<body>
<div>
<div style="height:630px;overflow-y:auto;">
<form onsubmit="" method="post" name ="addform" action="<?php echo U('Device/editsave','id='.$deviceinfo['deviceid']);?>}">
     <div class="item">
     <span class="title"><span style="color:red;">* </span>IMEI:</span>
     <input type="text"  class="text_2" value="<?php echo ($deviceinfo["imei"]); ?>" maxlength="20" disabled="true" name="imei" id="imei"><span class="lr" id="imeiErr"></span>	
   </div>
	<div class="item" id="disnateadmin">
     <span class="title"><span style="color:red;">* </span>指定组:</span>
	 <select name="admin" id="admin">	
		<?php if(is_array($adminlist)): $i = 0; $__LIST__ = $adminlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["userid"]); ?>"> <?php echo ($vo["username"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
<div style="height:40px;text-align:right;" class="item">
<input type="submit" style="margin-top:30px;margin-right:150px;" class="submit_1" value="提交" id= "submit" >
</div>
</form>
</div>
</div>
</body>
</html>