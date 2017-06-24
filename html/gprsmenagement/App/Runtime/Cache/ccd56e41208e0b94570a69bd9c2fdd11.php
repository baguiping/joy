<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>设备信息</title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js"></script>
<script src="__ROOT__/Public/js/getCheck.js"></script>
<style type="text/css">

</style>
<script type="text/javascript">

function adddevice() {
	var editUrl = "<?php echo U('Device/adddevice/');?>";
	parent.openDialog("添加设备信息",400,270,editUrl,refreshPage,"");
} 

function modify_device_info() {
			var dotids=checkone();
			if(Ifonecheck(dotids)){
				dotids = dotids.replace(',','');
				var editUrl = "<?php echo U('Device/chgdevice');?>&id=" + dotids;
				
				parent.openDialog("修改设备信息",400,370,editUrl,refreshPage,"");
			}
} 

function del_device() {
	var dotids=multcheck();
	if(Ifmultcheck(dotids))
 	{
		var editUrl = "<?php echo U('Device/deletedevice');?>&id="+dotids;
		parent.openDialog("删除设备信息",450,230,editUrl,refreshPage,"");
	}
} 

function refreshPage(){
   $("#form1").submit();
} 

function ImportDev()
{
	var editUrl = "<?php echo U('Device/importpage');?>";
	parent.openDialog("导入设备",450,280,editUrl,refreshPage,""); 
}

function ExportDev(){
   var editUrl = "<?php echo U('Device/exportpage');?>";
   parent.openDialog("导出设备",450,230,editUrl,refreshPage,"");
}

</script>
</head>

<body> 

	<div class="main_right" style="margin-top:-13px;">
		<div class="right">
			<div id="owner_div">
				<form id="form1" method="post" action="" name="form1">
					<div class="owner_sub_div">
						车牌号：<input id="deviceno" class="text_1" type="text" maxlength="32" value="<?php $deviceno = isset($_POST["deviceno"])?$_POST["deviceno"]:"";echo $deviceno;?>" name="deviceno">
					</div>
					<div class="owner_sub_div">
						设备SN：<input id="deviceid" class="text_1" type="text" maxlength="11" value="<?php $deviceid = isset($_POST["deviceid"])?$_POST["deviceid"]:"";echo $deviceid;?>" name="deviceid">
					</div>
					<div class="owner_sub_div">
						厂家标识：<input id="factory" class="text_1" type="text" maxlength="11" value="<?php $factory = isset($_POST["factory"])?$_POST["factory"]:"";echo $factory;?>" name="factory">
					</div>
					<div class="owner_sub_div" >
						<input class="submit_1" type="submit" name="selsubmit" onclick="" value="查询">
					</div>	
					</form>
					<br style="clear:both;">
			</div>
			<div class="data" style="height:580px;">
				<div class="operbutton">
				 <input id="add_device_btn" class="but_add" type="button" value="新建" onclick="adddevice();" name="add_device_btn"><spain>|</spain>
				 <input id="chg_device_btn" class="but_chg" type="button" value="修改" onclick="modify_device_info();" name="chg_device_btn"><spain>|</spain>	
				 <input id="del_device_btn" class="but_del" type="button" value="删除" onclick="del_device();" name="del_device_btn"> 
				 <input id="seek_device_btn" class="but_seek" type="button" value="详情" onclick="seek_device();" name="seek_device_btn"><spain>|</spain>
				 <input id="import_device_btn" class="but_import" type="button" value="导入设备" onclick="ImportDev();" name="import_device_btn"> <spain>|</spain>
				 <input id="export_device_btn" class="but_export" type="button" value="导出" onclick="ExportDev();" name="export_device_btn"> 
				</div>
				<table id="tdata" class="tableline" width="100%">
					<thead hasbox="2">
						<tr class="trcenter" hasbox="2">
							<th width="4%" >
							<input type="checkbox" id = "selectall" onclick="checkAll(this)">
							</th>
					         <th width="14%">设备SN</td>
							 <th width="8%">车牌号</th>
							 <th width="7%">运营商</th>
							 <th width="12%">电池组串数</th>
							 <th width="10%">厂家标识</th>
							 <th width="10%">电芯类型</th>
							 <th width="14%">采集模块数</th>
							 <th width="14%">最后活跃时间</th>
							 <th width="10%">管理员</th>
							 <th width="10%">所属组</th>
							 <th width="6%">备注</th>
					<tbody hasbox="2">
					<?php if(is_array($devicelist)): $i = 0; $__LIST__ = $devicelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr <?php if(($mod) == "0"): ?>style="background-color:#FFFFFF;"<?php endif; ?>
						<?php if(($mod) == "1"): ?>style="background-color:#ebebeb;"<?php endif; ?>>
						<td><input class="dotid" type="checkbox" id="checkbox[]" name="checkbox[]" value =<?php echo ($vo["deviceid"]); ?>></td>
						<td><?php echo ($vo["imei"]); ?></td>
						<td><?php echo ($vo["plateNumber"]); ?></td>
						<td><?php if($vo["carrierOperator"] == 0): ?>移动
							<?php elseif($vo["role"] == 1): ?>联通
							<?php else: ?>电信<?php endif; ?></td>
						<td><?php echo ($vo["batteryNum"]); ?></td>
						<td><?php echo ($vo["manufacturer"]); ?></td>
						<td><?php echo ($vo["coreType"]); ?></td>
						<td><?php echo ($vo["moduleNumber"]); ?></td>
						<td><?php echo ($vo["lastactivetime"]); ?></td>
						<td><?php echo ($vo["adminname"]); ?></td>
						<td><?php echo ($vo["groupname"]); ?></td>
						<td><?php echo ($vo["remark"]); ?></td>
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