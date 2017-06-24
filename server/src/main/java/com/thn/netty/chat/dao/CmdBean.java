package com.thn.netty.chat.dao;

public class CmdBean
{
	int mToken;
	int mCmd;
	String  mValue; 
	int mFlag;

	public void setToken(int aToken)
	{
		mToken = aToken;
	}

	public int getToken()
	{
		return mToken;
	}

	public void setCmd(int aCmd)
	{
		mCmd = aCmd;
	}

	public int getCmd()
	{
		return mCmd;
	}
	public void setValue(String aValue)
	{
		mValue = aValue;
	}

	public void setFlag(int aflag)
	{
		mFlag = aflag;
	}

	public int getFlag()
	{
		return mFlag;
	}
}
