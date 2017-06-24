	/*页面提示信息显示*/
	function helpdisplay(id){
		if(id=='1'){
			$("#helpspan"+id).attr("style","display: block;top:15px;left: 120px;");
			$("#helpdiv"+id).attr("style","display: block;top:10px;left: 127px;");
		}
		if(id=='2'){
			$("#helpspan"+id).attr("style","display: block;top:470px;left: 160px;");
			$("#helpdiv"+id).attr("style","display: block;top:465px;left: 167px;");
		}
		if(id=='3'){
			$("#helpspan"+id).attr("style","display: block;top:590px;left: 164px;");
			$("#helpdiv"+id).attr("style","display: block;top:585px;left: 171px;");
		}
		if(id=='4'){
			$("#helpspan"+id).attr("style","display: block;top:50px;left: 130px;");
			$("#helpdiv"+id).attr("style","display: block;top:45px;left: 137px;");
		}
		if(id=='5'){
			$("#helpspan"+id).attr("style","display: block;top:15px;left: 90px;");
			$("#helpdiv"+id).attr("style","display: block;top:10px;left: 97px;");
		}
		if(id=='6'){
			$("#helpspan"+id).attr("style","display: block;top:15px;left: 90px;");
			$("#helpdiv"+id).attr("style","display: block;top:10px;left: 97px;");
		}
		if(id=='7'){
			$("#helpspan"+id).attr("style","display: block;top:195px;left: 130px;");
			$("#helpdiv"+id).attr("style","display: block;top:190px;left: 137px;");
		}
		
	}
	
	function helphide(id){
		$("#helpspan"+id).attr("style","display: none;");
		$("#helpdiv"+id).attr("style","display: none;");
	}
	
	/*功能：画统计图
	  参数：time：时间轴数组；data:统计值数组；id:显示统计图的div对就的id
	*/
	function drawline(time,data,id){
    require(
        [
            'echarts',
            'echarts/chart/line'    
        ],
        function (ec) {//--- 折柱 ---
            var myChart = ec.init(document.getElementById(id));
			myChart.showLoading({text :'数据读取中...' ,effect :'whirling'});
							setTimeout(function (){
							myChart.hideLoading();
            myChart.setOption({
                tooltip : {
                   trigger: 'item'
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
				grid:{
					y:55,
					y2:68
				},
                calculable : true,
                xAxis : [
                    {
                        type : 'category',
						boundaryGap : true,
                        data : time
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
                        type:'line',
                        data:data
                    }
                ]
            });},800);
        }
    ); 
}
