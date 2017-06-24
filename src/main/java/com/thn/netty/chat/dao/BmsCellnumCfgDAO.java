package com.thn.netty.chat.dao;


import java.sql.SQLException;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;

import com.thn.netty.chat.dao.BmsCellnumCfgBean;
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


public class BmsCellnumCfgDAO
{
	 public BmsCellnumCfgBean	select(String imei){
		 QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		 String sql = "select * from bms_cellnum_cfg where imei=?;" ;
		 //List<ParamCfgBean> entities = null;
		 		BmsCellnumCfgBean cellnumCfgInfo =null;
		 
		 ResultSetHandler<BmsCellnumCfgBean> rsh = new BeanHandler<BmsCellnumCfgBean>(BmsCellnumCfgBean.class);
		 
		try { 
				 cellnumCfgInfo = qr.query(sql,rsh,imei);
					 
		}
		catch (SQLException e){ 
			
			e.printStackTrace(); 
		} 
		
		return cellnumCfgInfo;

	 }

	 public int insert(BmsCellnumCfgBean cellnumCfgInfo) throws SQLException {
		int n =0;
		QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		
		System.out.println("999999999999999:" + cellnumCfgInfo.getImei());
		BmsCellnumCfgBean	 bpi = select(cellnumCfgInfo.getImei());
		if (null == bpi)
		{
			System.out.println("add BmsCellnumCfg");
			String sql = "INSERT into bms_cellnum_cfg(imei,cellnum1,cellnum2,cellnum3,cellnum4,cellnum5,cellnum6,cellnum7,cellnum8,cellnum9,cellnum10,cellnum11,cellnum12,cellnum13,cellnum14,cellnum15,cellnum16,cellnum17,cellnum18,cellnum19,cellnum20,cellnum21,cellnum22,cellnum23,cellnum24,cellnum25)  values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) " ;
			n = qr.update(sql,cellnumCfgInfo.getImei(),cellnumCfgInfo.getCellnum1(),cellnumCfgInfo.getCellnum2(),cellnumCfgInfo.getCellnum3(),cellnumCfgInfo.getCellnum4(),cellnumCfgInfo.getCellnum5(),cellnumCfgInfo.getCellnum6(),cellnumCfgInfo.getCellnum7(),cellnumCfgInfo.getCellnum8(),cellnumCfgInfo.getCellnum9(),cellnumCfgInfo.getCellnum10(),
			cellnumCfgInfo.getCellnum11(),cellnumCfgInfo.getCellnum12(),cellnumCfgInfo.getCellnum13(),cellnumCfgInfo.getCellnum14(),cellnumCfgInfo.getCellnum15(),cellnumCfgInfo.getCellnum16(),cellnumCfgInfo.getCellnum17(),cellnumCfgInfo.getCellnum18(),cellnumCfgInfo.getCellnum19(),cellnumCfgInfo.getCellnum20(),
			cellnumCfgInfo.getCellnum21(),cellnumCfgInfo.getCellnum22(),cellnumCfgInfo.getCellnum23(),cellnumCfgInfo.getCellnum24(),cellnumCfgInfo.getCellnum25());
		}
		else
		{
			
			System.out.println("mod BmsCellnumCfg");
			String sql = "update bms_cellnum_cfg set cellnum1=? ,cellnum2=? ,cellnum3=? ,cellnum4=? ,cellnum5=? ,cellnum6=? ,cellnum7=? ,cellnum8=? ,cellnum9=? ,cellnum10=?, cellnum11=? ,cellnum12=? ,cellnum13=? ,cellnum14=? ,cellnum15=? ,cellnum16=? ,cellnum17=? ,cellnum18=? ,cellnum19=? ,cellnum20=? ,cellnum21=? ,cellnum22=? ,cellnum23=? ,cellnum24=? ,cellnum25=? where imei=?  ; " ;
			n = qr.update(sql,cellnumCfgInfo.getCellnum1(),cellnumCfgInfo.getCellnum2(),cellnumCfgInfo.getCellnum3(),cellnumCfgInfo.getCellnum4(),cellnumCfgInfo.getCellnum5(),cellnumCfgInfo.getCellnum6(),cellnumCfgInfo.getCellnum7(),cellnumCfgInfo.getCellnum8(),cellnumCfgInfo.getCellnum9(),cellnumCfgInfo.getCellnum10(),
			cellnumCfgInfo.getCellnum11(),cellnumCfgInfo.getCellnum12(),cellnumCfgInfo.getCellnum13(),cellnumCfgInfo.getCellnum14(),cellnumCfgInfo.getCellnum15(),cellnumCfgInfo.getCellnum16(),cellnumCfgInfo.getCellnum17(),cellnumCfgInfo.getCellnum18(),cellnumCfgInfo.getCellnum19(),cellnumCfgInfo.getCellnum20(),
			cellnumCfgInfo.getCellnum21(),cellnumCfgInfo.getCellnum22(),cellnumCfgInfo.getCellnum23(),cellnumCfgInfo.getCellnum24(),cellnumCfgInfo.getCellnum25(),cellnumCfgInfo.getImei());
		}
		
		return n;
	}


}
