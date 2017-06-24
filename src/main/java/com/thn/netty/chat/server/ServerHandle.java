package com.thn.netty.chat.server;


import io.netty.buffer.ByteBuf;
import io.netty.buffer.Unpooled;
import io.netty.channel.ChannelFutureListener;
import io.netty.channel.ChannelHandlerContext;
import io.netty.channel.ChannelInboundHandlerAdapter;
import io.netty.util.CharsetUtil;

import com.thn.netty.chat.codec.CommCodec;
import com.thn.netty.chat.codec.CommMessage;

import static io.netty.channel.ChannelHandler.Sharable;








import com.thn.netty.chat.dao.UserBean;
import com.thn.netty.chat.db.C3P0Utils;
import com.thn.netty.chat.dao.UserDQL;
import java.sql.SQLException;



import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;










@Sharable
public class ServerHandle extends ChannelInboundHandlerAdapter {
    @Override
    public void channelRead(ChannelHandlerContext ctx, Object msg) throws Exception {

		CommMessage  cmsg = (CommMessage)msg;

		//System.out.println("plen=" + cmsg.getHeader().getPlen());
		//System.out.println("Slb=" + cmsg.getHeader().getSlb());
		//System.out.println("getVer=" + cmsg.getHeader().getVer());

		/*
		UserBean  user = new UserBean();
		user.setUser("bgp");
		user.setPasswd("bajunjie");
		UserDQL  udql = new UserDQL();
		udql.insert(user);

		ctx.writeAndFlush(cmsg);
        */




		/*
		int a =  in.readInt();
		
        System.out.println("a= " + Integer.toHexString(a) );
			int b =  in.readInt();
			 System.out.println("a= " + b );
        System.out.println("Server received: " + in.toString(CharsetUtil.UTF_8));
        ctx.write(in);
        */
    }

    @Override
    public void channelReadComplete(ChannelHandlerContext ctx) throws Exception {
       // ctx.writeAndFlush(Unpooled.EMPTY_BUFFER)
       //         .addListener(ChannelFutureListener.CLOSE);
    }

    @Override
    public void exceptionCaught(ChannelHandlerContext ctx, Throwable cause) throws Exception {
        cause.printStackTrace();
        ctx.close();
    }
}



