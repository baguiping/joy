<?php
return array(
	//'配置项'=>'配置值'
	'URL_HTML_SUFFIX'=>'',
	'URL_MODEL'=>0,
 	'DEFAULT_THEME'         => '',
	
	//pdo类型,采用dsn方式连接
	'DB_PREFIX'=>'',
	'DB_DSN' => 'mysql://root@localhost:3306/gprs',
	
	'TOKEN_NAME'=>'__hash__',    // 令牌验证的表单隐藏字段名称
	'TOKEN_TYPE'=>'md5',  //令牌哈希验证规则 默认为MD5
	'TOKEN_RESET'=>true,  //令牌验证出错后是否重置令牌 默认为true
	'VAR_FILTERS'=>'htmlspecialchars,stripslashes,strip_tags,trim',
	'URL_MODEL'			=>	3, // 如果你的环境不支持PATHINFO 请设置为3
  
   'TMPL_ACTION_ERROR'         =>  'Public:success', // 默认错误跳转对应的模板文件
   'TMPL_ACTION_SUCCESS'       =>  'Public:success', // 默认成功跳转对应的模板文件
   'EN_SYSTEM_VERSION'		   =>  'V1.0 alpha',
	'URL_HTML_SUFFIX'   =>'html',              //伪静态后缀，用于在URL中传递带.的参数                       
	//全局变量
	'PAGE_SHOW_NUM'=> 10,                      //分页显示，每页显示的条数      
	
	//多语言
	 'LANG_SWITCH_ON' 	=> 	true,
	'DEFAULT_LANG' 		=> 	'zh-cn', // 默认语言
	'LANG_AUTO_DETECT' 	=> 	true, // 自动侦测语言
	'LANG_LIST'			=>	'en-us,zh-cn',//必须写可允许的语言列表
);
?>