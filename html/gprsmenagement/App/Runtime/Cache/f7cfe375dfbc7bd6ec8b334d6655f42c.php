<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>GPRS后台管理系统</title>
<meta charset="utf-8">

<script type="text/javascript" src="__ROOT__/Public/jquery/js/jquery-1.9.1.js"></script>
	<link rel="stylesheet" href="__ROOT__/Public/statics/bootstrap3/css/bootstrap.min.css" />
	<link rel="stylesheet" href="__ROOT__/Public/statics/bootstrap3/css/bootstrap-theme.min.css" />
	<link rel="stylesheet" href="__ROOT__/Public/statics/css/default.css" />
	<link rel="stylesheet" href="__ROOT__/Public/css/style2.css" />
	<link href="__ROOT__/Public/css/home.css?v=2" rel="stylesheet" type="text/css" />
	<script src="__ROOT__/Public/statics/bootstrap3/js/jquery.min.js"></script>
	<script src="__ROOT__/Public/statics/bootstrap3/js/bootstrap.min.js"></script>
</head>
<body>
<div style="height:0%;width:100%;background:#EBEEF7;">
<div  ><!--img src="__ROOT__/Public/Images/logo_top.png"--></div>
</div>

<div  style="width:100%;height:100%;background:#fff;">
<div class="wrap">

  <div class="banner-show" id="js_ban_content">
    <div class="cell bns-01">
      <div class="con"> </div>
    </div>
    <div class="cell bns-02" style="display:none;">
      <div class="con"> </div>
    </div>
    <div class="cell bns-03" style="display:none;">
      <div class="con"> </div>
    </div>
  </div>
  <div class="banner-control" id="js_ban_button_box"> </div>
  <script type="text/javascript">
                ;(function(){
                    
                    var defaultInd = 0;
                    var list = $('#js_ban_content').children();
                    var count = 0;
                    var change = function(newInd, callback){
                        if(count) return;
                        count = 2;
                        $(list[defaultInd]).fadeOut(400, function(){
                            count--;
                            if(count <= 0){
                                if(start.timer) window.clearTimeout(start.timer);
                                callback && callback();
                            }
                        });
                        $(list[newInd]).fadeIn(400, function(){
                            defaultInd = newInd;
                            count--;
                            if(count <= 0){
                                if(start.timer) window.clearTimeout(start.timer);
                                callback && callback();
                            }
                        });
                    }
                    
                    var next = function(callback){
                        var newInd = defaultInd + 1;
                        if(newInd >= list.length){
                            newInd = 0;
                        }
                        change(newInd, callback);
                    }
                    
                    var start = function(){
                        if(start.timer) window.clearTimeout(start.timer);
                        start.timer = window.setTimeout(function(){
                            next(function(){
                                start();
                            });
                        }, 8000);
                    }
                    
                    start();
                    
                    $('#js_ban_button_box').on('click', 'a', function(){
                        var btn = $(this);
                        if(btn.hasClass('right')){
                            //next
                            next(function(){
                                start();
                            });
                        }
                        else{
                            //prev
                            var newInd = defaultInd - 1;
                            if(newInd < 0){
                                newInd = list.length - 1;
                            }
                            change(newInd, function(){
                                start();
                            });
                        }
                        return false;
                    });
                    
                })();
            </script>
  <div class="container" style="float:right;margin-right:15%;">

  <div class="register-box" >
    <div class="row col-md-6 col-sm-offset-0 login" style="margin-top:-20px;text-align: center;vertical-align: middle;">
	
				<form action="<?php echo U('Login/checkLogin','','');?>" method="post" name="frmLogin" onSubmit="">
				<div class="reg-slogan"><strong>GPRS后台管理系统</strong></div>
					<div class="form-group">
						<div class="col-sm-9" style="margin-top:10px;">
								<input type="text" class="form-control" id="username" name="username" placeholder="用户名" style="width:290px;margin-top:10px;" value="<?php echo ($username); ?>"/>
								<input type="password" class="form-control" id="password" name="password" placeholder="密码" style="width:290px;margin-top:10px;" value="<?php echo ($pwd); ?>" />
						</div>
					</div>
	
					<div class="form-group">
						<div class="col-sm-9 col-sm-offset-0" style="">
							<input type="checkbox" class="form-control" id="rempwd" name="rempwd" style="height:18px;width:18px;text-align: left;"/>
							
						</div>	
						<div class="col-sm-offset-1 col-sm-6" style="margin-top:-30px;text-align: left;vertical-align: left;">
							<span style="font-size:13px;margin-left:20px;">记住密码</span>
							
						</div>							
											
					</div>					
					<div class="form-group">
						<div class="col-sm-offset-5 col-sm-1" style="text-align: center;vertical-align: middle;margin-top:20px">
							<button type="submit" class="btn btn-primary btn-login">登陆</button>
						</div>
						
					</div>
			</form>
			</div>
			</div>
  </div>
</div>
</div>
</body>
</html>