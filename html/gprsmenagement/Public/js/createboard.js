	function changechart(str,day){	
		var mytime=new Date();
		var curMonth=mytime.getMonth()+1;
		if(curMonth<10){
			curMonth="0"+curMonth;
		}
		var curDay=mytime.getDate();
		if(curDay<10){
			curDay="0"+curDay;
		}
		var curdata=mytime.getFullYear()+"."+curMonth+"."+curDay;
		if(day ==1){
			$(".l-btn-text").text(curdata+"-"+curdata);
			$('#monthchart').css("color","#999").css("cursor","").css("border-bottom","0").attr("onClick","");
			$('#daychart').css("color","#000").css("cursor","pointer").css("border-bottom","2px solid #7EC0EE");
		}
		else{
			var Yesterday=GetDay(day);
			$(".l-btn-text").text(Yesterday+"-"+curdata);
			 if(getDiffDays(curdata,Yesterday)>30) {
				var timestr=$(".l-btn-text").text();
				var starttm = timestr.substr(0, timestr.indexOf('-'));
				var endtm = timestr.substr(timestr.indexOf('-')+1,timestr.length);
				$('#monthchart').css("color","#000").css("cursor","pointer").css("border-bottom","").attr("onClick","monthchart('"+starttm+"','"+endtm+"','"+str+"');");
				$('#daychart').css("color","#000").css("cursor","pointer").css("border-bottom","2px solid #7EC0EE");
			  } 
			  else{
				$('#monthchart').css("color","#999").css("cursor","").css("border-bottom","0").attr("onClick","");
				$('#daychart').css("color","#000").css("cursor","pointer").css("border-bottom","2px solid #7EC0EE");
			  }
		}
		var timestr=$(".l-btn-text").text();
		var starttm = timestr.substr(0, timestr.indexOf('-'));
		var endtm = timestr.substr(timestr.indexOf('-')+1,timestr.length);
		if(str=="dayboardchat")
		{
			$("#main").load(URL+"/dayboardchat",{"starttm" : starttm ,"endtm":endtm,"flag":0},function(){$("#main").fadeIn('slow');});
			$("#detailFrame").attr("src",URL+"/dayboardchatdetail&starttm="+starttm+"&endtm="+endtm+"&nflag=0&nflag2=0");
		}
		else
		{
			$("#main").load(URL+"/dayboardchat",{"starttm" : starttm ,"endtm":endtm,"flag":1},function(){$("#main").fadeIn('slow');});
			$("#detailFrame").attr("src",URL+"/dayboardchatdetail&starttm="+starttm+"&endtm="+endtm+"&nflag=0&nflag2=1");
		}
	}
	
	function GetDay(day){
		var   today=new   Date();   
		var   yesterday_milliseconds=today.getTime()-1000*60*60*24*day;   
		var   yesterday=new   Date();   
		yesterday.setTime(yesterday_milliseconds);   
		var strYear=yesterday.getFullYear();
		var strDay=yesterday.getDate();
		if(strDay<10){
			strDay="0"+strDay;
		}
		var strMonth=yesterday.getMonth()+1;
		if(strMonth<10){
			strMonth="0"+strMonth;
		}
		var strYesterday=strYear+"."+strMonth+"."+strDay;
		return strYesterday;
	}
	function selectdata(str){
		var timestr=$(".l-btn-text").text();
		var starttm = timestr.substr(0, timestr.indexOf('-'));
		var endtm = timestr.substr(timestr.indexOf('-')+1,timestr.length);
		var mytime=new Date();
		var curdata=mytime.getFullYear()+"."+(mytime.getMonth()+1)+"."+mytime.getDate();
		var diff1=getDiffDays(starttm,curdata);
		var diff2=getDiffDays(endtm,curdata);
		//alert(diff1);
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
		latestDate:'',
		constrainDates:false,
		rangeSplitter:'-',
		dateFormat:'yy.mm.dd',
		closeOnSelect:true,
		onOpen:function(){
			$('.ui-daterangepicker-dateRange').click().parent().hide();
			$('.range-start').datepicker('setDate', diff1);
			$('.range-end').datepicker('setDate', diff2);
		},
		onClose: function(){                  
			  var rangeA =  $.datepicker.formatDate( 'yy.mm.dd', $('div.ui-daterangepicker').find('.range-start').datepicker('getDate')) ;                    
			  var rangeB =  $.datepicker.formatDate( 'yy.mm.dd', $('div.ui-daterangepicker').find('.range-end').datepicker('getDate')) ;                    
			  console.log(rangeA);                    
			  console.log(rangeB);      
			  if(rangeA=="" ) {
					rangeA=starttm;
			  } 
			  if(rangeB=="" ){
					rangeB=endtm;
			  }          
			  $(".l-btn-text").text(rangeA+"-"+rangeB); 
			  $("#ui-datepicker-div").remove(); 
			  $(".ui-daterangepickercontain").remove();  
			 
			  if(getDiffDays(rangeB,rangeA)>=30){
				$('#monthchart').css("color","#000").css("cursor","pointer").css("border-bottom","").attr("onClick","monthchart('"+rangeA+"','"+rangeB+"','"+str+"');");	
			  } 
			  else{
				$('#monthchart').css("color","#999").css("cursor","").css("border-bottom","").attr("onClick","");
			  }
			  $('#daychart').css("color","#000").css("cursor","pointer").css("border-bottom","2px solid #7EC0EE");
			  if(str=="dayboardchat")
			  {
				  $("#main").load(URL+"/dayboardchat",{"starttm" : rangeA ,"endtm":rangeB,"flag":0},function(){$("#main").fadeIn('slow');});
				  $("#detailFrame").attr("src",URL+"/dayboardchatdetail&starttm="+rangeA+"&endtm="+rangeB+"&nflag=0&nflag2=0");
			  }
			  else
			   {
				  $("#main").load(URL+"/dayboardchat",{"starttm" : rangeA ,"endtm":rangeB,"flag":1},function(){$("#main").fadeIn('slow');});
				  $("#detailFrame").attr("src",URL+"/dayboardchatdetail&starttm="+rangeA+"&endtm="+rangeB+"&nflag=0&nflag2=1");
			  }
		  } 
	});
	}
	 
	function daychart(str){
		var timestr=$(".l-btn-text").text();
		var starttm = timestr.substr(0, timestr.indexOf('-'));
		var endtm = timestr.substr(timestr.indexOf('-')+1,timestr.length);
		$('#monthchart').css("color","#000").css("cursor","pointer").css("border-bottom","0");
		$('#daychart').css("color","#000").css("cursor","pointer").css("border-bottom","2px solid #7EC0EE");
	    if(str=="dayboardchat")
		  {
			  $("#main").load(URL+"/dayboardchat",{"starttm" : starttm ,"endtm":endtm,"flag":0},function(){$("#main").fadeIn('slow');});
			  $("#detailFrame").attr("src",URL+"/dayboardchatdetail&starttm="+starttm+"&endtm="+endtm+"&nflag=0&nflag2=0");
		  }
		  else
		   {
			  $("#main").load(URL+"/dayboardchat",{"starttm" : starttm ,"endtm":endtm,"flag":1},function(){$("#main").fadeIn('slow');});
			  $("#detailFrame").attr("src",URL+"/dayboardchatdetail&starttm="+starttm+"&endtm="+endtm+"&nflag=0&nflag2=1");
		  }
	}
	function monthchart(starttm,endtm,str){
		$('#monthchart').css("color","#000").css("cursor","pointer").css("border-bottom","2px solid #7EC0EE");
		$('#daychart').css("color","#000").css("cursor","pointer").css("border-bottom","0");
		if(str=="dayboardchat")
		{
			$("#main").load(URL+"/monthchat",{"starttm" : starttm ,"endtm":endtm,"nflag":1,"nflag2":0},function(){$("#main").fadeIn('slow');});
			$("#detailFrame").attr("src",URL+"/dayboardchatdetail&starttm="+starttm+"&endtm="+endtm+"&nflag=1&nflag2=0");
		}
		else
		{
			$("#main").load(URL+"/monthchat",{"starttm" : starttm ,"endtm":endtm,"nflag":1,"nflag2":1},function(){$("#main").fadeIn('slow');});
			$("#detailFrame").attr("src",URL+"/dayboardchatdetail&starttm="+starttm+"&endtm="+endtm+"&nflag=1&nflag2=1");
		}
	}
