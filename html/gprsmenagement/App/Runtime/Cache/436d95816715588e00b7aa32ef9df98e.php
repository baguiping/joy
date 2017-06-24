<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>告警信息</title>
<link href="__ROOT__/Public/jquery/development-bundle/themes/base/jquery.ui.all.css" rel="stylesheet" />
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js"></script>
<script src="__ROOT__/Public/jquery/development-bundle/ui/jquery.ui.core.js"></script>
<script src="__ROOT__/Public/jquery/development-bundle/ui/jquery.ui.widget.js"></script>
<script src="__ROOT__/Public/jquery/development-bundle/ui/jquery.ui.datepicker.js"></script>
<script src="__ROOT__/Public/jquery/development-bundle/ui/i18n/jquery.ui.datepicker-zh-TW.js"></script>
<script src="__ROOT__/Public/js/getCheck.js"></script>
<style type="text/css">

</style>
<script type="text/javascript">
$(function() {
		$( "#start_time" ).datepicker({
			changeMonth: true,
			numberOfMonths: 1,
			onClose: function( selectedDate ) {
			$( "#start_time" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
			$( "#end_time" ).datepicker( "option", "minDate", selectedDate );		
			}	
		});
		$( "#end_time" ).datepicker({
			changeMonth: true,
			numberOfMonths: 1,
			onClose: function( selectedDate ) {
			$( "#end_time" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
			$( "#start_time" ).datepicker( "option", "maxDate", selectedDate );		
			}	
		});
	});
	
function checkTime()
{
	if(document.getElementById("start_time").value =="" || document.getElementById("end_time").value =="")
	{
		if(document.getElementById("start_time").value != document.getElementById("end_time").value)
		{
			alert("时间信息不完整！");
			return false;
		}
	}
	return true;
}
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
						车牌号:<input id="alarmno" class="text_1" type="text" maxlength="32" value="" name="alarmno">
					</div>
					<div class="owner_sub_div" style="margin:0px 0px 0px 5px;">
						开始时间：<input id="start_time" class="text_2" type="text"  value="<?php $StartTime = isset($_POST["start_time"])?$_POST["start_time"]:"";echo $StartTime;?>" name="start_time">
					</div>
					<div class="owner_sub_div" style="margin:0px 0px 0px 10px;">
						结束时间：<input id="end_time" class="text_2" type="text"  value="<?php $EndTime = isset($_POST["end_time"])?$_POST["end_time"]:"";echo $EndTime;?>" name="end_time">
					</div>
					<div class="owner_sub_div" style="margin:0px 0px 0px 12px;">
						<input class="submit_1" type="submit" onclick="" value="查询">
					</div>
					</form>
					<br style="clear:both;">
			</div>
			<div class="data" style="height:580px;">
				<div class="operbutton">
				<input id="del_alarm" class="but_del" type="button" value="删除" onclick="del_alarm();" name="del_alarm">
				</div>
				<table id="tdata" class="tableline" width="100%">
					<thead hasbox="2">
						<tr class="trcenter" hasbox="2">
							<th width="4%" >
							<input type="checkbox" id = "selectall" onclick="checkAll(this)">
							</th>
					         <td width="8%">告警ID</td>
							 <th width="8%">电池组ID</th>
							 <th width="9%">车牌号</th>
							 <th width="15%">告警类型</th>
							 <th width="20%">告警发生时间</th>
							 <th width="9%">告警状态</th>
					<tbody hasbox="2">  
					<tr style="background-color:#FFF;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "1"></td>
							<td>1</td>
							<td>1</td>
							<td>粤BG123B</td>
							<td>单体电压过高告警</td>
							<td>2017.5.31 18:30:22</td>
							<td>已消除</td>
						</tr>
						<tr style="background-color:#ebebeb;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "2"></td>
							<td>2</td>
							<td>1</td>
							<td>粤BG123B</td>
							<td>电池压差过大告警</td>
							<td>2017.5.31 18:30:22</td>
							<td>已消除</td>
						</tr>
						<tr style="background-color:#FFF;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "3"></td>
							<td>3</td>
							<td>2</td>
							<td>粤AG1233</td>
							<td>电池组SOC过低告警</td>
							<td>2017.5.31 18:30:22</td>
							<td>未消除</td>
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