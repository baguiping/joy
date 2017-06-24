package com.thn.netty.chat.dao;

public class DevParamCfgBean {

String imei;
int resetInitiSetFlag;
int comServerAddrMode;
String comServerAddrIp;
String comServerAddrPort;
int gprsApnMode;
String gprsApnAccount ;
String gprsApnPwd ;
int uploadInterval;
int heartbeatInterval ;
int comTimeout;
public String getImei() {
	return imei;
}
public void setImei(String imei) {
	this.imei = imei;
}
public int getResetInitiSetFlag() {
	return resetInitiSetFlag;
}
public void setResetInitiSetFlag(int resetInitiSetFlag) {
	this.resetInitiSetFlag = resetInitiSetFlag;
}
public int getComServerAddrMode() {
	return comServerAddrMode;
}
public void setComServerAddrMode(int comServerAddrMode) {
	this.comServerAddrMode = comServerAddrMode;
}
public String getComServerAddrIp() {
	return comServerAddrIp;
}
public void setComServerAddrIp(String comServerAddrIp) {
	this.comServerAddrIp = comServerAddrIp;
}
public String getComServerAddrPort() {
	return comServerAddrPort;
}
public void setComServerAddrPort(String comServerAddrPort) {
	this.comServerAddrPort = comServerAddrPort;
}
public int getGprsApnMode() {
	return gprsApnMode;
}
public void setGprsApnMode(int gprsApnMode) {
	this.gprsApnMode = gprsApnMode;
}
public String getGprsApnAccount() {
	return gprsApnAccount;
}
public void setGprsApnAccount(String gprsApnAccount) {
	this.gprsApnAccount = gprsApnAccount;
}
public String getGprsApnPwd() {
	return gprsApnPwd;
}
public void setGprsApnPwd(String gprsApnPwd) {
	this.gprsApnPwd = gprsApnPwd;
}
public int getUploadInterval() {
	return uploadInterval;
}
public void setUploadInterval(int uploadInterval) {
	this.uploadInterval = uploadInterval;
}
public int getHeartbeatInterval() {
	return heartbeatInterval;
}
public void setHeartbeatInterval(int heartbeatInterval) {
	this.heartbeatInterval = heartbeatInterval;
}
public int getComTimeout() {
	return comTimeout;
}
public void setComTimeout(int comTimeout) {
	this.comTimeout = comTimeout;
}

}
