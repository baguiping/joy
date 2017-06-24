<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
	<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/chart.css">
	<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js"></script>	
    <script src="__ROOT__/Public/js/esl.js"></script>
	<script src="__ROOT__/Public/js/statistic.js"></script>
	<script src="__ROOT__/Public/js/surveystatistic.js"></script>
	
</head>

<body>
	<div id="todaydata" class="gaikuangdiv" style="width:97%;">
		<div id="todaydatatitle" class="genarastationtitle"><h3 class="h3css">车辆信息
		</h3></div>
		<table id="tdata" class="tableline">
			<thead hasbox="2">
				<tr class="trcenter" hasbox="2">
					<th width="20%">车辆状态
					<th width="20%">车牌号码
					<th width="15%">驾驶员
					<th width="25%">今日工作时长
					<th width="20%">工作状态
			<tbody hasbox="2">  
					<tr class="tabletd">
					<td>xx</td>
					<td>XXXX</td>
					<td>黄先生</td>
					<td>24min</td>
					<td>运行正常</td>
					</tr>
					<tr class="tabletd">
					<td>xx</td>
					<td>XXXX</td>
					<td>王先生</td>
					<td>3h 24min</td>
					<td>故障中</td>
					</tr>
		</table>
	</div>

	<div id="tend" class="summarytenddiv" style="width:97%;">
		<div id="tendtitle" class="tendtitle">
			<div style="float:left;">
			<h3 class="h3css">今天重要信息
			</h3>
			</div>
		</div>
		<div id="main" class="chartmain"></div>
    </div>
	<div id="totaltend" class="totaltenddiv" style="width:97%;">
		<div id="tendtitle" class="tendtitle">
			<div style="float:left;">
			<h3 class="h3css">最近发生事件趋势图
			</h3>
			</div>
		</div>
		<div id="main1" class="chartmain"></div>
    </div>
	<input id="totalbeforday" type="hidden" value="30"/>
	<input id="totalitem" type="hidden" value="1"/>
	</div>
    <script type="text/javascript">
	  $.ajax({  
                    type : "POST",  //提交方式  
                    url : "__URL__/gettimeintervalnewdata",//路径  
                  
                    success : function(result)
					{
					console.info(result);
					var status=1;
	
					if(status==1){
						require(
							['echarts','echarts/chart/bar'],
						function (ec) {
							var myChart = ec.init(document.getElementById('main'));
							myChart.showLoading({text :'数据读取中...' ,effect :'whirling'});
							setTimeout(function (){
							myChart.hideLoading();
							myChart.setOption({
								title : {
								text: '今日异常事件统计'
							},
							tooltip : {
								trigger: 'item'
							},
							legend: {
								data:['电池缺水','车辆超载','三级超速','碰撞'],
								 y:"320",
								   textStyle: {color: '#5CACEE'},
								   borderColor: '#999999',
								   borderWidth:1,
								   padding:6,
								   selected: {'电池缺水' : true,'车辆超载' : true,'三级超速' : true,'碰撞' : true}
							},
							toolbox: {
								show : false,
									feature : {
										mark : {show: true},
										dataView : {show: true, readOnly: false},
										magicType : {show: true, type: ['line', 'bar']},
										restore : {show: true},
										saveAsImage : {show: true}
									}
							},
							calculable : true,
							xAxis : [
								{
									type : 'category',
									data : ['今日']
								}
							],
							yAxis : [
								{
									type : 'value',
									splitArea : {show : true}
								}
							],
							series : [
								{
									name:'电池缺水',
									type:'bar',
									data:[2],
									 markPoint : {
										data : [
											 {type : 'min', name: '值'}
										]
									}
								},
								{
									name:'车辆超载',
									type:'bar',
									data:[3],
									 markPoint : {
										data : [
											 {type : 'min', name: '值'}
										]
									}
								},
								{
									name:'三级超速',
									type:'bar',
									data:[8],
									 markPoint : {
										data : [
											 {type : 'min', name: '值'}
										]
									}
								},
								{
									name:'碰撞',
									type:'bar',
									data:[8],
									 markPoint : {
										data : [
											 {type : 'min', name: '值'}
										]
									}
								}
							]
							});},800);
						} );
					}
					else{
						alert("查询数据库失败！");
					}
				}  
            });  
			
    </script>
	<script type="text/javascript">	
		var URL = "__URL__";
		$(document).ready(	function()
{   
    require.config({
				paths:{ 
					echarts:'__ROOT__/Public/js/echarts',
					'echarts/chart/line': '__ROOT__/Public/js/echarts'    
				}
				});    
			$("#main1").load(URL+"/totalchart");
});
	
	</script>
</body>
</html>