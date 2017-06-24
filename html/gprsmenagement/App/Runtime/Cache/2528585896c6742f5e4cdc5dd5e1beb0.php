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
 echo "{id:1, name:'车辆1', mac:'123' },"; echo "{id:2, name:'车辆2', mac:'234' },"; echo "{id:3, name:'车两3', mac:'345' }"; ?>
           
                ];
            var dataGridColumns = [
                { header: '车牌号', name: 'id', width: 50 },
                { header: '所属车队', name: 'name', width: 60 },
                { header: '车辆型号', name: 'mac' }
            ];
            $("#listBox1").ligerListBox({
                data: dataGrid,
                textField: 'name',
                columns: dataGridColumns,
                isMultiSelect: true,
                isShowCheckBox: true,
                width: 300,height:480
            });

			$("#tree1").ligerTree({ 
                nodeWidth: 200,
                checkbox: true,
                idFieldName: 'id', 
                isExpand: false, 
                slide: false 
            });
			manager = $("#tree1").ligerTree({ checkbox: true, ajaxType: 'get' });
        }); 
function dev_out() {
	var $nlevel=$( "#tree1" ).find("li");
	var $checknum=0;
	for ($i = 0; $i < $nlevel.length; $i++) 
	{
		if($nlevel.eq($i).attr("outlinelevel")=="2")
		{
			if($nlevel.eq($i).children(0).children(2).hasClass("l-checkbox-checked"))
			{
				$checknum++;
				var $name=$nlevel.eq($i).find("span").text();
				var $nacidmac=$nlevel.eq($i).attr("id");
				var $id=$nacidmac.substring(0,$nacidmac.indexOf(","));
				var $mac=$nacidmac.substring($nacidmac.indexOf(",")+1,$nacidmac.length);
				var $ntr=$( "#listBox1" ).find("tr");
				var $nindex=$list=$( "#listBox1" ).find("tbody").children().length-1;
				$( "#listBox1" ).find("table").children().last().after("<tr index='"+$nindex+"' value='"+$id+"'><td class='l-checkboxrow' style='width:18px;'><input type='checkbox' index='"+$nindex+"' value='"+$id+"'></td><td>"+$id+"</td><td>"+$name+"</td><td>"+$mac+"</td></tr>");	
				$nlevel.eq($i).remove();
			}
		}
	}
	if($checknum == 0)
	{
		alert("请选择从组中要移出的设备！");
		return;
	}
	else
	{	
		for ($i = 0; $i < $nlevel.length; $i++) 
		{
			if($nlevel.eq($i).attr("outlinelevel")=="1")
			{
				$note=$nlevel.eq($i).find("ul").children().last().find(".l-note");
				$note.removeClass();
				$note.addClass("l-box l-note-last");
			}
	    }
	}
} 

function dev_in() {
	var $acchecknum=0;
	var $ntr=$( "#listBox1" ).find("tr");
	var $nlevel=$( "#tree1" ).find("li");
	var $k=0;
	for (var i = 1; i < $ntr.length; i++) 
	{
		if($ntr.eq(i).hasClass("l-selected"))
		{
			$acchecknum++;
			var $id=$ntr.eq(i).attr("value");
			var $ntd=$ntr.eq(i).children();
			var $name=$ntd.eq(2).text();
			var $mac=$ntd.eq(3).text();
		//	var $nlevel=$( "#tree1" ).find("li");
			var $gpchecknum=0;
			//var $k=0;
			for ($j=0; $j < $nlevel.length; $j++) 
			{
				if($nlevel.eq($j).attr("outlinelevel")=="1")
				{
					if($nlevel.eq($j).children(0).children(2).hasClass("l-checkbox-checked"))
					{
						$gpchecknum++;
						$k=$j;
					}
				}
			}
			
			if($gpchecknum > 1)
			{
				alert("只能指定到同一组下！");
				return;
			}
			else if($gpchecknum == 0)
			{
				alert("请指定一个组！");
				return;
			}
			else
			{
				//alert($nlevel.eq($k).children(1).children().last().attr("id"));
				$nlevel.eq($k).children(1).children().last().removeClass();
				$nlevel.eq($k).children(1).children().last().addClass("");
				//组下已有设备
				if($nlevel.eq($k).children(1).find('li').length!=0)
				{
					$dataindex=$nlevel.eq($k).children(1).children().last().attr("treedataindex");
					if($nlevel.eq($k).hasClass("l-last"))
					{
						$nlevel.eq($k).children(1).children().last().after("<li class='' id='"+ $id+","+$mac+"' outlinelevel='2' treedataindex='"+$dataindex+"'><div class='l-body'><div class='l-box'></div><div class='l-box l-note'></div><div class='l-box l-checkbox l-checkbox-unchecked'></div><div class='l-box l-tree-icon l-tree-icon-leaf '></div><span>"+ $name+"</span></div></li>");
					}
					else
					{
						$nlevel.eq($k).children(1).children().last().after("<li class='' id='"+ $id+","+$mac+"' outlinelevel='2' treedataindex='"+$dataindex+"'><div class='l-body'><div class='l-box l-line'></div><div class='l-box l-note'></div><div class='l-box l-checkbox l-checkbox-unchecked'></div><div class='l-box l-tree-icon l-tree-icon-leaf '></div><span>"+ $name+"</span></div></li>");
					}	
				}
				else
				{
					$dataindex=$nlevel.eq($k).attr("treedataindex");
					if($nlevel.eq($k).hasClass("l-last"))
					{
						$nlevel.eq($k).children().last().append("<li class='l-first' id='"+ $id+","+$mac+"' outlinelevel='2' treedataindex='"+$dataindex+"'><div class='l-body'><div class='l-box'></div><div class='l-box l-note'></div><div class='l-box l-checkbox l-checkbox-unchecked'></div><div class='l-box l-tree-icon l-tree-icon-leaf '></div><span>"+ $name+"</span></div></li>");
					}
					else
					{
						$nlevel.eq($k).children().last().append("<li class='l-first' id='"+ $id+","+$mac+"' outlinelevel='2' treedataindex='"+$dataindex+"'><div class='l-body'><div class='l-box l-line'></div><div class='l-box l-note'></div><div class='l-box l-checkbox l-checkbox-unchecked'></div><div class='l-box l-tree-icon l-tree-icon-leaf '></div><span>"+ $name+"</span></div></li>");
					}
				}
				$lastnote=$nlevel.eq($k).children(1).find(".l-note-last");
				$lastnote.removeClass();
				$lastnote.addClass("l-box l-note");
				$ntr.eq(i).remove();	
			}
		}
	}
	
	if($acchecknum == 0)
	{
		alert("请选择要从设备列表中指定到组的设备！");
		return;
	}
	else
	{
		$note=$nlevel.eq($k).children(1).children().last().find(".l-note")
		$note.removeClass();
		$note.addClass("l-box l-note-last");
	}
} 

$(document).ready(	function()
{
	if(document.getElementById("groupnum").value ==0)
	{
		var btn = document.getElementById("submit"); 
		btn.disabled=true; 	
	}
});
   
function subbffun(){
		
		//将ac设备ID字符串赋给acid隐藏域，以便表单提交后取值		
		var $ntr=$( "#listBox1" ).find("tr");
		var $aclist="";
		for (var i = 1; i < $ntr.length; i++) 
		{
			$aclist += $ntr.eq(i).attr("value") + ",";
			
		}
		$( "#acid" ).attr("value",$aclist);
		
		//将group,ac的关系字符串赋给group[]隐藏域，以便表单提交后取值	
		var $nlevel=$( "#tree1" ).find("li");
		for (var j=0; j < $nlevel.length; j++) 
		{
			if($nlevel.eq(j).attr("outlinelevel")=="1")
			{
				$gac=$nlevel.eq(j).find("li");
				if($gac.length >0)//组下有设备，则取组ID设备ID
				{
					$groupid =$nlevel.eq(j).attr("id");
					$acid="";
					for (var k=0; k < $gac.length; k++) 
					{
						$groupacid = $gac.eq(k).attr("id");
						$acid += $groupacid.substring(0,$groupacid.indexOf(",")) + ",";	
					}
					$( "#acid" ).after("<input type='hidden'  value='"+$groupid+","+$acid+"' name='group[]' id='group[]'>");
				}
			}
			else
			{
				continue;
			}
		}	
		return true;
}

</script>
</head>
<body>
<div class="bodyborder" style="margin-top:-16px;">
<div style="height:545px;overflow-y:auto;">
<form onSubmit="return subbffun();" method="post" name ="addform" action="devdesignate.php">
<div style="height:500px;">
<div  position="left">
	<div id="listBox1" style="margin-top:10px; margin-left:10px;width:400px;float:left;">
	</div>
</div>
<div  position="mainright" style="margin-top:10px;width:450px;height:480px;float:right;">
	<div  position="center">
		<div style="width:20px;float:left;margin-left:8px;margin-top:180px;">
			<input id="in" class="submit_1" type="button" value="--->" onClick="dev_in();" name="in">
			<input name="out"  class="submit_1"  type="button" id= "out" style="margin-top:20px;" value="<---" onClick="dev_out();">			
		</div>
	</div>
	<div  position="right">
	<div style="width:300px; height:480px; margin-right:10px;float:right; border:1px solid #ccc; overflow:auto;  ">
    	<ul id="tree1">
	 <?php
 echo "<li id=1>"; echo "<span>管理员1</span><ul>"; echo "<li id=5,134><span>车辆5</span></li>"; echo "<li id=6,166><span>车辆6</span></li>"; echo "</ul></li>"; echo "<li id=2>"; echo "<span>管理员2</span><ul>"; echo "<li id=7,157><span>车辆7</span></li>"; echo "<li id=8,158><span>车辆8</span></li>"; echo "</ul></li>"; ?>
    	</ul>
    </div> 
	</div>	
</div>
</div>
<input type="hidden"  value="" maxlength="65" name="acid" id="acid">
<?php  echo '<input type="hidden"  value="'.$groupNum.'" maxlength="65" name="groupnum" id="groupnum">'; ?>
<div style="height:20px;text-align:center;" class="item">
<input class="submit_1" type="submit"  id="submit" value="提交">
</div>
</form>
</div>
</div>
</body>
</html>