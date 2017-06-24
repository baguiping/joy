<?php
class BatteryAction extends Action{
	 public function index(){
	 	
     	$this->display();
   }
   
   public function batteryinfo(){
	 	session_start();
		$loginid = $_SESSION["uid"];
		$condition ='1';
		if($loginid != 1)
		{
			$condition ='adminid = '.$loginid;
		}
		$link=M('device_info');
	    import('ORG.Util.Page');// 导入分页类

		if(isset($_POST['selsubmit'])){
			$plateNum=isset($_POST['plateNum'])?$_POST['plateNum']:'';
			$devicesn=isset($_POST['deviceid'])?$_POST['deviceid']:'';
			if(!empty($plateNum)){
				$condition.=' and plateNumber = \''.$plateNum.'\'';
			}
			if(!empty($devicesn)){
				$condition.=' and imei = \''.$devicesn.'\'';
			}
		}
        $count      = $link->where($condition)->count();
        $Page       = new Page($count,21);
	    $Page->setConfig('header', '条数据');
        $Page->setConfig('first', '首页');
        $Page->setConfig('last', '尾页');
        $show       = $Page->show();// 分页显示输出
        $devicelist= $link->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
		$linkuser=M('user_info');
		$linkbattary=M('battary_pack_info');
		$batinfo = array();
		
		for($i=0,$j=0;$i<$count;$i++)
		{
			$adminid = $devicelist[$i]['adminid'];
			$userinfo= $linkuser->find($adminid); 
			if($userinfo)
			{
				$devicelist[$i]['groupname'] = $userinfo['username'];
				$useradmin= $linkuser->find($userinfo['admin']);
				if($useradmin)
				{
					$devicelist[$i]['adminname']= $useradmin['username'];
				}
				else
				{
					$devicelist[$i]['adminname']= '';
				}
			}
			else
			{
				$devicelist[$i]['groupname']= '';
			}
			$devsn = $devicelist[$i]['imei'];
			$batinfotemp= $linkbattary->where("imei= '".$devsn."'")->select();
			if($batinfotemp)
			{
				$batinfo[$j]= $batinfotemp[0];
				$batinfo[$j]['plateNumber'] = $devicelist[$i]['plateNumber'];
				$batinfo[$j]['manufacturer'] = $devicelist[$i]['manufacturer'];
				$batinfo[$j]['adminname'] = $devicelist[$i]['adminname'];
				$batinfo[$j]['batteryNum'] = $devicelist[$i]['batteryNum'];
				$j++;
			}	
		}
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('batinfo',$batinfo);
     	$this->display();
   }
}
 ?>