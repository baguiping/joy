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

function addgroup() {
	var editUrl = "<?php echo U('Device/addgroup/');?>";
	parent.openDialog("添加组信息",400,370,editUrl,refreshPage,"");
} 

function modify_group_info() {
			var dotids=checkone();
			alert(dotids);
			if(Ifonecheck(dotids)){
				dotids = dotids.replace(',','');
				var editUrl = "<?php echo U('Device/chggroup');?>&id=" + dotids;
				
				parent.openDialog("修改组信息",400,370,editUrl,refreshPage,"");
			}
} 

function del_group() {
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
	var editUrl = "<?php echo U('Device/delgroup');?>&id="+dotids;
	parent.openDialog("删除组信息",400,180,editUrl,refreshPage,"");
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
					<div class="owner_sub_div">
						组名称：<input id="group_name" class="text_1" type="text" maxlength="32" value="<?php $groupName = isset($_POST["group_name"])?$_POST["group_name"]:"";echo $groupName;?>" name="group_name">
					</div>
					<div class="owner_sub_div">
						组ID：<input id="group_id" class="text_1" type="text" maxlength="11" value="<?php $groupID = isset($_POST["group_id"])?$_POST["group_id"]:"";echo $groupID;?>" name="group_id">
					</div>
					<div class="owner_sub_div" >
						<input class="submit_1" type="submit" name="selsubmit" onclick="" value="查询">
					</div>	
					</form>
					<br style="clear:both;">
			</div>
			<div class="data" style="height:580px;">
				<div class="operbutton">
				 <input id="add_group_btn" class="but_add" type="button" value="新建" onclick="addgroup();" name="add_group_btn"><spain>|</spain>
				 <input id="chg_group_btn" class="but_chg" type="button" value="修改" onclick="modify_group_info();" name="chg_group_btn"><spain>|</spain>	
				 <input id="del_group_btn" class="but_del" type="button" value="删除" onclick="del_group();" name="del_group_btn"> 
				</div>
				<table id="tdata" class="tableline" width="100%">
					<thead hasbox="2">
						<tr class="trcenter" hasbox="2">
							<th width="4%" >
							<input type="checkbox" id = "selectall" onclick="checkAll(this)">
							</th>
					         <th width="10%">组ID</td>
							 <th width="10%">组名称</th>
							 <th width="15%">描述</th>
					<tbody hasbox="2">  
					<?php if(is_array($grouplist)): $i = 0; $__LIST__ = $grouplist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr <?php if(($mod) == "0"): ?>style="background-color:#FFFFFF;"<?php endif; ?>
						<?php if(($mod) == "1"): ?>style="background-color:#ebebeb;"<?php endif; ?>>
						<td><input class="dotid" type="checkbox" name="checkbox[]" id="checkbox[]"></td>
						<td><?php echo ($vo["groupid"]); ?></td>
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