<?php
class DeviceAction extends Action{
	function groupinfo(){
		$condition ='1';
		$link=M('group_info');
	    import('ORG.Util.Page');// 导入分页类

		if(isset($_POST['selsubmit'])){
			$groupname=isset($_POST['group_name'])?$_POST['group_name']:'';
			$groupid=isset($_POST['group_id'])?intval($_POST['group_id']):0;
			if(!empty($groupname)){
				$condition=' and groupname = '.$groupname;
			}
			if(!empty($groupid)){
				$condition.=' and groupid = '.$groupid;
			}
		}

        $count      = $link->where($condition)->count();
        $Page       = new Page($count,21);
	    $Page->setConfig('header', '条数据');
        $Page->setConfig('first', '首页');
        $Page->setConfig('last', '尾页');
        $show       = $Page->show();// 分页显示输出
        $grouplist= $link->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('grouplist',$grouplist);
     	$this->display();	
    }
   
   function groupsave(){
		$link=D('group_info');
	 $map['groupname']=I('groupname');
	 $map['remark']=I('remark');
	
	  $res =$link->create($map);
          if (!$res){$this->error($link->getError());    
             } 
		  else {
			       $result = $link->add($map);              
                   if($result){redirect(U('Device/succed'));}
				  else {redirect(U('Device/error'));}
                  }
  	  
  	}
  
     public function chggroup(){
	 $id=$this->_get('id');
	$link=M('group_info');
	$groupinfo= $link->find($id); 
	dump($groupinfo);
	dump($id);
	$this->assign('groupinfo',$groupinfo);
	 
    $this->display();
   }  
   
   
   
  
       public function chgsave(){
	   $id=I('aid');
	   if(!$id){$this->error('文章id不可以为空');}//判定ＩＤ是否为空
	   $data["aid"] =$id;
	   
	     	$Article=D('Article');
	        $map['acid']=I('acid');
	        $map['atitle']=I('atitle');
	        $map['create_time']=time();
			$map['sort']=I('sort');
				 $mallid=I('mallid');
	 
	        $map['content']=htmlspecialchars(stripslashes($_POST['content'])); 
	      //*******************自动验证模板/  
	       $res =$Article->create();
            if (!$res){$this->error($Article->getError());    
               } else {
		 	       $result = $Article->where($data)->save($map);               
                    if($result){$this->success('修改成功',U('Article/index'));}
		  		   else {$this->error('新增失败');}
                   }
     //*******************自动验证模板结束/  
	   
	  

   }  
   
   function deviceinfo(){
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
			$deviceno=isset($_POST['deviceno'])?$_POST['deviceno']:'';
			//$devicesn=isset($_POST['deviceid'])?intval($_POST['deviceid']):0;
			$devicesn=isset($_POST['deviceid'])?$_POST['deviceid']:'';
			$factory=isset($_POST['factory'])?$_POST['factory']:'';
			if(!empty($deviceno)){
				$condition.=' and plateNumber = \''.$deviceno.'\'';
			}
			if(!empty($devicesn)){
				$condition.=' and imei = \''.$devicesn.'\'';
			}
			if(!empty($factory)){
				$condition.=' and manufacturer = \''.$factory.'\'';
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
		
		for($i=0;$i<$count;$i++)
		{
			$adminid = $devicelist[$i]['adminid'];
			$userinfo= $linkuser->find($devicelist[$i]['adminid']); 
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
		}
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('devicelist',$devicelist);
     	$this->display();	
    }
	
	function adddevice(){
	    session_start();
		$loginid = $_SESSION["uid"];
		if($loginid == 1)//超级管理员
		{
			$condition ='role = 2';//所有用户
		}
		else
		{
			$condition ='admin ='.$loginid;
		}
		
		$link=M('user_info');
        $adminlist= $link->where($condition)->select();
		$this->assign('adminlist',$adminlist);
		$this->assign('loginid',$loginid);
     	$this->display();	
    }
	
	function devicesave(){
	  session_start();
	  $loginid = $_SESSION["uid"];
		
	 $link=D('device_info');
	 $map['imei']=I('imei');
	 $map['adminid']=I('admin');
	 
	  $res =$link->create($map);
          if (!$res){$this->error($link->getError());    
             } 
		  else {
			       $result = $link->add($map);              
                   if($result){redirect(U('Device/succed'));}
				  else {redirect(U('Device/error'));}
                  }
  	  
  	}
	
	public function chgdevice(){
	$deviceid=$this->_get('id');
	$link=M('device_info');
	$deviceinfo= $link->find($deviceid); 
	
	session_start();
    $loginid = $_SESSION["uid"];
	if($loginid == 1)//超级管理员
	{
		$condition ='role = 2';//所有用户
	}
	else
	{
		$condition ='admin ='.$loginid;
	}
		
	$link=M('user_info');
    $adminlist= $link->where($condition)->select();
    $this->assign('adminlist',$adminlist);
		
	$this->assign('deviceinfo',$deviceinfo);
    $this->display();
   } 

   function editsave(){
	 $link=D('device_info');
	 $maps['deviceid'] = $this->_get('id');
	 $map['adminid']=I('admin');
	 
	 if ($link->where($maps)->save($map)){
			redirect(U('Device/succed'));
		}else{
			redirect(U('Device/error'));
		}
  	  
  	}


   function deletedevice(){
	$id=$this->_get('id');
	$this->assign('delid',$id);
    $this->display();
   }
   
   function deldevice(){
	   $link=M('device_info');
	   $indexId=I("indexId");
	   $indexId = substr($indexId, 0, -1);
	   $arrid=@split(',',$indexId);
	   foreach($arrid as $k=>$v)
	   {   
			$map['deviceid']=$arrid[$k];
			$link->where($map)->delete(); 
	   }
	   redirect(U('Device/succed'));
   }
   
//从Execl导入设备
   public function import(){
/*	    vendor("PHPExcel.PHPExcel");
        $objPHPExcel = new PHPExcel();
		$filepath = I("filepath");
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');//Excel5 for 2003 excel2007 for 2007/  
		$objPHPExcel = $objReader->load($uploadfile); //Excel 路径  
		if(!$objPHPExcel)
		{
			echo "文件不存在或打开文件失败！";
			echo '<div style="text-align:center;margin-top:30px;"><input type="button" value="确定" id= "button" onClick="javascript:parent.closeDialog();"></div>';
			exit;
		}
		$sheet = $objPHPExcel->getSheet(0);  
		$highestRow = $sheet->getHighestRow(); // 取得总行数  
		$highestColumn = $sheet->getHighestColumn(); // 取得总列数  
		$objWorksheet = $objPHPExcel->getActiveSheet();          
		$highestRow = $objWorksheet->getHighestRow();   // 取得总行数       
		$highestColumn = $objWorksheet->getHighestColumn();          
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);//总列数  
		$data = array();
		for ($row = 1;$row <= $highestRow;$row++)         
		{  
			$strs=array(); 
			for ($col = 0;$col < $highestColumnIndex;$col++)            
			{  
				$strs[$col] =$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();  
			} 
			$data[$row-1]=$strs;
		}
		dump($data);
		$data = array();
		$errflag=true;//用于标记是否输出errline
		$rowsum=0;//总共导入的行
		$errnum=0;//统计错误的行
			
		$file = @fopen($filepath,"r");
		
		fgetcsv($file);//标题不处理
		for($row = 0;$row < $highestRow;$row++)
  		{
			$rowsum++;
			$imeiTemp = $data[$row][0];
			$adminidTemp = $data[$row][2];
			$query = "select role from user_info where userid=".$adminidTemp." and operate = 0 order by logintime desc limit 1";  
			$res = $link->query( $query ); 
			if($res)
			{
				$lastLoginTime = $res[0]['logintime'];
			}
			$query="insert into device_info(imei,adminid) values('".$imeiTemp."',".$adminidTemp.")";
			MySQL_query($query);
			//错误则显示错误的行
			$nRet =mysql_errno();
			if($nRet!=ER_MYSQL_SUCCESS)
			{
				$errnum++;
			}
  		}
		$nRet =mysql_errno();
		if($errnum==0)
		{
			echo "<script language=javascript>location.href='succed.php';</script>";
		}
		else
		{
			echo "<br><br>";
			echo "总共".$rowsum."行,正确".($rowsum-$errnum)."行,错误:".$errnum."行";
			echo '<div style="text-align:center;margin-top:30px;"><input type="button" value="确定" id= "button" onClick="javascript:parent.closeDialog();"></div>';	
		}
 */  }
   
 //导出设备列表到Execl
   public function export(){
        session_start();
		$loginid = $_SESSION["uid"];
		$condition ='1';
		if($loginid != 1)
		{
			$condition ='adminid = '.$loginid;
		}
		$link=M('device_info');
	    import('ORG.Util.Page');// 导入分页类

		$deviceno=isset($_POST['deviceno'])?$_POST['deviceno']:'';
		$devicesn=isset($_POST['deviceid'])?$_POST['deviceid']:'';
		$factory=isset($_POST['factory'])?$_POST['factory']:'';
		if(!empty($deviceno)){
			$condition.=' and plateNumber = \''.$deviceno.'\'';
		}
		if(!empty($devicesn)){
			$condition.=' and imei = \''.$devicesn.'\'';
		}
		if(!empty($factory)){
			$condition.=' and manufacturer = \''.$factory.'\'';
		}
			
        $count      = $link->where($condition)->count();
        $Page       = new Page($count,21);
	    $Page->setConfig('header', '条数据');
        $Page->setConfig('first', '首页');
        $Page->setConfig('last', '尾页');
        $show       = $Page->show();// 分页显示输出
        $devicelist= $link->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
		$linkuser=M('user_info');
		
		for($i=0;$i<$count;$i++)
		{
			$adminid = $devicelist[$i]['adminid'];
			$userinfo= $linkuser->find($devicelist[$i]['adminid']); 
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
		}

        //清除缓冲区
        ob_clean();
        //$xlsTitle = iconv("utf-8","gb2312","设备列表");
		$xlsTitle = "设备列表";
        $fileName = "设备列表";
        $cellNum  = 15;
        
        vendor("PHPExcel.PHPExcel");
        $objPHPExcel = new PHPExcel();
        $expCellName = array(
        array('imei','设备SN','A','10'),
        array('plateNumber','车牌号','B','10'),
        array('carrierOperator','运营商','C','15'),
        array('bmsHardware','BMS硬件版本','D','10'),
        array('bmsSoftware','BMS软件版本','E','10'),
        array('gprsHardware','GPRS硬件版本','F','10'),
        array('gprsSoftware','GPRS软件版本','G','10'),
		array('batteryNum','电池组串数','H','10'),
        array('manufacturer','厂家标识','I','10'),
        array('coreType','电芯类型','J','10'),
        array('moduleNumber','采集模块数','K','10'),
        array('lastactivetime','最后活跃时间','L','10'),
        array('adminname','管理员','M','20'),
		array('groupname','所属组','N','20'),
		array('remark','备注','O','20'));
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
            'AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
            $objPHPExcel->getActiveSheet()->getColumnDimension($expCellName[$i][2])->setWidth($expCellName[$i][3]); 
        } 
         
        $k=1;    
        for($i=0;$i<$count;$i++){
          for($j=0;$j<$cellNum;$j++){
            //序号，手动写入
            if($j==2)
            {
                $operator="";
                if($devicelist[$i][$expCellName[$j][0]]=='0')
                {
                    $operator="移动";
                }
                if($devicelist[$i][$expCellName[$j][0]]=='2')
                {
                    $operator="联通";
                }
                if($devicelist[$i][$expCellName[$j][0]]=='3')
                {
                    $operator="电信";
                }
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $dbstatus);
            }
            else
            {
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $devicelist[$i][$expCellName[$j][0]]);
            }
            
          } 
          $k++;            
        } 
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
        $objWriter->save('php://output');
        exit;

   }  
}
 ?>