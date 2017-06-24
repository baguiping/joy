<?php
class ReportAction extends Action{ 
	
 	public function seltree(){
     	$condition ='role != 2';
		$link=M('user_info');
		$count = $link->where($condition)->count();
        $adminlist= $link->where($condition)->select();
		for($i=0;$i<$count;$i++)
		{
			$adminid = $adminlist[$i]['userid'];
			$usercount= $link->where('admin = '.$adminid.' and role=2')->count();
			$userlist= $link->where('admin = '.$adminid.' and role=2')->select();
			$adminlist[$i]['userlist'] = array();
			if($usercount>0)
			{
				$adminlist[$i]['userlist'] = $userlist;
				$linkdevice=D('device_info');
				for($j=0;$j<$usercount;$j++)
				{
					$adminid = $userlist[$j]['userid'];
					$devicecount= $linkdevice->where('adminid = '.$adminid)->count();
					$devicelist= $linkdevice->where('adminid = '.$adminid)->select();
					$adminlist[$i]['userlist'][$j]['devicelist'] = array();
					if($devicecount>0)
					{
						$adminlist[$i]['userlist'][$j]['devicelist'] = $devicelist;
					}
				}
			}
			
		}
		
		$this->assign('adminlist',$adminlist);
		//dump($adminlist);
     	$this->display();
   }

	public function selok(){
		 $devicesn=trim($_POST['selid']);	
		 if($devicesn){
			 //写入session值
			session('devicesn',$devicesn);
		 }
		 redirect(U('Report/baobiaofenxi'));
	}

	function baobiaofenxi(){
		
     	$this->display();	
	}
	
	function getnewcreateboard(){
		$start=I('start');
		$end=I('end');
		$nflag=I('nflag');
		$nflag2=I('nflag2');

		$ncount=count($data['data']);
		$datatemp=array();	
		$startdate=str_replace('.','-',$start);
		$enddate=str_replace('.','-',$end);
	    $endmonth=date('Y\-m',strtotime($enddate." 0 month"));
	    $datatemp = 0;
		$this->ajaxReturn($datatemp,"",1);	
	}

}
 ?>