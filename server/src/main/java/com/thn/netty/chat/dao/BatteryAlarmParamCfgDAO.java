package com.thn.netty.chat.dao;


import java.sql.SQLException;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;

import com.thn.netty.chat.dao.BatteryAlarmParamCfgBean;
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


public class BatteryAlarmParamCfgDAO
{
	 public BatteryAlarmParamCfgBean	select(String imei){
		 QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		 String sql = "select * from battery_alarm_param_cfg where imei=?;" ;
		 //List<ParamCfgBean> entities = null;
		 		BatteryAlarmParamCfgBean batAlarmCfgInfo =null;
		 
		 ResultSetHandler<BatteryAlarmParamCfgBean> rsh = new BeanHandler<BatteryAlarmParamCfgBean>(BatteryAlarmParamCfgBean.class);
		 
		try { 
				 batAlarmCfgInfo = qr.query(sql,rsh,imei);
					 
		}
		catch (SQLException e){ 
			
			e.printStackTrace(); 
		} 
		
		return batAlarmCfgInfo;

	 }

	 public int insert(BatteryAlarmParamCfgBean batAlarmCfgInfo) throws SQLException {
		int n =0;
		QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		
		System.out.println("999999999999999:" + batAlarmCfgInfo.getImei());
		BatteryAlarmParamCfgBean	 bpi = select(batAlarmCfgInfo.getImei());
		if (null == bpi)
		{
			System.out.println("add BatteryAlarmParamCfg");
			String sql = "INSERT into battery_alarm_param_cfg(imei,voltageHigh1,voltageLow1,temperHigh1,temperLow1,chargeCurrentLarge1,dischargeCurrentLarge1,resistanceLow1,socLow1,pressureHigh1,pressureLow1,preDiffLarge1,tempDiffLarge1,voltageHigh2,voltageLow2,temperHigh2,temperLow2,chargeCurrentLarge2,dischargeCurrentLarge2,resistanceLow2,socLow2,pressureHigh2,pressureLow2,preDiffLarge2,tempDiffLarge2,voltageHigh3,voltageLow3,temperHigh3,temperLow3,chargeCurrentLarge3,dischargeCurrentLarge3,resistanceLow3,socLow3,pressureHigh3,pressureLow3,preDiffLarge3,tempDiffLarge3)  values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) " ;
			n = qr.update(sql,batAlarmCfgInfo.getImei(),batAlarmCfgInfo.getVoltageHigh1(),batAlarmCfgInfo.getVoltageLow1(),batAlarmCfgInfo.getTemperHigh1(),batAlarmCfgInfo.getTemperLow1(),batAlarmCfgInfo.getChargeCurrentLarge1(),
			batAlarmCfgInfo.getDischargeCurrentLarge1(),batAlarmCfgInfo.getResistanceLow1(),batAlarmCfgInfo.getSocLow1(),batAlarmCfgInfo.getPressureHigh1(),batAlarmCfgInfo.getPressureLow1(),batAlarmCfgInfo.getPreDiffLarge1(),batAlarmCfgInfo.getTempDiffLarge1(),
			batAlarmCfgInfo.getVoltageHigh2(),batAlarmCfgInfo.getVoltageLow2(),batAlarmCfgInfo.getTemperHigh2(),batAlarmCfgInfo.getTemperLow2(),batAlarmCfgInfo.getChargeCurrentLarge2(),batAlarmCfgInfo.getDischargeCurrentLarge2(),batAlarmCfgInfo.getResistanceLow2(),
			batAlarmCfgInfo.getSocLow2(),batAlarmCfgInfo.getPressureHigh2(),batAlarmCfgInfo.getPressureLow2(),batAlarmCfgInfo.getPreDiffLarge2(),batAlarmCfgInfo.getTempDiffLarge2(),batAlarmCfgInfo.getVoltageHigh3(),
			batAlarmCfgInfo.getVoltageLow3(),batAlarmCfgInfo.getTemperHigh3(),batAlarmCfgInfo.getTemperLow3(),batAlarmCfgInfo.getChargeCurrentLarge3(),batAlarmCfgInfo.getDischargeCurrentLarge3(),batAlarmCfgInfo.getResistanceLow3(),batAlarmCfgInfo.getSocLow3(),
			batAlarmCfgInfo.getPressureHigh3(),batAlarmCfgInfo.getPressureLow3(),batAlarmCfgInfo.getPreDiffLarge3(),batAlarmCfgInfo.getTempDiffLarge3());
		}
		else
		{
			
			System.out.println("mod BatteryAlarmParamCfg");
			String sql = "update battery_alarm_param_cfg set voltageHigh1=? ,voltageLow1=? ,temperHigh1=? ,temperLow1=? ,chargeCurrentLarge1=? ,dischargeCurrentLarge1=? ,resistanceLow1=? ,socLow1=? ,pressureHigh1=? ,pressureLow1=? ,preDiffLarge1=? ,tempDiffLarge1=? ,voltageHigh2=? ,voltageLow2=? ,temperHigh2=? ,temperLow2=? ,chargeCurrentLarge2=? ,dischargeCurrentLarge2=? ,resistanceLow2=? ,socLow2=? ,pressureHigh2=? ,pressureLow2=? ,preDiffLarge2=? ,tempDiffLarge2=? ,voltageHigh3=? ,voltageLow3=? ,temperHigh3=? ,temperLow3=? ,chargeCurrentLarge3=? ,dischargeCurrentLarge3=? ,resistanceLow3=? ,socLow3=? ,pressureHigh3=? ,pressureLow3=? ,preDiffLarge3=? ,tempDiffLarge3=? where imei=?  ; " ;
			n = qr.update(sql,batAlarmCfgInfo.getVoltageHigh1(),batAlarmCfgInfo.getVoltageLow1(),batAlarmCfgInfo.getTemperHigh1(),batAlarmCfgInfo.getTemperLow1(),batAlarmCfgInfo.getChargeCurrentLarge1(),
			batAlarmCfgInfo.getDischargeCurrentLarge1(),batAlarmCfgInfo.getResistanceLow1(),batAlarmCfgInfo.getSocLow1(),batAlarmCfgInfo.getPressureHigh1(),batAlarmCfgInfo.getPressureLow1(),batAlarmCfgInfo.getPreDiffLarge1(),batAlarmCfgInfo.getTempDiffLarge1(),
			batAlarmCfgInfo.getVoltageHigh2(),batAlarmCfgInfo.getVoltageLow2(),batAlarmCfgInfo.getTemperHigh2(),batAlarmCfgInfo.getTemperLow2(),batAlarmCfgInfo.getChargeCurrentLarge2(),batAlarmCfgInfo.getDischargeCurrentLarge2(),batAlarmCfgInfo.getResistanceLow2(),
			batAlarmCfgInfo.getSocLow2(),batAlarmCfgInfo.getPressureHigh2(),batAlarmCfgInfo.getPressureLow2(),batAlarmCfgInfo.getPreDiffLarge2(),batAlarmCfgInfo.getTempDiffLarge2(),batAlarmCfgInfo.getVoltageHigh3(),
			batAlarmCfgInfo.getVoltageLow3(),batAlarmCfgInfo.getTemperHigh3(),batAlarmCfgInfo.getTemperLow3(),batAlarmCfgInfo.getChargeCurrentLarge3(),batAlarmCfgInfo.getDischargeCurrentLarge3(),batAlarmCfgInfo.getResistanceLow3(),batAlarmCfgInfo.getSocLow3(),
			batAlarmCfgInfo.getPressureHigh3(),batAlarmCfgInfo.getPressureLow3(),batAlarmCfgInfo.getPreDiffLarge3(),batAlarmCfgInfo.getTempDiffLarge3(),batAlarmCfgInfo.getImei());
		}
		
		return n;
	}


}
