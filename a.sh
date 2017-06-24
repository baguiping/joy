#!/bin/sh
mvn  package
mvn exec:java -Dexec.mainClass="com.thn.netty.chat.server.Server"

