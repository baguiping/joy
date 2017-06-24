<?php
class ConfigAction extends Action{
	 public function paramcfg(){
	 	
     	$this->display();
   }
   
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
   function paramcfgsend(){
		$cfgjson = I('cfgjsonstr');
		$imei = I('seldeviceid');
		$str = str_replace("\&quot;","\"",$cfgjson);
		$str = str_replace("&quot;","\"",$str);
		//dump($imei);
		$link=D('paramcfg');
		$map['imei']=$imei;
		$map['token']=rand();
		
		$map['cmd']=82;
		$map['value']=$str;
		date_default_timezone_set('PRC'); 
		$map['sendtime']= date('Y-m-d H:m:s',time());
		$map['flag']= 0;
		//dump($map);
		$res =$link->create($map);
        if (!$res){
			echo "error";
        } 
		else {
			$result = $link->add($map);
           echo "succed";			
        }
	}
	
	function getcfgresult(){
		$imei = I('imei');
		//dump($imei);
		$link=D('paramcfg');
		$condition ='imei = '.$imei;
		$cfglist= $link->where($condition)->select();
		if($cfglist[0]['flag']==1)
		{
			echo "succed";
		}
	}
	
	function cfgpage(){
		$imei=I('deviceid');
		$condition ='imei = '.$imei;
		$hybridcfg=M('hybrid_param_cfg');
		$hybridcfginfo= $hybridcfg->where($condition)->select();
		
		$batalarm=M('battery_alarm_param_cfg');
		$batalarmcfginfo= $batalarm->where($condition)->select();		
		
		$bmscell=M('bms_cellnum_cfg');
		$bmscellcfginfo= $bmscell->where($condition)->select();		
		
		$chargecfg=M('charge_discharge_cfg');
		$chargecfginfo= $chargecfg->where($condition)->select();
		$this->assign('hybridcfginfo',$hybridcfginfo);
		$this->assign('batalarmcfginfo',$batalarmcfginfo);
		$this->assign('bmscellcfginfo',$bmscellcfginfo);
		$this->assign('chargecfginfo',$chargecfginfo);

		$this->display();
	}
	
	function devcfgsend(){
		$cfgjson = I('cfgjsonstr');
		$imei = I('seldeviceid');
		$str = str_replace("\&quot;","\"",$cfgjson);
		$str = str_replace("&quot;","\"",$str);
		//dump($imei);
		$link=D('paramcfg');
		$map['imei']=$imei;
		$map['token']=rand();
		
		$map['cmd']=84;
		$map['value']=$str;
		date_default_timezone_set('PRC'); 
		$map['sendtime']= date('Y-m-d H:m:s',time());
		$map['flag']= 0;
		//dump($map);
		$res =$link->create($map);
        if (!$res){
			echo "error";
        } 
		else {
			$result = $link->add($map);
           echo "succed";			
        }
	}
}
 ?>