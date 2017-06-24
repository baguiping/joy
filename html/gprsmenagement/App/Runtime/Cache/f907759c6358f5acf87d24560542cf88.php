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
								['echarts','echarts/chart/pie'],
							function (ec) {
								var myChart = ec.init(document.getElementById('main2'));
								myChart.showLoading({text :'数据读取中...' ,effect :'whirling'});
								setTimeout(function (){
								myChart.hideLoading();
								myChart.setOption({
									
								tooltip : {
									trigger: 'item',
									formatter: "{c} ({d}%)"
								},
								legend: {
								  
									textStyle: {color: '#5CACEE'},
																   borderColor: '#999999',
																   borderWidth:1,
																   padding:6,
									y:"320",
									data:['告警1','告警2','告警3','告警4']
								},
								toolbox: {
									show : false,
									feature : {
										mark : {show: true},
										dataView : {show: true, readOnly: false},
										magicType : {
											show: true, 
											type: ['pie', 'funnel'],
											option: {
												funnel: {
													x: '25%',
													width: '50%',
													funnelAlign: 'left',
													max: 100
												}
											}
										},
										restore : {show: true},
										saveAsImage : {show: true}
									}
								},
								calculable : true,
								series : [
									{
										name:'异常事件',
										type:'pie',
										radius : '50%',
										center: ['50%', '50%'],
										data:[
											{value:3, name:'告警1'},
											{value:10, name:'告警2'},
											{value:4, name:'告警3'},
											{value:5, name:'告警4'}
										]
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