       
		    //echart画图
       function setline(chart,ldata,ltext)
       {
       	 chart.showLoading({text :'正在努力的读取数据中...' ,effect :'whirling'});
       	 var options1 =  {
		       	   tooltip: { 
		               trigger: 'item' //触发类型，默认数据触发，见下图，可选为：'item' | 'axis' 其实就是是否共享提示框 
		            }, 
		            legend: { 
		               data: legendarr, //这里需要与series内的每一组数据的name值保持一致 
		               y:"bottom" 
		            }, 
		           calculable: true,  
		           xAxis: [ 
		                    { 
		                        type: 'category',
		                        boundaryGap : true, 
		                        data: ltext 
		                   } 
		               ], 
		           yAxis: [ 
		                   { 
		                        type: 'value', 
		                        splitArea: { show: true }, 
		                    } 
		               ], 
		           series: [ 
		                   { 
		                       name: legend, 
		                       type: 'line', 
		                       data: ldata
		                    }, 
		                ] 
		       	};
       	 
       	 setTimeout(function (){
    	   chart.hideLoading();
         chart.setOption(options1);},800);
       }
       
    	  //双日历初始化
    	  $(function(){
    	  	
    	    //设置初始值,设置7天前日期
          $("#datestart").text(getbeforedate(5));
          $("#dateend").text(getcurrentdate());
          
    	  	var cWidth = document.body.clientWidth-8;
					var timestr=$("#datestart").text()+"-"+$("#dateend").text();
					var starttm = timestr.substr(0, timestr.indexOf('-'));
					var endtm = timestr.substr(timestr.indexOf('-')+1,timestr.length);
					var mytime=new Date();
					var curdata=mytime.getFullYear()+"."+(mytime.getMonth()+1)+"."+mytime.getDate();
					var diff1=getDiffDays(starttm,curdata);
					var diff2=getDiffDays(endtm,curdata);
					
				  $('#rangetime').daterangepicker({ 
				  	presetRanges:[],
                    presets:{
                        dateRange:'Date Range'
                    },
                    rangeStartTitle:'起始日期',
                    rangeEndTitle:'结束日期',
                    nextLinkText:'下月',
                    prevLinkText:'上月',
                    doneButtonText:'确定',
                    cancelButtonText:'取消',
                    earliestDate:'',
                    latestDate:Date.parse('today'),
                    constrainDates:false,
                    rangeSplitter:'-',
                    dateFormat:'yy.mm.dd',
                    closeOnSelect:true,
                    onOpen:function(){
                        $('.ui-daterangepicker-dateRange').click().parent().hide();
                        $('.ui-daterangepickercontain').attr("style","width:"+cWidth+"px;");
						 						$('.range-start').datepicker('setDate',diff1);
												$('.range-end').datepicker('setDate', diff2);
                    },
										onClose: function(){                    
					  						var rangeA =  $.datepicker.formatDate( 'yy.mm.dd', $('div.ui-daterangepicker').find('.range-start').datepicker('getDate')) ;                    
					  						var rangeB =  $.datepicker.formatDate( 'yy.mm.dd', $('div.ui-daterangepicker').find('.range-end').datepicker('getDate')) ;                    
					  						console.log(rangeA);                    
					  						console.log(rangeB);                 
					  						$("#datestart").text(rangeA);
					  						$("#dateend").text(rangeB);  
					  						$("#proTemp").css('display','none'); 
					  						
					  						//计算间隔天数
					  						if((getDiffDays(rangeB,rangeA)+1)<=1){
					  							//按小时,日统计
													flag= '-1';
             	  					$("#monthly").attr("data-enable","false");
             	  					$("#monthly").removeClass().addClass("off");
				             	  	$("#daily").attr("data-enable","true");
				             	  	$("#daily").removeClass().addClass("on");
				             	  	$("#hourly").attr("data-enable","true");
				             	  	$("#hourly").removeClass();
				             	  	
			                  } 
			  								else if((getDiffDays(rangeB,rangeA)+1)< 30)
			  								{
													//按日统计
													flag='-30';
													$("#monthly").attr("data-enable","false");
				             	  	$("#monthly").removeClass().addClass("off");
				             	  	$("#daily").attr("data-enable","true");
				             	  	$("#daily").removeClass().addClass("on");
				             	  	$("#hourly").attr("data-enable","false");
				             	  	$("#hourly").removeClass().addClass("off");
			  								} 
			  								else
			  								{
			  									//按日,月统计
			  									flag='-60';
			  									$("#monthly").attr("data-enable","true");
				             	  	$("#monthly").removeClass();
				             	  	$("#daily").attr("data-enable","true");
				             	  	$("#daily").removeClass().addClass("on");
				             	  	$("#hourly").attr("data-enable","false");
				             	  	$("#hourly").removeClass().addClass("off");
			  								} 
			  								bef =rangeA;
				             	  curr=rangeB; 
				             	  
				             	  if(staticflag=='useradd')
				             	  {
				             	  	ajaxfromcond(bef,curr,'daily',flag);
				             	  }
				             	  if(staticflag=='retain')
				             	  {
				             	  	ajaxfromcond(bef,curr,rateflag);
				             	  }
				             	  $("#tabledata").attr("src",URL+"/tabledata");
					  			  } 
					});
			 });
			 
			 //公共控件初始化
			 $(document).ready(function()
    	  {
    	  	 //引入echart所需文件
    	  	 require.config({    
         		paths: { 
                 'echarts': 'PUBLIC/Js/echarts',
                 'echarts/theme/macarons':'PUBLIC/Css/Theme/macarons', 
                 'echarts/chart/line':'PUBLIC/Js/echarts',
            } 
           }); 
     
		      require( 
		      [ 
		        'echarts', 
		        'echarts/theme/macarons',
		        'echarts/chart/line'
		      ], 
		      DrawEChart); 
		    
    	  	  //屏幕宽度
    	  		var clientWidth = document.body.clientWidth-23;
    	  		$("#mainContainer").attr("style","width:"+clientWidth+"px");
    	  		
    	  		//帮助按钮事件
    	  		$("#helpicon").hover(             
    	  	       function(){$("#helpdiv").css('display', 'block');},            
    	           function(){$("#helpdiv").css('display', 'none');}    
    	      );
    	      $("#helpicon").hover(             
    	  	      function(){$("#helpspan").css('display', 'block');},            
    	          function(){$("#helpspan").css('display', 'none');}     
    	      );
    	      $("#helpicon1").hover(             
    	  	       function(){$("#helpdiv1").css('display', 'block');},            
    	           function(){$("#helpdiv1").css('display', 'none');}    
    	      );
    	      $("#helpicon1").hover(             
    	  	      function(){$("#helpspan1").css('display', 'block');},            
    	          function(){$("#helpspan1").css('display', 'none');}     
    	      );
    	  });
			 
			 //获取当前日期
    	 function getcurrentdate()
    	 {
    	  	var d=new Date();
    	  	var year=d.getFullYear();
    	  	var mon=d.getMonth()+1;
    	  	var day=d.getDate();
    	  	s=year+"."+(mon< 10 ? "0"+mon : mon)+"."+(day< 10 ? "0"+day : day);
    	  	return s;
    	 }
    	 
    	 //获取几天前日期
    	 function getbeforedate(day)
    	 {     
    	 	var zdate=new Date();     
    	 	var sdate=zdate.getTime()-(1*24*60*60*1000);     
    	 	var d=new Date(sdate-(day*24*60*60*1000)); 
    	 	var year=d.getFullYear();
    	  var mon=d.getMonth()+1;
    	  var day=d.getDate();
    	  s=year+"."+(mon< 10 ? "0"+mon : mon)+"."+(day< 10 ? "0"+day : day);
    	  return s;   
    	 } 
    	 
		    //下拉框点击事件
    	  function datepickerClick()
    	  {
    	  	$("#proTemp").toggle();
    	  }
    	  
    	  //显示表格数据,暂无用
		    function disptable(arr)
		    {
		    	//清空表格数据
		    	$(".data-load tbody").empty();
		    	var time="";
		    	var useradd="";
		    	var dau="";
		    	$.each(arr,function(i,item){
		    		 
					  time   =item.xaxis;
					  useradd=item.count;
					  dau    =item.dau;
					  if(parseInt(useradd)==0)
			      {
			      		dau="0%";	
			      }
			      else if(parseInt(dau)==0)
			      {
			      		dau="100%";
			      } 
			      else
			      {
			      	 var temp=(parseInt(useradd)/parseInt(dau))*100;
			      	 //判断是否为整数,否则保留到小数点后两位,并四舍五入
			      	 if(parseInt(temp)==temp)
			      	 {
			      	 	 dau=temp.toString()+"%";
			      	 }
			      	 else
			      	 {
			      	 	 dau=(temp.toFixed(2)).toString()+"%";
			      	 }
			      	 
			      }      
					  var $tr=$("<tr><td>"+time+"</td><td>"+useradd+"</td><td>"+dau+"</td></tr>");    
		        $tr.appendTo(".data-load"); 
		      });
					
		    }	
    	  
    	  