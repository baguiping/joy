<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta content="IE=7" http-equiv="X-UA-Compatible">
<title></title>
<script type="text/javascript">
var manager = null;	
     $(function ()
        { 
			$("#tree1").ligerTree({ 
                nodeWidth: 120,
                checkbox: false,
                onClick: onClick,
                idFieldName: 'id', 
                isExpand: true, 
                slide: false
                			
            });
			manager = $("#tree1").ligerTree({ checkbox: true, ajaxType: 'get' });
        }); 
		
</script>
</head>
<body>
<div style="margin-left:15px;">
    <ul id="tree1" style="width:120px;">
		<?php if(is_array($adminlist)): $i = 0; $__LIST__ = $adminlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id=<?php echo ($vo["userid"]); ?>>
		<span><?php echo ($vo["username"]); ?></span>
			<ul>
			<?php if(is_array($vo['userlist'])): $i = 0; $__LIST__ = $vo['userlist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><li id=<?php echo ($sub["userid"]); ?>>
				<span><?php echo ($sub["username"]); ?></span>
					<ul>
						<?php if(is_array($sub['devicelist'])): $i = 0; $__LIST__ = $sub['devicelist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub2): $mod = ($i % 2 );++$i;?><li id=<?php echo ($sub2["imei"]); ?> >
							<span><?php echo ($sub2["imei"]); ?></span>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>   
</div>
</body>
</html>