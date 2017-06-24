<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title></title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
 <link href="__ROOT__/Public/jquery/mini/lib/ligerUI/skins/Aqua/css/ligerui-all.css" rel="stylesheet" type="text/css" />
<link href="__ROOT__/Public/jquery/mini/lib/ligerUI/skins/Gray/css/all.css" rel="stylesheet" type="text/css" />
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js" type="text/javascript"></script>
<link href="__ROOT__/Public/js/datatime/_doc/common.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="__ROOT__/Public/js/datatime/_doc/prettify/prettify.js"></script>
<script type="text/javascript" src="__ROOT__/Public/js/datatime/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="__ROOT__/Public/js/datatime/lhgcalendar.min.js"></script>
<script type="text/javascript" src="__ROOT__/Public/js/datatime/demo.js"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/core/base.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerCheckBox.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerResizable.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerComboBox.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function ()
    {
        var manager=$("#test1").ligerComboBox({ isShowCheckBox: true, isMultiSelect: true,
		width: 196,
        data: [
                { text: '车辆1', id: '1' },
                { text: '车辆2', id: '2' },
                { text: '车辆3', id: '3' },
				{ text: '车辆4', id: '4' },
                { text: '车辆5', id: '5' }
              ], valueFieldID: 'test3'
           });
			manager.selectValue("1;2");
        });
</script>
</head>
<body>
<div>
<div style="height:630px;overflow-y:auto;">
<form onSubmit="" method="post" name ="addform" action="">
    <div class="item">
     <span class="title">开始时间:</span>
     <pre class="prettyprint" id="start" style="display:none">$.calendar({ format:'yyyy-MM-dd HH:mm:ss', real:'#start1' });</pre>					
		 <input class="runcode" name="start" type="text" id="start1"  value="2017-3-12 10:15:10" style="width:180px">
		 
   </div>
    <div class="item">
     <span class="title">结束时间:</span>
     <pre class="prettyprint" id="end" style="display:none">$.calendar({ format:'yyyy-MM-dd HH:mm:ss' , real:'#end1' });</pre>					
		 <input class="runcode" name="end" type="text" id="end1" value="2017-5-15 10:15:10" style="width:180px">
		 
   </div>
   <div class="item">
     <span class="title">租赁车辆选择:</span>
	 <div style="margin-left:120px;margin-top:-25px;">
	 <input type="text"  class="text_2" value="" maxlength="20" name="selvehicle" id="selvehicle">
	 </div>
	</div>
   <div class="item">
     <span class="title">负责姓名:</span>
     <input type="text"  class="text_2" value="王先生" maxlength="20" name="nickname" id="nickname">
   </div>
   <div class="item">
     <span class="title">出生年月:</span>
     <input type="text"  class="text_2" value="30" maxlength="20" name="brithday" id="brithday">
   </div>
   <div class="item">
		<span class="title">性别:</span>
		<select name="sex" id="sex">
		<option value="0" selected="true">男</option>
		<option value="1">女</option>
		</select>
	</div>
   <div class="item">
     <span class="title">IC卡编号:</span>
     <input type="text"  class="text_2" value="12345" maxlength="20" name="ICNO" id="ICNO">
   </div>
   <div class="item">
     <span class="title">联系电话:</span>
     <input type="text"  class="text_2" value="13333333333" maxlength="20" name="phnoe" id="phnoe">
   </div>
   
   <div class="item">
		<span class="title">权限等级:</span>
		<select name="level" id="level" disabled="disabled">
		<option value="0">租赁管理员</option>
		</select>
	</div>
	<div class="item">
     <span class="title">登记时间:</span>
     <input type="text"  class="text_2" value="2017-5-15 10:15:10" maxlength="20" name="nickname" id="nickname">
   </div>
   <div class="item">
     <span class="title">账户名称:</span>
     <input type="text"  class="text_2" value="aaaaaa" maxlength="20" name="account" id="account">
   </div>
   <div class="item">
     <span class="title">账户密码:</span>
     <input type="text"  class="text_2" value="123456" maxlength="20" name="password" id="password">
   </div>
   <div class="item">
     <span class="title">备注:</span>
     <input type="text"  class="text_2" value="" maxlength="20" name="remark" id="remark">
   </div>
<div style="height:40px;text-align:right;" class="item">
<input type="submit" style="margin-top:30px;margin-right:150px;" class="submit_1" value="提交" id= "submit" >
</div>
</form>
</div>
</div>
</body>
</html>