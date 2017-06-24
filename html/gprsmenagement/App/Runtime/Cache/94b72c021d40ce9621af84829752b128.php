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

function add_vehicle() {
	var editUrl = "<?php echo U('PersonForkliftManage/addvehicle/');?>";
	parent.openDialog("添加车辆信息",400,550,editUrl,refreshPage,"");
} 


function modify_vehicle_info() {
			var dotids=checkone();
			if(Ifonecheck(dotids)){
				dotids = dotids.replace(',','');
				var editUrl = "<?php echo U('PersonForkliftManage/chgvehicle');?>&id=" + dotids;
				parent.openDialog("修改车辆信息",400,550,editUrl,refreshPage,"");
			}
} 

function del_vehicle() {
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
	var editUrl = "<?php echo U('PersonForkliftManage/deletevehicle');?>&id="+dotids;
	parent.openDialog("删除车辆信息",400,180,editUrl,refreshPage,"");
} 

function refreshPage(){
   $("#form1").submit();
} 

</script>
</head>

<body> 

	<div class="main_right"  style="margin-top:-13px;">
		<div class="right">
			<div id="owner_div">
				<form id="form1" method="post" action="" name="form1">
					<div class="owner_sub_div" style="margin:0px 0px 0px 5px;">
						车牌号：<input id="vehicleno" class="text_1" type="text" maxlength="32" value="" name="vehicleno">
					</div>
					<div class="owner_sub_div" style="margin:0px 0px 0px 10px;">
						终端编号：<input id="terminalno" class="text_1" type="text" maxlength="11" value="" name="terminalno">
					</div>
					<div class="owner_sub_div" style="margin:0px 0px 0px 12px;">
						<input class="submit_1" type="submit" onclick="" value="查询">
					</div>
					</form>
					<br style="clear:both;">
			</div>
			<div class="data" style="height:580px;">
				<div class="operbutton">
				 <input id="add_user_btn" class="but_add" type="button" value="新建" onclick="add_vehicle();" name="add_user_btn"><spain>|</spain>
				 <input id="chg_user_btn" class="but_chg" type="button" value="修改" onclick="modify_vehicle_info();" name="chg_user_btn"><spain>|</spain>	
				 <input id="del_user_btn" class="but_del" type="button" value="删除" onclick="del_vehicle();" name="del_user_btn">
				</div>
				<table id="tdata" class="tableline" width="100%">
					<thead hasbox="2">
						<tr class="trcenter" hasbox="2">
							<th width="3%" >
							<input type="checkbox" id = "selectall" onclick="checkAll(this)">
							</th>
					         <td width="5%">编号</td>
							 <th width="6%">车牌号码</th>
							 <th width="5%">所属车队</th>
							 <th width="6%">终端编号</th>
							 <th width="6%">SIM卡卡号</th>
							 <th width="8%">MAC</th>
							 <th width="6%">出厂时间</th>
							 <th width="8%">车辆型号</th>
							 <th width="5%">车辆颜色</th>
							 <th width="6%">车架编号</th>
							 <th width="9%">系统安装时间</th>
							 <th width="7%">维护人姓名</th>
							 <th width="10%">维护人联系方式</th>
							 <th width="5%">叉车品牌</th>
							 <th width="5%">备注</th>
					<tbody hasbox="2">  
					<tr style="background-color:#FFF;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>1</td>
							<td>粤A9999A</td>
							<td>WT车队</td>
							<td>463453</td>
							<td>546546</td>
							<td>112233445566</td>
							<td>2015.4.23</td>
							<td>DAEWOO</td>
							<td>红色</td>
							<td>2454</td>
							<td>2016.4.23</td>
							<td>小小</td>
							<td>13344556677</td>
							<td>唯创</td>
							<td></td>
						</tr>
						<tr style="background-color:#ebebeb;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>2</td>
							<td>粤A95225</td>
							<td>F4车队</td>
							<td>354354</td>
							<td>345345</td>
							<td>223322112233</td>
							<td>2013.4.23</td>
							<td>DAEWOO</td>
							<td>白色</td>
							<td>246</td>
							<td>2016.5.12</td>
							<td>笑笑</td>
							<td>13344556688</td>
							<td>唯创</td>
							<td></td>
						</tr>
						<tr style="background-color:#FFF;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>3</td>
							<td>粤A99888</td>
							<td>WT车队</td>
							<td>795765</td>
							<td>243235</td>
							<td>112233445566</td>
							<td>2015.4.23</td>
							<td>HYSTER</td>
							<td>红色</td>
							<td>2454</td>
							<td>2016.4.23</td>
							<td>小小</td>
							<td>13344556677</td>
							<td>XX</td>
							<td></td>
						</tr>
						<tr style="background-color:#ebebeb;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>4</td>
							<td>粤A9988B</td>
							<td>F4车队</td>
							<td>234233</td>
							<td>454534</td>
							<td>223322112233</td>
							<td>2013.4.23</td>
							<td>HYSTER</td>
							<td>白色</td>
							<td>246</td>
							<td>2016.5.12</td>
							<td>小王</td>
							<td>13344556688</td>
							<td>唯创</td>
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