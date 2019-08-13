# _*_ codong: utf-8 _*_ 
import os  

import requests
import sys
import sqlite3
import time
import datetime


'''
'''

reload(sys)
sys.setdefaultencoding( "utf-8" )



conn = sqlite3.connect('./info.db')
cursor = conn.cursor()

data_conn = sqlite3.connect('./gp.db')
data_cursor = data_conn.cursor()


sql = "select id,qz,name from info"
file = open("./gp_info.txt","w")

results = cursor.execute(sql)

all_info = results.fetchall()
for info in all_info:
    
    id = info[1].strip() + info[0].strip()
    print(id)
    fileName = "./static/data/" + id + ".csv"
    f = open(fileName,"w")
    f.write("Date,Open,High,Low,Close,Volume\n")
    d_sql = "select * from  data where id ='%s' " % (id)
    print d_sql
    
    ret_data = data_cursor.execute(d_sql)
    all_data = ret_data.fetchall()
    for one in all_data:
        print one 
        date = datetime.datetime.strptime(one[7],"%Y-%m-%d")
        date_str = date.strftime("%d-%b-%y")

        data_txt = "%s,%s,%s,%s,%s,%s\n" % (date_str,one[2],one[3],one[4],one[5],one[6])
        f.write(data_txt)
    f.close()
    


    


