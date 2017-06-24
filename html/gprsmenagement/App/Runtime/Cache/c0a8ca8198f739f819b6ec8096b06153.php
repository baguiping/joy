<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>用户管理</title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js"></script>
<script src="__ROOT__/Public/js/getCheck.js"></script>
<style type="text/css">

</style>
<script type="text/javascript">

function adduser() {
	var editUrl = "<?php echo U('User/adduser/');?>";
	parent.openDialog("添加用户信息",400,370,editUrl,refreshPage,"");
} 

function modify_user_info() {
			var dotids=checkone();
			if(Ifonecheck(dotids)){
				dotids = dotids.replace(',','');
				var editUrl = "<?php echo U('User/chguser');?>&id=" + dotids;
				parent.openDialog("修改用户信息",400,670,editUrl,refreshPage,"");
			}
} 

function del_user() {
	var dotids=multcheck();
	if(Ifmultcheck(dotids))
 	{
		var editUrl = "<?php echo U('User/deleteuser');?>&id="+dotids;
		parent.openDialog("删除用户信息",450,240,editUrl,refreshPage,"");
	}
} 

function enable_user()
{
	
	var dotids=checkone();
	if(Ifonecheck(dotids))
	{
		if(0 == getstatus(6))
		{
			alert("该用户已启用！");
			return;	
		}
	
		var editUrl = "<?php echo U('User/chguserstatus');?>&id="+dotids+"&status=0";
		parent.openDialog("启用用户",400,240,editUrl,refreshPage,"");
	}	
}

function disable_user()
{
	var dotids=checkone();
	if(Ifonecheck(dotids))
	{
		if(1 == getstatus(6))
		{
			alert("该用户已禁用！");
			return;	
		}
	
		var editUrl = "<?php echo U('User/chguserstatus');?>&id="+dotids+"&status=1";
		parent.openDialog("禁用用户",400,240,editUrl,refreshPage,"");
	}	
}

function resetpwd()
  {
 
  	var dotids=checkone();
	if(Ifonecheck(dotids))
	{	
  	  	var editUrl = "<?php echo U('User/resetpwd');?>&id="+dotids;
  	  
	    parent.openDialog("密码重置",400,640,editUrl,refreshPage,"");
	}	
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
						用户名称：<input id="user_name" class="text_1" type="text" maxlength="32" value="<?php $userName = isset($_POST["user_name"])?$_POST["user_name"]:"";echo $userName;?>" name="user_name">
					</div>
					<div class="owner_sub_div">
						用户ID：<input id="user_id" class="text_1" type="text" maxlength="11" value="<?php $userID = isset($_POST["user_id"])?$_POST["user_id"]:"";echo $userID;?>" name="user_id">
					</div>
					<div class="owner_sub_div" >
						<input class="submit_1" type="submit" name="selsubmit" onclick="" value="查询">
					</div>	
					</form>
					<br style="clear:both;">
			</div>
			<div class="data" style="height:580px;">
				<div class="operbutton">
				 <input id="add_user_btn" class="but_add" type="button" value="新建" onclick="adduser();" name="add_user_btn"><spain>|</spain>
				 <input id="chg_user_btn" class="but_chg" type="button" value="修改" onclick="modify_user_info();" name="chg_policy_btn"><spain>|</spain>	
				 <input id="del_user_btn" class="but_del" type="button" value="删除" onclick="del_user();" name="del_policy_btn"><spain>|</spain>
				 <input id="enable_user" class="but_enable" type="button" value="启用" onclick="enable_user();" name="enable_policy"><spain>|</spain>
				 <input id="disable_user" class="but_disable" type="button" value="禁用" onclick="disable_user();" name="disable_policy"><spain>|</spain>
				 <input id="resetpwd_btn" class="but_import" type="button" value="密码重置" onclick="resetpwd();" name="resetpwd_btn"> 
				</div>
				<table id="tdata" class="tableline" width="100%">
					<thead hasbox="2">
						<tr class="trcenter" hasbox="2">
							<th width="4%" >
							<input type="checkbox" id = "selectall" onclick="checkAll(this)">
							</th>
					         <th width="10%">用户ID</td>
							 <th width="10%">用户名称</th>
							 <th width="15%">联系电话</th>
							 <th width="15%">角色</th>
							 <th width="5%">状态</th>
							 <th width="15%">描述</th>
							 <th width="5%" style="display:none;"></th>
					<tbody hasbox="2">  
					<?php if(is_array($userlist)): $i = 0; $__LIST__ = $userlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr <?php if(($mod) == "0"): ?>style="background-color:#FFFFFF;"<?php endif; ?>
						<?php if(($mod) == "1"): ?>style="background-color:#ebebeb;"<?php endif; ?>>
						<td><input class="dotid" type="checkbox" id="checkbox[]" name="checkbox[]" value =<?php echo ($vo["userid"]); ?>></td>
						<td><?php echo ($vo["userid"]); ?></td>
						<td><?php echo ($vo["username"]); ?></td>
						<td><?php echo ($vo["phone"]); ?></td>
						<td><?php if($vo["role"] == 0): ?>系统管理员
							<?php elseif($vo["role"] == 1): ?>管理员
							<?php else: ?>用户<?php endif; ?></td>
						<td><?php if($vo["status"] == 0): ?>启用
							<?php else: ?>禁用<?php endif; ?></td>
						<td><?php echo ($vo["remark"]); ?></td>
						<td style="display:none;"> <?php echo ($vo["status"]); ?> </td>
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