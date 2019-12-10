import pymysql


def getConnection():
    connection = pymysql.connect(host='127.0.0.1', user='root', password='',
                                 db='db_hpai', charset='utf8mb4', cursorclass=pymysql.cursors.DictCursor)
    return connection
