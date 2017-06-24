package com.thn.netty.chat.dao;


import java.sql.SQLException;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;

import com.thn.netty.chat.dao.AlarmInfoBean;
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

public class AlarmInfoDAO
{

	public AlarmInfoBean  select(String imei) throws SQLException {
	QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
	String sql = "select * from alarm_info where imei=?" ;
	ResultSetHandler<AlarmInfoBean> rsh = new BeanHandler<AlarmInfoBean>(AlarmInfoBean.class);
	AlarmInfoBean alarm = qr.query(sql,rsh,imei);
   
   return alarm;
}
	

public int insert(AlarmInfoBean alarm) throws SQLException {

		int n =0;
		QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		String sql = "INSERT into alarm_info(imei,type,status)  values(?,?,?) " ;
		n = qr.update(sql,alarm.getImei(),alarm.getType(),alarm.getStatus());
		
		return n;
	}
	
}





