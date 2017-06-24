<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title><?php echo (L("title")); ?></title>
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

function del_log(strTable,strID) {
	var dotids=multcheck();
	if(Ifmultcheck(dotids))
 	{
		var editUrl = "<?php echo U('Log/deletelog');?>&id="+dotids;
		parent.openDialog("删除日志信息",450,220,editUrl,refreshPage,"");
	}
} 
</script>
</head>

<body> 

	<div class="main_right" style="margin-top:-13px;">
		<div class="right">
			<div id="owner_div">
				<form id="form1" method="post" action="" name="form1">
					<div class="owner_sub_div" style="margin:0px 0px 0px 5px;">
						   用户名：<input id="user_name" type="text" class="text_1" name="user_name" value="<?php $aname=isset($_POST["user_name"]) ? $_POST["sche_name"]: ""; echo $aname;?>">
					</div>
					<div class="owner_sub_div" style="margin:0px 0px 0px 5px;">
						开始时间：<input id="start_time" class="text_2" type="text"  value="<?php $StartTime = isset($_POST["start_time"])?$_POST["start_time"]:"";echo $StartTime;?>" name="start_time">
					</div>
					<div class="owner_sub_div" style="margin:0px 0px 0px 10px;">
						结束时间：<input id="end_time" class="text_2" type="text"  value="<?php $EndTime = isset($_POST["end_time"])?$_POST["end_time"]:"";echo $EndTime;?>" name="end_time">
					</div>
					<div class="owner_sub_div" style="margin:0px 0px 0px 10px;">
						<input class="submit_1" type="submit" name="selsubmit" value="查询" onclick="onsearch()">
					</div>
					</form>
					<br style="clear:both;">
			</div>
			<div class="data" style="height:580px;">
				<div class="operbutton">
				 <input id="del_log_btn" class="but_del" type="button" value="删除" onclick="del_log();" name="del_log_btn">
				 </div>
				<table id="tdata" class="tableline" width="100%">
					<thead hasbox="2">
						<tr class="trcenter" hasbox="2">
							<th width="4%" >
							<input type="checkbox" id = "selectall" onclick="checkAll(this)">
							</th>
					         <th width="10%">日志ID</td>
							 <th width="10%">用户</th>
							 <th width="15%">时间</th>
							 <th width="15%">事件</th>
					<tbody hasbox="2">  
					<?php if(is_array($loglist)): $i = 0; $__LIST__ = $loglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr <?php if(($mod) == "0"): ?>style="background-color:#FFFFFF;"<?php endif; ?>
						<?php if(($mod) == "1"): ?>style="background-color:#ebebeb;"<?php endif; ?>>
						<td><input class="dotid" type="checkbox" id="checkbox[]" name="checkbox[]" value =<?php echo ($vo["loginid"]); ?>></td>
						<td><?php echo ($vo["loginid"]); ?></td>
						<td><?php echo ($vo["username"]); ?></td>
						<td><?php echo ($vo["logintime"]); ?></td>
						<td><?php if($vo["operate"] == 0): ?>登录
							<?php else: ?>退出<?php endif; ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</table>
				
				  <ul class="pagination">
							<?php echo ($page); ?>
							
						 </ul>

				</div>
		</div>
	</div>
</body>
</html>