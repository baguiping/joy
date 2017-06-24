<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title><?php echo (L("title")); ?></title>

<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/chart.css">
	<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/easyui.css">
	<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/icon.css">
	<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/demo.css"> 
	<link rel="stylesheet" href="__ROOT__/Public/css/ui.daterangepicker.css" type="text/css" />
	<link rel="stylesheet" href="__ROOT__/Public/css/redmond/jquery-ui-1.7.1.custom.css" type="text/css" title="ui-theme" />
	<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
	<script src="__ROOT__/Public/jquery/js/jquery-1.3.1.min.js"></script>
	<script type="text/javascript" src="__ROOT__/Public/jquery/js/jquery-ui-1.7.1.custom.min.js"></script>
	<script type="text/javascript" src="__ROOT__/Public/jquery/js/daterangepicker.jQuery.js"></script>
	<script src="__ROOT__/Public/jquery/js/jquery.easyui.min.js"></script>
    <script src="__ROOT__/Public/js/esl.js"></script>
	<script src="__ROOT__/Public/js/getDatadiff.js"></script>
	<script src="__ROOT__/Public/js/statistic.js"></script>
	<script src="__ROOT__/Public/js/createboard.js"></script>
	<script type="text/javascript">	
    	var URL = "__URL__";
		$(document).ready(	function(){
			 var clientWidth = document.body.clientWidth-40;
			 $("#pagebody").attr("style","width:"+clientWidth+"px;");
			 var timeInlitvalue="<?php $currenttime = date("Y\.m\.d");$temptime = date("Y-m-d"); $begintime=date('Y\.m\.d',strtotime("$temptime -7 day")); echo $begintime."-".$currenttime; ?>";
		 var tm1 = timeInlitvalue.substr(0, timeInlitvalue.indexOf('-'));
		 var tm2 = timeInlitvalue.substr(timeInlitvalue.indexOf('-')+1,timeInlitvalue.length);
			  $("#tdatadetail").load(URL+"/chaosudetail",{"starttm" : tm1 ,"endtm":tm2,"type":0});
		 });
	</script>
<script type="text/javascript">

function refreshPage(){
 //  $("#form1").submit();
   
   
} 
function selvehicle() 
{
	 var reportObj = document.getElementById("selobj").value;
		 if(reportObj == 0)//车辆
		 {
			var editUrl = "<?php echo U('Report/selvehiclepage/');?>";
			parent.openDialog("选择车辆",400,600,editUrl,refreshPage,"");
		 }
		 else
		 {
			var editUrl = "<?php echo U('Report/seldriverpage/');?>";
			parent.openDialog("选择人员",400,600,editUrl,refreshPage,"");
		 } 
}

function selReport() 
{
var URL = "__URL__";
	 var timeInlitvalue="<?php $currenttime = date("Y\.m\.d");$temptime = date("Y-m-d"); $begintime=date('Y\.m\.d',strtotime("$temptime -7 day")); echo $begintime."-".$currenttime; ?>";
		 var tm1 = timeInlitvalue.substr(0, timeInlitvalue.indexOf('-'));
		 var tm2 = timeInlitvalue.substr(timeInlitvalue.indexOf('-')+1,timeInlitvalue.length);
		 var reportType = document.getElementById("selstatuse").value;
		 if(reportType == 0)//超速
		 {
			$("#tdatadetail").load(URL+"/chaosudetail",{"starttm" : tm1 ,"endtm":tm2,"type":0});
		 }
		 if(reportType == 1)//防撞
		 {
			$("#tdatadetail").load(URL+"/fangzhuangdetail",{"starttm" : tm1 ,"endtm":tm2,"type":0});
		 }
		 if(reportType == 2 || reportType == 3)//不系安全带,车辆自动熄火
		 {
			$("#tdatadetail").load(URL+"/nosafedetail",{"starttm" : tm1 ,"endtm":tm2,"type":0});
		 }
		 if(reportType == 4)//碰撞
		 {
			$("#tdatadetail").load(URL+"/pengzhuangdetail",{"starttm" : tm1 ,"endtm":tm2,"type":0});
		 }
		 if(reportType == 5)//超高
		 {
			$("#tdatadetail").load(URL+"/chaogaodetail",{"starttm" : tm1 ,"endtm":tm2,"type":0});
		 }
		 if(reportType == 6)//超载
		 {
			$("#tdatadetail").load(URL+"/chaozaidetail",{"starttm" : tm1 ,"endtm":tm2,"type":0});
		 }
		 if(reportType == 7)//运货趟数
		 {
			$("#tdatadetail").load(URL+"/yunhuodetail",{"starttm" : tm1 ,"endtm":tm2,"type":0});
		 }
		 if(reportType == 8)//司机工作时长
		 {
			$("#tdatadetail").load(URL+"/sijigongzuoshichangdetail",{"starttm" : tm1 ,"endtm":tm2,"type":0});
		 }
}
</script>
</head>

<body> 

	<div class="main_right" style="margin-top:-14px;">
		<div class="right">
		
			<div id="owner_div">
				<form id="form1" method="post" action="" name="form1">
				
					<div class="owner_sub_div">
					报警类型：<select name="selstatuse" id="selstatuse" style="width:180px;height:26px;">
							<option value="0" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==0) echo "selected";?>>超速</option>
							<option value="1" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==1) echo "selected";?>>防撞</option>
							<option value="2" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==2) echo "selected";?>>未系安全带</option>
							<option value="3" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==3) echo "selected";?>>车辆自动熄火</option>
							<option value="4" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==4) echo "selected";?>>碰撞</option>
							<option value="5" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==5) echo "selected";?>>超高</option>
							<option value="6" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==6) echo "selected";?>>超载</option>
							<option value="7" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==7) echo "selected";?>>运货趟数</option>
							<option value="8" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==8) echo "selected";?>>司机工作时长</option>
							<option value="10" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==10) echo "selected";?>>异常事件数量</option>
							<option value="11" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==11) echo "selected";?>>载重</option>
							<option value="12" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==12) echo "selected";?>>工作时长效率</option>
							<option value="13" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==13) echo "selected";?>>一级报警次数</option>
							<option value="14" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==14) echo "selected";?>>二级报警次数</option>
							<option value="15" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==15) echo "selected";?>>三级报警速度</option>
							<option value="16" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==16) echo "selected";?>>A围栏区报警速度</option>
							<option value="17" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==17) echo "selected";?>>B围栏区报警速度</option>
							<option value="18" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==18) echo "selected";?>>C围栏区报警速度</option>
							<option value="19" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==19) echo "selected";?>>特定区1限速速度</option>
							<option value="20" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==20) echo "selected";?>>特定区2限速速度</option>
							<option value="21" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==21) echo "selected";?>>特定区3限速速度</option>
							<option value="22" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==22) echo "selected";?>>提示区报警</option>
							<option value="23" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==23) echo "selected";?>>警示区报警</option>
							<option value="24" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==24) echo "selected";?>>制动区报警</option>
							<option value="25" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==25) echo "selected";?>>车辆转弯报警</option>
							<option value="26" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==26) echo "selected";?>>碰撞等级事件</option>
							<option value="27" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==27) echo "selected";?>>高度预报</option>
							<option value="28" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==28) echo "selected";?>>超高报警</option>
							<option value="29" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==29) echo "selected";?>>楼顶防撞</option>
							<option value="30" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==30) echo "selected";?>>超载提示</option>
							<option value="31" <?php $statuse = isset($_POST["selstatuse"])?$_POST["selstatuse"]:"";if($statuse==31) echo "selected";?>>超载报警</option>
						</select>
				    </div>
					<div class="owner_sub_div" style="margin-left:10px;">
					对象: <select name="selobj" id="selobj" style="width:180px;height:26px;">
							<option value="0" <?php $statuse = isset($_POST["selobj"])?$_POST["selobj"]:"";if($statuse==0) echo "selected";?>>车辆</option>
							<option value="1" <?php $statuse = isset($_POST["selobj"])?$_POST["selobj"]:"";if($statuse==1) echo "selected";?>>人员</option>
							</select>
						<input id="add_user_btn" class="but_add" type="button" value="" onclick="selvehicle();" name="add_user_btn">
					</div>
					<div class="owner_sub_div">
						<div id="datapacke" class="datapackediv">
							<div class="listcheck" style="float:left;background: #fff;">
								<a href="#" class="easyui-menubutton" data-options="menu:'#mm1',iconCls:'icon-edit'" id="seldata"><?php $currenttime = date("Y\.m\.d");$temptime = date("Y-m-d"); $begintime=date('Y\.m\.d',strtotime("$temptime -7 day")); echo $begintime."-".$currenttime; ?></a>
							</div>
							<div id="mm1" style="width:212px;border-radius:10px 10px 10px 10px;margin-top:10px;width:196px;">
								<div id="thirtybefore" onClick="changechart('dayboardchat',30);" style="height:25px;">过去30天</div>
								<div id="sevenbefore" onClick="changechart('dayboardchat',7);" style="height:25px;">过去7天</div>
								<div id="today" onClick="changechart('dayboardchat',1);" style="height:25px;">今日</div>
								<div style="border-top:1px solid #ccc;height:25px;" id="rangetime" onClick="selectdata('dayboardchat');">自选</div>
							</div>
						</div>
					</div>		
					<div class="owner_sub_div" style="margin:0px 0px 0px 12px;">
						<input class="submit_1" type="bottom" onclick="selReport()" value="查询">
					</div>
					</form>
					
					<br style="clear:both;">
			</div>
			<div class="data" style="height:580px;">
				<div style="float:right;">
				<ul class="ulcss">
					<li id="" class="importbtn" title="导出"> <input id="importdata" class="but_import" type="button" value="" onClick="" name="importdata"></li>
				</ul>
			</div>
				 <div id="tdatadetail" style="height:330px;">
				
				</div>
		</div>
	</div>
</body>
</html>