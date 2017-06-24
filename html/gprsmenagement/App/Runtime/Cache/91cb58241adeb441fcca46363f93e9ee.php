<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title></title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(	function()
{		
	datasyn();
	//var tTimer=setInterval("datasyn()",1000*60*60*24); 
	var tTimer=setInterval("datasyn()",1000*60);
 });	
	function datasyn(){
		$('#synstatus').text( "正在下发配置.....");
		var http_request = createAjaxObject();
		if(http_request){
			var url = "dbimport.php";
			var data = "op=datasyn";
			http_request.open("post",url,true);
			http_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
			http_request.onreadystatechange = function(){
				if(http_request.readyState==4){
					if(http_request.status==200){
						if(http_request.responseText.search("succed")<0){
							$('#synstatus').text("下发配置失败！");
							var mytime=new Date();
							var curtime=mytime.getFullYear()+"-"+(mytime.getMonth()+1)+"-"+mytime.getDate()+" "+mytime.getHours()+":"+mytime.getMinutes()+":"+mytime.getSeconds();
							$('#syntime').text(curtime);
							return;
						}
						else{
							$('#synstatus').text("下发配置成功！");
							var mytime=new Date();
							var curtime=mytime.getFullYear()+"-"+(mytime.getMonth()+1)+"-"+mytime.getDate()+" "+mytime.getHours()+":"+mytime.getMinutes()+":"+mytime.getSeconds();
							$('#syntime').text(curtime);
						}
					}
				}
			}
			http_request.send(data);
		}
		delete http_request;
	}

	function createAjaxObject(){
		if(window.ActiveXObject){
			var newRequest = new ActiveXObject("Microsoft.XMLHTTP");
		}
		else{
			var newRequest = new XMLHttpRequest();
		}
		return newRequest;
	}
</script>
</head>
<body>
<div style="height:30px;text-align:center;" class="item">
<spain id="synstatus" style="color:red;"></spain>
<input id="close_button" class="submit_1" type="button" style="margin-top:30px;" value="确定" onClick="javascript:parent.closeDialog();" name="close_button">
</div>
</body>
</html>