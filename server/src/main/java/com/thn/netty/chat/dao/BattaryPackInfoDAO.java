package com.thn.netty.chat.dao;


import java.sql.SQLException;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;

import com.thn.netty.chat.dao.BattaryPackInfoBean;
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


public class BattaryPackInfoDAO
{
	 public BattaryPackInfoBean	select(String imei){
		 QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		 String sql = "select * from battary_pack_info where imei=?;" ;
		 //List<ParamCfgBean> entities = null;
		 		BattaryPackInfoBean battaryPackInfo =null;
		 
		 ResultSetHandler<BattaryPackInfoBean> rsh = new BeanHandler<BattaryPackInfoBean>(BattaryPackInfoBean.class);
		 
		try { 
				 battaryPackInfo = qr.query(sql,rsh,imei);
					 
		}
		catch (SQLException e){ 
			
			e.printStackTrace(); 
		} 
		
		return battaryPackInfo;

	 }

	 public int insert(BattaryPackInfoBean battaryPackInfo) throws SQLException {
		int n =0;
		QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		
		System.out.println("999999999999999:" + battaryPackInfo.getImei());
		BattaryPackInfoBean	 bpi = select(battaryPackInfo.getImei());
		if (null == bpi)
		{
			System.out.println("add");
			String sql = "INSERT into battary_pack_info(imei,totalvoltage,totalcurrent,soc,soh,nominalcapacity,ratedvoltage,frequency,insulationvoltage,positiveresistance,negativeresistance,maxvoltage,maxvoltageid,smallvoltage,smallvoltageid,maxtemperature,maxtemperatureid,smalltemperature,smalltemperatureid)  values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) " ;
			n = qr.update(sql,battaryPackInfo.getImei(),battaryPackInfo.getTotalvoltage(),battaryPackInfo.getTotalcurrent(),battaryPackInfo.getSoc(),battaryPackInfo.getSoh(),battaryPackInfo.getNominalcapacity(),battaryPackInfo.getRatedvoltage(),battaryPackInfo.getFrequency(),battaryPackInfo.getInsulationvoltage(),battaryPackInfo.getPositiveresistance(),battaryPackInfo.getNegativeresistance(),battaryPackInfo.getMaxvoltage(),battaryPackInfo.getMaxvoltageid(),battaryPackInfo.getSmallvoltage(),battaryPackInfo.getSmallvoltageid(),battaryPackInfo.getMaxtemperature(),battaryPackInfo.getMaxtemperatureid(),battaryPackInfo.getSmalltemperature(),battaryPackInfo.getSmalltemperatureid());
		}
		else
		{
			
			System.out.println("mod");
			String sql = "update battary_pack_info set totalvoltage=? ,totalcurrent=? ,soc=? ,soh=? ,nominalcapacity=? ,ratedvoltage=? ,frequency=? ,insulationvoltage=? ,positiveresistance=? ,negativeresistance=? ,maxvoltage=? ,maxvoltageid=? ,smallvoltage=? ,smallvoltageid=? ,maxtemperature=? ,maxtemperatureid=? ,smalltemperature=? ,smalltemperatureid=? where imei=?  ; " ;
			n = qr.update(sql,battaryPackInfo.getTotalvoltage(),battaryPackInfo.getTotalcurrent(),battaryPackInfo.getSoc(),battaryPackInfo.getSoh(),battaryPackInfo.getNominalcapacity(),battaryPackInfo.getRatedvoltage(),battaryPackInfo.getFrequency(),battaryPackInfo.getInsulationvoltage(),battaryPackInfo.getPositiveresistance(),battaryPackInfo.getNegativeresistance(),battaryPackInfo.getMaxvoltage(),battaryPackInfo.getMaxvoltageid(),battaryPackInfo.getSmallvoltage(),battaryPackInfo.getSmallvoltageid(),battaryPackInfo.getMaxtemperature(),battaryPackInfo.getMaxtemperatureid(),battaryPackInfo.getSmalltemperature(),battaryPackInfo.getSmalltemperatureid(),battaryPackInfo.getImei());
		}
		

		
		return n;
	}


}
