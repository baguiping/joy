package com.thn.netty.chat.db;

import java.beans.PropertyVetoException;
import java.sql.Connection;
import java.sql.SQLException;
import javax.sql.DataSource;

import org.apache.log4j.Logger;

import com.mchange.v2.c3p0.ComboPooledDataSource;

public class C3P0Utils {
	private static C3P0Utils dbcputils = null;
	private ComboPooledDataSource cpds = null;

	private static final Logger LOGGER = Logger.getLogger(C3P0Utils.class);

	private C3P0Utils() {
		if (cpds == null) {
			cpds = new ComboPooledDataSource();
		}
		cpds.setUser("root");
		cpds.setPassword("");
		cpds.setJdbcUrl("jdbc:mysql://localhost:3306/gprs");
		try {
			cpds.setDriverClass("com.mysql.jdbc.Driver");
		} catch (PropertyVetoException e) {
			e.printStackTrace();
		}
		cpds.setInitialPoolSize(20);
		cpds.setMaxIdleTime(20);
		cpds.setMaxPoolSize(30);
		cpds.setMinPoolSize(10);
	}

	public synchronized static C3P0Utils getInstance() {
		if (dbcputils == null)
			dbcputils = new C3P0Utils();
		return dbcputils;
	}

	public static DataSource getDataSource() {
        return getInstance().cpds;
    }

	public static Connection getConnection() {
		Connection con = null;
		try {
			con = getInstance().cpds.getConnection();
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return con;
	}

	public static void main(String[] args) throws SQLException {
		Connection con = null;
		long begin = System.currentTimeMillis();
		for (int i = 0; i < 100; i++) {
			con = C3P0Utils.getInstance().getConnection();
			LOGGER.info(con);
			con.close();
		}
		long end = System.currentTimeMillis();
		System.out.println("" + (end - begin) + "ms");
	}
}
