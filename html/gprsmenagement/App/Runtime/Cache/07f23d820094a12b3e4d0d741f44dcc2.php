<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title></title>
<link href="__ROOT__/Public/jquery/mini/lib/ligerUI/skins/Aqua/css/ligerui-all.css" rel="stylesheet" type="text/css" /> 
<link href="__ROOT__/Public/jquery/mini/lib/ligerUI/skins/Gray/css/all.css" rel="stylesheet" type="text/css" /> 
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<script src="__ROOT__/Public/jquery/js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/core/base.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerTree.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerAccordion.js" type="text/javascript"></script><script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerCheckBox.js" type="text/javascript"></script>

<script type="text/javascript"> 
	var URL = "__URL__";
	$(document).ready(	function()
	{   
		$("#seltree").load(URL+"/seltree");
		$("#cfgpage").load(URL+"/devcfgpage");
	});
    
	
	var tTimer;
	var seldeviceid=0;
	$(function() {  
        $("#button").click(function() { 	
			var cfgjson = {};
			var cfgarray = {};
			var $a = $("#cfgpage").find("input");
			for(var i = 0; i < $a.length; i++) {
				cfgarray[$a.eq(i).attr("name")] = $a.eq(i).attr("value") || '';  
			}
			cfgjson["dev_param_cfg"] = cfgarray;
			console.info(JSON.stringify(cfgjson));
			var cfgstr = JSON.stringify(cfgjson);
		$("#cfgjsonstr").attr("value",cfgstr);
		if(seldeviceid == 0){
			alert("请点击设备节点选择要进行配置的设备！");
			return;
		}
		
		$.ajax({
                type: "post",
                url:"__URL__/devcfgsend",
                data: "cfgjsonstr="+cfgstr+"&seldeviceid="+seldeviceid,
          
                error: function(request) {
                    alert("下发配置失败！");
                },
                success: function(data) {
				alert(data);
                    if(data=="succed"){
					   getcfgresult();
					   tTimer=setInterval("getcfgresult()",3000);
					}
                }
            });
		
		});  
    });  
	
function setinput(){
	$("#initialparamset").attr("value",document.getElementById("sel").value);
} 

function changeAddrMode(){
	if(0 == document.getElementById("sel").value)
	{
		$("#addrMode").text("设备通信后备服务器域名:"); 
	}
	$("#comServerAddrMode").attr("value",document.getElementById("sel").value);
} 

function getcfgresult(){
	$.ajax({
                type: "get",
                url:"__URL__/getcfgresult",
                data: "imei="+seldeviceid,
          
                error: function(request) {
                    alert("Connection error");
                },
                success: function(data) {
				console.info(data);
                    if(data=="succed"){
					   alert("下发配置成功！");
					   window.clearInterval(tTimer);
					   $("#cfgpage").load(URL+"/cfgpage");
					}
                }
            });
}

function onClick(note)
{
    console.info(note.data);		
	if (typeof(note.data.children) == "undefined") { 
	    $("#seldeviceid").attr("value",note.data.id);
		$("#cfgpage").load(URL+"/cfgpage",{"deviceid" : note.data.id});
		seldeviceid = note.data.id;
	}
	else{
		$("#seldeviceid").attr("value","");
		seldeviceid=0;
		alert("请点击设备节点选择要进行配置的设备！");
	}
	
	//$("[treedataindex='"+treedataindex+"']");	
}
</script> 

</head>
<body> 
<div style="margin-top:-25px;width:99%;height: 650px;">
<form id="form1" method="post" action="<?php echo U('Config/devcfgsave');?>" name="form1">
	<div id="seltree" position="left" style="border:1px solid #CFCFCF;float:left;width:24%;margin-top:8px;height: 580px;">
	</div>
	<div  id="cfgpage" style="border:1px solid #CFCFCF;float:right;width:75%;margin-top:8px;height: 580px;">
	</div>	
	<div style="margin-left:450px;">
		<input type="hidden"  name="cfgjsonstr" id="cfgjsonstr" value=""/>
		<input type="hidden"  name="seldeviceid" id="seldeviceid" value=""/>		
		<input class="submit_1" style="float:center;" type="button" id= "button" name="button" value="设置">
	</div>	
		
</form>
</div>

</body>
</html>