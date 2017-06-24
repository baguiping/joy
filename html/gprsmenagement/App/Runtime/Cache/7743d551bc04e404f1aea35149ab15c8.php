<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title><?php echo (L("title")); ?></title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<!--load href="../Public/style2.css"/-->
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js"></script>
<script src="__ROOT__/Public/js/getCheck.js"></script>
<style type="text/css">

</style>
<script type="text/javascript">

function add_lease() {
	var editUrl = "<?php echo U('Lease/addlease/');?>";
	parent.openDialog("添加租赁信息",400,530,editUrl,refreshPage,"");
} 

function refreshPage(){
   $("#form1").submit();
} 
function selvehicle() 
{
	 var editUrl = "<?php echo U('Lease/seldriverpage/');?>";
	 parent.openDialog("选择司机",400,600,editUrl,refreshPage,"");
}
</script>
</head>

<body> 

	<div class="main_right" style="margin-top:-14px;">
		<div class="right">
			<div id="owner_div">
				<form id="form1" method="post" action="" name="form1">
					<div class="owner_sub_div" style="margin:0px 0px 0px 5px;">
						车辆: <input id="vehicle" class="text_1" type="text" maxlength="32" value="" name="vehicle">
					</div>
					
					<div class="owner_sub_div" style="margin:0px 0px 0px 12px;">
						<input class="submit_1" type="submit" onclick="" value="查询">
					</div>
					</form>
					<br style="clear:both;">
			</div>
			<div class="data" style="height:580px;">
				
				<table id="tdata" class="tableline" width="100%">
					<thead hasbox="2">
						<tr class="trcenter" hasbox="2">
					         <td width="8%">编号</td>
							 <th width="15%">车辆</th>
							 <th width="10%">锁定控制</th>
							 <th width="10%">熄火控制</th>
							 <th width="10%">信息下发</th>
					<tbody hasbox="2">  
					<tr style="background-color:#FFF;">
							<td>1</td>
							<td>粤A9999A</td>
							<td>已锁定</td>
							<td><input id="add_btn" class="but_cfg" type="button" value="熄火" onclick="" name="add_btn" style="width:55px;"></td>
							<td><input id="add_btn" class="but_cfg" type="button" value="下发" onclick="" name="add_btn" style="width:55px;"></td>
						</tr>
						<tr style="background-color:#ebebeb;">
							<td>2</td>
							<td>粤A1055A</td>
							<td><input id="add_btn" class="but_cfg" type="button" value="锁定" onclick="" name="add_btn" style="width:55px;"></td>
							<td>已熄火</td>
							<td><input id="add_btn" class="but_cfg" type="button" value="下发" onclick="" name="add_btn" style="width:55px;"></td>
						
						</tr>
						<tr style="background-color:#FFF;">
							<td>3</td>
							<td>粤A9512A</td>
							<td>已锁定</td>
							<td><input id="add_btn" class="but_cfg" type="button" value="熄火" onclick="" name="add_btn" style="width:55px;"></td>
							<td><input id="add_btn" class="but_cfg" type="button" value="下发" onclick="" name="add_btn" style="width:55px;"></td>
						</tr>
						<tr style="background-color:#ebebeb;">
							<td>4</td>
							<td>粤A5456A</td>
							<td><input id="add_btn" class="but_cfg" type="button" value="锁定" onclick="" name="add_btn" style="width:55px;"></td>
							<td>已熄火</td>
							<td><input id="add_btn" class="but_cfg" type="button" value="下发" onclick="" name="add_btn" style="width:55px;"></td>
						
						</tr>
				</table>
				
				  <ul class="pagination">
							<?php echo ($page); ?>
							
						 </ul>

				</div>
		</div>
	</div>
</body>
</html>