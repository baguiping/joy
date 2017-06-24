package com.thn.netty.chat.dao;

import java.sql.SQLException;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;

import com.thn.netty.chat.dao.UserBean;
import com.thn.netty.chat.db.C3P0Utils;

public class UserDML
{
	public UserBean select(String name) throws SQLException {
		QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		String sql = "select * from user where name=? " ;
		ResultSetHandler<UserBean> rsh = new BeanHandler<UserBean>(UserBean.class);
		
		UserBean us = qr.query(sql,rsh,name);
		return us;
	}
	
}

