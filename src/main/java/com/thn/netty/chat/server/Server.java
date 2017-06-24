package com.thn.netty.chat.server;

import io.netty.bootstrap.ServerBootstrap;
import io.netty.buffer.PooledByteBufAllocator;
import io.netty.channel.Channel;
import io.netty.channel.ChannelFuture;
import io.netty.channel.ChannelFutureListener;
import io.netty.channel.ChannelInitializer;
import io.netty.channel.ChannelOption;
import io.netty.channel.nio.NioEventLoopGroup;
import io.netty.channel.socket.nio.NioServerSocketChannel;
import io.netty.handler.codec.LengthFieldBasedFrameDecoder;

import io.netty.handler.timeout.IdleStateHandler;

import java.net.InetSocketAddress;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;
import java.util.concurrent.TimeUnit;

import io.netty.handler.codec.string.StringDecoder;
import io.netty.handler.codec.string.StringEncoder;

import io.netty.util.CharsetUtil;
import org.apache.log4j.Logger;

import com.thn.netty.chat.codec.CommCodec;
import com.thn.netty.chat.server.ServerHandle;

import io.netty.channel.ChannelHandlerContext;  
import io.netty.channel.SimpleChannelInboundHandler;  
import io.netty.channel.ChannelHandlerContext;  
import io.netty.channel.ChannelInboundHandlerAdapter;

import io.netty.channel.ChannelHandlerAdapter;  
import java.sql.*;
import com.thn.netty.chat.dao.UserBean;
import com.thn.netty.chat.db.C3P0Utils;
import com.thn.netty.chat.dao.UserDQL;
import java.sql.SQLException;

import com.thn.netty.chat.dao.ParamCfgDAO;


import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;

import com.thn.netty.chat.primitive.DeviceManager;

import java.lang.Thread;

import java.io.IOException;  
import java.util.HashMap;  
import java.util.Map;  
import java.util.Arrays; 
import java.util.List; 

import com.fasterxml.jackson.core.JsonGenerationException;
import com.fasterxml.jackson.databind.JsonMappingException;
import com.fasterxml.jackson.databind.ObjectMapper;

import com.thn.netty.chat.dao.ParamCfgBean;
import com.thn.netty.chat.dao.Paracfg;

import com.fasterxml.jackson.databind.DeserializationFeature;


                               
import 	com.thn.netty.chat.dao.BmsHybridParamCfgBean;
import 	com.thn.netty.chat.dao.BatteryAlarmParamCfgBean;
import 	com.thn.netty.chat.dao.BmsCellnumCfgBean;
import 	com.thn.netty.chat.dao.ChargeDischargeCfgBean;
import 	com.thn.netty.chat.dao.SetCfg;



public class Server {
    private static final Logger LOGGER = Logger.getLogger(Server.class.getName());
        
    private static final IdleConnectionHandler IDLENESS_HANDLER = new IdleConnectionHandler();

   // private final UserManager mUserMgr = new UserManager();
	private final DeviceManager  mDeviceManager = new DeviceManager();
    private ServerBootstrap mBootstrap;
    private final ExecutorService mScheduler = Executors.newCachedThreadPool();
    private NioEventLoopGroup mEventLoopGroup;
    private Runnable mShutdownAction;
	
    private Server() {
        mBootstrap = new ServerBootstrap();
        mBootstrap.childOption(ChannelOption.ALLOCATOR, new PooledByteBufAllocator(false));
        ChannelInitializer<Channel> initializer = new ChannelInitializer<Channel>() {
            @Override
            protected void initChannel(Channel aCh) throws Exception {

//				aCh.pipeline().addLast(new StringDecoder(CharsetUtil.UTF_8));
//                aCh.pipeline.addLast("decoder", new StringDecoder(CharsetUtil.UTF_8));
//				  aCh.pipeline.addLast(new TcpServerHandler());

                aCh.pipeline().addLast(new ChannelListener());  
//				  aCh.pipeline().addLast(new StringDecoder());
                  aCh.pipeline().addLast(new LengthFieldBasedFrameDecoder(Integer.MAX_VALUE, 4, 2, -6, 0)); // inbound
				  aCh.pipeline().addLast(new CommCodec());
				  
			  //  aCh.pipeline().addLast(new CommandCodec());                                   // inbound / outbound
//                aCh.pipeline().addLast(new ServerLogicHandler(mUserMgr, mScheduler, mShutdownAction));  // inbound
//                aCh.pipeline().addLast(new IdleStateHandler(0, 0, 1, TimeUnit.HOURS));        // inbound / outbound
//                aCh.pipeline().addLast(IDLENESS_HANDLER);
			     // aCh.pipeline().addLast(new ServerHandle());
			      aCh.pipeline().addLast(new CommHandle(mDeviceManager,mScheduler, mShutdownAction));

            }
        };
        mEventLoopGroup = new NioEventLoopGroup();
        setShutdownAction();
        mBootstrap.group(mEventLoopGroup).channel(NioServerSocketChannel.class)
                .childHandler(initializer);
    }
    
    private void start()  {
		 LOGGER.info("start !sdsd\n");
		 System.out.println("start sdsd \n");


		
		 mScheduler.execute(new Runnable() {
            @Override
            public void run() {
            
            	ParamCfgDAO cmdDQL = new ParamCfgDAO();


				

				
				while(true)
				{
				    
					//System.out.println("123456");
					
					List<ParamCfgBean> entities = cmdDQL.select();

					for (ParamCfgBean entity :entities) { 
					
						String json = entity.getValue();
						//System.out.println("cmd = " + entity.getCmd()); 
						
						ObjectMapper objectMapper = new ObjectMapper();
						//objectMapper.configure(DeserializationFeature.FAIL_ON_UNKNOWN_PROPERTIES, false);
						try {
							Paracfg paracfg= objectMapper.readValue(json, Paracfg.class);

							
							System.out.println("json=" + json);
							
                            BmsHybridParamCfgBean hybrid_param_cfg = paracfg.getHybrid_param_cfg();
							BatteryAlarmParamCfgBean  battery_alarm_param_cfg =  paracfg.getBattery_alarm_param_cfg();
							BmsCellnumCfgBean bms_cellnum_cfg = paracfg.getBms_cellnum_cfg();
							ChargeDischargeCfgBean charge_discharge_cfg = paracfg.getCharge_discharge_cfg(); 

							String jsonString = objectMapper.writeValueAsString(hybrid_param_cfg);
							System.out.println("jsonString=" + jsonString);

							
							jsonString = objectMapper.writeValueAsString(battery_alarm_param_cfg);
							System.out.println("jsonString=" + jsonString);

							
							jsonString = objectMapper.writeValueAsString(bms_cellnum_cfg);
							System.out.println("jsonString=" + jsonString);
							
							jsonString = objectMapper.writeValueAsString(charge_discharge_cfg);
							System.out.println("jsonString=" + jsonString);


							
							SetCfg.setBMSCfg(entity.getImei(),paracfg,mDeviceManager);
						}
						catch (Exception e)
						{
							 e.printStackTrace(); 
						}
					
					} 


					
					
					
					 try {
					 	
				            Thread.sleep(1000);
							
				        } catch (InterruptedException e) {
				        
				            e.printStackTrace(); 
				     }
	            }
            }
        });
        


		
        ChannelFuture future = mBootstrap.bind(new InetSocketAddress(8090));
        future.addListener(new ChannelFutureListener() {
            @Override
            public void operationComplete(ChannelFuture aChannelFuture) throws Exception {
                if (aChannelFuture.isSuccess()) {
                    System.out.println("Server bound");
                } else {
                    System.err.println("Bound attempt failed");
                    aChannelFuture.cause().printStackTrace();
                }
            }
        });
        try {
            future.channel().closeFuture().sync();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }
    
    private void setShutdownAction() {
        mShutdownAction = new Runnable() {
            @Override
            public void run() {
                try {
                    mEventLoopGroup.shutdownGracefully().sync();
                    mScheduler.shutdownNow();
                    mScheduler.awaitTermination(5, TimeUnit.SECONDS);
                } catch (InterruptedException e) {
                    LOGGER.info("interrupted while waiting for tasks termination", e);
                }
                
            }
        };
        
    }

	
    /**
     * Main method to start the server. Listens on port 8080.
     * @param aArgs arguments. Not used.
     */
    public static void main(String[] aArgs) throws SQLException {


        Server server = new Server();
        server.start();
    }
}
