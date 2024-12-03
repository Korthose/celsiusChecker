import os

import pymysql
import pymysql.cursors
from dotenv import load_dotenv

load_dotenv()

# gets database informations through .env
DB_HOST = os.getenv('DB_HOST')
DB_PORT = os.getenv('DB_PORT')
DB_DATABASE = os.getenv('DB_DATABASE')
DB_USERNAME = os.getenv('DB_USERNAME')
DB_PASSWORD = os.getenv('DB_PASSWORD')

def databaseConnection():
    connection = pymysql.connect(host=DB_HOST,
                                 port=DB_PORT,
                                 user=DB_USERNAME,
                                 passwd=DB_PASSWORD,
                                 database=DB_DATABASE)
    return connection

