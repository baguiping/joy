<?php
class LogAction extends Action{
	public function index(){
	 	
     	$this->display();	
   }
	function loginfo(){
		$condition ='1';
		$link=M('login_info');
	    import('ORG.Util.Page');// 导入分页类

		if(isset($_POST['selsubmit'])){
			$username=isset($_POST['user_name'])?$_POST['user_name']:'';
			$starttime=isset($_POST['start_time'])?$_POST['start_time']:'';
			$endtime=isset($_POST['end_time'])?$_POST['end_time']:'';
			if(!empty($username)){
				//$condition=' and username = '.$username;
			}
			if(!empty($starttime)){
				$condition.=' and logintime > \''.$starttime.'\'';
			}
			if(!empty($endtime)){
				$condition.=' and logintime < \''.$endtime.'\'';
			}
		}

        $count      = $link->where($condition)->count();
        $Page       = new Page($count,21);
	    $Page->setConfig('header', '条数据');
        $Page->setConfig('first', '首页');
        $Page->setConfig('last', '尾页');
        $show       = $Page->show();// 分页显示输出
        $loglist= $link->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
		for($i=0;$i<count($loglist);$i++){
			$uid=$loglist[$i]['userid'];
			$linkuser=M('user_info');
			$res=$linkuser->where('userid='.$uid)->find();
			$loglist[$i]['username']=$res['username'];
		}
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('loglist',$loglist);
     	$this->display();	
    }
   
  function deletelog(){
	$id=$this->_get('id');
	$this->assign('delid',$id);
    $this->display();
   }
   
   function dellog(){
	   $link=M('login_info');
	   $indexId=I("indexId");
	   $indexId = substr($indexId, 0, -1);
	   $arrid=@split(',',$indexId);
	   foreach($arrid as $k=>$v)
	   {   
			$map['loginid']=$arrid[$k];
			$link->where($map)->delete(); 
	   }
	   redirect(U('Log/succed'));
   }	
}
 ?>