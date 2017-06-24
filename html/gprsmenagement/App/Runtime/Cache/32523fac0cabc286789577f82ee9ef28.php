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

function add_user() {
	var editUrl = "<?php echo U('PersonForkliftManage/adduser/');?>";
	parent.openDialog("添加人员信息",400,470,editUrl,refreshPage,"");
} 

function modify_user_info() {
			var dotids=checkone();
			if(Ifonecheck(dotids)){
				dotids = dotids.replace(',','');
				var editUrl = "<?php echo U('PersonForkliftManage/chguser');?>&id=" + dotids;
				parent.openDialog("修改人员信息",400,470,editUrl,refreshPage,"");
			}
} 

function del_user() {
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
	var editUrl = "<?php echo U('PersonForkliftManage/deleteuser');?>&id="+dotids;
	parent.openDialog("删除人员信息",400,180,editUrl,refreshPage,"");
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
						用户名：<input id="user_name" class="text_1" type="text" maxlength="32" value="" name="user_name">
					</div>
					<div class="owner_sub_div" style="margin:0px 0px 0px 10px;">
						编号：<input id="user_id" class="text_1" type="text" maxlength="11" value="" name="user_id">
					</div>
					<div class="owner_sub_div" style="margin:0px 0px 0px 12px;">
						<input class="submit_1" type="submit" onclick="" value="查询">
					</div>
					</form>
					<br style="clear:both;">
			</div>
			<div class="data" style="height:600px;">
				<div class="operbutton">
				 <input id="add_user_btn" class="but_add" type="button" value="新建" onclick="add_user();" name="add_user_btn"><spain>|</spain>
				 <input id="chg_user_btn" class="but_chg" type="button" value="修改" onclick="modify_user_info();" name="chg_user_btn"><spain>|</spain>	
				 <input id="del_user_btn" class="but_del" type="button" value="删除" onclick="del_user();" name="del_user_btn">
				</div>
				<table id="tdata" class="tableline" width="100%">
					<thead hasbox="2">
						<tr class="trcenter" hasbox="2">
							<th width="4%" >
							<input type="checkbox" id = "selectall" onclick="checkAll(this)">
							</th>
					         <td width="5%">编号</td>
							 <th width="10%">姓名</th>
							 <th width="5%">年龄</th>
							 <th width="5%">性别</th>
							 <th width="10%">驾驶证信息</th>
							 <th width="10%">联系电话</th>
							 <th width="10%">登记时间</th>
							 <th width="10%">IC卡编号</th>
							 <th width="10%">权限等级</th>
							 <th width="10%">账户名称</th>
							 <th width="10%">备注</th>
					<tbody hasbox="2">  
					<tr style="background-color:#FFF;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>1</td>
							<td>张三</td>
							<td>30</td>
							<td>男</td>
							<td>A类</td>
							<td>13344556677</td>
							<td>2017.4.23</td>
							<td>123456</td>
							<td>管理员</td>
							<td>aaaaa</td>
							<td></td>
						</tr>
						<tr style="background-color:#ebebeb;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>2</td>
							<td>李四</td>
							<td>30</td>
							<td>男</td>
							<td>C类</td>
							<td>13344666666</td>
							<td>2017.4.23</td>
							<td>123666</td>
							<td>司机</td>
							<td>vvgg</td>
							<td></td>
						</tr>
						<tr style="background-color:#FFF;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>3</td>
							<td>小王</td>
							<td>30</td>
							<td>男</td>
							<td>A类</td>
							<td>13344556677</td>
							<td>2017.4.23</td>
							<td>123456</td>
							<td>管理员</td>
							<td>aaaaa</td>
							<td></td>
						</tr>
						<tr style="background-color:#ebebeb;">
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "11"></td>
							<td>4</td>
							<td>小李</td>
							<td>30</td>
							<td>男</td>
							<td>C类</td>
							<td>13344666666</td>
							<td>2017.4.23</td>
							<td>123666</td>
							<td>司机</td>
							<td>vvgg</td>
							<td></td>
						</tr>
					<?php if(is_array($notelist)): $i = 0; $__LIST__ = $notelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr <?php if(($mod) == "0"): ?>style="background-color:#FFFFFF;"<?php endif; ?>
						<?php if(($mod) == "1"): ?>style="background-color:#ebebeb;"<?php endif; ?>>
							<td><input class="dotid" type="checkbox" name="checkbox[]" value = "<?php echo ($vo["userid"]); ?>"></td>
							<td><?php echo ($vo["userid"]); ?></td>
							<td><?php echo ($vo["username"]); ?></td>
							<td><?php echo ($vo["age"]); ?></td>
							<td><?php echo ($vo["sex"]); ?></td>
							<td><?php echo ($vo["jiashiinfo"]); ?></td>
							<td><?php echo ($vo["phonenum"]); ?></td>
							<td><?php echo ($vo["registerinfo"]); ?></td>
							<td><?php echo ($vo["ICNO"]); ?></td>
							<td><span style="color:#428BCA;font-size:10px;">
							<?php switch($vo["role"]): case "0": ?>禁用<?php break;?>
								<?php case "1": ?>启用<?php break;?>
								<?php default: ?>未知<?php endswitch;?>
								</span>	
							</td>
							<td><?php echo ($vo["acount"]); ?></td>
							<td><?php echo ($vo["desc"]); ?></td>
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