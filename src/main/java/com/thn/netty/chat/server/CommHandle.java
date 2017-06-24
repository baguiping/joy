package com.thn.netty.chat.server;


import io.netty.buffer.ByteBuf;
import io.netty.buffer.Unpooled;
import io.netty.channel.ChannelFutureListener;
import io.netty.channel.ChannelHandlerContext;
import io.netty.channel.ChannelInboundHandlerAdapter;
//import io.netty.util.CharsetUtil;

import com.thn.netty.chat.codec.CommCodec;
import com.thn.netty.chat.codec.CommMessage;

import static io.netty.channel.ChannelHandler.Sharable;


import java.util.concurrent.ExecutorService;

import io.netty.channel.ChannelFuture;
import io.netty.channel.ChannelFutureListener;
import io.netty.channel.ChannelHandlerContext;
import io.netty.channel.SimpleChannelInboundHandler;

import com.thn.netty.chat.dao.UserBean;
import com.thn.netty.chat.db.C3P0Utils;
import com.thn.netty.chat.dao.UserDQL;
import java.sql.SQLException;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;
import java.util.Date;

import org.joda.time.DateTime;
import org.joda.time.Days;
import org.joda.time.Hours;
import org.joda.time.Minutes;
import org.joda.time.Seconds;
import org.joda.time.format.DateTimeFormat;
import org.joda.time.format.DateTimeFormatter;

import com.thn.netty.chat.primitive.DeviceManager;
import com.thn.netty.chat.primitive.DeviceInfo;
import java.util.Random;

import com.thn.netty.chat.util.BCDDecode;

import com.thn.netty.chat.dao.SetCfg;
import com.thn.netty.chat.dao.BattaryPackInfoBean;
import com.thn.netty.chat.dao.BattaryPackInfoDAO;
import com.thn.netty.chat.dao.BmsbatteryalarminfoBean;
import com.thn.netty.chat.dao.BmsbatteryalarminfoDAO;
import com.thn.netty.chat.dao.SingleBattaryInfoBean;
import com.thn.netty.chat.dao.SingleBattaryInfoDAO;
import com.thn.netty.chat.dao.GpsInfoBean;
import com.thn.netty.chat.dao.GpsInfoDAO;
import com.thn.netty.chat.dao.BmsHybridParamCfgBean;
import com.thn.netty.chat.dao.BmsHybridParamCfgDAO;
import com.thn.netty.chat.dao.BatteryAlarmParamCfgBean;
import com.thn.netty.chat.dao.BatteryAlarmParamCfgDAO;
import com.thn.netty.chat.dao.BmsCellnumCfgBean;
import com.thn.netty.chat.dao.BmsCellnumCfgDAO;
import com.thn.netty.chat.dao.ChargeDischargeCfgBean;
import com.thn.netty.chat.dao.ChargeDischargeCfgDAO;
import com.thn.netty.chat.dao.DevParamCfgBean;
import com.thn.netty.chat.dao.DevParamCfgDAO;
import com.thn.netty.chat.dao.DeviceInfoBean;
import com.thn.netty.chat.dao.DeviceInfoDAO;

import java.util.ArrayList;  
import java.util.Date;  
import java.util.HashMap;  
import java.util.List;  
import java.util.Map;  
  
import com.fasterxml.jackson.annotation.JsonInclude;	
import com.fasterxml.jackson.databind.ObjectMapper;  
import com.fasterxml.jackson.databind.PropertyNamingStrategy;  
import com.fasterxml.jackson.databind.SerializationFeature;  
import com.fasterxml.jackson.databind.cfg.MapperConfig;  
import com.fasterxml.jackson.databind.introspect.AnnotatedField;	
import com.fasterxml.jackson.databind.introspect.AnnotatedMethod; 
import java.io.IOException;  
import java.text.ParseException;	
import java.text.SimpleDateFormat;  
import java.util.*;  


@Sharable
public class CommHandle  extends SimpleChannelInboundHandler<CommMessage> {
	private final DeviceManager  mDeviceManager;
    private final ExecutorService mScheduler;
    private final Runnable mShutdownAction;

	public CommHandle(DeviceManager  aDeviceManager,ExecutorService aScheduler, Runnable aShutdownAction)
	{
		mDeviceManager = aDeviceManager;
		mScheduler = aScheduler;
		mShutdownAction = aShutdownAction;
	}

    @Override
    public void channelInactive(ChannelHandlerContext aCtx) throws Exception {
        super.channelInactive(aCtx);
        ChannelInfo channelInfo = aCtx.channel().attr(ChannelListener.CHANNEL_INFO).get();
        //StringBuilder builder = new StringBuilder();
    }

	public  CommMessage buildResponMsg
		(short  plen,byte ver,short pid, byte rs, String sn, byte fid, byte sfid, ByteBuf cont)
	{
		
		CommMessage  responsMsg = new CommMessage();
		
		responsMsg.getHeader().setSlb(0xaaaaaaaa);
		responsMsg.getHeader().setPlen(plen);
		responsMsg.getHeader().setVer(ver);
		responsMsg.getHeader().setPid(pid);
		responsMsg.getHeader().setRs(rs);
		
		responsMsg.setSn(sn);
		responsMsg.setFid(fid);
		responsMsg.setSubFid(sfid);
		responsMsg.setCont(cont);

		return  responsMsg;
	}

    public void registerMsgProc(final ChannelHandlerContext aCtx,final CommMessage aMsg, final ChannelInfo aChannelInfo)
    {
		if (true == mDeviceManager.isDeviceLoggedIn(aChannelInfo)) {
			String sn = aMsg.getSn();
							
			CommMessage  responsMsg =buildResponMsg
				(	(short)20,
					aMsg.getHeader().getVer(),
					aMsg.getHeader().getPid(),
					(byte)1,
					sn,
					aMsg.getFid(),
					aMsg.getSubFid(),
					null
				);
							
				aCtx.writeAndFlush(responsMsg);
            System.out.println("device logged in");
            return;
        }
		
        mScheduler.execute(new Runnable() {
            @Override
            public void run() {

			
				String sn = aMsg.getSn();
				DateTime dt = new DateTime();
				int year = dt.getYear();
				int month = dt.getMonthOfYear();
				int day = dt.getDayOfMonth();
				
				int hour = dt.getHourOfDay();
				int min = dt.getMinuteOfHour();
				int sec = dt.getSecondOfMinute();
				
                
                DeviceInfo deviceInfo = new DeviceInfo(sn);
				deviceInfo.setRegTime(dt);
				deviceInfo.setHeartTime(dt);
				
                mDeviceManager.deviceLoggedIn(deviceInfo, aChannelInfo);
				ByteBuf reqCont = aMsg.getCont();
					
				ByteBuf buffer = Unpooled.buffer();  
				Random rand =new Random();
				
				for (int i = 0; i < 9; i++)
				{
					buffer.writeByte((byte)rand.nextInt(250));
				}

				buffer.writeShort((short)year);
				buffer.writeByte(month);
				buffer.writeByte(day);
				buffer.writeByte(hour);
				buffer.writeByte(min);
				buffer.writeByte(sec);
				buffer.writeBytes(reqCont,16);

				CommMessage  responsMsg =buildResponMsg
					(
						(short)(20 + buffer.readableBytes()),
						aMsg.getHeader().getVer(),
						aMsg.getHeader().getPid(),
						(byte)0,
						sn,
						aMsg.getFid(),
						aMsg.getSubFid(),
						buffer
					);
				
                aCtx.writeAndFlush(responsMsg);

				//SetCfg.getDeviceBaseInfoFromDevice(sn,mDeviceManager);
				//SetCfg.getBMSCfgFromDevice(sn,mDeviceManager);
				//SetCfg.getDeviceInfoFromDevice(sn,mDeviceManager);
				//SetCfg.getDeviceBaseInfoFromDevice(sn,mDeviceManager);
				
            }
        });

    }


    public void heartMsgProc(final ChannelHandlerContext aCtx,final CommMessage aMsg, final ChannelInfo aChannelInfo)
    {
		 System.out.println("heartMsgProc");
		 
		if (false == mDeviceManager.isDeviceLoggedIn(aChannelInfo)) {
			
			String sn = aMsg.getSn();
							
			CommMessage  responsMsg =buildResponMsg
				(	(short)20,
					aMsg.getHeader().getVer(),
					aMsg.getHeader().getPid(),
					(byte)1,
					sn,
					aMsg.getFid(),
					aMsg.getSubFid(),
					null
				);
							
				aCtx.writeAndFlush(responsMsg);
            System.out.println("device not logged in");
            return;
        }
		
        mScheduler.execute(new Runnable() {
            @Override
            public void run() {

				DateTime dt = new DateTime();
				String sn = aMsg.getSn();
				byte rs;
				boolean isHeartTimeout =  mDeviceManager.isDeviceHeartTimeout(sn);
				if (isHeartTimeout)
				{
					rs = 1;
					mDeviceManager.deviceLoggedOut(sn);
				}
				else
				{
					rs = 0;
					mDeviceManager.updateDeviceHeartTime(sn);
				}
					
				CommMessage  responsMsg = buildResponMsg
					(   (short)20,
						aMsg.getHeader().getVer(),
						aMsg.getHeader().getPid(),
						rs,
						sn,
						aMsg.getFid(),
						aMsg.getSubFid(),
						null
					);
				
                aCtx.writeAndFlush(responsMsg);
            }
        });
		
    }

	
    public void BMSInfoMsgProc(final ChannelHandlerContext aCtx,final CommMessage aMsg, final ChannelInfo aChannelInfo)
    {
		
		System.out.println("BMSInfoMsgProc");
		if (false ==  mDeviceManager.isDeviceLoggedIn(aChannelInfo)) {

			
				String sn = aMsg.getSn();
				
				CommMessage  responsMsg =buildResponMsg
					(   (short)20,
						aMsg.getHeader().getVer(),
						aMsg.getHeader().getPid(),
						(byte)1,
						sn,
						aMsg.getFid(),
						aMsg.getSubFid(),
						null
					);
				
                aCtx.writeAndFlush(responsMsg);
		
            System.out.println("device not logged in");
            return;
        }

        mScheduler.execute(new Runnable() {
			
            	@Override
				public void run() {

				String sn = aMsg.getSn();
				ByteBuf reqCont = aMsg.getCont();
                System.out.println("BMSInfoMsgProc:" + sn);
				reqCont.readBytes(9);// 7 + 2 

				short batCount = reqCont.readShort();
				short batV = reqCont.readShort();
				short batI = reqCont.readShort();
				byte  batSoc = reqCont.readByte();
				byte  batSoh = reqCont.readByte();
				short batCapacity = reqCont.readShort();
				short ratedVoltage = reqCont.readShort();
				short cycles = reqCont.readShort();
				short insulation = reqCont.readShort();
				short positiveResistance = reqCont.readShort();
				short negativeResistance = reqCont.readShort();
				
				short maxSingleVoltage = reqCont.readShort();
				byte  maxSingleVoltageId = reqCont.readByte();

				short minSingleVoltage = reqCont.readShort();
				byte  minSingleVoltageId = reqCont.readByte();
				
				short maxTemperature = reqCont.readShort();
				byte  maxTemperatureId = reqCont.readByte();

				short minTemperature = reqCont.readShort();
				byte  minTemperatureId = reqCont.readByte();

				BattaryPackInfoBean batPachInfo = new BattaryPackInfoBean();
			
				batPachInfo.setImei(sn);
				batPachInfo.setBattaryCount(batCount);
				batPachInfo.setTotalcurrent(batI);
				batPachInfo.setTotalvoltage(batV);
				batPachInfo.setSoc(batSoc);
				batPachInfo.setSoh(batSoh);
				batPachInfo.setNominalcapacity(batCapacity);
				batPachInfo.setRatedvoltage(ratedVoltage);
				batPachInfo.setFrequency(cycles);
				batPachInfo.setInsulationvoltage(insulation);
				batPachInfo.setPositiveresistance(positiveResistance);
				batPachInfo.setNegativeresistance(negativeResistance);
				batPachInfo.setMaxvoltage(maxSingleVoltage);
				batPachInfo.setMaxvoltageid(maxSingleVoltageId);
				batPachInfo.setSmallvoltage(minSingleVoltage);
				batPachInfo.setSmallvoltageid(minSingleVoltageId);
				batPachInfo.setMaxtemperature(maxTemperature);
				batPachInfo.setMaxtemperatureid(maxTemperatureId);
				batPachInfo.setSmallvoltage(minTemperature);
				batPachInfo.setSmallvoltageid(minTemperatureId);
				
				BattaryPackInfoDAO battaryPackInfoDAO = new BattaryPackInfoDAO();
				try{
					battaryPackInfoDAO.insert(batPachInfo);
				}
				catch (SQLException e){ 
			
					e.printStackTrace(); 
				} 

				short batInfoLen = reqCont.readShort();

				short[] bV = new short[batCount]; 

				for( int i = 0; i < batCount; i++)
				{
					bV[i] = reqCont.readShort();
					System.out.println("bV[" + i +"]=" + bV[i]);
				}

				byte btlen = reqCont.readByte();
				short[]  bT = new short[btlen];
				
				for( int i = 0; i < btlen; i++)
				{
					bT[i] = (short)reqCont.readByte();
					
					System.out.println("bT[" + i +"]=" + bT[i]);
				}
				
				try {
				ObjectMapper mapper = new ObjectMapper();
				Map<String, Object> mapbV = new HashMap<String, Object>();
				mapbV.put("bV",bV);
				String jsonbv = mapper.writeValueAsString(mapbV);
				System.out.println(jsonbv);
				
				Map<String, Object> mapbT = new HashMap<String, Object>();
				mapbT.put("bT",bT);
				String jsonbt = mapper.writeValueAsString(mapbT);
				System.out.println(jsonbt);
				
				SingleBattaryInfoBean singleBatInfo = new SingleBattaryInfoBean();
			
				singleBatInfo.setImei(sn);
				singleBatInfo.setSinglevoltage(jsonbv);
				singleBatInfo.setCount(batCount);
				singleBatInfo.setSingletemperature(jsonbt);
				SingleBattaryInfoDAO singleBatInfoDAO = new SingleBattaryInfoDAO();
				try{
					singleBatInfoDAO.insert(singleBatInfo);
				}
				catch (SQLException e){ 
			
					e.printStackTrace(); 
				}
		
				}
				catch (IOException e){ 
			
					e.printStackTrace(); 
				} 

				short batWarnInfoLen = reqCont.readShort();

				int abclen = reqCont.readableBytes();
		        System.out.println("abclen=" +abclen);

				byte warn1 = reqCont.readByte();
				//ȡÿһbitλ
				byte  overvoltagealarm   = (byte) ((warn1 >> 7) & 0x1); 
				byte  overvoltageprotect   = (byte) ((warn1 >> 6) & 0x1);
				byte  lowvoltagealarm   = (byte) ((warn1 >> 5) & 0x1);
				byte  lowvoltageprotect   = (byte) ((warn1 >> 4) & 0x1);
				byte  hightemperalarm   = (byte) ((warn1 >> 3) & 0x1);
				byte  hightemperprotect   = (byte) ((warn1 >> 2) & 0x1);
				byte  lowtemperalarm   = (byte) ((warn1 >> 1) & 0x1);
				byte  lowtemperprotect   = (byte) ((warn1 >> 0) & 0x1);
				
				byte warn2 = reqCont.readByte();
				byte  pressurediffalarm   = (byte) ((warn2 >> 7) & 0x1); 
				byte  pressurediffprotect   = (byte) ((warn2 >> 6) & 0x1);
				byte  soclowalarm   = (byte) ((warn2 >> 5) & 0x1);
				byte  soclowprotect   = (byte) ((warn2 >> 4) & 0x1);
				byte  equalfaultalarm   = (byte) ((warn2 >> 3) & 0x1);
				byte  equalfaultprotect   = (byte) ((warn2 >> 2) & 0x1);
				byte  bsucommfaultalarm   = (byte) ((warn2 >> 1) & 0x1);
				byte  bsucommfaultprotect   = (byte) ((warn2 >> 0) & 0x1);
				
				byte warn3 = reqCont.readByte();
				byte  dischargecurrentalarm   = (byte) ((warn3 >> 7) & 0x1); 
				byte  dischargecurrentprotect   = (byte) ((warn3 >> 6) & 0x1);
				byte  chargecurrentalarm   = (byte) ((warn3 >> 5) & 0x1);
				byte  chargecurrentprotect   = (byte) ((warn3 >> 4) & 0x1);
				byte  highpressurealarm   = (byte) ((warn3 >> 3) & 0x1);
				byte  highpressureprotect   = (byte) ((warn3 >> 2) & 0x1);
				byte  lowpressurealarm   = (byte) ((warn3 >> 1) & 0x1);
				byte  lowpressureprotect   = (byte) ((warn3 >> 0) & 0x1);

				byte warn4 = 0;//reqCont.readByte();
				byte  contactor1   = (byte) ((warn4 >> 7) & 0x1); 
				byte  contactor2   = (byte) ((warn4 >> 6) & 0x1);
				byte  contactor3   = (byte) ((warn4 >> 5) & 0x1);
				byte  contactor4   = (byte) ((warn4 >> 4) & 0x1);
				byte  contactor5   = (byte) ((warn4 >> 3) & 0x1);
				byte  contactor6   = (byte) ((warn4 >> 2) & 0x1);
				
				byte inportstatus = 0;//reqCont.readByte();

				
				short alarmcode1 = reqCont.readShort();
				short alarmcode2 = reqCont.readShort();
				short alarmcode3 = reqCont.readShort();
				short alarmcode4 = reqCont.readShort();

				BmsbatteryalarminfoBean batAlarmInfo = new BmsbatteryalarminfoBean();
			
				batAlarmInfo.setImei(sn);
				batAlarmInfo.setOvervoltagealarm(overvoltagealarm);
				batAlarmInfo.setOvervoltageprotect(overvoltageprotect);
				batAlarmInfo.setLowvoltagealarm(lowvoltagealarm);
				batAlarmInfo.setLowvoltageprotect(lowvoltageprotect);
				batAlarmInfo.setHightemperalarm(hightemperalarm);
				batAlarmInfo.setHightemperprotect(hightemperprotect);
				batAlarmInfo.setLowtemperalarm(lowtemperalarm);
				batAlarmInfo.setLowtemperprotect(lowtemperprotect);
				batAlarmInfo.setPressurediffalarm(pressurediffalarm);
				batAlarmInfo.setPressurediffprotect(pressurediffprotect);
				batAlarmInfo.setSoclowalarm(soclowalarm);
				batAlarmInfo.setSoclowprotect(soclowprotect);
				batAlarmInfo.setEqualfaultalarm(equalfaultalarm);
				batAlarmInfo.setEqualfaultprotect(equalfaultprotect);
				batAlarmInfo.setBsucommfaultalarm(bsucommfaultalarm);
				batAlarmInfo.setBsucommfaultprotect(bsucommfaultprotect);
				batAlarmInfo.setDischargecurrentalarm(dischargecurrentalarm);
				batAlarmInfo.setDischargecurrentprotect(dischargecurrentprotect);

				batAlarmInfo.setChargecurrentalarm(chargecurrentalarm);
				batAlarmInfo.setChargecurrentprotect(chargecurrentprotect);
				batAlarmInfo.setHighpressurealarm(highpressurealarm);
				batAlarmInfo.setHighpressureprotect(highpressureprotect);
				batAlarmInfo.setLowpressurealarm(lowpressurealarm);
				batAlarmInfo.setLowpressureprotect(lowpressureprotect);
				batAlarmInfo.setContactor1(contactor1);
				batAlarmInfo.setContactor2(contactor2);
				batAlarmInfo.setContactor3(contactor3);
				batAlarmInfo.setContactor4(contactor4);
				batAlarmInfo.setContactor5(contactor5);
				batAlarmInfo.setContactor6(contactor6);
				batAlarmInfo.setInportstatus(inportstatus);
				batAlarmInfo.setAlarmcode1(alarmcode1);
				batAlarmInfo.setAlarmcode2(alarmcode2);
				batAlarmInfo.setAlarmcode3(alarmcode3);
				batAlarmInfo.setAlarmcode4(alarmcode4);
				
				BmsbatteryalarminfoDAO batAlarmInfoDAO = new BmsbatteryalarminfoDAO();
				try{
					batAlarmInfoDAO.insert(batAlarmInfo);
				}
				catch (SQLException e){ 
			
					e.printStackTrace(); 
				}
				
				CommMessage  responsMsg =buildResponMsg
					(   (short)20,
						aMsg.getHeader().getVer(),
						aMsg.getHeader().getPid(),
						(byte)0,
						sn,
						aMsg.getFid(),
						aMsg.getSubFid(),
						null
					);
				
                aCtx.writeAndFlush(responsMsg);
				
            }
        });
    }


	
	
    public void getBMSInfofromDevProc(final ChannelHandlerContext aCtx,final CommMessage aMsg, final ChannelInfo aChannelInfo)
    {
		
		System.out.println("getBMSInfofromDevProc");
		if (false ==  mDeviceManager.isDeviceLoggedIn(aChannelInfo)) {

			
				String sn = aMsg.getSn();
				
				CommMessage  responsMsg =buildResponMsg
					(   (short)20,
						aMsg.getHeader().getVer(),
						aMsg.getHeader().getPid(),
						(byte)1,
						sn,
						aMsg.getFid(),
						aMsg.getSubFid(),
						null
					);
				
                aCtx.writeAndFlush(responsMsg);
		
            System.out.println("device not logged in");
            return;
        }

        mScheduler.execute(new Runnable() {
			
            	@Override
				public void run() {

				String sn = aMsg.getSn();
				ByteBuf reqCont = aMsg.getCont();
                System.out.println("getBMSInfofromDevProc:" + sn);
				//int len = reqCont.readableBytes();
		
		        //System.out.println("55555555555555555555555555555len=" +len);
				
				reqCont.readBytes(2);
				byte  initialParamset = reqCont.readByte();
				short  comAlarmThreshold = reqCont.readShort();

	
				BmsHybridParamCfgBean hybridParamcfgInfo = new BmsHybridParamCfgBean();
			
				hybridParamcfgInfo.setImei(sn);
				hybridParamcfgInfo.setInitialParamset(initialParamset);
				hybridParamcfgInfo.setComAlarmThreshold(comAlarmThreshold);
				BmsHybridParamCfgDAO hybridParamcfgDAO = new BmsHybridParamCfgDAO();
				try{
					hybridParamcfgDAO.insert(hybridParamcfgInfo);
				}
				catch (SQLException e){ 
			
					e.printStackTrace(); 
				} 
				
				reqCont.readBytes(2); 
				
				short voltageHigh1 = reqCont.readShort();
				short voltageLow1 = reqCont.readShort();
				byte  temperHigh1 = reqCont.readByte();
				byte  temperLow1 = reqCont.readByte();
				short chargeCurrentLarge1 = reqCont.readShort();
				short dischargeCurrentLarge1 = reqCont.readShort();
				short resistanceLow1 = reqCont.readShort();
				byte  socLow1 = reqCont.readByte();
				short pressureHigh1 = reqCont.readShort();
				short pressureLow1 = reqCont.readShort();
				short preDiffLarge1 = reqCont.readShort();
				byte  tempDiffLarge1 = reqCont.readByte();
				
				short voltageHigh2 = reqCont.readShort();
				short voltageLow2 = reqCont.readShort();
				byte  temperHigh2 = reqCont.readByte();
				byte  temperLow2 = reqCont.readByte();
				short chargeCurrentLarge2 = reqCont.readShort();
				short dischargeCurrentLarge2 = reqCont.readShort();
				short resistanceLow2 = reqCont.readShort();
				byte  socLow2 = reqCont.readByte();
				short pressureHigh2 = reqCont.readShort();
				short pressureLow2 = reqCont.readShort();
				short preDiffLarge2 = reqCont.readShort();
				byte  tempDiffLarge2 = reqCont.readByte();
				
				short voltageHigh3 = reqCont.readShort();
				short voltageLow3 = reqCont.readShort();
				byte  temperHigh3 = reqCont.readByte();
				byte  temperLow3 = reqCont.readByte();
				short chargeCurrentLarge3 = reqCont.readShort();
				short dischargeCurrentLarge3 = reqCont.readShort();
				short resistanceLow3 = reqCont.readShort();
				byte  socLow3 = reqCont.readByte();
				short pressureHigh3 = reqCont.readShort();
				short pressureLow3 = reqCont.readShort();
				short preDiffLarge3 = reqCont.readShort();
				byte  tempDiffLarge3 = reqCont.readByte();

				BatteryAlarmParamCfgBean batAlarmCfgInfo = new BatteryAlarmParamCfgBean();
			
				batAlarmCfgInfo.setImei(sn);
				batAlarmCfgInfo.setVoltageHigh1(voltageHigh1);
				batAlarmCfgInfo.setVoltageLow1(voltageLow1);
				batAlarmCfgInfo.setTemperHigh1(temperHigh1);
				batAlarmCfgInfo.setTemperLow1(temperLow1);
				batAlarmCfgInfo.setChargeCurrentLarge1(chargeCurrentLarge1);
				batAlarmCfgInfo.setDischargeCurrentLarge1(dischargeCurrentLarge1);
				batAlarmCfgInfo.setResistanceLow1(resistanceLow1);
				batAlarmCfgInfo.setSocLow1(socLow1);
				batAlarmCfgInfo.setPressureHigh1(pressureHigh1);
				batAlarmCfgInfo.setPressureLow1(pressureLow1);
				batAlarmCfgInfo.setPreDiffLarge1(preDiffLarge1);
				batAlarmCfgInfo.setTempDiffLarge1(tempDiffLarge1);

				batAlarmCfgInfo.setVoltageHigh2(voltageHigh2);
				batAlarmCfgInfo.setVoltageLow2(voltageLow2);
				batAlarmCfgInfo.setTemperHigh2(temperHigh2);
				batAlarmCfgInfo.setTemperLow2(temperLow2);
				batAlarmCfgInfo.setChargeCurrentLarge2(chargeCurrentLarge2);
				batAlarmCfgInfo.setDischargeCurrentLarge2(dischargeCurrentLarge2);
				batAlarmCfgInfo.setResistanceLow2(resistanceLow2);
				batAlarmCfgInfo.setSocLow2(socLow2);
				batAlarmCfgInfo.setPressureHigh2(pressureHigh2);
				batAlarmCfgInfo.setPressureLow2(pressureLow2);
				batAlarmCfgInfo.setPreDiffLarge2(preDiffLarge2);
				batAlarmCfgInfo.setTempDiffLarge2(tempDiffLarge2);

				batAlarmCfgInfo.setVoltageHigh3(voltageHigh3);
				batAlarmCfgInfo.setVoltageLow3(voltageLow3);
				batAlarmCfgInfo.setTemperHigh3(temperHigh3);
				batAlarmCfgInfo.setTemperLow3(temperLow3);
				batAlarmCfgInfo.setChargeCurrentLarge3(chargeCurrentLarge3);
				batAlarmCfgInfo.setDischargeCurrentLarge3(dischargeCurrentLarge3);
				batAlarmCfgInfo.setResistanceLow3(resistanceLow3);
				batAlarmCfgInfo.setSocLow3(socLow3);
				batAlarmCfgInfo.setPressureHigh3(pressureHigh3);
				batAlarmCfgInfo.setPressureLow3(pressureLow3);
				batAlarmCfgInfo.setPreDiffLarge3(preDiffLarge3);
				batAlarmCfgInfo.setTempDiffLarge3(tempDiffLarge3);
				BatteryAlarmParamCfgDAO batAlarmCfgInfoDAO = new BatteryAlarmParamCfgDAO();
				try{
					batAlarmCfgInfoDAO.insert(batAlarmCfgInfo);
				}
				catch (SQLException e){ 
			
					e.printStackTrace(); 
				} 

				reqCont.readBytes(2); 
				
				byte  cellnum1 = reqCont.readByte();
				byte  cellnum2 = reqCont.readByte();
				byte  cellnum3 = reqCont.readByte();
				byte  cellnum4 = reqCont.readByte();
				byte  cellnum5 = reqCont.readByte();
				byte  cellnum6 = reqCont.readByte();
				byte  cellnum7 = reqCont.readByte();
				byte  cellnum8 = reqCont.readByte();
				byte  cellnum9 = reqCont.readByte();
				byte  cellnum10 = reqCont.readByte();
				byte  cellnum11 = reqCont.readByte();
				byte  cellnum12 = reqCont.readByte();
				byte  cellnum13 = reqCont.readByte();
				byte  cellnum14 = reqCont.readByte();
				byte  cellnum15 = reqCont.readByte();
				byte  cellnum16 = reqCont.readByte();
				byte  cellnum17 = reqCont.readByte();
				byte  cellnum18 = reqCont.readByte();
				byte  cellnum19 = reqCont.readByte();
				byte  cellnum20 = reqCont.readByte();
				byte  cellnum21 = reqCont.readByte();
				byte  cellnum22 = reqCont.readByte();
				byte  cellnum23 = reqCont.readByte();
				byte  cellnum24 = reqCont.readByte();
				byte  cellnum25 = reqCont.readByte();

				BmsCellnumCfgBean cellnumCfgInfo = new BmsCellnumCfgBean();
			
				cellnumCfgInfo.setImei(sn);
				cellnumCfgInfo.setCellnum1(cellnum1);
				cellnumCfgInfo.setCellnum2(cellnum2);
				cellnumCfgInfo.setCellnum3(cellnum3);
				cellnumCfgInfo.setCellnum4(cellnum4);
				cellnumCfgInfo.setCellnum5(cellnum5);
				cellnumCfgInfo.setCellnum6(cellnum6);
				cellnumCfgInfo.setCellnum7(cellnum7);
				cellnumCfgInfo.setCellnum8(cellnum8);
				cellnumCfgInfo.setCellnum9(cellnum9);
				cellnumCfgInfo.setCellnum10(cellnum10);
				cellnumCfgInfo.setCellnum11(cellnum11);
				cellnumCfgInfo.setCellnum12(cellnum12);
				cellnumCfgInfo.setCellnum13(cellnum13);
				cellnumCfgInfo.setCellnum14(cellnum14);
				cellnumCfgInfo.setCellnum15(cellnum15);
				cellnumCfgInfo.setCellnum16(cellnum16);
				cellnumCfgInfo.setCellnum17(cellnum17);
				cellnumCfgInfo.setCellnum18(cellnum18);
				cellnumCfgInfo.setCellnum19(cellnum19);
				cellnumCfgInfo.setCellnum20(cellnum20);
				cellnumCfgInfo.setCellnum21(cellnum21);
				cellnumCfgInfo.setCellnum22(cellnum22);
				cellnumCfgInfo.setCellnum23(cellnum23);
				cellnumCfgInfo.setCellnum24(cellnum24);
				cellnumCfgInfo.setCellnum25(cellnum25);
				
				BmsCellnumCfgDAO cellnumCfgDAO = new BmsCellnumCfgDAO();
				try{
					cellnumCfgDAO.insert(cellnumCfgInfo);
				}
				catch (SQLException e){ 
			
					e.printStackTrace(); 
				}
		
				reqCont.readBytes(2); 
				
				short maxDischargeCurrent = reqCont.readShort();
				short maxRechargeCurrent = reqCont.readShort();
				byte  chargeControl = reqCont.readByte();
				short chargeReqCurrent = reqCont.readShort();
				short chargeReqVoltage = reqCont.readShort();
				short currentCalibration = reqCont.readShort();
				short currentRatio = reqCont.readShort();
				short maxCapacity = reqCont.readShort();
				short totalCapacity = reqCont.readShort();
				short remainCapacity = reqCont.readShort();
				short cycleTimes = reqCont.readShort();
				byte  fanOpenTempThreshold = reqCont.readByte();
				byte  fanCloseTempThreshold = reqCont.readByte();
				byte  heatOpenTempThreshold = reqCont.readByte();
				byte  heatCloseTempThreshold = reqCont.readByte();

				ChargeDischargeCfgBean chargeCfgInfo = new ChargeDischargeCfgBean();
			
				chargeCfgInfo.setImei(sn);
				chargeCfgInfo.setMaxDischargeCurrent(maxDischargeCurrent);
				chargeCfgInfo.setMaxRechargeCurrent(maxRechargeCurrent);
				chargeCfgInfo.setChargeControl(chargeControl);
				chargeCfgInfo.setChargeReqCurrent(chargeReqCurrent);
				chargeCfgInfo.setChargeReqVoltage(chargeReqVoltage);
				chargeCfgInfo.setCurrentCalibration(currentCalibration);
				chargeCfgInfo.setCurrentRatio(currentRatio);
				chargeCfgInfo.setMaxCapacity(maxCapacity);
				chargeCfgInfo.setTotalCapacity(totalCapacity);
				chargeCfgInfo.setRemainCapacity(remainCapacity);
				chargeCfgInfo.setCycleTimes(cycleTimes);
				chargeCfgInfo.setFanOpenTempThreshold(fanOpenTempThreshold);

				chargeCfgInfo.setFanCloseTempThreshold(fanCloseTempThreshold);
				chargeCfgInfo.setHeatOpenTempThreshold(heatOpenTempThreshold);
				chargeCfgInfo.setHeatCloseTempThreshold(heatCloseTempThreshold);
				
				ChargeDischargeCfgDAO chargeCfgDAO = new ChargeDischargeCfgDAO();
				try{
					chargeCfgDAO.insert(chargeCfgInfo);
				}
				catch (SQLException e){ 
			
					e.printStackTrace(); 
				} 

				
				CommMessage  responsMsg =buildResponMsg
					(   (short)20,
						aMsg.getHeader().getVer(),
						aMsg.getHeader().getPid(),
						(byte)0,
						sn,
						aMsg.getFid(),
						aMsg.getSubFid(),
						null
					);
				
                //aCtx.writeAndFlush(responsMsg);
				
            }
        });
    }

    public void getDevCfgParamFromDevProc(final ChannelHandlerContext aCtx,final CommMessage aMsg, final ChannelInfo aChannelInfo)
    {
		
		System.out.println("getDevCfgParamFromDevProc");
		if (false ==  mDeviceManager.isDeviceLoggedIn(aChannelInfo)) {

			
				String sn = aMsg.getSn();
				
				CommMessage  responsMsg =buildResponMsg
					(   (short)20,
						aMsg.getHeader().getVer(),
						aMsg.getHeader().getPid(),
						(byte)1,
						sn,
						aMsg.getFid(),
						aMsg.getSubFid(),
						null
					);
				
               // aCtx.writeAndFlush(responsMsg);
		
            System.out.println("device not logged in");
            return;
        }

        mScheduler.execute(new Runnable() {
			
            	@Override
				public void run() {

				String sn = aMsg.getSn();
				ByteBuf reqCont = aMsg.getCont();
                System.out.println("getDevCfgParamFromDevProc:" + sn);
				
				byte  resetInitiSetFlag = reqCont.readByte();
				short uploadInterval = reqCont.readShort();
				short heartbeatInterval = reqCont.readShort();
				short comTimeout = reqCont.readShort();
				byte  gprsApnMode = reqCont.readByte();
				
				byte pwdLen = reqCont.readByte();
				byte[]  pwdValue = new byte[pwdLen];
				reqCont.readBytes(pwdValue,0,pwdLen);
				String gprsApnAccount = "aaa";
				String gprsApnPwd = "123456";
				
				byte  comServerAddrMode = reqCont.readByte();
				byte addrLen = reqCont.readByte();
				byte[]  addrValue = new byte[addrLen];
				reqCont.readBytes(addrValue,0,addrLen);
				String comServerAddrIp = "127.0.0.1";
				String comServerAddrPort = "123";
				

				DevParamCfgBean devParamCfgInfo = new DevParamCfgBean();
			
				devParamCfgInfo.setImei(sn);
				devParamCfgInfo.setResetInitiSetFlag(resetInitiSetFlag);
				devParamCfgInfo.setComServerAddrMode(comServerAddrMode);
				devParamCfgInfo.setComServerAddrIp(comServerAddrIp);
				devParamCfgInfo.setComServerAddrPort(comServerAddrPort);
				devParamCfgInfo.setGprsApnMode(gprsApnMode);
				devParamCfgInfo.setGprsApnAccount(gprsApnAccount);
				devParamCfgInfo.setGprsApnPwd(gprsApnPwd);
				devParamCfgInfo.setUploadInterval(uploadInterval);
				devParamCfgInfo.setHeartbeatInterval(heartbeatInterval);
				devParamCfgInfo.setComTimeout(comTimeout);
				
				DevParamCfgDAO devParamCfgInfoDAO = new DevParamCfgDAO();
				try{
					devParamCfgInfoDAO.insert(devParamCfgInfo);
				}
				catch (SQLException e){ 
			
					e.printStackTrace(); 
				} 
				
				CommMessage  responsMsg =buildResponMsg
					(   (short)20,
						aMsg.getHeader().getVer(),
						aMsg.getHeader().getPid(),
						(byte)0,
						sn,
						aMsg.getFid(),
						aMsg.getSubFid(),
						null
					);
				
                //aCtx.writeAndFlush(responsMsg);
				
            }
        });
    }

    public void GPSInfoMsgProc(final ChannelHandlerContext aCtx,final CommMessage aMsg, final ChannelInfo aChannelInfo)
    {
		System.out.println("GPSInfoMsgProc" );
		if (false == mDeviceManager.isDeviceLoggedIn(aChannelInfo)) {
			String sn = aMsg.getSn();
							
			CommMessage  responsMsg =buildResponMsg
				(	(short)20,
					aMsg.getHeader().getVer(),
					aMsg.getHeader().getPid(),
					(byte)1,
					sn,
					aMsg.getFid(),
					aMsg.getSubFid(),
					null
				);
							
			aCtx.writeAndFlush(responsMsg);
            System.out.println("device not logged in");
        }

        mScheduler.execute(new Runnable() {
            @Override
            public void run() {
            
				String sn = aMsg.getSn();                
				ByteBuf reqCont = aMsg.getCont();

				reqCont.readBytes(7);
				byte[]  xy = new byte[9];

				byte ns = reqCont.readByte();
				reqCont.readBytes(xy, 0, 9);  
				String latitude = new String(xy);
				System.out.println("latitude=" + latitude);

				byte ew = reqCont.readByte();
				reqCont.readBytes(xy, 0, 9);  
				String longitude = new String(xy);
				System.out.println("longitude=" + longitude);

				GpsInfoBean gpsInfo = new GpsInfoBean();
			
				gpsInfo.setImei(sn);
				gpsInfo.setLatitude(latitude);
				gpsInfo.setLatitudeDivision("ns");
				gpsInfo.setLongitude(longitude);
				gpsInfo.setLongitudeDivision("ew");
				GpsInfoDAO gpsinfoDAO = new GpsInfoDAO();
				try{
					gpsinfoDAO.insert(gpsInfo);
				}
				catch (SQLException e){ 
			
					e.printStackTrace(); 
				} 
				
				CommMessage  responsMsg =buildResponMsg
				(   (short)20,
					aMsg.getHeader().getVer(),
					aMsg.getHeader().getPid(),
					(byte)0,
					sn,
					aMsg.getFid(),
					aMsg.getSubFid(),
					null
				);
				
                aCtx.writeAndFlush(responsMsg);
            }
        });
    }

    

    public void SetdevModeRespMsgProc(final ChannelHandlerContext aCtx,final CommMessage aMsg, final ChannelInfo aChannelInfo)
    {
		 System.out.println("SetdevModeRespMsgProc");
		 		
        mScheduler.execute(new Runnable() {
            @Override
            public void run() {

				String sn = aMsg.getSn();
				byte rs;
				boolean isHeartTimeout =  mDeviceManager.isDeviceHeartTimeout(sn);
				if (isHeartTimeout)
				{
					rs = 1;
					mDeviceManager.deviceLoggedOut(sn);
				}
				else
				{
					rs = 0;
					mDeviceManager.updateDeviceHeartTime(sn);
				}
					
				CommMessage  responsMsg = buildResponMsg
					(   (short)20,
						aMsg.getHeader().getVer(),
						aMsg.getHeader().getPid(),
						rs,
						sn,
						aMsg.getFid(),
						aMsg.getSubFid(),
						null
					);
				
                //aCtx.writeAndFlush(responsMsg);
            }
        });
		
    }


    public void DevBaseInfoMsgProc(final ChannelHandlerContext aCtx,final CommMessage aMsg, final ChannelInfo aChannelInfo)
    {
		System.out.println("DevBaseInfoMsgProc" );
		if (false == mDeviceManager.isDeviceLoggedIn(aChannelInfo)) {
			String sn = aMsg.getSn();
							
			CommMessage  responsMsg =buildResponMsg
				(	(short)20,
					aMsg.getHeader().getVer(),
					aMsg.getHeader().getPid(),
					(byte)1,
					sn,
					aMsg.getFid(),
					aMsg.getSubFid(),
					null
				);
							
			aCtx.writeAndFlush(responsMsg);
            System.out.println("device not logged in");
        }

        mScheduler.execute(new Runnable() {
            @Override
            public void run() {
            
				String sn = aMsg.getSn();                
				ByteBuf reqCont = aMsg.getCont();

				reqCont.readBytes(2);
				byte[]  plateNumber = new byte[10];
				reqCont.readBytes(plateNumber, 0, 10);  
				String plateNumberStr = new String(plateNumber);

				byte[]  imei = new byte[7];
				reqCont.readBytes(imei, 0, 7);  
				
				short carrieroperator = reqCont.readShort();
				byte  bmshardware = reqCont.readByte();
				short bmssoftware = reqCont.readShort();
				byte  gprshardware = reqCont.readByte();
				short gprssoftware = reqCont.readShort();
				short batterynum = reqCont.readShort();
				byte[]  manufacturer = new byte[8];
				reqCont.readBytes(manufacturer, 0, 8);
				String manufacturerstr = new String(manufacturer);
				byte  coreType = reqCont.readByte();
				byte  moduleNumber = reqCont.readByte();
				short overVoltageAlarm = reqCont.readShort();
				short overVoltageCutOff = reqCont.readShort();
				short underVoltageAlarm = reqCont.readShort();
				short underVoltageCutOff = reqCont.readShort();
				short pressureEqual = reqCont.readShort();
				short equalCurrent = reqCont.readShort();
				byte  socLowWarn = reqCont.readByte();
				short maxTransChargeCurrent = reqCont.readShort();
				short maxAllowChargeVoltage = reqCont.readShort();
				short maxTransDischargeCurrent = reqCont.readShort();
				short minPermChargeVoltage = reqCont.readShort();
				byte  fanStartTemp = reqCont.readByte();
				byte  fanCloseTemp = reqCont.readByte();
				byte  heatStartTemp = reqCont.readByte();
				byte  heatCloseTemp = reqCont.readByte();
				byte  allowMaxOperTemp = reqCont.readByte();
				byte  allowMinOperTemp = reqCont.readByte();
				short maxPermLeakCurrent = reqCont.readShort();

				DeviceInfoBean deviceinfo = new DeviceInfoBean();
			
				deviceinfo.setImei(sn);
				
				deviceinfo.setCarrierOperator(carrieroperator);
				deviceinfo.setBmsHardware(bmshardware);
				deviceinfo.setBmsSoftware(bmssoftware);
				deviceinfo.setGprsHardware(gprshardware);
				deviceinfo.setGprsSoftware(gprssoftware);
				deviceinfo.setBatteryNum(batterynum);
				deviceinfo.setManufacturer(manufacturerstr);
				deviceinfo.setCoreType(coreType);
				deviceinfo.setModuleNumber(moduleNumber);
				deviceinfo.setOverVoltageAlarm(overVoltageAlarm);
				deviceinfo.setOverVoltageCutOff(overVoltageCutOff);
				deviceinfo.setUnderVoltageAlarm(underVoltageAlarm);
				deviceinfo.setUnderVoltageCutOff(underVoltageCutOff);
				deviceinfo.setPressureEqual(pressureEqual);
				deviceinfo.setEqualCurrent(equalCurrent);
				deviceinfo.setSocLowWarn(socLowWarn);
				deviceinfo.setMaxTransChargeCurrent(maxTransChargeCurrent);
				deviceinfo.setMinPermChargeVoltage(minPermChargeVoltage);
				deviceinfo.setFanStartTemp(fanStartTemp);
				deviceinfo.setFanCloseTemp(fanCloseTemp);
				deviceinfo.setHeatStartTemp(heatStartTemp);
				deviceinfo.setHeatCloseTemp(heatCloseTemp);
				deviceinfo.setAllowMaxOperTemp(fanCloseTemp);
				deviceinfo.setAllowMinOperTemp(heatStartTemp);
				deviceinfo.setMaxPermLeakCurrent(heatCloseTemp);
				DeviceInfoDAO deviceInfoDAO = new DeviceInfoDAO();
				try{
					deviceInfoDAO.insert(deviceinfo);
				}
				catch (SQLException e){ 
			
					e.printStackTrace(); 
				} 

				
				CommMessage  responsMsg =buildResponMsg
					(   (short)20,
						aMsg.getHeader().getVer(),
						aMsg.getHeader().getPid(),
						(byte)0,
						sn,
						aMsg.getFid(),
						aMsg.getSubFid(),
						null
					);
				
                //aCtx.writeAndFlush(responsMsg);
            }
        });
    }


	

    @Override
	protected void channelRead0(ChannelHandlerContext aCtx, CommMessage aMsg) throws Exception {
	
	ChannelInfo channelInfo = aCtx.channel().attr(ChannelListener.CHANNEL_INFO).get();
	byte cmd = aMsg.getFid();

	System.out.printf("cmd =%x\n ",cmd);
	if ( (byte)0x01 == cmd )
	{
		registerMsgProc(aCtx,aMsg,channelInfo);
	}
	else if ( (byte)0x02 == cmd)
	{
		BMSInfoMsgProc(aCtx,aMsg,channelInfo);
	}
	else if ( (byte)0x03 == cmd)
	{
		GPSInfoMsgProc(aCtx,aMsg,channelInfo);
	}
	else if ( (byte)0x04 == cmd)
	{
		heartMsgProc(aCtx,aMsg,channelInfo);
	}
	else if ( (byte)0x80 == cmd)
	{
		SetdevModeRespMsgProc(aCtx,aMsg,channelInfo);
	}
	else if ( (byte)0x81 == cmd)
	{
		getBMSInfofromDevProc(aCtx,aMsg,channelInfo);
	}
	else if ( (byte)0x82 == cmd)
	{
		
	}
	else if ( (byte)0x83 == cmd)
	{
		getDevCfgParamFromDevProc(aCtx,aMsg,channelInfo);
	}
	else if ( (byte)0x84 == cmd)
	{
		
	}
	
	else if ( (byte)0x85 == cmd)
	{
		
	}
	else if ((byte)0x86 == cmd)
	{
		DevBaseInfoMsgProc(aCtx,aMsg,channelInfo);
	}
	else
	{
		System.out.println("unknown cmd");
	}
	

}

    @Override
    public void channelReadComplete(ChannelHandlerContext ctx) throws Exception {
       // ctx.writeAndFlush(Unpooled.EMPTY_BUFFER)
       //         .addListener(ChannelFutureListener.CLOSE);
    }

    @Override
    public void exceptionCaught(ChannelHandlerContext ctx, Throwable cause) throws Exception {
        cause.printStackTrace();
        ctx.close();
    }
}




