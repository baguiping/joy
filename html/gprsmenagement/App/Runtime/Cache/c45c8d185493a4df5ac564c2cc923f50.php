<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title><?php echo (L("title")); ?></title>
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js"></script>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<script type="text/javascript">	
    	var URL = "__URL__";
		$(document).ready(	function(){
			 var clientWidth = document.body.clientWidth-40;
			 $("#pagebody").attr("style","width:"+clientWidth+"px;");
			 var timeInlitvalue="<?php $currenttime = date("Y\.m\.d");$temptime = date("Y-m-d"); $begintime=date('Y\.m\.d',strtotime("$temptime -7 day")); echo $begintime."-".$currenttime; ?>";
		 var tm1 = timeInlitvalue.substr(0, timeInlitvalue.indexOf('-'));
		 var tm2 = timeInlitvalue.substr(timeInlitvalue.indexOf('-')+1,timeInlitvalue.length);
			  $("#tdatadetail").load(URL+"/chaosudetail",{"starttm" : tm1 ,"endtm":tm2,"type":0});
		 });
	</script>
<script type="text/javascript">

function refreshPage(){

} 
function selvehicle() 
{
	var editUrl = "<?php echo U('Battery/selvehiclepage/');?>";
	parent.openDialog("选择车辆",400,600,editUrl,refreshPage,"");
}

</script>
</head>

<body> 

	<div class="main_right" style="margin-top:-14px;">
		<div class="right">
		
			<div id="owner_div">
				<form id="form1" method="post" action="" name="form1">
					<div class="owner_sub_div" style="margin:0px 0px 0px 5px;">
						车辆:<input id="vehicle" class="text_1" type="text" maxlength="32" value="" name="vehicle">
					<input id="add_user_btn" class="but_add" type="button" value="" onclick="selvehicle();" name="add_user_btn"></div>
					
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
					         <td width="25%">电池编号</td>
							 <th width="25%">电池液位</th>
							 <th width="25%">电池电量</th>
							 <th width="25%">电池温度</th>
							
					<tbody hasbox="2">  
					<tr style="background-color:#FFF;">
							<td>1</td>
							<td>12mm</td>
							<td>450Ah</td>
							<td>32℃</td>
							
						</tr>
						<tr style="background-color:#ebebeb;">
							<td>2</td>
							<td>13mm</td>
							<td>450Ah</td>
							<td>34℃</td>
						</tr>
						<tr style="background-color:#FFF;">
							<td>3</td>
							<td>12mm</td>
							<td>450Ah</td>
							<td>32℃</td>
							
						</tr>
						<tr style="background-color:#ebebeb;">
							<td>4</td>
							<td>14mm</td>
							<td>450Ah</td>
							<td>30℃</td>
						</tr>
				</table>
				
				  <ul class="pagination">
							<?php echo ($page); ?>
							
						 </ul>
		</div>
	</div>
</body>
</html>