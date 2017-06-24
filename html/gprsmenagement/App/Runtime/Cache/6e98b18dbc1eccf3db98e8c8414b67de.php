<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title></title>
<link href="__ROOT__/Public/jquery/mini/lib/ligerUI/skins/Aqua/css/ligerui-all.css" rel="stylesheet" type="text/css" /> 
<link href="__ROOT__/Public/jquery/mini/lib/ligerUI/skins/Gray/css/all.css" rel="stylesheet" type="text/css" /> 
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/easyui.css">
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/icon.css">
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/demo.css"> 
<link rel="stylesheet" href="__ROOT__/Public/css/redmond/jquery-ui-1.7.1.custom.css" type="text/css" title="ui-theme" />
	
<script src="__ROOT__/Public/jquery/js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/core/base.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerTree.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerAccordion.js" type="text/javascript"></script><script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerCheckBox.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/js/jquery.easyui.min.js"></script>
<script type="text/javascript" src="__ROOT__/Public/jquery/js/jquery-ui-1.7.1.custom.min.js"></script>
	
<script type="text/javascript"> 
	var URL = "__URL__";
	$(document).ready(	function()
	{   
		$("#seltree").load(URL+"/seltree");
		$("#report").load(URL+"/report");
	});
 
function onClick(note)
{
    console.info(note.data);		
	if (typeof(note.data.children) == "undefined") { 
	    $("#seldeviceid").attr("value",note.data.id);
		seldeviceid = note.data.id;
	}
	else{
		$("#seldeviceid").attr("value","");
		seldeviceid=0;
		alert("请选择设备节点！");
	}
	
}
</script> 

</head>
<body> 
<div style="margin-top:-25px;width:99%;height: 650px;">
<form id="form1" method="post" action="<?php echo U('Report/getchart');?>" name="form1">
	<div id="seltree" position="left" style="float:left;width:25%;margin-top:-5px;">
	</div>
	<div  id="report" style="float:right;width:74%;margin-top:8px;">
	</div>	
</form>
</div>

</body>
</html>