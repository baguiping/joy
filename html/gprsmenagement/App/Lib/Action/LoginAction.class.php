<?php
class LoginAction extends Action{
	//登录页面
	public function index(){
		session_start();
		$username = isset($_SESSION["username"])?$_SESSION["username"]:'';
		$pwd = isset($_SESSION["pwd"])?$_SESSION["pwd"]:'';
		$this->assign('username',$username);
		$this->assign('pwd',$pwd);
		$this->display();
	}

	//登录验证
	public function checkLogin(){
		$m=M("user_info");
	 	 $where['username']=trim($_POST['username']);	
		$where['password']=	trim($_POST['password']);
		$result=$m->where($where)->find();
		$m=null;
		$verify=null;
		if($result){
			 //写入session值
			session('username',$result['username']);
			session('uid',$result['userid']);
			session('role',$result['role']);
			if($_POST['rempwd'] == "on")
			{
				session('pwd',$result['password']);
			}
			else
			{
				session('pwd','');
			}
			date_default_timezone_set('PRC'); 
			$curr     =date('Y-m-d H:m:s',time());
			$linklog=D('login_info');
			$map['userid']=$result['userid'];
			$map['logintime']=$curr;
	        $map['operate']=0;
			$res =$linklog->create($map);
			 if ($res)
			 {
				 $ressave = $linklog->add($map);  
             } 

			$this->success('登录成功!',U('Index/index'));
		}
		else{
			$this->error('账号或密码错误!',U('Login/index'));
		}
	}

	//退出
	public function logout(){
		date_default_timezone_set('PRC'); 
		$curr     =date('Y-m-d H:m:s',time());
		$linklog=D('login_info');
		$map['userid']=$_SESSION['uid'];
		$map['logintime']=$curr;
	    $map['operate']=1;
		$res =$linklog->create($map);
	    if ($res)
		{
			$ressave = $linklog->add($map);  
        } 
		unset($_SESSION['username']);
		unset($_SESSION['uid']);
		unset($_SESSION['role']);
		unset($_SESSION['pwd']);
		$this->success('退出成功!',U('Login/index'));
	}
	
	public function help(){
		$this->display();
	}   
}
 ?>