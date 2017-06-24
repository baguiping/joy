<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>电池信息</title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
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
					<div class="owner_sub_div">
						设备SN：<input id="deviceid" class="text_1" type="text" maxlength="11" value="<?php $deviceid = isset($_POST["deviceid"])?$_POST["deviceid"]:"";echo $deviceid;?>" name="deviceid">
					</div>
					<div class="owner_sub_div">
						车牌号：<input id="plateNum" class="text_1" type="text" maxlength="32" value="<?php $plateNum = isset($_POST["plateNum"])?$_POST["plateNum"]:"";echo $plateNum;?>" name="plateNum">
					</div>
					<div class="owner_sub_div" style="margin:0px 0px 0px 12px;">
						<input class="submit_1" type="submit" name="selsubmit" onclick="" value="查询">
					</div>
					</form>
					<br style="clear:both;">
			</div>
			<div class="data" style="height:580px;">
				<div class="operbutton">
				 <input id="export_device_btn" class="but_import" type="button" value="导出列表" onclick="ExportDev();" name="export_device_btn"> 
				
				 </div>
				<table id="tdata" class="tableline" width="100%">
					<thead hasbox="2">
						<tr class="trcenter" hasbox="2">
							<th width="4%" >
							<input type="checkbox" id = "selectall" onclick="checkAll(this)">
							</th>
					         <td width="13%">设备序列号SN</td>
							 <th width="8%">车牌号</th>
							 <th width="11%">厂家标识</th>
							 <th width="11%">所属管理员组</th>
							 <th width="9%">电池组串数</th>
							 <th width="9%">总电压</th>
							 <th width="9%">总电流</th>
							 <th width="8%">SOC</th>
							 <th width="8%">SOH</th>
							 <th width="10%">标称容量</th>
							 <th width="10%">额定电压</th>
							 <th width="10%">循坏次数 </th>
							 <th width="12%">绝缘总电压</th>
							 <th width="10%">正极绝缘电阻 </th>
							 <th width="12%">负极绝缘电阻</th>
							 <th width="13%">最高单体电压 </th>
							 <th width="13%">最低单体电压</th>
							 <th width="10%">最高温度 </th>
							 <th width="10%">最低温度</th>
					<tbody hasbox="2">  
					<?php if(is_array($batinfo)): $i = 0; $__LIST__ = $batinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr <?php if(($mod) == "0"): ?>style="background-color:#FFFFFF;"<?php endif; ?>
						<?php if(($mod) == "1"): ?>style="background-color:#ebebeb;"<?php endif; ?>>
						<td><input class="dotid" type="checkbox" id="checkbox[]" name="checkbox[]" value =<?php echo ($vo["deviceid"]); ?>></td>
						<td><?php echo ($vo["imei"]); ?></td>
						<td><?php echo ($vo["plateNumber"]); ?></td>
						<td><?php echo ($vo["manufacturer"]); ?></td>
						<td><?php echo ($vo["adminname"]); ?></td>
						<td><?php echo ($vo["batteryNum"]); ?></td>
						<td><?php echo ($vo["totalvoltage"]); ?></td>
						<td><?php echo ($vo["totalcurrent"]); ?></td>
						<td><?php echo ($vo["soc"]); ?></td>
						<td><?php echo ($vo["soh"]); ?></td>
						<td><?php echo ($vo["nominalcapacity"]); ?></td>
						<td><?php echo ($vo["ratedvoltage"]); ?></td>
						<td><?php echo ($vo["frequency"]); ?></td>
						<td><?php echo ($vo["insulationvoltage"]); ?></td>
						<td><?php echo ($vo["positiveresistance"]); ?></td>
						<td><?php echo ($vo["negativeresistance"]); ?></td>
						<td><?php echo ($vo["maxvoltage"]); ?></td>
						<td><?php echo ($vo["smallvoltage"]); ?></td>
						<td><?php echo ($vo["maxtemperature"]); ?></td>
						<td><?php echo ($vo["smalltemperature"]); ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>	
				</table>
				
				  <ul class="pagination">
							
							
						 </ul>

				</div>
		</div>
	</div>
</body>
</html>