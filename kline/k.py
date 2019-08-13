#!/usr/bin/env python
#
# Copyright 2009 Facebook
#
# Licensed under the Apache License, Version 2.0 (the "License"); you may
# not use this file except in compliance with the License. You may obtain
# a copy of the License at
#
#     http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
# WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
# License for the specific language governing permissions and limitations
# under the License.

import os.path
import re
import tornado.auth
import tornado.database
import tornado.httpserver
import tornado.ioloop
import tornado.options
import tornado.web
import unicodedata
import sqlite3

from tornado.options import define, options
import tornado.autoreload

define("port", default=8080, help="run on the given port", type=int)
define("mysql_host", default="127.0.0.1:3306", help="blog database host")
define("mysql_database", default="blog", help="blog database name")
define("mysql_user", default="blog", help="blog database user")
define("mysql_password", default="blog", help="blog database password")


class Application(tornado.web.Application):
    def __init__(self):
        handlers = [
             (r"/", MainHandler),
             (r"/yinhang", YinhangHandler),
             (r"/sh(\d+)", ShHandler),
             (r"/sz(\d+)", SzHandler),
             (r"/fl/sh(\d+)", FlShHandler),
             (r"/fl/sz(\d+)", FlSzHandler),
        ]
        settings = dict(
            template_path=os.path.join(os.path.dirname(__file__), "templates"),
            static_path=os.path.join(os.path.dirname(__file__), "static"),
            debug=True,
        )
        tornado.web.Application.__init__(self, handlers, **settings)

        # Have one global connection to the blog DB across all handlers


        self.conn = sqlite3.connect('./info.db')
        self.cursor = self.conn.cursor()

        self.data_conn = sqlite3.connect('./gp.db')
        self.data_cursor = self.data_conn.cursor()

def getNameById(self,id):
    sql = "select * from where id = '%s' " % id
    results = self.cursor.execute(sql)
    all_info = results.fetchall()
    print all_info

class CsvHandler(tornado.web.RequestHandler):
    def get(self,entry):
        #self.write("Hello, world")
        print entry
        self.render("static/data/" + entry)

class MainHandler(tornado.web.RequestHandler):
    def get(self):
        #self.write("Hello, world")
        self.render("index.html")
class YinhangHandler(tornado.web.RequestHandler):
    def get(self):
        #self.write("Hello, world")
        self.render("yinhang.html")
class SzHandler(tornado.web.RequestHandler):
    def get(self,entry):
        print entry
        self.conn = sqlite3.connect('./info.db')
        self.cursor = self.conn.cursor()

        sql_1 = "select name from info where id = '%s' " % (entry.strip('szh'))
        print sql_1
        
        results = self.cursor.execute(sql_1)
        all_info = results.fetchall()
        name = all_info[0][0]

        sql = '''SELECT name,id,qz  FROM info WHERE id IN((SELECT id FROM info WHERE id<%s ORDER BY id DESC LIMIT 1),
        %s,(SELECT id FROM info WHERE id>%s ORDER BY id LIMIT 1)) ORDER BY id'''  % (entry.strip('szh'),entry.strip('szh'),entry.strip('szh'))
        print sql
        ret = self.cursor.execute(sql)
        fy = ret.fetchall()
        print "sssssssssssss"
        print fy
        print "ssssssssssssssssss"
        pre = fy[0][0] 
        pre_href =  fy[0][2] +fy[0][1] 
        print pre_href
        nxt = fy[2][0] 
        nxt_href =fy[2][2] + fy[2][1] 
        print nxt_href
        self.render("k.html",data_path =  "static/data/sz" + entry.strip() + ".csv",name = name + "(sz" + entry.strip()  + ")" ,pre=pre,next=nxt,pre_href=pre_href,next_href=nxt_href,)
                                 
 
class ShHandler(tornado.web.RequestHandler):
    def get(self,entry):
        #self.write("Hello, world")
        self.conn = sqlite3.connect('./info.db')
        self.cursor = self.conn.cursor()

        sql_1 = "select name from info where id = '%s' " % (entry.strip('szh'))
        print sql_1
       
        results = self.cursor.execute(sql_1)
        all_info = results.fetchall()
        name = all_info[0][0]

        sql = '''SELECT name,id,qz  FROM info WHERE id IN((SELECT id FROM info WHERE id<%s ORDER BY id DESC LIMIT 1),
        %s,(SELECT id FROM info WHERE id>%s ORDER BY id LIMIT 1)) ORDER BY id'''  % (entry.strip('szh'),entry.strip('szh'),entry.strip('szh'))
        print sql
        ret = self.cursor.execute(sql)
        fy = ret.fetchall()
        print "sssssssssssss"
        print fy
        print "ssssssssssssssssss"
        pre = fy[0][0] 
        pre_href =  fy[0][2] +fy[0][1] 
        print pre_href
        nxt = fy[2][0] 
        nxt_href =fy[2][2] + fy[2][1] 
        print nxt_href
        self.render("k.html",data_path =  "static/data/sh" + entry.strip() + ".csv",name = name + "(sh" + entry.strip()  + ")" ,pre=pre,next=nxt,pre_href=pre_href,next_href=nxt_href,)


class FlSzHandler(tornado.web.RequestHandler):
    def get(self,entry):
        name = "123"
        self.render("kk.html",data_path =  "static/data/sz" + entry.strip() + ".csv",name = name + "(sz" + entry.strip()  + ")" ,)
                                 
 
class FlShHandler(tornado.web.RequestHandler):
    def get(self,entry):
        name = "456"
        self.render("kk.html",data_path = "static/data/sz" + entry.strip() + ".csv", name = name + "(sh" + entry.strip()  + ")",)



def main():
    tornado.options.parse_command_line()
    http_server = tornado.httpserver.HTTPServer(Application())
    http_server.listen(options.port)
    tornado.ioloop.IOLoop.instance().start()


if __name__ == "__main__":
    main()
    
