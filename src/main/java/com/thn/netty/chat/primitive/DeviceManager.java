package com.thn.netty.chat.primitive;

import java.util.List;
import java.util.Map;
import java.util.concurrent.ConcurrentHashMap;

import org.apache.log4j.Logger;

import com.thn.netty.chat.primitive.MessageInfo;
import com.thn.netty.chat.primitive.UserId;
import com.thn.netty.chat.primitive.UserName;
import com.thn.netty.chat.server.store.JdbcUserStore;
import com.thn.netty.chat.server.store.StoreException;
import com.thn.netty.chat.server.store.UserStore;
import com.thn.netty.chat.user.ContactInfo;
import com.thn.netty.chat.user.ContactState;
import com.thn.netty.chat.primitive.DeviceInfo;

import com.thn.netty.chat.server.ChannelInfo;
import org.joda.time.DateTime;


/**
 * Performs all accesses to persistent data. Uses the {@link UserStore}.
 * @author Thierry Herrmann
 */
public class DeviceManager {
    private static final Logger LOGGER = Logger.getLogger(DeviceManager.class.getName());
    private final Map<String, ChannelInfo> mLoggedInDevices = new ConcurrentHashMap<>();

	public void deviceLoggedIn(DeviceInfo aDeviceInfo, ChannelInfo aChannelInfo) {
		
		aChannelInfo.setDeviceInfo(aDeviceInfo);
		mLoggedInDevices.put(aDeviceInfo.getSn(), aChannelInfo);
		
		LOGGER.info("User " + aDeviceInfo.getSn()+ " logged in");
	
	}

	public boolean isDeviceLoggedIn(ChannelInfo aChannelInfo) {
		return aChannelInfo.getDeviceInfo() != null;
	}

	public void deviceLoggedOut(String aDeviceSn) {
		mLoggedInDevices.remove(aDeviceSn);
		
		LOGGER.info("User " + aDeviceSn + " logged out");
	}

	public ChannelInfo getLoggedInDeviceChannel(String aDeviceSn) {
		ChannelInfo channelInfo = mLoggedInDevices.get(aDeviceSn);
		if (channelInfo != null) {
			// user not logged in or not existing
			return channelInfo;
		}
		// user existing and logged in
		return null;
	}

	public boolean isDeviceHeartTimeout(String sn)
	{
		if (sn == null)
		{
			return true;
		}
		
		ChannelInfo channelInfo = mLoggedInDevices.get(sn);

		if (channelInfo == null)
		{
			return true;
		}

		return channelInfo.isDeviceLoggedIn();

	}

	public void updateDeviceHeartTime(String sn)
	{
		
		if (sn == null)
		{
			return ;
		}
		
		ChannelInfo channelInfo = mLoggedInDevices.get(sn);

		if (channelInfo == null)
		{
			return ;
		}

		DeviceInfo devInfo = channelInfo.getDeviceInfo();

		if (devInfo == null)
		{
			return;
		}
		DateTime dt = new DateTime();
		devInfo.setHeartTime(dt);
	}

}

