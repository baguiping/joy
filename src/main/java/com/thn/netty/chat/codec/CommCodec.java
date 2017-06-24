package com.thn.netty.chat.codec;

import io.netty.buffer.ByteBuf;
import io.netty.buffer.Unpooled;
import io.netty.channel.ChannelHandlerContext;
import io.netty.handler.codec.ByteToMessageCodec;

import java.util.EnumMap;
import java.util.List;

import org.apache.log4j.Logger;

import com.thn.netty.chat.primitive.Command;
import com.thn.netty.chat.primitive.CommandType;
import com.thn.netty.chat.codec.CommMessage;

import com.thn.netty.chat.util.BCDDecode;
import com.thn.netty.chat.util.CRC16;


public class CommCodec extends ByteToMessageCodec<CommMessage> {
	static final  int  MAGIC = 0xaaaaaaaa;
	static final  short  MSG_HEAD_LEN = 10;
	
    protected void encode(ChannelHandlerContext aCtx, CommMessage aMsg, ByteBuf aOut) throws Exception {
		
        ByteBuf sendBuf =  Unpooled.buffer(1024);

		sendBuf.writeInt(aMsg.getHeader().getSlb());
		sendBuf.writeShort(aMsg.getHeader().getPlen());
		sendBuf.writeByte(aMsg.getHeader().getVer());
		sendBuf.writeShort(aMsg.getHeader().getPid());
		sendBuf.writeByte(aMsg.getHeader().getRs());
		sendBuf.writeBytes(BCDDecode.str2Bcd(aMsg.getSn()));
		sendBuf.writeByte(aMsg.getFid());
		sendBuf.writeByte(aMsg.getSubFid());
		
		if (null != aMsg.getCont())
		{
			sendBuf.writeBytes(aMsg.getCont());
		}

		int crc = CRC16.calcCrc16(sendBuf);
		sendBuf.writeShort((short)crc);

		aOut.writeBytes(sendBuf);
		
		System.out.println(String.format("0x%04x", crc)); 
    }

    @Override
    protected void decode(ChannelHandlerContext aCtx, ByteBuf aIn, List<Object> aOut) throws Exception {

		int len = aIn.readableBytes();
		if (len == 0) {
            return;
        }
		System.out.println("len=" +len);
        ByteBuf buf = aIn.readBytes(len);
        int magic = buf.readInt();
		if (magic != MAGIC)
		{
			return;
		}

		short plen = buf.readShort();
		if (plen < MSG_HEAD_LEN)
		{
			return;
		}

		byte   ver = buf.readByte();
		short  pid = buf.readShort();
		byte   rs = buf.readByte();
		byte[]   sn =  new byte[6];
		for(int i = 0; i < 6; i++)
		{
			sn[i] = buf.readByte();
		}
		
		byte fid = buf.readByte();
		byte sfid = buf.readByte();

		int contLen = len - 20;
        
		ByteBuf cont =	Unpooled.buffer();
		
		System.out.println("contLen=" + contLen);
		
		if (contLen > 0)
		{
			buf.readBytes(cont,contLen);
		}
		
		short crc = buf.readShort();

		System.out.println(BCDDecode.bcd2Str(sn));
		CommMessage  msg = new CommMessage();
		msg.getHeader().setPlen(plen);
		msg.getHeader().setSlb(magic);
		msg.getHeader().setVer(ver);
		msg.getHeader().setPid(pid);
		msg.setSn(BCDDecode.bcd2Str(sn));
		msg.setFid(fid);
		msg.setSubFid(sfid);
		
		if (contLen > 0)
		{
			msg.setCont(cont);
		}
		else
		{
			msg.setCont(null);
		}	
        aOut.add(msg);
		
    }

}

