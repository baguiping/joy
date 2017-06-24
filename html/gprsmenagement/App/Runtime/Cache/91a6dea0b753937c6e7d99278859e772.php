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

function add_battery() {
	var editUrl = "<?php echo U('Battery/addbattery/');?>";
	parent.openDialog("添加电池信息",400,370,editUrl,refreshPage,"");
} 

function modify_battery() {
			var dotids=checkone();
			if(Ifonecheck(dotids)){
				dotids = dotids.replace(',','');
				var editUrl = "<?php echo U('Battery/chgbattery');?>&id=" + dotids;
				parent.openDialog("修改电池信息",400,370,editUrl,refreshPage,"");
			}
} 

function del_battery() {
	var dotObj = $(".dotid");
	var dotids = "";
	var paramCheckBox = document.getElementsByName("checkbox[]");
	for(var i = 0; i < paramCheckBox.length; i++){
		if(paramCheckBox[i].checked){
			dotids += $(dotObj[i]).attr("value") + ",";
		}
	}
	if(dotids == ""){
		alert("还没有选中要删除的项！");
		return false;
	}
	var editUrl = "<?php echo U('Battery/deletebattery');?>&id="+dotids;
	parent.openDialog("删除电池信息",400,180,editUrl,refreshPage,"");
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
						电池编号:<input id="batteryno" class="text_1" type="text" maxlength="32" value="" name="batteryno">
					</div>
					
					<div class="owner_sub_div" style="margin:0px 0px 0px 12px;">
						<input class="submit_1" type="submit" onclick="" value="查询">
					</div>
					</form>
					<br style="clear:both;">
			</div>
			<div class="data" style="height:580px;">
				<div class="operbutton">
				 <input id="add_battery" class="but_add" type="button" value="新建" onclick="add_battery();" name="add_battery"><spain>|</spain>
				 <input id="modify_battery" class="but_chg" type="button" value="修改" onclick="modify_battery();" name="modify_battery"><spain>|</spain>	
				 <input id="del_battery" class="but_del" type="button" value="删除" onclick="del_battery();" name="del_battery">
				</div>
				<table id="tdata" class="tableline" width="100%">
					<thead hasbox="2">
						<tr class="trcenter" hasbox="2">
							<th width="4%" >
							<input type="checkbox" id = "selectall" onclick="checkAll(this)">
							</th>
					         <td width="8%">电池编号</td>
							 <th width="15%">登记时间</th>
							  <th width="10%">电池厂商</th>
							 <th width="10%">电池型号</th>
							 <th width="10%">电池标称电压</th>
							 <th width="10%">电池容量</th>
							 <th width="10%">电池形状</th>
							 <th width="10%">维护人员</th>
							 <th width="20%">维护人员联系方式</th>
							 <th width="10%">备注</th>
					<tbody hasbox="2">  
					<tr style="background-color:#FFF;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>1</td>
							<td>2017.3.23</td>
							<td>南孚</td>
							<td>SIZE 1</td>
							<td>1.5V</td>
							<td>10000A</td>
							<td>圆柱形</td>
							<td>王先生</td>
							<td>13364654665</td>
							<td></td>
						</tr>
						<tr style="background-color:#ebebeb;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>2</td>
							<td>2017.4.23</td>
							<td>南孚</td>
							<td>SIZE 1</td>
							<td>1.5V</td>
							<td>10000A</td>
							<td>圆柱形</td>
							<td>陈先生</td>
							<td>13745654654</td>
							<td></td>
						</tr>
						<tr style="background-color:#FFF;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>3</td>
							<td>2017.3.23</td>
							<td>南孚</td>
							<td>SIZE 1</td>
							<td>1.5V</td>
							<td>10000A</td>
							<td>圆柱形</td>
							<td>王先生</td>
							<td>13865756766</td>
							<td></td>
						</tr>
						<tr style="background-color:#ebebeb;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>4</td>
							<td>2017.4.23</td>
							<td>南孚</td>
							<td>SIZE 1</td>
							<td>1.5V</td>
							<td>10000A</td>
							<td>圆柱形</td>
							<td>陈先生</td>
							<td>13456545655</td>
							<td></td>
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