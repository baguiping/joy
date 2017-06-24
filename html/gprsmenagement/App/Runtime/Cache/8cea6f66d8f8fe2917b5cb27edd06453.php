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
//		showdiv('<img src="Public/Images/ajax-loader.gif"/>');
			$.ajax({  
                    type : "POST",  //提交方式  
                    url : "__URL__/gettotalchartdata",//路径  
                  
                    success : function(result)
					{
						var status=1;
					//if(result.status==1){
					if(status==1){
							require(
								['echarts','echarts/chart/line'],
							function (ec) {
								var myChart = ec.init(document.getElementById('main1'));
								myChart.showLoading({text :'数据读取中...' ,effect :'whirling'});
								setTimeout(function (){
								myChart.hideLoading();
								myChart.setOption({
									tooltip : {
										 trigger: 'item' //触发类型，默认数据触发，可选为：'item' | 'axis' 其实就是是否共享提示框 
									},
									legend: { 
									   data: ['电池缺水','车辆超载','三级超速','碰撞'], //与series内的每一组数据的name值保持一致 
									   y:"320",
									   textStyle: {color: '#5CACEE'},
									   borderColor: '#999999',
									   borderWidth:1,
									   padding:6,
									   selected: {'电池缺水' : true,'车辆超载' : true,'三级超速' : true,'碰撞' : true}, 
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
									grid:{y:50,y2:68},
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
											name:'电池缺水',
											type:'line',
											data:[1, 3, 0, 4, 2, 2, 5],
											markLine : {
											data : [
												{type : 'average', name : '平均值'}
											]
										}
										},
										{
											name:'车辆超载',
											type:'line',
											data:[1, 0, 5, 3, 2, 3, 1]
										
									   },
										{
											name:'三级超速',
											type:'line',
											data:[2, 6, 5, 3, 2, 4, 6]
									   },
										{
											name:'碰撞',
											type:'line',
											data:[0, 1, 3, 13, 2, 0, 1]
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