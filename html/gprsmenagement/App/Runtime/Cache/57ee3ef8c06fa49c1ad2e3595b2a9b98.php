<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
</head>
<body>
    <div id="main" style="height:340px;border:0px solid #ccc;margin-top:-3px;"></div>
    <script type="text/javascript">
		var starttime="<?php echo $_POST["starttm"];?>";
		var endtime="<?php echo $_POST["endtm"];?>";
		var flag="<?php echo $_POST["flag"];?>";
		 $.post('__URL__/getnewcreateboard',{'start':starttime,'end':endtime,'nflag':0,'nflag2':flag},function(data){
		 	//alert(data.status);
			if(data.status==1){
				var res =data.data;
				var time_array= new Array();
				var data_array= new Array();
				for(var i=0;i<7;i++){
				time_array.push(i);
				data_array.push(Math.ceil(Math.random()*10));
				}	
				drawline(time_array,data_array,'main');
				
			}
			else{
				alert("查询数据库失败！");
			}
				
        },'json');
		
    </script>
</body>
</html>