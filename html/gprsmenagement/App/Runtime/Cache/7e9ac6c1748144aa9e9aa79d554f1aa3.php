<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>设置</title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js"></script>
<script type="text/javascript">
var URL = "__URL__";
function selvehicle() {
	var editUrl = "<?php echo U('Config/selvehiclepage/');?>";
	parent.openDialog("选择车辆",400,600,editUrl,refreshPage,"");
} 

$(document).ready(	function()
{   
  $("#seltree").load(URL+"/seltree");
});
</script>
</head>

<body> 

	<div class="main_right" style="margin-top:-14px;">
		<div class="right">
			<div  id="paramdata" class="data" style="height:680px;">
				<div id="seltree" position="left" style="float:left;width:29%;height:653px;">
				</div>
				<div position="mainright" style="float:right;width:50%;margin-right:10%;height:653px;">
				<table id="tdata" class="tableline" style="width:100%;text-align: left;border: 1px solid #FFBA00;">
					<tr style="width:97%;border: 0px solid #CFCFCF;">
						<td style="width:97%;border: 0px solid #CFCFCF;height:128px;">
							<fieldset>
							    <legend>电池组</legend>
							    <div class="item">
									<span class="title">均衡电流:</span>
									<input type="text"  class="text_2" value="" maxlength="20" name="high" id="high"><span>  A</span>
								</div>
								<div class="item">
									<span class="title">SOC过低告警点:</span>
									<input type="text"  class="text_2" value="" maxlength="20" name="highalarm" id="highalarm"><span>  </span>
								</div>
								<div class="item">
									<span class="title">最大瞬态充电电流:</span>
									<input type="text"  class="text_2" value="" maxlength="20" name="collision" id="collision"><span>  A</span>
								</div>
								<div class="item">
									<span class="title">最高允许充电电压:</span>
									<input type="text"  class="text_2" value="" maxlength="20" name="highalarm" id="highalarm"><span> V</span>
								</div>
								<div class="item">
									<span class="title">最低允许充电电压:</span>
									<input type="text"  class="text_2" value="" maxlength="20" name="collision" id="collision"><span>  V</span>
								</div>
								<div class="item">
									<span class="title">允许最高工作温度:</span>
									<input type="text"  class="text_2" value="" maxlength="20" name="highalarm" id="highalarm"><span> ℃</span>
								</div>
								<div class="item">
									<span class="title">允许最低工作温度:</span>
									<input type="text"  class="text_2" value="" maxlength="20" name="collision" id="collision"><span> ℃</span>
								</div>
								<div class="item">
									<span class="title">允许最大漏电流:</span>
									<input type="text"  class="text_2" value="" maxlength="20" name="collision" id="collision"><span>  A</span>
								</div>
							</fieldset>
						</td>
					</tr>
					<tr style="border: 0px solid #CFCFCF;">
						<td style="border: 0px solid #CFCFCF;height:58px;">
							<fieldset>
							    <legend>单体电压</legend>
							     <div class="item">
									<span class="title">过压告警点:</span>
									<input type="text"  class="text_2" value="5" maxlength="20" name="overload" id="overload"><span>  V</span>
								</div>
								<div class="item">
									<span class="title">过压切断点:</span>
									<input type="text"  class="text_2" value="10" maxlength="20" name="alarm" id="alarm"><span>  V</span>
								</div>
								<div class="item">
									<span class="title">欠压告警点:</span>
									<input type="text"  class="text_2" value="5" maxlength="20" name="overload" id="overload"><span>  V</span>
								</div>
								<div class="item">
									<span class="title">欠压切断点:</span>
									<input type="text"  class="text_2" value="10" maxlength="20" name="alarm" id="alarm"><span>  V</span>
								</div>
							</fieldset>
						</td>
					</tr>
					
					<tr style="border: 0px solid #CFCFCF;">
						<td style="border: 0px solid #CFCFCF;height:58px;">
							<fieldset>
							    <legend>系统管理</legend>
								<div class="item">
									<span class="title">BMS采集模块数量:</span>
									<input type="text"  class="text_2" value="10" maxlength="20" name="menaparam" id="menaparam">
								</div>
								<div class="item">
									<span class="title">电池压差均衡点:</span>
									<input type="text"  class="text_2" value="12" maxlength="20" name="volumelevel" id="volumelevel">
								</div>
								<div class="item">
									<span class="title">风扇启动温度:</span>
									<input type="text"  class="text_2" value="12" maxlength="20" name="volumelevel" id="volumelevel"><span>  ℃</span>
								</div>
								<div class="item">
									<span class="title">风扇关闭温度:</span>
									<input type="text"  class="text_2" value="5" maxlength="20" name="temperature" id="temperature"><span>  ℃</span>
								</div>
								<div class="item">
									<span class="title">加热启动温度:</span>
									<input type="text"  class="text_2" value="12" maxlength="20" name="volumelevel" id="volumelevel"><span>  ℃</span>
								</div>
								<div class="item">
									<span class="title">加热关闭温度:</span>
									<input type="text"  class="text_2" value="5" maxlength="20" name="temperature" id="temperature"><span>  ℃</span>
								</div>
							</fieldset>
						</td>
					</tr>
				</table>
				</div>
		</div>
	</div>
</body>
</html>