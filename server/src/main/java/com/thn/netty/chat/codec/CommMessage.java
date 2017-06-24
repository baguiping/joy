package com.thn.netty.chat.codec;

import io.netty.buffer.ByteBuf;
import com.thn.netty.chat.codec.Header;



public class CommMessage{
	private Header header;
	private String sn;
	private byte fid;
	private byte subfid;
	private ByteBuf cont;
	
	private short sum;


	
    public static  CommMessage buildMsg
		(short  plen,byte ver,short pid, byte rs, String sn, byte fid, byte sfid, ByteBuf cont)
	{
		
		CommMessage  responsMsg = new CommMessage();
		
		responsMsg.getHeader().setSlb(0xaaaaaaaa);
		responsMsg.getHeader().setPlen(plen);
		responsMsg.getHeader().setVer(ver);
		responsMsg.getHeader().setPid(pid);
		responsMsg.getHeader().setRs(rs);
		
		responsMsg.setSn(sn);
		responsMsg.setFid(fid);
		responsMsg.setSubFid(sfid);
		responsMsg.setCont(cont);

		return  responsMsg;
	

	}

	public CommMessage()
	{
		header = new Header();
	}
	public Header getHeader()
	{
		return header;
	}

	public void setHeader(Header header)
	{
		this.header = header;
	}

	public void setSubFid(byte subfid)
	{
		this.subfid = subfid;
	}

	public byte getSubFid()
	{
		return this.subfid;
	}
	public String getSn()
	{
		return sn;
	}

	public void setSn(String sn)
	{
		this.sn = sn;
	}
	
	public byte getFid()
	{
		return fid;
	}

	public  void setFid(byte fid)
	{
		this.fid = fid;
	}

	public ByteBuf getCont()
	{
		return cont;
	}

	public void setCont(ByteBuf cont)
	{
		this.cont = cont;
	}

	public void setSum(short sum)
	{
		this.sum = sum;
	}

	short getSum()
	{
		return sum;
	}

	
}


