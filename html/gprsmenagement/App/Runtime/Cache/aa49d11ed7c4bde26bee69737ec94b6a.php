<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta content="IE=7" http-equiv="X-UA-Compatible">
<title></title>
<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" type="text/css"/> 
<script src="__ROOT__/Public/jquery/js/jquery-1.9.1.js" type="text/javascript">
</script>
<script type="text/javascript" charset="utf-8">
$(document).ready(	function()
{	
var Request = new Object();

	Request = getUrlVal();
   
	document.getElementById("shopid").value = Request['shopid'];
});

function checkValue(){
		var filepath = $("#filepath").val();
		if(filepath == ""){
			$("#filepathErr").html("文件路径不能为空!");
			$("#filepathErr").css("display","inline");
			$("#filepath").focus();
			return false;
		}else{
			$("#filepathErr").html("");
			$("#filepathErr").css("display","none");
		}
		return true;
}

</script>
</head>
<body>
<div class="bodyborder">
<div style="height:225px;overflow-y:auto;">
<form onSubmit="return checkValue();" method="post" name ="importform" action="<?php echo U('Device/import');?>">
<div class="item"  style="margin-top:30px;">
<span class="title">文件路径:</span>
<input type="file" onBlur="" class="text_2" style="border:0px;" value="" maxlength="20" name="filepath" id="filepath"><span class="lr" id="filepathErr"></span>
</div>
<div style="height:30px;text-align:center;" class="item">
<input type="submit" style="margin-top:30px;" class="submit_1" value="提交" id= "submit" >
</div>
</form>
</div>
</div>
</body>
</html>