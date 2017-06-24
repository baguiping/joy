package com.thn.netty.chat.dao;


import java.sql.SQLException;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;

import com.thn.netty.chat.dao.ChargeDischargeCfgBean;
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


public class ChargeDischargeCfgDAO
{
	 public ChargeDischargeCfgBean	select(String imei){
		 QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		 String sql = "select * from charge_discharge_cfg where imei=?;" ;
				ChargeDischargeCfgBean chargecfgInfo =null;
		 
		 ResultSetHandler<ChargeDischargeCfgBean> rsh = new BeanHandler<ChargeDischargeCfgBean>(ChargeDischargeCfgBean.class);
		 
		try { 
				 chargecfgInfo = qr.query(sql,rsh,imei);
					 
		}
		catch (SQLException e){ 
			
			e.printStackTrace(); 
		} 
		
		return chargecfgInfo;

	 }

	 public int insert(ChargeDischargeCfgBean chargecfgInfo) throws SQLException {
		int n =0;
		QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		
		System.out.println("999999999999999:" + chargecfgInfo.getImei());
		ChargeDischargeCfgBean	 bpi = select(chargecfgInfo.getImei());
		if (null == bpi)
		{
			System.out.println("add ChargeDischargeCfg");
			String sql = "INSERT into charge_discharge_cfg(imei,maxDischargeCurrent,maxRechargeCurrent,chargeControl,chargeReqCurrent,chargeReqVoltage,currentCalibration,currentRatio,maxCapacity,totalCapacity,remainCapacity,cycleTimes,fanOpenTempThreshold,fanCloseTempThreshold,heatOpenTempThreshold,heatCloseTempThreshold)  values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) " ;
			n = qr.update(sql,chargecfgInfo.getImei(),chargecfgInfo.getMaxDischargeCurrent(),chargecfgInfo.getMaxRechargeCurrent(),
			chargecfgInfo.getChargeControl(),chargecfgInfo.getChargeReqCurrent(),chargecfgInfo.getChargeReqVoltage(),
			chargecfgInfo.getCurrentCalibration(),chargecfgInfo.getCurrentRatio(),chargecfgInfo.getMaxCapacity(),chargecfgInfo.getTotalCapacity(),
			chargecfgInfo.getRemainCapacity(),chargecfgInfo.getCycleTimes(),chargecfgInfo.getFanOpenTempThreshold(),
			chargecfgInfo.getFanCloseTempThreshold(),chargecfgInfo.getHeatOpenTempThreshold(),chargecfgInfo.getHeatCloseTempThreshold());
		}
		else
		{
			
			System.out.println("mod ChargeDischargeCfg");
			String sql = "update charge_discharge_cfg set maxDischargeCurrent=? ,maxRechargeCurrent=? ,chargeControl=? ,chargeReqCurrent=? ,chargeReqVoltage=? ,currentCalibration=? ,currentRatio=? ,maxCapacity=? ,totalCapacity=? ,remainCapacity=? ,cycleTimes=? ,fanOpenTempThreshold=? ,fanCloseTempThreshold=? ,heatOpenTempThreshold=? ,heatCloseTempThreshold=? where imei=?  ; " ;
			n = qr.update(sql,chargecfgInfo.getMaxDischargeCurrent(),chargecfgInfo.getMaxRechargeCurrent(),
			chargecfgInfo.getChargeControl(),chargecfgInfo.getChargeReqCurrent(),chargecfgInfo.getChargeReqVoltage(),
			chargecfgInfo.getCurrentCalibration(),chargecfgInfo.getCurrentRatio(),chargecfgInfo.getMaxCapacity(),chargecfgInfo.getTotalCapacity(),
			chargecfgInfo.getRemainCapacity(),chargecfgInfo.getCycleTimes(),chargecfgInfo.getFanOpenTempThreshold(),
			chargecfgInfo.getFanCloseTempThreshold(),chargecfgInfo.getHeatOpenTempThreshold(),chargecfgInfo.getHeatCloseTempThreshold(),chargecfgInfo.getImei());
		}
		
		return n;
	}


}
