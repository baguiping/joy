<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title></title>

<script type="text/javascript"> 
	var URL = "__URL__";

	$(function ()
    { 
		$("#accordion1").ligerAccordion(
        {
            height: 650
        });
    });
</script> 

</head>
<body> 
	 <div style="height:450px;"> 
			<div  style="float:left;margin-left:100px;margin-top:30px;">
				<div class="item">
					<span class="title" style="width:220;">恢复初始参数设置:</span>
					<select name="sel" id="sel" onchange="setinput()" style="width:180;">
						<option value="0">不设定</option>
						<option value="1">设定</option>
					</select>
					<input type="hidden"  class="text_2" value="" maxlength="20" name="resetInitiSetFlag" id="resetInitiSetFlag">
				</div>
				<div class="item">
					<span class="title" style="width:220;">设备通信后备服务器地址模式:</span>
					<select name="mode" id="mode" onchange="changeAddrMode()" style="width:180;">
						<option value="0">IP&PORT</option>
						<option value="1">DOMAIN&PORT</option>
					</select>
					<input type="hidden"  class="text_2" value="" maxlength="20" name="comServerAddrMode" id="comServerAddrMode">
				</div>	
				<div class="item">
					<span class="title" style="width:220;" id="addrMode">设备通信后备服务器IP:</span>
					<input type="text"  class="text_2" value="<?php echo ($devcfginfo[0]["comServerAddrIp"]); ?>" maxlength="20" name="comServerAddrIp" id="comServerAddrIp">
				</div>
				<div class="item">
					<span class="title" style="width:220;">设备通信后备服务器端口:</span>
					<input type="text"  class="text_2" value="<?php echo ($devcfginfo[0]["comServerAddrPort"]); ?>" maxlength="20" name="comServerAddrPort" id="comServerAddrPort">
				</div>
				<div class="item">
					<span class="title" style="width:220;">设备GPRS APN模式:</span>
					<select name="apnmode" id="apnmode" onchange="changeApnMode()" style="width:180;">
						<option value="0">公有APN</option>
						<option value="1">私有APN</option>
					</select>
					<input type="hidden"  class="text_2" value="" maxlength="20" name="gprsApnMode" id="gprsApnMode">
				</div>	
				<div class="item">
					<span class="title" style="width:220;">设备GPRS通信APN账号:</span>
					<input type="text"  class="text_2" value="<?php echo ($devcfginfo[0]["gprsApnAccount"]); ?>" maxlength="20" name="gprsApnAccount" id="gprsApnAccount">
				</div>
				<div class="item">
					<span class="title" style="width:220;">设备GPRS通信APN密码:</span>
					<input type="text"  class="text_2" value="<?php echo ($devcfginfo[0]["gprsApnPwd"]); ?>" maxlength="20" name="gprsApnPwd" id="gprsApnPwd">
				</div>
				<div class="item">
					<span class="title" style="width:220;">设备主动上传信息间隔时间:</span>
					<input type="text"  class="text_2" value="<?php echo ($devcfginfo[0]["uploadInterval"]); ?>" maxlength="20" name="uploadInterval" id="uploadInterval">
				</div>	
				<div class="item">
					<span class="title" style="width:220;">设备心跳时间间隔:</span>
					<input type="text"  class="text_2" value="<?php echo ($devcfginfo[0]["heartbeatInterval"]); ?>" maxlength="20" name="heartbeatInterval" id="heartbeatInterval">
				</div>
				<div class="item">
					<span class="title" style="width:220;">GPRS/BMS通讯故障超时时间:</span>
					<input type="text"  class="text_2" value="<?php echo ($devcfginfo[0]["comTimeout"]); ?>" maxlength="20" name="comTimeout" id="comTimeout">
				</div>					
			</div>					
    </div>    	
</body>
</html>