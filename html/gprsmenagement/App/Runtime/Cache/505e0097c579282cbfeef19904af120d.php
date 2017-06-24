<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title></title>
<link href="__ROOT__/Public/jquery/mini/lib/ligerUI/skins/Aqua/css/ligerui-all.css" rel="stylesheet" type="text/css" /> 
<link href="__ROOT__/Public/jquery/mini/lib/ligerUI/skins/Gray/css/all.css" rel="stylesheet" type="text/css" /> 
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/core/base.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerForm.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerComboBox.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerTextBox.js" type="text/javascript"></script>  
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerCheckBox.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerResizable.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerListBox.js" type="text/javascript"></script>
<script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerTree.js" type="text/javascript"></script>

<script type="text/javascript"> 
var manager = null;	
     $(function ()
        { 
			$("#tree1").ligerTree({ 
                nodeWidth: 100,
                checkbox: true,
                idFieldName: 'id', 
                isExpand: true, 
                slide: false 
            });
			manager = $("#tree1").ligerTree({ checkbox: true, ajaxType: 'get' });
        }); 
	var URL = "__URL__";
	$(document).ready(	function()
{   
//  $("#seltree").load(URL+"/seltree");
});
        var groupicon = "__ROOT__/Public/jquery/mini/lib/ligerUI/skins/icons/communication.gif";
        $(function ()
        { 
            //创建表单结构 
            $("#form2").ligerForm({
                inputWidth: 86, labelWidth: 132, space: 20,
                fields: [
                { name: "ProductID", type: "hidden" },
                { display: "恢复初始参数设置", name: "bmscfgflag", newline: true, type: "select",comboboxName: "bmscfgflagName",options: { data: [{ id: 0, text: '不设定' },{ id: 1, text: '设定'}] }, group: "BMS混合配置", groupicon: groupicon},
                { display: "通讯故障告警阈值 ", name: "bmsalarmextime", newline: false, type: "number"},
                { display: "单体电压过高阈值I", name: "UnitsInStock", newline: true, type: "number", group: "电池组阀值配置", groupicon: groupicon },
                { display: "单体电压过低阈值I", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "电池温度过高阈值I", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "电池温度过低阈值I", name: "UnitsOnOrder", newline: true, type: "number" },
				{ display: "回充电流过大阈值I", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "放电电流过大阈值I", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "绝缘电阻过低阈值I", name: "UnitsOnOrder", newline: true, type: "number" },
				{ display: "SOC过低阈值I", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "电池组总压过高阈值I", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "电池组总压过低阈值I", name: "UnitsOnOrder", newline: true, type: "number" },
				{ display: "电池组压差过大阈值I", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "电池组温差过大阈值I", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "单体电压过高阈值II", name: "UnitsInStock", newline: true, type: "number" },
				{ display: "单体电压过低阈值II", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "电池温度过高阈值II", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "电池温度过低阈值II", name: "UnitsOnOrder", newline: true, type: "number" },
				{ display: "回充电流过大阈值II", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "放电电流过大阈值II", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "绝缘电阻过低阈值II", name: "UnitsOnOrder", newline: true, type: "number" },
				{ display: "SOC过低阈值II", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "电池组总压过高阈值II", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "电池组总压过低阈值II", name: "UnitsOnOrder", newline: true, type: "number" },
				{ display: "电池组压差过大阈值II", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "电池组温差过大阈值II", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "单体电压过高阈值III", name: "UnitsInStock", newline: true, type: "number" },
				{ display: "单体电压过低阈值III", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "电池温度过高阈值III", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "电池温度过低阈值III", name: "UnitsOnOrder", newline: true, type: "number" },
				{ display: "回充电流过大阈值III", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "放电电流过大阈值III", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "绝缘电阻过低阈值III", name: "UnitsOnOrder", newline: true, type: "number" },
				{ display: "SOC过低阈值III", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "电池组总压过高阈值III", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "电池组总压过低阈值III", name: "UnitsOnOrder", newline: true, type: "number" },
				{ display: "电池组压差过大阈值III", name: "UnitsOnOrder", newline: false, type: "number" },
				{ display: "电池组温差过大阈值III", name: "UnitsOnOrder", newline: false, type: "number" },
                { display: "M1电池数", name: "bmscfgflag", newline: true, type: "digits" , group: "采集串数配置", groupicon: groupicon},
                { display: "M2电池数 ", name: "bmsalarmextime", newline: false, type: "digits"},
                { display: "M3电池数 ", name: "bmsalarmextime", newline: false, type: "digits"  },
				{ display: "M4电池数 ", name: "bmsalarmextime", newline: true, type: "digits"  },
				{ display: "M5电池数 ", name: "bmsalarmextime", newline: false, type: "digits"},
                { display: "M6电池数 ", name: "bmsalarmextime", newline: false, type: "digits"  },
				{ display: "M7电池数 ", name: "bmsalarmextime", newline: true, type: "digits"  },
				{ display: "M8电池数 ", name: "bmsalarmextime", newline: false, type: "digits"  },
				{ display: "M9电池数 ", name: "bmsalarmextime", newline: false, type: "digits"},
                { display: "M10电池数 ", name: "bmsalarmextime", newline: true, type: "digits"  },
				{ display: "M11电池数 ", name: "bmsalarmextime", newline: false, type: "digits"  },
				{ display: "M12电池数 ", name: "bmsalarmextime", newline: false, type: "digits"  },
				{ display: "M13电池数 ", name: "bmsalarmextime", newline: true, type: "digits"},
                { display: "M14电池数 ", name: "bmsalarmextime", newline: false, type: "digits"  },
				{ display: "M15电池数 ", name: "bmsalarmextime", newline: false, type: "digits"  },
				{ display: "M16电池数 ", name: "bmsalarmextime", newline: true, type: "digits"  },
				{ display: "M17电池数 ", name: "bmsalarmextime", newline: false, type: "digits"},
                { display: "M18电池数 ", name: "bmsalarmextime", newline: false, type: "digits"  },
				{ display: "M19电池数 ", name: "bmsalarmextime", newline: true, type: "digits"  },
				{ display: "M20电池数 ", name: "bmsalarmextime", newline: false, type: "digits"  },
				{ display: "M21电池数 ", name: "bmsalarmextime", newline: false, type: "digits"},
                { display: "M22电池数 ", name: "bmsalarmextime", newline: true, type: "digits"  },
				{ display: "M23电池数 ", name: "bmsalarmextime", newline: false, type: "digits"  },
				{ display: "M24电池数 ", name: "bmsalarmextime", newline: false, type: "digits"  },
				{ display: "M25电池数 ", name: "bmsalarmextime", newline: true, type: "digits"  },
				{ display: "最大允许放电电流", name: "bmscfgflag", newline: true, type: "number" , group: "充放电管理配置", groupicon: groupicon},
                { display: "最大允许回充电流", name: "bmsalarmextime", newline: false, type: "number"},
                { display: "充电机控制", name: "ddd", newline: false, type: "select",comboboxName: "CategoryName",options: { data: [{ id: 0, text: '开' },{ id: 1, text: '关'}] }  },
				{ display: "充电请求电流设定", name: "bmsalarmextime", newline: true, type: "number"  },
				{ display: "充电请求电压设定", name: "bmsalarmextime", newline: false, type: "number"},
                { display: "电流校准", name: "bmsalarmextime", newline: false, type: "number"  },
				{ display: "电流比例", name: "bmsalarmextime", newline: true, type: "number"  },
				{ display: "电池组最大容量", name: "bmsalarmextime", newline: false, type: "number"  },
				{ display: "电池组总容量", name: "bmsalarmextime", newline: false, type: "number"},
				{ display: "电池组剩余容量", name: "bmsalarmextime", newline: true, type: "number"  },
				{ display: "电池组循环次数", name: "bmsalarmextime", newline: false, type: "digits"},
                { display: "风扇开启温度阈值", name: "bmsalarmextime", newline: false, type: "number"  },
				{ display: "风扇关闭温度阈值", name: "bmsalarmextime", newline: true, type: "number"  },
				{ display: "加热开启温度阈值", name: "bmsalarmextime", newline: false, type: "number"  },
				{ display: "加热关闭温度阈值", name: "bmsalarmextime", newline: false, type: "number"}
                ]
            }); 
        });  
    </script> 

</head>
<body> 
<div style="margin-top:-25px;width:100%;">
	<div id="seltree" position="left" style="float:left;width:21%;height:653px;margin-top:-5px;">
	    <ul id="tree1">
		<?php if(is_array($adminlist)): $i = 0; $__LIST__ = $adminlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id=<?php echo ($vo["userid"]); ?>>
		<span><?php echo ($vo["username"]); ?></span>
			<ul>
			<?php if(is_array($vo['userlist'])): $i = 0; $__LIST__ = $vo['userlist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><li id=<?php echo ($sub["userid"]); ?>>
				<span><?php echo ($sub["username"]); ?></span>
					<ul>
						<?php if(is_array($sub['devicelist'])): $i = 0; $__LIST__ = $sub['devicelist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub2): $mod = ($i % 2 );++$i;?><li id=<?php echo ($sub2["deviceid"]); ?>>
							<span><?php echo ($sub2["platenumber"]); ?></span>
				
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>   
	</div>
	<div  id="form2" style="float:right;width:77%;">
	</div>	
</div>	
</body>
</html>