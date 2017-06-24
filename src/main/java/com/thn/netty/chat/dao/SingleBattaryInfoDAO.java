package com.thn.netty.chat.dao;


import java.sql.SQLException;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;

import com.thn.netty.chat.dao.SingleBattaryInfoBean;
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

public class SingleBattaryInfoDAO
{
	public SingleBattaryInfoBean	select(String imei){
		 QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		 String sql = "select * from single_battary_info where imei=?;" ;
		 //List<ParamCfgBean> entities = null;
		 
		SingleBattaryInfoBean singleBattaryInfo =null;
		 
		 ResultSetHandler<SingleBattaryInfoBean> rsh = new BeanHandler<SingleBattaryInfoBean>(SingleBattaryInfoBean.class);
		 
		try { 
				 singleBattaryInfo = qr.query(sql,rsh,imei);
					 
		}
		catch (SQLException e){ 
			
			e.printStackTrace(); 
		} 
		
		return singleBattaryInfo;

	 }

/*	public List<SingleBattaryInfoBean>  select(String imei){
	QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
	String sql = "select * from single_battary_info where imei=?;" ;
	List<SingleBattaryInfoBean> entities = null;
	
	System.out.println(" 8888888888888888888888888   ");
	
	//ResultSetHandler<CmdBean> rsh = new BeanHandler<UserBean>(CmdBean.class);

	BeanListHandler<SingleBattaryInfoBean> rsh = new BeanListHandler<SingleBattaryInfoBean>(SingleBattaryInfoBean.class); 
   try { 
		entities = qr.query(sql,rsh);

		System.out.println(entities.size()); 
		for (SingleBattaryInfoBean entity :entities) { 

			 System.out.println("singlebattaryid = " + entity.getSinglevoltage()); 
			 System.out.println("imei = " +entity.getImei());
			 System.out.println("singlevoltage = " +entity.getSinglevoltage()); 
			 System.out.println("count = " + entity.getCount()); 
			 System.out.println("singletemperature = " + entity.getSingletemperature()); 
		} 
		
   }
   catch (SQLException e){ 

			 e.printStackTrace(); 

   } 
   
   return entities;

	
}
*/

public int insert(SingleBattaryInfoBean singlebattary) throws SQLException {

		int n =0;
		QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		
		System.out.println("999999999999999:" + singlebattary.getImei());
		SingleBattaryInfoBean	 bpi = select(singlebattary.getImei());
		if (null == bpi)
		{
			System.out.println("add SingleBattaryInfo");
			String sql = "INSERT into single_battary_info(imei,singlevoltage,count,singletemperature)  values(?,?,?,?) " ;
			n = qr.update(sql,singlebattary.getImei(),singlebattary.getSinglevoltage(),singlebattary.getCount(),singlebattary.getSingletemperature());
		}
		else
		{
			
			System.out.println("mod SingleBattaryInfo");
			String sql = "update single_battary_info set singlevoltage=? ,count=? ,singletemperature=? where imei=?  ; " ;
			n = qr.update(sql,singlebattary.getSinglevoltage(),singlebattary.getCount(),singlebattary.getSingletemperature(),singlebattary.getImei());
		}
		return n;
	}
	
}





