package com.thn.netty.chat.dao;


import java.sql.SQLException;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;

import com.thn.netty.chat.dao.BmsHybridParamCfgBean;
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


public class BmsHybridParamCfgDAO
{
	 public BmsHybridParamCfgBean	select(String imei){
		 QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		 String sql = "select * from hybrid_param_cfg where imei=?;" ;
		 		BmsHybridParamCfgBean hybridParamCfg =null;
		 
		 ResultSetHandler<BmsHybridParamCfgBean> rsh = new BeanHandler<BmsHybridParamCfgBean>(BmsHybridParamCfgBean.class);
		 
		try { 
				 hybridParamCfg = qr.query(sql,rsh,imei);
					 
		}
		catch (SQLException e){ 
			
			e.printStackTrace(); 
		} 
		
		return hybridParamCfg;

	 }

	 public int insert(BmsHybridParamCfgBean hybridParamCfg) throws SQLException {
		int n =0;
		QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		
		System.out.println("999999999999999:" + hybridParamCfg.getImei());
		BmsHybridParamCfgBean	 bpi = select(hybridParamCfg.getImei());
		if (null == bpi)
		{
			System.out.println("add BmsHybridParamCfg");
			String sql = "INSERT into hybrid_param_cfg(imei,initialParamset,comAlarmThreshold)  values(?,?,?) " ;
			n = qr.update(sql,hybridParamCfg.getImei(),hybridParamCfg.getInitialParamset(),hybridParamCfg.getComAlarmThreshold());
		}
		else
		{
			
			System.out.println("mod BmsHybridParamCfg");
			String sql = "update hybrid_param_cfg set initialParamset=? ,comAlarmThreshold=? where imei=?  ; " ;
			n = qr.update(sql,hybridParamCfg.getInitialParamset(),hybridParamCfg.getComAlarmThreshold(),hybridParamCfg.getImei());
		}
	
		return n;
	}


}
