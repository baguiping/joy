<?php if (!defined('THINK_PATH')) exit();?>﻿<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
	<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/>
</head>
<body>
  <table id="tdata" class="tableline" width="100%" style="margin-top:-16px;">
			<thead hasbox="2">
				<tr class="trcenter" hasbox="2" style="background:#F2F2F2;">
					<th width="15%">车辆
					<th width="20%">驾驶人员
					<th width="20%">开机时间
					<th width="15%">关机时间
					<th width="20%">持续时间
			<tbody hasbox="2">  
					
						<tr>
							<td>粤H225D</td>
							<td>张三</td>
							<td>2017-01-02  15：16：24</td>
							<td>2017-01-03  15：16：24</td>
							<td>24</td>
							
						</tr>
					    <tr>
							<td>粤H225D</td>
							<td>张三</td>
							<td>2017-01-02  15：16：24</td>
							<td>2017-01-03  15：16：24</td>
							<td>24</td>
							
						</tr>
			</table>
			 <ul class="pagination" style="float:right;">
				<?php echo ($page); ?>			
			</ul>
</body>
</html>