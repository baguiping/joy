package com.thn.netty.chat.dao;

public class AlarmInfoBean {
int  alarmID;
String  imei;
int type ;
int status;

byte[]    alarmInfo;
short[]   alarmCode;

public  byte[] getAlarmInfo()
{
	return alarmInfo;
}

public void setAlarmInfo(byte[] alarmInfo)
{
	this.alarmInfo = alarmInfo;
}

public void setAlarmCode(short[] alarmCode)
{
	this.alarmCode = alarmCode;
}

public  short[] getAlarmCode()
{
	return alarmCode;
}


public int getAlarmID() {
	return alarmID;
}
public void setAlarmID(int alarmID) {
	this.alarmID = alarmID;
}
public String getImei() {
	return imei;
}
public void setImei(String imei) {
	this.imei = imei;
}
public int getType() {
	return type;
}
public void setType(int type) {
	this.type = type;
}
public int getStatus() {
	return status;
}
public void setStatus(int status) {
	this.status = status;
}
}
