<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title><?php echo (L("title")); ?></title>

<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/chart.css">
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/easyui.css">
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/icon.css">
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/demo.css"> 
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<script src="__ROOT__/Public/jquery/js/jquery-1.3.1.min.js"></script>
<script src="__ROOT__/Public/jquery/js/jquery.easyui.min.js"></script>
<script src="__ROOT__/Public/js/getCheck.js"></script>	
<script type="text/javascript">

function refreshPage(){
 //  $("#form1").submit();
   
   
} 
function selvehicle() 
{

			var editUrl = "<?php echo U('Vehiclemaintenance/selvehiclepage/');?>";
			parent.openDialog("选择车辆",400,600,editUrl,refreshPage,"");

}

function modify_info() {
			var dotids=checkone();
			if(Ifonecheck(dotids)){
				dotids = dotids.replace(',','');
				var editUrl = "<?php echo U('Vehiclemaintenance/chgmainteninfo');?>&id=" + dotids;
				parent.openDialog("修改维护信息",400,250,editUrl,refreshPage,"");
			}
} 
</script>
</head>

<body> 

	<div class="main_right" style="margin-top:-14px;">
		<div class="right">
		
			<div id="owner_div">
				<form id="form1" method="post" action="" name="form1">
					<div class="owner_sub_div" style="margin:0px 0px 0px 5px;">
					车辆: <input id="user_name" class="text_1" type="text" maxlength="32" value="<?php $UserName = isset($_POST["user_name"])?$_POST["user_name"]:"";echo $UserName;?>" name="user_name">
					
						<input id="add_user_btn" class="but_add" type="button" value="" onclick="selvehicle();" name="add_user_btn">
					</div>
					<div class="owner_sub_div" style="margin:0px 0px 0px 12px;">
						<input class="submit_1" type="submit" onclick="selReport()" value="查询">
					</div>
					</form>
					
					<br style="clear:both;">
			</div>
			<div class="data" style="height:580px;">
				<div class="operbutton">
				 <input id="chg_btn" class="but_chg" type="button" value="修改" onclick="modify_info();" name="chg_btn">
				</div>
				<table id="tdata" class="tableline" width="100%">
					<thead hasbox="2">
						<tr class="trcenter" hasbox="2">
							<th width="4%" >
							<input type="checkbox" id = "selectall" onclick="checkAll(this)">
							</th>
					         <td width="5%">编号</td>
							 <th width="15%">保养类型</th>
							 <th width="15%">提醒时间间隔</th>
							 <th width="20%">上一次保养时间</th>
							 <th width="15%">保养人员</th>
					<tbody hasbox="2">  
					<tr style="background-color:#FFF;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>1</td>
							<td>定期保养提醒</td>
							<td>2个月</td>
						    <td>2017-3-12 10:15:10</td>
							<td>小小</td>
						</tr>
						<tr style="background-color:#ebebeb;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>2</td>
							<td>更换机油提醒</td>
							<td>15天</td>
							<td>2017-3-12 10:15:10</td>
							<td>小小</td>
							
						</tr>
						<tr style="background-color:#FFF;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>3</td>
							<td>轮胎检查提醒</td>
							<td>1000公里</td>
							<td>2017-3-12 10:15:10</td>
							<td>小王</td>
							
						</tr>
						<tr style="background-color:#ebebeb;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>4</td>
							<td>刹车检查提醒</td>
							<td>1个月</td>
							<td>2017-3-12 10:15:10</td>
							<td>小小</td>
							
						</tr>
				</table>
				
				  <ul class="pagination">
							<?php echo ($page); ?>
							
						 </ul>

		</div>
	</div>
</body>
</html>