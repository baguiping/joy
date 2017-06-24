<?php
class UserAction extends Action{
	function userinfo(){
		session_start();
		$loginid = $_SESSION["uid"];
		$condition ='1';
		if($loginid != 1)
		{
			$condition ='admin = '.$loginid;
		}
		$link=M('user_info');
	    import('ORG.Util.Page');// 导入分页类

		if(isset($_POST['selsubmit'])){
			$username=isset($_POST['user_name'])?$_POST['user_name']:'';
			$userid=isset($_POST['user_id'])?intval($_POST['user_id']):0;
			if(!empty($username)){
				$condition.=' and username = \''.$username.'\'';
			}
			if(!empty($userid)){
				$condition.=' and userid = '.$userid;
			}
		}
        $count      = $link->where($condition)->count();
        $Page       = new Page($count,21);
	    $Page->setConfig('header', '条数据');
        $Page->setConfig('first', '首页');
        $Page->setConfig('last', '尾页');
        $show       = $Page->show();// 分页显示输出
        $userlist= $link->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('userlist',$userlist);
     	$this->display();	
    }
   
   function adduser(){
		$condition ='role = 1';
		$link=M('user_info');
        $adminlist= $link->where($condition)->select();
		$this->assign('adminlist',$adminlist);
     	$this->display();	
    }
	
  function usersave(){
	  session_start();
	  $loginid = $_SESSION["uid"];
		
	 $link=D('user_info');
	 $map['username']=I('username');
	 $map['password']=I('userpwd');
	 $map['phone']=I('phone');
	 $map['role']=I('role');
	 $map['status']=0;
	 if(I('admin') == 0)//未指定管理员，默认是自己
	 {
		 $map['admin']= $loginid;
	 }
	 else
	 {
		 $map['admin']= I('admin');
	 }
	 $map['remark']=I('remark');
	
	  $res =$link->create($map);
          if (!$res){$this->error($link->getError());    
             } 
		  else {
			       $result = $link->add($map);              
                   if($result){redirect(U('User/succed'));}
				  else {redirect(U('User/error'));}
                  }
  	  
  	}
  
     public function chguser(){
	$id=$this->_get('id');
	$link=M('user_info');
	$userinfo= $link->find($id); 
	
	$condition ='role != 2';
    $adminlist= $link->where($condition)->select();
    $this->assign('adminlist',$adminlist);
		
	$this->assign('userinfo',$userinfo);
    $this->display();
   }  
   
   function editsave(){
	    session_start();
	  $loginid = $_SESSION["uid"];
		
	 $link=D('user_info');
	 $maps['userid'] = I("userid");
	 $map['username']=I('username');
	 $map['password']=I('userpwd');
	 $map['phone']=I('phone');
	 if(I('userrole')==2)
	 {
		 if(I('admin') == 0)//未指定管理员，默认是自己
		{
			$map['admin']= $loginid;
		}
		else
		{
			$map['admin']= I('admin');
		}
	 }
	 $map['remark']=I('remark');
	 if ($link->where($maps)->save($map)){
			redirect(U('User/succed'));
		}else{
			redirect(U('User/error'));
		}
  	}
	
   function deleteuser(){
	$id=$this->_get('id');
	$this->assign('delid',$id);
    $this->display();
   }
   
   function deluser(){
	   $link=M('user_info');
	   $indexId=I("indexId");
	   $indexId = substr($indexId, 0, -1);
	   $arrid=@split(',',$indexId);
	   foreach($arrid as $k=>$v)
	   {   
			$map['userid']=$arrid[$k];
			$link->where($map)->delete(); 
	   }
	   redirect(U('User/succed'));
   }
   
   function chguserstatus() {
		$link=D("user_info");
		$indexId=$this->_get('id');
	    $indexId = substr($indexId, 0, -1);
		$maps['userid'] = $indexId;
		dump($maps);
		$map['status']=$this->_get('status');
		
		if ($link->where($maps)->save($map)){
			redirect(U('User/succed'));
		}else{
			redirect(U('User/error'));
		}
   }
   
   function resetpwd(){
	$id=$this->_get('id');
	$this->assign('id',$id);
    $this->display();
   }
   
   function resetpwdsave(){
	    $link=D("user_info");
		$indexId=I('indexId');
	    $indexId = substr($indexId, 0, -1);
		$maps['userid'] = $indexId;
		$map['password']="666666";
		
		if ($link->where($maps)->save($map)){
			redirect(U('User/succed'));
		}else{
			redirect(U('User/error'));
		}
   }
   
   public function checkusername(){
	$username=I('username');
	$link=M('user_info');
	$condition ='username = \''.$username.'\'';
    $userinfo= $link->where($condition)->select();
	$vo = 0;
	if($userinfo)
	{
	  $vo = 1;
	}
	$this->ajaxReturn("","json",$vo);
   }
}
 ?>