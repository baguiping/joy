package com.thn.netty.chat.dao;

import java.sql.SQLException;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;

import com.thn.netty.chat.dao.CmdBean;
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


public class CmdDQL
{






	public void select(){
		QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		String sql = "select * from cmd ;" ;
		//ResultSetHandler<CmdBean> rsh = new BeanHandler<UserBean>(CmdBean.class);

		BeanListHandler<CmdBean> rsh = new BeanListHandler<CmdBean>(CmdBean.class); 
	  

		
	}
	

}

