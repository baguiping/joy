package com.thn.netty.chat.dao;

public class BmsHybridParamCfgBean {
	int id;
	String imei;
	int  initialParamset;
	int  comAlarmThreshold;
	
	public String getImei() {
		return imei;
	}
	public void setImei(String imei) {
		this.imei = imei;
	}
	
	public int getInitialParamset() {
		return initialParamset;
	}
	public void setInitialParamset(int initialParamset) {
		this.initialParamset = initialParamset;
	}
	
	public int getComAlarmThreshold() {
		return comAlarmThreshold;
	}
	public void setComAlarmThreshold(int comAlarmThreshold) {
		this.comAlarmThreshold = comAlarmThreshold;
	}
	
}
