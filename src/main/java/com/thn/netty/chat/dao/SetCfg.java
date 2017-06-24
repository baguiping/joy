package com.thn.netty.chat.dao;

import com.thn.netty.chat.codec.CommMessage;

import io.netty.buffer.ByteBuf;
import io.netty.buffer.Unpooled;
import java.util.Random;
import com.thn.netty.chat.util.BCDDecode;

import io.netty.channel.ChannelFuture;
import io.netty.channel.ChannelFutureListener;
import io.netty.channel.ChannelHandlerContext;
import io.netty.channel.SimpleChannelInboundHandler;

import com.thn.netty.chat.primitive.DeviceManager;
import com.thn.netty.chat.server.ChannelInfo;

import com.thn.netty.chat.dao.ParamCfgBean;
import com.thn.netty.chat.dao.Paracfg;

import 	com.thn.netty.chat.dao.BmsHybridParamCfgBean;
import 	com.thn.netty.chat.dao.BatteryAlarmParamCfgBean;
import 	com.thn.netty.chat.dao.BmsCellnumCfgBean;
import 	com.thn.netty.chat.dao.ChargeDischargeCfgBean;



public class SetCfg
{
	

	
	static public void setDeviceMode(String sn,byte mode,DeviceManager mDeviceManager)
	{
		
		ByteBuf  cont =  Unpooled.buffer();
		Random rand =new Random();
				
		for (int i = 0; i < 4; i++)
		{
			cont.writeInt(rand.nextInt(25000));
		}

		cont.writeBytes(BCDDecode.str2Bcd(sn));

		for (int i = 0; i < 4; i++)
		{
			cont.writeInt(0);
		}	

		
		CommMessage  responsMsg =CommMessage.buildMsg
			(	(short)54,
				(byte)0x01,
				(short)rand.nextInt(50000),
				(byte)0xFF,
				sn,
				(byte)0x80,
				(byte)0x00,
				cont
			);
		
		ChannelInfo channelInfo = mDeviceManager.getLoggedInDeviceChannel(sn);
		if (null == channelInfo)
		{
			return ;
		}
		
		ChannelHandlerContext context = channelInfo.getContext();
		if (context == null)
		{
			return ;
		}

		if (context != null)
		{
			context.writeAndFlush(responsMsg);
		}
		
	}


	static public void getBMSCfgFromDevice(String sn,DeviceManager  mDeviceManager)
	{
		
		Random rand =new Random();
		
		CommMessage  responsMsg =CommMessage.buildMsg
			(	(short)20,
				(byte)0x01,
				(short)rand.nextInt(50000),
				(byte)0xFF,
				sn,
				(byte)0x81,
				(byte)0x00,
				null
			);
		
		ChannelInfo channelInfo = mDeviceManager.getLoggedInDeviceChannel(sn);
		if (null == channelInfo)
		{
			return ;
		}
		
		ChannelHandlerContext context = channelInfo.getContext();
		if (context == null)
		{
			return ;
		}

		if (context != null)
		{
			context.writeAndFlush(responsMsg);
		}
		
	}


	


	static public void setBMSCfg(String sn, Paracfg paracfg, DeviceManager  mDeviceManager)
	{
		System.out.println("setBMSCfg :sn= " + sn);
		
		ByteBuf  cont =  Unpooled.buffer();
		
		Random rand =new Random();

        BmsHybridParamCfgBean hybrid_param_cfg = paracfg.getHybrid_param_cfg();
		BatteryAlarmParamCfgBean  battery_alarm_param_cfg =  paracfg.getBattery_alarm_param_cfg();
		BmsCellnumCfgBean bms_cellnum_cfg = paracfg.getBms_cellnum_cfg();
		ChargeDischargeCfgBean charge_discharge_cfg = paracfg.getCharge_discharge_cfg(); 
		
		cont.writeByte((byte)3);
		cont.writeByte((byte)hybrid_param_cfg.getInitialParamset());	
		cont.writeShort((short)hybrid_param_cfg.getComAlarmThreshold());
		
		cont.writeByte((byte)60);
		
		cont.writeShort((short)battery_alarm_param_cfg.getVoltageHigh1());
		cont.writeShort((short)battery_alarm_param_cfg.getVoltageLow1());

		
		cont.writeByte((byte)battery_alarm_param_cfg.getTemperHigh1());
		cont.writeByte((byte)battery_alarm_param_cfg.getTemperLow1());
		
		cont.writeByte((byte)battery_alarm_param_cfg.getChargeCurrentLarge1());
		cont.writeByte((byte)battery_alarm_param_cfg.getDischargeCurrentLarge1());
		cont.writeShort((short)battery_alarm_param_cfg.getResistanceLow1());
		
		cont.writeShort((short)battery_alarm_param_cfg.getSocLow1());
		
		cont.writeShort((short)battery_alarm_param_cfg.getPressureHigh1());
		cont.writeShort((short)battery_alarm_param_cfg.getPressureLow1());
		cont.writeShort((short)battery_alarm_param_cfg.getPreDiffLarge1());
		
		cont.writeByte((byte)battery_alarm_param_cfg.getTempDiffLarge1 ());

		cont.writeShort((short)battery_alarm_param_cfg.getVoltageHigh2());
		cont.writeShort((short)battery_alarm_param_cfg.getVoltageLow2());
		
		cont.writeByte((byte)battery_alarm_param_cfg.getTemperHigh2 ());
		cont.writeByte((byte)battery_alarm_param_cfg.getTemperLow2 ());
		
		cont.writeShort((short)battery_alarm_param_cfg.getChargeCurrentLarge2());
		cont.writeShort((short)battery_alarm_param_cfg.getDischargeCurrentLarge2());
		cont.writeShort((short)battery_alarm_param_cfg.getResistanceLow2());
		
		cont.writeShort((short)battery_alarm_param_cfg.getSocLow2());

		cont.writeShort((short)battery_alarm_param_cfg.getPressureHigh2());
		cont.writeShort((short)battery_alarm_param_cfg.getPressureLow2());
		cont.writeShort((short)battery_alarm_param_cfg.getPreDiffLarge2());
		cont.writeByte((byte)battery_alarm_param_cfg.getTempDiffLarge2());
		
		cont.writeShort((short)battery_alarm_param_cfg.getVoltageHigh3());
		cont.writeShort((short)battery_alarm_param_cfg.getVoltageLow3());
		
		cont.writeByte((byte)battery_alarm_param_cfg.getTemperHigh3());
		cont.writeByte((byte)battery_alarm_param_cfg.getTemperLow3());
		
		cont.writeShort((short)battery_alarm_param_cfg.getChargeCurrentLarge3());
		cont.writeShort((short)battery_alarm_param_cfg.getDischargeCurrentLarge3());
		cont.writeShort((short)battery_alarm_param_cfg.getResistanceLow3());
		cont.writeByte((byte)battery_alarm_param_cfg.getSocLow3());

		
		cont.writeShort((short)battery_alarm_param_cfg.getPressureHigh3());
		cont.writeShort((short)battery_alarm_param_cfg.getPressureLow3());
		cont.writeShort((short)battery_alarm_param_cfg.getPreDiffLarge3());
		cont.writeByte((byte)battery_alarm_param_cfg.getTempDiffLarge3());
	
	    cont.writeShort((short)25);

		cont.writeByte((byte)bms_cellnum_cfg.getCellnum1());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum2());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum3());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum4());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum5());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum6());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum7());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum8());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum9());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum10());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum11());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum12());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum13());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum14());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum15());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum16());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum17());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum18());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum19());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum20());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum21());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum22());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum23());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum24());
		cont.writeByte((byte)bms_cellnum_cfg.getCellnum25());

		
		
	    cont.writeShort((short)25);

		cont.writeShort((short)charge_discharge_cfg.getMaxDischargeCurrent());
		cont.writeShort((short)charge_discharge_cfg.getMaxRechargeCurrent());
		cont.writeByte((byte)charge_discharge_cfg.getChargeControl());
		cont.writeShort((short)charge_discharge_cfg.getChargeReqCurrent());
		
		cont.writeShort((short)charge_discharge_cfg.getChargeReqVoltage());
		cont.writeShort((short)charge_discharge_cfg.getCurrentCalibration());
		cont.writeShort((short)charge_discharge_cfg.getCurrentRatio());
		
		cont.writeShort((short)charge_discharge_cfg.getMaxCapacity());
		cont.writeShort((short)charge_discharge_cfg.getTotalCapacity());
		cont.writeShort((short)charge_discharge_cfg.getRemainCapacity());
		cont.writeShort((short)charge_discharge_cfg.getCycleTimes());
		cont.writeByte((byte)charge_discharge_cfg.getFanOpenTempThreshold());
		cont.writeByte((byte)charge_discharge_cfg.getFanCloseTempThreshold());
		cont.writeByte((byte)charge_discharge_cfg.getHeatOpenTempThreshold());
		cont.writeByte((byte)charge_discharge_cfg.getHeatCloseTempThreshold());
		
		
		
		CommMessage  responsMsg =CommMessage.buildMsg
			(	(short)139,
				(byte)0x01,
				(short)rand.nextInt(50000),
				(byte)0xFF,
				sn,
				(byte)0x82,
				(byte)0x00,
				cont
			);
		
		System.out.println("setBMSCfg :getLoggedInDeviceChannel");
		ChannelInfo channelInfo = mDeviceManager.getLoggedInDeviceChannel(sn);
		if (null == channelInfo)
		{
			
			System.out.println("setBMSCfg :4444444444444444444444444444444");
			return ;
		}
		
		System.out.println("setBMSCfg :getContext");
		
		ChannelHandlerContext context = channelInfo.getContext();
		if (context == null)
		{
			
			System.out.println("setBMSCfg :555555555555555555555555555555555");
			return ;
		}
        
		if (context != null)
		{
			System.out.println("6666666666666666666666666666666666666");
			context.writeAndFlush(responsMsg);
		}
		
	}






	static public void getDeviceInfoFromDevice(String sn,DeviceManager	mDeviceManager)
	{
		
		Random rand =new Random();
		
		CommMessage  responsMsg =CommMessage.buildMsg
			(	(short)20,
				(byte)0x01,
				(short)rand.nextInt(50000),
				(byte)0xFF,
				sn,
				(byte)0x83,
				(byte)0x00,
				null
			);
		
		ChannelInfo channelInfo = mDeviceManager.getLoggedInDeviceChannel(sn);
		if (null == channelInfo)
		{
			return ;
		}
		
		ChannelHandlerContext context = channelInfo.getContext();
		if (context == null)
		{
			return ;
		}

		if (context != null)
		{
			context.writeAndFlush(responsMsg);
		}
		
	}


	static public void SetDeviceInfo(String sn,DeviceManager	mDeviceManager)
	{
		
		Random rand =new Random();
		
		CommMessage  responsMsg =CommMessage.buildMsg
			(	(short)20,
				(byte)0x01,
				(short)rand.nextInt(50000),
				(byte)0xFF,
				sn,
				(byte)0x84,
				(byte)0x00,
				null
			);
		
		ChannelInfo channelInfo = mDeviceManager.getLoggedInDeviceChannel(sn);
		if (null == channelInfo)
		{
			return ;
		}
		
		ChannelHandlerContext context = channelInfo.getContext();
		if (context == null)
		{
			return ;
		}

		if (context != null)
		{
			context.writeAndFlush(responsMsg);
		}
		
	}



	static public void SetMixing(String sn,DeviceManager	mDeviceManager)
	{
		
		Random rand =new Random();
		
		CommMessage  responsMsg =CommMessage.buildMsg
			(	(short)20,
				(byte)0x01,
				(short)rand.nextInt(50000),
				(byte)0xFF,
				sn,
				(byte)0x85,
				(byte)0x00,
				null
			);
		
		ChannelInfo channelInfo = mDeviceManager.getLoggedInDeviceChannel(sn);
		if (null == channelInfo)
		{
			return ;
		}
		
		ChannelHandlerContext context = channelInfo.getContext();
		if (context == null)
		{
			return ;
		}

		if (context != null)
		{
			context.writeAndFlush(responsMsg);
		}
		
	}

	static public void getDeviceBaseInfoFromDevice(String sn,DeviceManager	mDeviceManager)
	{
		
		Random rand =new Random();
		
		CommMessage  responsMsg =CommMessage.buildMsg
			(	(short)20,
				(byte)0x01,
				(short)rand.nextInt(50000),
				(byte)0xFF,
				sn,
				(byte)0x86,
				(byte)0x00,
				null
			);
		
		ChannelInfo channelInfo = mDeviceManager.getLoggedInDeviceChannel(sn);
		if (null == channelInfo)
		{
			return ;
		}
		
		ChannelHandlerContext context = channelInfo.getContext();
		if (context == null)
		{
			return ;
		}

		if (context != null)
		{
			context.writeAndFlush(responsMsg);
		}
		
	}















	
}
