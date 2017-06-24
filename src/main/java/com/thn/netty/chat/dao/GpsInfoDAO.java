package com.thn.netty.chat.dao;


import java.sql.SQLException;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;

import com.thn.netty.chat.dao.GpsInfoBean;
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

public class GpsInfoDAO
{

public int insert(GpsInfoBean gpsinfo) throws SQLException {

		int n =0;
		QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		
		System.out.println("999999999999999:" + gpsinfo.getImei());

		System.out.println("add GpsInfo");
		String sql = "INSERT into gps_info(imei,latitude,latitudeDivision,longitude,longitudeDivision)  values(?,?,?,?,?) " ;
		n = qr.update(sql,gpsinfo.getImei(),gpsinfo.getLatitude(),gpsinfo.getLatitudeDivision(),gpsinfo.getLongitude(),gpsinfo.getLongitudeDivision());

		return n;
	}
	
}





