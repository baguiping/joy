<?php

class IndexAction extends Action{
		
    public function index(){
		session_start();
		$loginid = $_SESSION["uid"];
		$link=M();
		$lastLoginTime = "-";
		$query = "select logintime from login_info where userid=".$loginid." and operate = 0 order by logintime desc limit 1";  
		$res = $link->query( $query ); 
		if($res)
		{
			$lastLoginTime = $res[0]['logintime'];
		}
		$this->assign('lastLoginTime',$lastLoginTime);
       $this->display();
    }
	
	function statisticsurvey(){
      $this->display();
    }
	
	function gettimeintervalnewdata(){
		$today=date('Y\.m\.d');
		$yesterday=date('Y\.m\.d',strtotime("-1 day"));
		$sevenday=date('Y\.m\.d',strtotime("-7 day"));
		$thirthyday=date('Y\.m\.d',strtotime("-30 day"));
		$vo["today"]=0;
		$vo["yesterday"]=0;
		$vo["sevenday"]=0;
		$vo["thirthyday"]=0;
		$this->ajaxReturn($vo,"json",1);	
	}
	
	function gettotalchartdata(){
		$daybefor=I('daybefor');
		$today=date('Y\.m\.d');
		$startday=date('Y\.m\.d',strtotime($daybefor." day"));
		$vo=0;
		$this->ajaxReturn($vo,"json",1);	
	}	

}