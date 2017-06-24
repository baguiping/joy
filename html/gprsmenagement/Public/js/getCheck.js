function checkAll(obj){
	var checkedall = document.getElementById("selectall");
	var checkbox = document.getElementsByName("checkbox[]");
	if(checkedall.checked)
	{
		for(var i=0;i<checkbox.length;i++)
		{
			checkbox[i].checked = true;
		} 
	}
	else
	{
		for(var i=0;i<checkbox.length;i++)
		{
			checkbox[i].checked = false;
		} 
	} 
} 

function checkone(){
	var dotObj = $(".dotid");
	var dotids = "";
	var checkbox = document.getElementsByName("checkbox[]");
	
	for(var i=0;i<checkbox.length;i++)
	{
		if(checkbox[i].checked)
		{
			dotids += $(dotObj[i]).attr("value") + ",";
		}
	}
	return dotids;
} 

function multcheck(){
	var dotObj = $(".dotid");
	var dotids = "";
	var checkbox = document.getElementsByName("checkbox[]");
	for(var i=0;i<checkbox.length;i++)
	{
		if(checkbox[i].checked)
		{
			dotids += $(dotObj[i]).attr("value") + ",";
		}
	}
	return dotids;
} 

function Ifonecheck(str){
	
	if(str == "")
	{
		alert("还没有选中要进行此项操作的项！");
		return false;
	}
	if((str.split(',').length-1)>1)
	{
		alert("请选择一项进行此项操作！");
		return false;
	}
	return true;
} 

function Ifmultcheck(str){
	
	if(str == "")
	{
		alert("还没有选中要进行此项操作的项！");
		return false;
	}
	
	return true;
} 

function checkstatus(curcol,sumcol){
	var flag=false;
	var checkbox = document.getElementsByName("checkbox[]");
	for(var i=0;i<checkbox.length;i++)
	{
		if(checkbox[i].checked == true)
		{
			var str=$("table tr:eq("+(i+1)+") td:eq("+curcol+")").text();
			var status =$("table tr:eq("+(i+1)+") td:eq("+(sumcol+1)+")").text();
			//alert(str);
			//alert(status);
			if(str==status)
			{
				flag=true;
				break;
			}
		}
	} 
	//alert(flag);
	return flag;
} 

function getstatus(curcol){
	var status = 0;
	var checkbox = document.getElementsByName("checkbox[]");
	for(var i=0;i<checkbox.length;i++)
	{
		if(checkbox[i].checked == true)
		{
			var status =$("table tr:eq("+(i+1)+") td:eq("+(curcol+1)+")").text();
			break;
		}
	} 
	return status;
} 