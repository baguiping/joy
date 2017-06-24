package com.thn.netty.chat.codec;

public class  Header {
	private	int     slb;
	private	short   plen;
	private	byte    ver;
	private	short   pid;
	private	byte    rs;

	
	public void  setVer(byte ver)
	{
		this.ver = ver;
	}
	public byte getVer()
	{
		return ver;
	}
	public short getPid()
	{
		return pid;
	}
	public void setPid(short pid)
	{
		this.pid = pid;
	}
	public	void setSlb(int slb)
	{
		this.slb = slb;
	}
	public	int getSlb()
	{
		return slb;
	}
	public	void setPlen(short plen)
	{
		this.plen = plen;
	}
	public	short getPlen()
	{
		return plen;
	}
	public	void setRs( byte rs)
	{
		this.rs = rs;
	}
	public	byte getRs()
	{
		return rs;
	}
}

