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
function add_driver() {
	var editUrl = "<?php echo U('Lease/adddriver/');?>";
	parent.openDialog("添加租赁司机信息",400,320,editUrl,refreshPage,"");
} 


function modify_driver() {
			var dotids=checkone();
			if(Ifonecheck(dotids)){
				dotids = dotids.replace(',','');
				var editUrl = "<?php echo U('Lease/chgdriver');?>&id=" + dotids;
				parent.openDialog("修改租赁司机信息",400,320,editUrl,refreshPage,"");
			}
} 

function del_driver() {
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
	var editUrl = "<?php echo U('Lease/deletedriver');?>&id="+dotids;
	parent.openDialog("删除租赁司机信息",400,180,editUrl,refreshPage,"");
} 

function refreshPage(){
   $("#form1").submit();
} 

</script>
</head>

<body> 

	<div class="main_right" style="margin-top:-14px;">
		<div class="right">
			<div id="owner_div">
				<form id="form1" method="post" action="" name="form1">
					<div class="owner_sub_div" style="margin:0px 0px 0px 5px;">
						姓名: <input id="user_name" class="text_1" type="text" maxlength="32" value="" name="user_name">
					</div>
					
					<div class="owner_sub_div" style="margin:0px 0px 0px 12px;">
						<input class="submit_1" type="submit" onclick="" value="查询">
					</div>
					</form>
					<br style="clear:both;">
			</div>
			<div class="data" style="height:580px;">
				<div class="operbutton">
				 <input id="add_user_btn" class="but_add" type="button" value="新建" onclick="add_driver();" name="add_user_btn"><spain>|</spain>
				 <input id="chg_user_btn" class="but_chg" type="button" value="修改" onclick="modify_driver();" name="chg_user_btn"><spain>|</spain>	
				 <input id="del_user_btn" class="but_del" type="button" value="删除" onclick="del_driver();" name="del_user_btn">
				 </div>
				<table id="tdata" class="tableline" width="100%">
					<thead hasbox="2">
						<tr class="trcenter" hasbox="2">
							<th width="4%" >
							<input type="checkbox" id = "selectall" onclick="checkAll(this)">
							</th>
					         <td width="8%">编号</td>
							 <th width="15%">姓名</th>
							 <th width="10%">联系方式</th>
							 <th width="10%">IC卡编号</th>
							 <th width="10%">权限等级</th>
							 <th width="10%">备注</th>
					<tbody hasbox="2">  
					<tr style="background-color:#FFF;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>1</td>
							<td>王先生</td>
							<td>13333333333</td>
							<td>123456</td>
							<td>租赁司机</td>
							<td></td>
						</tr>
						<tr style="background-color:#ebebeb;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>2</td>
							<td>陈先生</td>
							<td>13566224856</td>
							<td>123456</td>
							<td>租赁管司机</td>
							<td></td>
						</tr>
						<tr style="background-color:#FFF;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>3</td>
							<td>黄先生</td>
							<td>15854955265</td>
							<td>123456</td>
							<td>租赁司机</td>
							<td></td>
						</tr>
						<tr style="background-color:#ebebeb;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>4</td>
							<td>陈先生</td>
							<td>13925332666</td>
							<td>123456</td>
							<td>租赁管司机</td>
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