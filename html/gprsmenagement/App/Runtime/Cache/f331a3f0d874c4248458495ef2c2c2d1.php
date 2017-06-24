<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>首页</title>
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js" charset="utf-8"></script>
<link href="__ROOT__/Public/css/loginok.css" rel="stylesheet" />
<link href="__ROOT__/Public/css/public.css" rel="stylesheet" />
<link href="__ROOT__/Public/css/index.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/chart.css">
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/>
<script src="__ROOT__/Public/js/esl.js"></script>
<script src="__ROOT__/Public/js/statistic.js"></script>
<script src="__ROOT__/Public/js/public.js"></script>
<script type="text/javascript">
$(document).ready(	function()
{   
  var $em = $( ".handList" ).find("em");
  $em.eq(0).addClass("main_menu_act");
  $em.eq(0).children(0).removeClass().addClass("i-hd0_act");
});
</script>
</head>
<body>
<div id="header" style="width:100%">
	<?php  @session_start(); if(empty($_SESSION["uid"])) { redirect(U('Login/index')); } ?>
<div class="top">
	<div class="logo"><img style="height:53px;background:#FFF;width:100%;" src="__ROOT__/Public/Images/back_logo.png" /></div>
		<div class="header_right">
			<p>
				
			| <a href="<?php echo U('Login/logout');?>" onmouseover="chgbgover(this)" onmouseout="chgbgout(this)" onclick="javascript:
				return confirm('确认退出?');"><img src="__ROOT__/Public/Images/norexit.png" align="absmiddle"/> <?php echo (L("exit")); ?></a>
			</p>
		</div>
		<div class="header_right1">
			<p>
			<a href="<?php echo U('Login/help');?>" target="_blank"><img src="__ROOT__/Public/Images/tophelp.png" align="absmiddle"/> <?php echo (L("help")); ?> </a>
			</p>
		</div>
		<div id="clear"></div>
	</div>
</div>	
</div>	
<div class="center" style="height:600px;">
  	 <div class="handList">
        	<ul>
			    <li><a href="<?php echo U('Index/index');?>" title="首页"><em><i class="i-hd0"></i></em><span>首页</span></a></li>
                <li><a href="<?php echo U('User/index');?>"  title="帐户管理"><em><i class="i-hd1"></i></em><span>帐户管理</span></a></li>
                <li><a href="<?php echo U('Device/index');?>"  title="设备管理"><em><i class="i-hd2"></i></em><span>设备管理</span></a></li>
                <li><a href="<?php echo U('Battery/index');?>"  title="电池信息"><em><i class="i-hd4"></i></em><span>电池信息</span></a></li>
                <li><a href="<?php echo U('Alarm/index');?>"  title="告警信息"><em><i class="i-hd3"></i></em><span>告警信息</span></a></li>
				<li><a href="<?php echo U('Report/index');?>"  title="统计报表"><em><i class="i-hd5"></i></em><span>统计报表</span></a></li>
                <li><a href="<?php echo U('Log/index');?>"  title="登陆日志"><em><i class="i-hd6"></i></em><span>登陆日志</span></a></li>
                <li><a href="<?php echo U('Config/index');?>"  title="参数设置"><em><i class="i-hd7"></i></em><span>参数设置</span></a></li>
                <li><a href="<?php echo U('System/index');?>"  title="系统信息"><em><i class="i-hd8"></i></em><span>系统信息</span></a></li>
            </ul>
        </div>	
	<div id="todaydata" class="gaikuangdiv" style="width:97%;">
		<div id="todaydatatitle" class="genarastationtitle"><h3 class="h3css">账户信息
		</h3></div>
		<table id="tdata" class="tableline">
			<thead hasbox="2">
				<tr class="trcenter" hasbox="2">
					<th width="10%">用户名
					<th width="10%">所属组
					<th width="10%">上次登录时间
			<tbody hasbox="2">  
					<tr class="tabletd">
					<td>admin</td>
					<td>超级管理员</td>
					<td><?php echo ($lastLoginTime); ?></td>
					</tr>
		</table>
	</div>	
	<div id="todaydata" class="gaikuangdiv" style="width:97%;margin-top:50px;">
		<div id="todaydatatitle" class="genarastationtitle"><h3 class="h3css">管理设备信息
		</h3></div>
		<table id="tdata" class="tableline">
			<thead hasbox="2">
				<tr class="trcenter" hasbox="2">
					<th width="10%">管理设备数
					<th width="10%">在线设备数
					<th width="10%">离线设备数
					<th width="10%">今日告警设备数
			<tbody hasbox="2">  
					<tr class="tabletd">
					<td>20</td>
					<td>10</td>
					<td>10</td>
					<td>2</td>
					</tr>
		</table>
	</div>

</div>
 	       
<div id="foot" style="margin-top:100px;">
	<div>
		<p>copyright@2017 All Rights Reserved</p>
	</div>
</div>
</body>
</html>