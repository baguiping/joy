<?php if (!defined('THINK_PATH')) exit();?>﻿<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=gb2312" http-equiv="Content-Type">
<meta content="IE=7" http-equiv="X-UA-Compatible">
<title>管理员车辆分配</title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<link href="__ROOT__/Public/jquery/mini/lib/ligerUI/skins/Aqua/css/ligerui-all.css" rel="stylesheet" type="text/css" />
<link href="__ROOT__/Public/jquery/mini/lib/ligerUI/skins/Gray/css/all.css" rel="stylesheet" type="text/css" />
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js" type="text/javascript">
</script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/core/base.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerCheckBox.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerResizable.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerListBox.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerTree.js" type="text/javascript"></script>
<script src="__ROOT__/Public/js/ajax_post.js" type="text/javascript">
</script>
<script src="__ROOT__/Public/js/getUrl.js">
</script>
<script type="text/javascript" charset="gb2312">
var manager = null;	
     $(function ()
        { 
		 var dataGrid = [
			 <?php
 echo "{id:1, name:'张三', mac:'123' },"; echo "{id:2, name:'李四', mac:'234' },"; echo "{id:3, name:'王五', mac:'345' }"; ?>
           
                ];
            var dataGridColumns = [
                { header: '编号', name: 'id', width: 50 },
                { header: '名称', name: 'name', width: 60 },
                { header: '驾驶证信息', name: 'mac' }
            ];
            $("#listBox1").ligerListBox({
                data: dataGrid,
                textField: 'name',
                columns: dataGridColumns,
                isMultiSelect: true,
                isShowCheckBox: true,
                width: 373,height:480
            });
        }); 

</script>
</head>
<body>
<div class="bodyborder" style="margin-top:-16px;">
<div style="height:545px;overflow-y:auto;">
<form onSubmit="return subbffun();" method="post" name ="addform" action="">
<div  position="left" style="height:500px;">
	<div id="listBox1" style="margin-top:10px; margin-left:10px;width:450px;float:left;">
	</div>
</div>

<div style="height:20px;text-align:center;" class="item">
<input class="submit_1" type="submit"  id="submit" value="提交">
</div>
</form>
</div>
</div>
</body>
</html>