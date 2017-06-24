package com.thn.netty.chat.dao;


import java.sql.SQLException;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;

import com.thn.netty.chat.dao.ParamCfgBean;
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

public class ParamCfgDAO
{

	public List<ParamCfgBean>  select(){
	QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
	String sql = "select * from paramcfg where 1;" ;
	List<ParamCfgBean> entities = null;
	
	System.out.println(" 8888888888888888888888888   ");
	
	//ResultSetHandler<CmdBean> rsh = new BeanHandler<UserBean>(CmdBean.class);

	BeanListHandler<ParamCfgBean> rsh = new BeanListHandler<ParamCfgBean>(ParamCfgBean.class); 
   try { 
		entities = qr.query(sql,rsh);

		System.out.println(entities.size()); 
		for (ParamCfgBean entity :entities) { 

			 //System.out.println("token = " + entity.getToken()); 
			 //System.out.println("cmd = " +entity.getCmd()); 
			 //System.out.println("value = " +entity.getValue()); 
		} 
		
   }
   catch (SQLException e){ 

			 e.printStackTrace(); 

   } 
   
   return entities;

	
}


public int insert(ParamCfgBean paramcfg) throws SQLException {

		int n =0;
		QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		String sql = "INSERT into paramcfg(imei,token,cmd,value,sendtime,flag)  values(?,?,?,?,?,?) " ;
		n = qr.update(sql,paramcfg.getImei(),paramcfg.getToken(),paramcfg.getCmd(),paramcfg.getValue(),paramcfg.getTm(),paramcfg.getFlag());
		return n;
	}


	
}





