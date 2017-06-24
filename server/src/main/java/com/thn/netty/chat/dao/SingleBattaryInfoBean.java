package com.thn.netty.chat.dao;

public class SingleBattaryInfoBean {
	int singlebattaryid;
	String imei;
	String singlevoltage;
	int count;
	String singletemperature;
	
	public int getSinglebattaryid() {
		return singlebattaryid;
	}
	public void setSinglebattaryid(int singlebattaryid) {
		this.singlebattaryid = singlebattaryid;
	}
	public String getImei() {
		return imei;
	}
	public void setImei(String imei) {
		this.imei = imei;
	}
	public String getSinglevoltage() {
		return singlevoltage;
	}
	public void setSinglevoltage(String singlevoltage) {
		this.singlevoltage = singlevoltage;
	}
	public int getCount() {
		return count;
	}
	public void setCount(int count) {
		this.count = count;
	}
	public String getSingletemperature() {
		return singletemperature;
	}
	public void setSingletemperature(String singletemperature) {
		this.singletemperature = singletemperature;
	}

}
