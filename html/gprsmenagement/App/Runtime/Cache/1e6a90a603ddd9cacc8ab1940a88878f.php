<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title><?php echo (L("title")); ?></title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js"></script>
<script src="__ROOT__/Public/js/getCheck.js"></script>
<style type="text/css">

</style>
<script type="text/javascript">

function add_user() {
	var editUrl = "<?php echo U('PersonForkliftManage/addvehicle/');?>";
	parent.openDialog("添加车辆信息",400,530,editUrl,refreshPage,"");
} 

function refreshPage(){
   $("#form1").submit();
} 

</script>
</head>

<body> 

	<div class="main_right" style="margin-top:-13px;">
		<div class="right">
			<div class="data" style="height:580px;">
				<div class="operbutton">
				 <input id="cfg_btn" class="but_cfg" style="width:50px;" type="button" value="设置" onclick="" name="cfg_btn">
				</div>
				<table id="tdata" class="tableline" width="100%">
					<tr style="background-color:#FFF;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"><span style="margin-left:10px;">今天电池缺水</span></td>
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"><span style="margin-left:10px;">今天三级超速</span></td>
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"><span style="margin-left:10px;">今天车辆异常数量</span></td>
							</tr>
						<tr style="background-color:#ebebeb;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"><span style="margin-left:10px;">今天车辆超载情况</span></td>
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"><span style="margin-left:10px;">今天车辆在线数量</span></td>
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"><span style="margin-left:10px;">今天车辆碰撞情况</span></td>
						</tr>
						<tr style="background-color:#FFF;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"><span style="margin-left:10px;">今天车辆在线数量</span></td>
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"><span style="margin-left:10px;">今天一级报警次数</span></td>
							<td></td>
							</tr>
				</table>
				
		</div>
	</div>
</body>
</html>