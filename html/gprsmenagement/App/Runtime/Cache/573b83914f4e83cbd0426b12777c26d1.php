<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>租赁管理</title>
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
</head>
<body>
<div id="header" style="width:100%">
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
				<a href="<?php echo U('Index/index');?>&l=zh-cn"><?php echo (L("zh_cn")); ?></a> 
				| <a href="<?php echo U('Index/index');?>&l=en-us"><?php echo (L("en_us")); ?></a>
				|	<a href="<?php echo U('Login/help');?>" target="_blank"><img src="__ROOT__/Public/Images/tophelp.png" align="absmiddle"/> <?php echo (L("help")); ?> </a>
				</p>
			</div>
			<div id="clear"></div>
		</div>
		</div>
	</div>	
<div class="center">
  	    <div class="handList">
        	<ul>
			    <li><a href="<?php echo U('Index/index');?>" target="_blank" title="首页"><em><i class="i-hd0"></i></em><span>首页</span></a></li>
                <li><a href="<?php echo U('PersonForkliftManage/index');?>" target="_blank" title="人员及叉车管理"><em><i class="i-hd1"></i></em><span>人员及叉车管理</span></a></li>
                <li><a href="<?php echo U('Monitor/index');?>" target="_blank" title="监控系统"><em><i class="i-hd2"></i></em><span>监控系统</span></a></li>
                <li><a href="<?php echo U('Vehiclemaintenance/index');?>" target="_blank" title="车辆保养与维护"><em><i class="i-hd3"></i></em><span>车辆保养与维护</span></a></li>
                <li><a href="<?php echo U('Battery/index');?>" target="_blank" title="电池管理"><em><i class="i-hd4"></i></em><span>电池管理</span></a></li>
                <li><a href="<?php echo U('Report/index');?>" target="_blank" title="报表"><em><i class="i-hd5"></i></em><span>报表</span></a></li>
                <li><a href="<?php echo U('Lease/index');?>" target="_blank" title="租赁管理"><em class="main_menu_act"><i class="i-hd6_act"></i></em><span>租赁管理</span></a></li>
                <li><a href="<?php echo U('Config/index');?>" target="_blank" title="设置"><em><i class="i-hd7"></i></em><span>设置</span></a></li>
                <li><a href="<?php echo U('System/index');?>" target="_blank" title="系统信息"><em><i class="i-hd8"></i></em><span>系统信息</span></a></li>
            </ul>
        </div>	
<div class="wapper">
    
	<div class="inLeft">
    	<h4><i class="i-LtIco1"><img src="__ROOT__/Public/Images/submenu/lease.png"></i><span>租赁管理</span></h4>
        <div class="LtMenu">
        	<ul>	
                <li onclick="navigation(this)" class="lease_1"><a href="<?php echo U('Monitor/monitor');?>" title="车辆定位" target='mainFrame'>车辆定位</a></li>	
                <li onclick="navigation(this)" class="lease_2"><a href="<?php echo U('Monitor/trackplay');?>" title="车辆轨迹" target='mainFrame'>车辆轨迹</a></li>
				<li onclick="navigation(this)" class="lease_3"><a href="<?php echo U('Lease/leaseinfo');?>" title="租赁信息" target='mainFrame' class="act">租赁信息</a></li>
				
                <li onclick="navigation(this)" class="lease_4"><a href="<?php echo U('Lease/driverregister');?>" title="租赁司机登记" target='mainFrame'>租赁司机登记</a></li>
				<li onclick="navigation(this)" class="lease_5"><a href="<?php echo U('Lease/cheliangfenpeisiji');?>" title="租赁车辆分配司机" target='mainFrame'>租赁车辆分配司机</a></li>
				
                <li onclick="navigation(this)" class="lease_6"><a href="<?php echo U('Lease/cheliangkongzhi');?>" title="租赁车辆控制" target='mainFrame'>租赁车辆控制</a></li>
            </ul>
        </div>

	</div>
    <div class="inRight">
		<iframe id="mainFrame" src="<?php echo U('Lease/leaseinfo');?>" name="mainFrame"
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