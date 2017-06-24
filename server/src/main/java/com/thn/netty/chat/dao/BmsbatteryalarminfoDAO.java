package com.thn.netty.chat.dao;


import java.sql.SQLException;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;

import com.thn.netty.chat.dao.BmsbatteryalarminfoBean;
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


public class BmsbatteryalarminfoDAO
{
	 public BmsbatteryalarminfoBean	select(String imei){
		 QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		 String sql = "select * from bmsbatteryalarminfo where imei=?;" ;
		 //List<ParamCfgBean> entities = null;
		 		BmsbatteryalarminfoBean battaryAlarmInfo =null;
		 
		 ResultSetHandler<BmsbatteryalarminfoBean> rsh = new BeanHandler<BmsbatteryalarminfoBean>(BmsbatteryalarminfoBean.class);
		 
		try { 
				 battaryAlarmInfo = qr.query(sql,rsh,imei);
					 
		}
		catch (SQLException e){ 
			
			e.printStackTrace(); 
		} 
		
		return battaryAlarmInfo;

	 }

	 public int insert(BmsbatteryalarminfoBean battaryAlarmInfo) throws SQLException {
		int n =0;
		QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		
		System.out.println("999999999999999:" + battaryAlarmInfo.getImei());
		BmsbatteryalarminfoBean	 bpi = select(battaryAlarmInfo.getImei());
		if (null == bpi)
		{
			System.out.println("add bmsbatteryalarminfo");
			String sql = "INSERT into bmsbatteryalarminfo(imei,overvoltagealarm,overvoltageprotect,lowvoltagealarm,lowvoltageprotect,hightemperalarm,hightemperprotect,lowtemperalarm,lowtemperprotect,pressurediffalarm,pressurediffprotect,soclowalarm,soclowprotect,equalfaultalarm,equalfaultprotect,bsucommfaultalarm,bsucommfaultprotect,dischargecurrentalarm,dischargecurrentprotect,chargecurrentalarm,chargecurrentprotect,highpressurealarm,highpressureprotect,lowpressurealarm,lowpressureprotect,contactor1,contactor2,contactor3,contactor4,contactor5,contactor6,inportstatus,alarmcode1,alarmcode2,alarmcode3,alarmcode4)  values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) " ;
			n = qr.update(sql,battaryAlarmInfo.getImei(),battaryAlarmInfo.getOvervoltagealarm(),battaryAlarmInfo.getOvervoltageprotect(),battaryAlarmInfo.getLowvoltagealarm(),battaryAlarmInfo.getLowvoltageprotect(),
			battaryAlarmInfo.getHightemperalarm(),battaryAlarmInfo.getHightemperprotect(),battaryAlarmInfo.getLowtemperalarm(),battaryAlarmInfo.getLowtemperprotect(),battaryAlarmInfo.getPressurediffalarm(),battaryAlarmInfo.getPressurediffprotect(),
			battaryAlarmInfo.getSoclowalarm(),battaryAlarmInfo.getSoclowprotect(),battaryAlarmInfo.getEqualfaultalarm(),battaryAlarmInfo.getEqualfaultprotect(),battaryAlarmInfo.getBsucommfaultalarm(),battaryAlarmInfo.getBsucommfaultprotect(),battaryAlarmInfo.getDischargecurrentalarm(),battaryAlarmInfo.getDischargecurrentprotect(),
			battaryAlarmInfo.getChargecurrentalarm(),battaryAlarmInfo.getChargecurrentprotect(),battaryAlarmInfo.getHighpressurealarm(),battaryAlarmInfo.getHighpressureprotect(),
			battaryAlarmInfo.getLowpressurealarm(),battaryAlarmInfo.getLowpressureprotect(),battaryAlarmInfo.getContactor1(),battaryAlarmInfo.getContactor2(),
			battaryAlarmInfo.getContactor3(),battaryAlarmInfo.getContactor4(),battaryAlarmInfo.getContactor5(),battaryAlarmInfo.getContactor6(),
			battaryAlarmInfo.getInportstatus(),battaryAlarmInfo.getAlarmcode1(),battaryAlarmInfo.getAlarmcode2(),battaryAlarmInfo.getAlarmcode3(),battaryAlarmInfo.getAlarmcode4());
		}
		else
		{
			
			System.out.println("mod bmsbatteryalarminfo");
			String sql = "update bmsbatteryalarminfo set overvoltagealarm=? ,overvoltageprotect=? ,lowvoltagealarm=? ,lowvoltageprotect=? ,hightemperalarm=? ,hightemperprotect=? ,lowtemperalarm=? ,lowtemperprotect=? ,pressurediffalarm=? ,pressurediffprotect=? ,soclowalarm=? ,soclowprotect=? ,equalfaultalarm=? ,equalfaultprotect=? ,bsucommfaultalarm=? ,bsucommfaultprotect=? ,dischargecurrentalarm=? ,dischargecurrentprotect=? ,chargecurrentalarm=? ,chargecurrentprotect=? ,highpressurealarm=? ,highpressureprotect=? ,lowpressurealarm=? ,lowpressureprotect=? ,contactor1=? ,contactor2=? ,contactor3=?, contactor4=?, contactor5=? ,contactor6=? ,inportstatus=? ,alarmcode1=? ,alarmcode2=? ,alarmcode3=? ,alarmcode4=? where imei=?  ; " ;
			n = qr.update(sql,battaryAlarmInfo.getOvervoltagealarm(),battaryAlarmInfo.getOvervoltageprotect(),battaryAlarmInfo.getLowvoltagealarm(),battaryAlarmInfo.getLowvoltageprotect(),
			battaryAlarmInfo.getHightemperalarm(),battaryAlarmInfo.getHightemperprotect(),battaryAlarmInfo.getLowtemperalarm(),battaryAlarmInfo.getLowtemperprotect(),battaryAlarmInfo.getPressurediffalarm(),battaryAlarmInfo.getPressurediffprotect(),
			battaryAlarmInfo.getSoclowalarm(),battaryAlarmInfo.getSoclowprotect(),battaryAlarmInfo.getEqualfaultalarm(),battaryAlarmInfo.getEqualfaultprotect(),battaryAlarmInfo.getBsucommfaultalarm(),battaryAlarmInfo.getBsucommfaultprotect(),battaryAlarmInfo.getDischargecurrentalarm(),battaryAlarmInfo.getDischargecurrentprotect(),
			battaryAlarmInfo.getChargecurrentalarm(),battaryAlarmInfo.getChargecurrentprotect(),battaryAlarmInfo.getHighpressurealarm(),battaryAlarmInfo.getHighpressureprotect(),
			battaryAlarmInfo.getLowpressurealarm(),battaryAlarmInfo.getLowpressureprotect(),battaryAlarmInfo.getContactor1(),battaryAlarmInfo.getContactor2(),
			battaryAlarmInfo.getContactor3(),battaryAlarmInfo.getContactor4(),battaryAlarmInfo.getContactor5(),battaryAlarmInfo.getContactor6(),
			battaryAlarmInfo.getInportstatus(),battaryAlarmInfo.getAlarmcode1(),battaryAlarmInfo.getAlarmcode2(),battaryAlarmInfo.getAlarmcode3(),battaryAlarmInfo.getAlarmcode4(),battaryAlarmInfo.getImei());
		}
		

		
		return n;
	}


}
