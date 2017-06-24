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
function refreshPage(){
   $("#form1").submit();
} 

</script>
</head>

<body> 
	<div class="main_right" style="margin-top:-13px;">
		<div class="right">
			<div id="owner_div">
				<form id="form1" method="post" action="" name="form1">
					<div class="owner_sub_div" style="margin:0px 0px 0px 5px;">
						升级文件:<input type="file" onBlur="" class="text_2" style="border:0px;" value="" maxlength="20" name="filepath" id="filepath"><span class="lr" id="filepathErr"></span>
</div>
					
					<div class="owner_sub_div" style="margin:0px 0px 0px 12px;">
						<input class="submit_1" type="submit" onclick="" value="升级">
					</div>
					</form>
					<br style="clear:both;">
			</div>
			<div class="data" style="height:580px;">
				
				<table id="tdata" class="tableline" width="100%">
					<thead hasbox="2">
						<tr class="trcenter" hasbox="2">
							<th width="4%" >
							<input type="checkbox" id = "selectall" onclick="checkAll(this)">
							</th>
					         <td width="8%">车辆</td>
							 <th width="15%">进度</th>
							 <th width="10%">状态</th>
							 <th width="10%">升级操作</th>
							
					<tbody hasbox="2">  
					<tr style="background-color:#FFF;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>粤A9999D</td>
							<!--td><progress><span id="objprogress">85</span>%
</progress></td-->
							<td><progress value="85" max="100"></progress></td>
							<td>升级中</td>
							<td><a style="color:blue;text-decoration:underline;cursor:pointer;" onclick="cancleupgrade()" title="取消升级操作">取消</a></td>
							
						</tr>
						<tr style="background-color:#FFF;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>粤A99988</td>
							<td><progress value="100" max="100"></progress</td>
							<td>升级完成</td>
							<td></td>
						</tr>
						<tr style="background-color:#FFF;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>粤A99558</td>
							<td><progress value="100" max="100"></progress</td>
							<td>升级失败</td>
							<td><a style="color:blue;text-decoration:underline;cursor:pointer;" onclick="cancleupgrade()" title="重新升级">重新升级</a></td>
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