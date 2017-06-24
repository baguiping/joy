<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta content="IE=7" http-equiv="X-UA-Compatible">
<title></title>
<link rel="stylesheet" href="__ROOT__/Public/Css/style2.css" type="text/css"/> 
<script src="__ROOT__/Public/Jquery/js/jquery-1.9.1.js" type="text/javascript">
</script>
<script type="text/javascript">
</script>
</head>
<body>
	<div style="height:150px;">
		<form onSubmit="1" method="post" action="<?php echo U('System/delok/','id='.$logid);?>">
			<div style="color:#000000;height:40px;text-align:center;border:#999999 1px solid; background:#CCCCCC;margin-top:10px;padding:6px">
				<p>
				<span>你确定要删除吗？</span>
			</div>
			<div style="margin-top:10px; text-align:center">
				<input class="submit_1" type="submit" value="确定"  style="margin-top:10px;">
				<input class="submit_1" type="button" onClick="javascript:parent.closeDialog();" value="取消" style="margin-top:10px;">
			</div>
		</form>
	</div>
</body>
</html>