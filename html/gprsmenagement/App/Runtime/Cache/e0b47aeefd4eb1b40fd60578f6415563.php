<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>告警管理</title>
<link href="__ROOT__/Public/jquery/development-bundle/themes/base/jquery.ui.all.css" rel="stylesheet" />
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js" charset="utf-8"></script>
<script src="__ROOT__/Public/jquery/development-bundle/ui/jquery.ui.core.js"></script>
<script src="__ROOT__/Public/jquery/development-bundle/ui/jquery.ui.widget.js"></script>
<script src="__ROOT__/Public/jquery/development-bundle/ui/jquery.ui.mouse.js"></script>
<script src="__ROOT__/Public/jquery/development-bundle/ui/jquery.ui.draggable.js"></script>
<script src="__ROOT__/Public/jquery/development-bundle/ui/jquery.ui.position.js"></script>
<script src="__ROOT__/Public/jquery/development-bundle/ui/jquery.ui.resizable.js"></script>
<script src="__ROOT__/Public/jquery/development-bundle/ui/jquery.ui.button.js"></script>
<script src="__ROOT__/Public/jquery/development-bundle/ui/jquery.ui.dialog.js"></script>
<script src="__ROOT__/Public/jquery/development-bundle/ui/jquery.ui.effect.js"></script>
<script src="__ROOT__/Public/js/dialog.js"></script>
<script src="__ROOT__/Public/js/public.js"></script>
<link href="__ROOT__/Public/css/loginok.css" rel="stylesheet" />
<link href="__ROOT__/Public/css/public.css" rel="stylesheet" />
<link href="__ROOT__/Public/css/index.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/chart.css">
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/menu.css">
<script type="text/javascript">
$(document).ready(	function()
{   
  var $em = $( ".handList" ).find("em");
  $em.eq(4).addClass("main_menu_act");
  $em.eq(4).children(0).removeClass().addClass("i-hd3_act");
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
<div class="center">
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
<div class="wapper">  
	<div class="inLeft">
    	<h4><i class="i-LtIco1"><img src="__ROOT__/Public/Images/submenu/alarmmenage.png"></i><span>告警管理</span></h4>
        <div class="LtMenu">
        	<ul>	
                <li onclick="navigation(this)"  class="battery_1"><a href="<?php echo U('Alarm/alarminfo');?>" title="告警信息" target='mainFrame' class="act">告警信息</a></li>
				
            </ul>
        </div>

	</div>
    <div class="inRight">
		<iframe id="mainFrame" src="<?php echo U('Alarm/alarminfo');?>" name="mainFrame"
				" frameborder="0" scrolling="yes" style="width:100%;border:0;padding:0;margin:0;height:100%;background-color:">
		</iframe>  
		<div id="dialog-modal" style="display:none;" title="">
			<iframe id="dialog-modal-iframe" width="100%" scrolling="no" height="100%" frameborder="no" allowtransparency="yes" marginheight="0" marginwidth="0" border="0" src="#" runat="server" name="dialog-modal-iframe">
				<html>
					<head></head>
					<body></body>
				</html>
			</iframe>
		</div>
		<div id="dialog-modal-1" style="display:none;" title="">
			<iframe id="dialog-modal-iframe-1" width="100%" scrolling="no" height="100%" frameborder="no" allowtransparency="yes" marginheight="0" marginwidth="0" border="0" src="#" runat="server" name="dialog-modal-iframe-1">
				<html>
					<head></head>
					<body></body>
				</html>
			</iframe>
		</div>  
    </div>
	<div class="clear"></div>
</div> 	        
</div>
 	       
<div id="foot">
	<div>
		<p>copyright@2017 All Rights Reserved</p>
	</div>
</div>
</body>
</html>