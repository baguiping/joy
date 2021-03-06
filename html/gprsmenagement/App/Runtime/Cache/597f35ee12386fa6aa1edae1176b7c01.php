<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
	<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js" charset="utf-8"></script>
</head>
<body>
    <div id="main" style="height:340px;border:0px solid #ccc;margin-top:-3px;"></div>   
    <script type="text/javascript">
			$.ajax({  
                    type : "POST",  
                    url : "__URL__/gettotalchartdata",
                  
                    success : function(result)
					{
						var status=1;
					//if(result.status==1){
					if(status==1){
							require(
								['echarts','echarts/chart/line'],
							function (ec) {
								var myChart = ec.init(document.getElementById('main3'));
								myChart.showLoading({text :'数据读取中...' ,effect :'whirling'});
								setTimeout(function (){
								myChart.hideLoading();
								myChart.setOption({
								
								tooltip : {
									trigger: 'item'
								},
								legend: {
									data:['告警1','告警2','告警3','告警4'],
										y:"320",
									   textStyle: {color: '#5CACEE'},
									   borderColor: '#999999',
									   borderWidth:1,
									   padding:6,
									   selected: {'告警1' : true,'告警2' : true,'告警3' : true,'告警4' : true} 
								},
								toolbox: {
									show : false,
									feature : {
										mark : {show: true},
										dataView : {show: true, readOnly: false},
										magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
										restore : {show: true},
										saveAsImage : {show: true}
									}
								},
								calculable : true,
								xAxis : [
									{
										type : 'category',
										boundaryGap : false,
										data : ['周一','周二','周三','周四','周五','周六','周日']
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
										name:'告警1',
										type:'line',
										smooth:true,
										itemStyle: {normal: {areaStyle: {type: 'default'}}},
										data:[10, 12, 21, 54, 26, 83, 7]
									},
									{
										name:'告警2',
										type:'line',
										smooth:true,
										itemStyle: {normal: {areaStyle: {type: 'default'}}},
										data:[30, 18, 34, 7, 9, 3, 10]
									},
									{
										name:'告警3',
										type:'line',
										smooth:true,
										itemStyle: {normal: {areaStyle: {type: 'default'}}},
										data:[13, 11, 6, 2, 12, 9, 2]
									}
								  ,
									{
										name:'告警4',
										type:'line',
										smooth:true,
										itemStyle: {normal: {areaStyle: {type: 'default'}}},
										data:[3, 13, 6, 2, 12, 9, 2]
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
	<script>   
	$("#bgDiv").remove();  
	$("#msgTitle").remove();  
	$("#msgDiv").remove();  
	</script>
</body>
</html>