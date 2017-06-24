package com.thn.netty.chat.server;

import com.thn.netty.chat.user.UserInfo;

import io.netty.channel.ChannelHandlerContext;

import com.thn.netty.chat.primitive.DeviceInfo;


/**
 * Maintains the relationship between the connection and the user information. Also keeps the 
 * {@link ChannelHandlerContext} to send outbound messages in a thread safe way.
 * @author Thierry Herrmann
 */
public class ChannelInfo {
    private ChannelHandlerContext mContext; // context of the first handler in the server pipeline
    private UserInfo mUserInfo;
	private DeviceInfo  mDeviceInfo;
    
    public ChannelInfo(ChannelHandlerContext aContext) {
        mContext = aContext;
    }

    public ChannelHandlerContext getContext() {
        return mContext;
    }

    public UserInfo getUserInfo() {
        return mUserInfo;
    }

    public void setUserInfo(UserInfo aUserInfo) {
        mUserInfo = aUserInfo;
    }
    
    public boolean isUserLoggedIn() {
        return mUserInfo != null;
    }


	public DeviceInfo getDeviceInfo()
	{
		return mDeviceInfo;
	}

	public void setDeviceInfo(DeviceInfo aDeviceInfo)
	{
		mDeviceInfo = aDeviceInfo;
	}

	public boolean isDeviceLoggedIn()
	{
		return mDeviceInfo != null;
	}

	
	public boolean isTimeOutOfHeart()
	{
		if (mDeviceInfo == null)
		{
			return true;
		}

		return mDeviceInfo.isTimeOutOfHeart();
	}
}
