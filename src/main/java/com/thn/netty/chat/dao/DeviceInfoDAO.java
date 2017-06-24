package com.thn.netty.chat.dao;


import java.sql.SQLException;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;

import com.thn.netty.chat.dao.DeviceInfoBean;
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

public class DeviceInfoDAO
{
	public DeviceInfoBean  select(String imei) throws SQLException {
	QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
	String sql = "select * from device_info where imei=?" ;
	ResultSetHandler<DeviceInfoBean> rsh = new BeanHandler<DeviceInfoBean>(DeviceInfoBean.class);
	DeviceInfoBean de = qr.query(sql,rsh,imei);
   
   return de;

	
}


public int insert(DeviceInfoBean deviceinfo) throws SQLException {

		int n =0;
		QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		System.out.println("999999999999999:" + deviceinfo.getImei());
		DeviceInfoBean	 bpi = select(deviceinfo.getImei());
		if (null == bpi)
		{
			System.out.println("add DeviceInfo");
			String sql = "INSERT into device_info(imei,plateNumber,carrierOperator,bmsHardware,bmsSoftware,gprsHardware,gprsSoftware,batteryNum,manufacturer,coreType,moduleNumber,overVoltageAlarm,overVoltageCutOff,underVoltageAlarm,underVoltageCutOff,pressureEqual,equalCurrent,socLowWarn,maxTransChargeCurrent,maxAllowChargeVoltage,maxTransDischargeCurrent,minPermChargeVoltage,fanStartTemp,fanCloseTemp,heatStartTemp,heatCloseTemp,allowMaxOperTemp,allowMinOperTemp,maxPermLeakCurrent,lastactivetime,adminid,remark)  values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) " ;
			n = qr.update(sql,deviceinfo.getImei(),deviceinfo.getPlateNumber(),deviceinfo.getCarrierOperator(),
			deviceinfo.getBmsHardware(),deviceinfo.getBmsSoftware(),deviceinfo.getGprsHardware(),deviceinfo.getGprsSoftware(),deviceinfo.getBatteryNum(),deviceinfo.getManufacturer(),deviceinfo.getCoreType(),deviceinfo.getModuleNumber(),deviceinfo.getOverVoltageAlarm(),deviceinfo.getOverVoltageCutOff(),
			deviceinfo.getUnderVoltageAlarm(),deviceinfo.getUnderVoltageCutOff(),deviceinfo.getPressureEqual(),deviceinfo.getEqualCurrent(),deviceinfo.getSocLowWarn(),deviceinfo.getMaxTransChargeCurrent()
			,deviceinfo.getMaxAllowChargeVoltage(),deviceinfo.getMaxTransDischargeCurrent(),deviceinfo.getMinPermChargeVoltage(),deviceinfo.getFanStartTemp(),deviceinfo.getFanCloseTemp(),deviceinfo.getHeatStartTemp(),deviceinfo.getHeatCloseTemp(),deviceinfo.getAllowMaxOperTemp(),
			deviceinfo.getAllowMinOperTemp(),deviceinfo.getMaxPermLeakCurrent(),deviceinfo.getLastactivetime(),deviceinfo.getAdminid(),deviceinfo.getRemark());
		}
		else
		{
			
			System.out.println("mod DeviceInfo");
			String sql = "update device_info set plateNumber=? ,carrierOperator=? ,bmsHardware=? ,bmsSoftware=? ,gprsHardware=? ,gprsSoftware=? ,batteryNum=? ,manufacturer=? ,coreType=? ,moduleNumber=? ,overVoltageAlarm=? ,overVoltageCutOff=? ,underVoltageAlarm=? ,underVoltageCutOff=? ,pressureEqual=? ,equalCurrent=? ,socLowWarn=? ,maxTransChargeCurrent=? ,maxAllowChargeVoltage=? ,maxTransDischargeCurrent=? ,minPermChargeVoltage=? ,fanStartTemp=? ,fanCloseTemp=? ,heatStartTemp=? ,heatCloseTemp=? ,allowMaxOperTemp=? ,allowMinOperTemp=? ,maxPermLeakCurrent=? ,lastactivetime=? where imei=?  ; " ;
			n = qr.update(sql,deviceinfo.getPlateNumber(),deviceinfo.getCarrierOperator(),deviceinfo.getBmsHardware(),deviceinfo.getBmsSoftware(),
			deviceinfo.getGprsHardware(),deviceinfo.getGprsSoftware(),deviceinfo.getBatteryNum(),deviceinfo.getManufacturer(),deviceinfo.getCoreType(),deviceinfo.getModuleNumber(),
			deviceinfo.getOverVoltageAlarm(),deviceinfo.getOverVoltageCutOff(),deviceinfo.getUnderVoltageAlarm(),deviceinfo.getUnderVoltageCutOff(),deviceinfo.getPressureEqual(),
			deviceinfo.getEqualCurrent(),deviceinfo.getSocLowWarn(),deviceinfo.getMaxTransChargeCurrent(),deviceinfo.getMaxAllowChargeVoltage(),deviceinfo.getMaxTransDischargeCurrent(),
			deviceinfo.getMinPermChargeVoltage(),deviceinfo.getFanStartTemp(),deviceinfo.getFanCloseTemp(),deviceinfo.getHeatStartTemp(),deviceinfo.getHeatCloseTemp(),deviceinfo.getAllowMaxOperTemp(),
			deviceinfo.getAllowMinOperTemp(),deviceinfo.getMaxPermLeakCurrent(),deviceinfo.getLastactivetime(),deviceinfo.getImei());
		}
		
		return n;
	}


	
}





