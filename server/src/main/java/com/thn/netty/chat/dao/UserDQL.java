package com.thn.netty.chat.dao;

import java.sql.SQLException;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;

import com.thn.netty.chat.dao.UserBean;
import com.thn.netty.chat.db.C3P0Utils;

public class UserDQL
{
	public int insert(UserBean user) throws SQLException {
		int n =0;
		QueryRunner qr = new QueryRunner(C3P0Utils.getDataSource());
		String sql = "INSERT into user(user,passwd)  values(?,?) " ;
		n = qr.update(sql,user.getUser(),user.getPasswd());
		return n;
	}
}


