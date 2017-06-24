package com.thn.netty.chat.dao;

import 	com.thn.netty.chat.dao.BmsHybridParamCfgBean;
import 	com.thn.netty.chat.dao.BatteryAlarmParamCfgBean;
import 	com.thn.netty.chat.dao.BmsCellnumCfgBean;
import 	com.thn.netty.chat.dao.ChargeDischargeCfgBean;

public class Paracfg
{
	BmsHybridParamCfgBean hybrid_param_cfg;
	BatteryAlarmParamCfgBean  battery_alarm_param_cfg;
	BmsCellnumCfgBean bms_cellnum_cfg;
	ChargeDischargeCfgBean charge_discharge_cfg; 
	
	public BmsHybridParamCfgBean getHybrid_param_cfg() {
		return hybrid_param_cfg;
	}
	public void setHybrid_param_cfg(BmsHybridParamCfgBean hybrid_param_cfg) {
		this.hybrid_param_cfg = hybrid_param_cfg;
	}
	public BatteryAlarmParamCfgBean getBattery_alarm_param_cfg() {
		return battery_alarm_param_cfg;
	}
	public void setBattery_alarm_param_cfg(
			BatteryAlarmParamCfgBean battery_alarm_param_cfg) {
			
		this.battery_alarm_param_cfg = battery_alarm_param_cfg;
	}
	public BmsCellnumCfgBean getBms_cellnum_cfg() {
		return bms_cellnum_cfg;
	}
	public void setBms_cellnum_cfg(BmsCellnumCfgBean bms_cellnum_cfg) {
		this.bms_cellnum_cfg = bms_cellnum_cfg;
	}
	public ChargeDischargeCfgBean getCharge_discharge_cfg() {
		return charge_discharge_cfg;
	}
	public void setCharge_discharge_cfg(
			ChargeDischargeCfgBean charge_discharge_cfg) {
		this.charge_discharge_cfg = charge_discharge_cfg;
	}
	
}



