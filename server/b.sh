#!/bin/sh
mvn assembly:assembly

java -cp target/netty-chat-0.0.1-SNAPSHOT.jar  com.thn.netty.chat.server.Server
