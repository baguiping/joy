package com.thn.netty.chat.dao;


import java.sql.SQLException;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;

import com.thn.netty.chat.dao.DevParamCfgBean;
import com.thn.netty.chat.db.C3P0Utils;


import org.apache.commons.dbutils.QueryRunner; 
import org.apache.commons.dbutils.handlers.ArrayHandler; 
import org.apache.commons.dbutils.handlers.ArrayListHandler; 
import org.apache.commons.dbutils.handlers.BeanHandler; 
import org.apache.commons.dbutils.handlers.BeanListHandler; 
import org.apache.commons.dbutils.handlers.MapListHandler; 


import java.util.Arrays; 
import java.util.List; 
import java.util.Map; 


public class DevParamCfgDAO
{
	 public DevParamCfgBean	select(String imei){
		 QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		 String sql = "select * from dev_param_cfg where imei=?;" ;
		 //List<ParamCfgBean> entities = null;
		 		DevParamCfgBean devParamcfgInfo =null;
		 
		 ResultSetHandler<DevParamCfgBean> rsh = new BeanHandler<DevParamCfgBean>(DevParamCfgBean.class);
		 
		try { 
				 devParamcfgInfo = qr.query(sql,rsh,imei);
					 
		}
		catch (SQLException e){ 
			
			e.printStackTrace(); 
		} 
		
		return devParamcfgInfo;

	 }

	 public int insert(DevParamCfgBean devParamcfgInfo) throws SQLException {
		int n =0;
		QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		
		System.out.println("999999999999999:" + devParamcfgInfo.getImei());
		DevParamCfgBean	 bpi = select(devParamcfgInfo.getImei());
		if (null == bpi)
		{
			System.out.println("add DevParamCfg");
			String sql = "INSERT into dev_param_cfg(imei,resetInitiSetFlag,comServerAddrMode,comServerAddrIp,comServerAddrPort,gprsApnMode,gprsApnAccount,gprsApnPwd,uploadInterval,heartbeatInterval,comTimeout)  values(?,?,?,?,?,?,?,?,?,?,?) " ;
			n = qr.update(sql,devParamcfgInfo.getImei(),devParamcfgInfo.getResetInitiSetFlag(),devParamcfgInfo.getComServerAddrMode(),devParamcfgInfo.getComServerAddrIp(),devParamcfgInfo.getComServerAddrPort(),devParamcfgInfo.getGprsApnMode(),devParamcfgInfo.getGprsApnAccount(),devParamcfgInfo.getGprsApnPwd(),devParamcfgInfo.getUploadInterval(),devParamcfgInfo.getHeartbeatInterval(),devParamcfgInfo.getComTimeout());
		}
		else
		{
			
			System.out.println("mod DevParamCfg");
			String sql = "update dev_param_cfg set resetInitiSetFlag=? ,comServerAddrMode=? ,comServerAddrIp=? ,comServerAddrPort=? ,gprsApnMode=? ,gprsApnAccount=? ,gprsApnPwd=? ,uploadInterval=? ,heartbeatInterval=? ,comTimeout=? where imei=?  ; " ;
			n = qr.update(sql,devParamcfgInfo.getResetInitiSetFlag(),devParamcfgInfo.getComServerAddrMode(),devParamcfgInfo.getComServerAddrIp(),devParamcfgInfo.getComServerAddrPort(),devParamcfgInfo.getGprsApnMode(),devParamcfgInfo.getGprsApnAccount(),devParamcfgInfo.getGprsApnPwd(),devParamcfgInfo.getUploadInterval(),devParamcfgInfo.getHeartbeatInterval(),devParamcfgInfo.getComTimeout(),devParamcfgInfo.getImei());
		}

		return n;
	}


}
