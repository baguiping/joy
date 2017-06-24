
package com.thn.netty.chat.db;

public class MDBManager { 
}

/*    
import java.beans.PropertyVetoException;    
import java.sql.Connection;    
import java.sql.SQLException;    
import com.boonya.mongo.utils.ConstantUtils;    
import com.mchange.v2.c3p0.ComboPooledDataSource;    
  
public class MDBManager {    
        
    private static final MDBManager instance=new MDBManager();    
    private static ComboPooledDataSource cpds=new ComboPooledDataSource(true);     
        
    static{    
        cpds.setDataSourceName("mydatasource");    
        cpds.setJdbcUrl(ConstantUtils.getValue("c3p0.jdbcUrl").toString());    
        try {    
            cpds.setDriverClass(ConstantUtils.getValue("c3p0.driverClass").toString());    
        } catch (PropertyVetoException e) {    
            e.printStackTrace();    
        }    
        cpds.setUser(ConstantUtils.getValue("c3p0.user").toString());    
        cpds.setPassword(ConstantUtils.getValue("c3p0.password").toString());    
        cpds.setMaxPoolSize(Integer.valueOf(ConstantUtils.getValue("c3p0.maxPoolSize").toString()));    
        cpds.setMinPoolSize(Integer.valueOf(ConstantUtils.getValue("c3p0.minPoolSize").toString()));    
        cpds.setAcquireIncrement(Integer.valueOf(ConstantUtils.getValue("c3p0.acquireIncrement").toString()));    
        cpds.setInitialPoolSize(Integer.valueOf(ConstantUtils.getValue("c3p0.initialPoolSize").toString()));    
        cpds.setMaxIdleTime(Integer.valueOf(ConstantUtils.getValue("c3p0.maxIdleTime").toString()));    
    }    
        
    private MDBManager(){}    
        
    public static MDBManager getInstance(){    
        return instance;    
    }    
        
    public static Connection  getConnection(){    
        try {    
            return cpds.getConnection();    
        } catch (SQLException e) {    
            e.printStackTrace();    
        }    
        return null;    
    }    
    
}    
*/

