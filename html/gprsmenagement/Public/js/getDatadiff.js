//得到两个日期的间隔时间的天数  
function getDiffDays(date1,date2) {  
    var regexp=/^(\d{1,4})[-|\.]{1}(\d{1,2})[-|\.]{1}(\d{1,2})$/;  
    var monthDays=[0,3,0,1,0,1,0,0,1,0,1,0];  
    regexp.test(date1);  
    var date1Year=RegExp.$1;  
    var date1Month=RegExp.$2;  
    var date1Day=RegExp.$3;  
    regexp.test(date2);  
    var date2Year=RegExp.$1;  
    var date2Month=RegExp.$2;  
    var date2Day=RegExp.$3;  
  
    if (validatePeriod(date1Year,date1Month, date1Day, date2Year, date2Month, date2Day)) {  
        var firstDate = new Date(date1Year, date1Month, date1Day);  
        var secondDate = new Date(date2Year, date2Month, date2Day);  
          
        var result = Math.floor((secondDate.getTime() - firstDate.getTime()) / (1000*3600*24));
        for(j = parseInt(date1Year); j < parseInt(date2Year); j++) {
            if (isLeapYear(j)) {  
                monthDays[1] = 2;  
            } else {  
                monthDays[1] = 3;  
            }  
            for(i = date1Month -1 ; i < date2Month; i++) {  
                result = result + monthDays[i]; 
            }  
        }
		
		if(date1Month ==2)
		{
			 result = result - monthDays[1]; 
		}
		
		if(monthDays[date1Month-1] != monthDays[date2Month-1])
		{
			result=0-result-1;
		}
		else
		{
			result=0-result;
		}
	
        return result;  
    } 
	else {  
        var secondDate = new Date(date1Year, date1Month, date1Day);  
        var firstDate = new Date(date2Year, date2Month, date2Day);  
          
        var result = Math.floor((secondDate.getTime() - firstDate.getTime()) / (1000*3600*24));  
        for(j = date1Year; j < date2Year; j++) {  
            if (isLeapYear(j)) {  
                monthDays[1] = 2;  
            } else {  
                monthDays[1] = 3;  
            }  
            for(i = date1Month -1 ; i < date2Month; i++) {  
                result = result - monthDays[i]  
            }  
        }
		if(monthDays[date1Month-1] != monthDays[date2Month-1])
		{
			result=result-1;
		}
        return result;  
    }  
}  
  
//判断年份是否是闰年  
function isLeapYear(year) {  
    if (year % 4 == 0 && (year % 100 != 0) || (year % 400 == 0)) {  
        return true;  
    }  
    return false;  
}  
  
//判断前后两个日期  
function validatePeriod(fyear, fmonth, fday, byear, bmonth, bday) {  
    if (fyear < byear) {  
        return true;  
    } else if (fyear == byear) {  
        if (fmonth < bmonth) {  
            return true;  
        } else if (fmonth == bmonth) {  
            if (fday <= bday) {  
                return true;  
            } else {  
                return false;  
            }  
        } else {  
            return false;  
        }  
    } else {  
        return false;  
    }  
}  