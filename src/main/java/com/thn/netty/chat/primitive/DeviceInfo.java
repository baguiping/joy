package com.thn.netty.chat.primitive;

import org.apache.commons.lang.builder.ToStringBuilder;
import org.apache.commons.lang.builder.ToStringStyle;

import org.joda.time.DateTime;
import org.joda.time.Days;
import org.joda.time.Hours;
import org.joda.time.Minutes;
import org.joda.time.Seconds;
import org.joda.time.format.DateTimeFormat;
import org.joda.time.format.DateTimeFormatter;


/**
 * Typed name to identify a user. This is published to other users.
 * @author Thierry Herrmann
 */
public class DeviceInfo {
    private static final int MAX_LENGTH = 20;
    private  String mSn;
    private final int HEART_TIMEOUT = 5;
	DateTime mRegTime;
	DateTime mHeartTime;
	
	//DateTime added = dt.plusSeconds(6);

    public DeviceInfo(String aSn) {
        if (aSn.length() > MAX_LENGTH) {
            throw new IllegalArgumentException("name too long. Max " + MAX_LENGTH + " chars: " + aSn);
        }
        mSn = aSn;
    }

    public String getSn() {
        return mSn;
    }

	public void setSn(String aSn)
	{
		mSn = aSn;
	}

	public void setRegTime(DateTime aRegTime)
	{
		mRegTime = aRegTime;
	}

	public DateTime getRegTime()
	{
		return mRegTime;
	}

	public void setHeartTime(DateTime aHeartTime)
	{
		mHeartTime = aHeartTime;
	}

	public boolean isTimeOutOfHeart()
	{
		DateTime  timeOutDt = mHeartTime.plusSeconds(HEART_TIMEOUT);
		DateTime  now = new DateTime();
		
		return   now.isAfter(timeOutDt) ? true : false;
	}
	
    @Override
    public int hashCode() {
        final int prime = 31;
        int result = 1;
        result = prime * result + ((mSn == null) ? 0 : mSn.hashCode());
        return result;
    }

    @Override
    public boolean equals(Object aObject) {
        if (this == aObject)
            return true;
        if (aObject == null)
            return false;
        if (getClass() != aObject.getClass())
            return false;
        DeviceInfo other = (DeviceInfo) aObject;
        if (mSn == null) {
            if (other.mSn != null)
                return false;
        } else if (!mSn.equals(other.mSn))
            return false;
        return true;
    }

    /** {@inheritDoc} */
    @Override
    public String toString()
    {
        return new ToStringBuilder(this, ToStringStyle.SHORT_PREFIX_STYLE)
        .append("mSn", mSn)
        .toString();
    }
    
    public static void main(String[] args) {
        System.out.println(new UserName("John123"));
    }
}

