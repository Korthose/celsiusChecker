import time

from databaseConnection import databaseConnection

while True:
    try:
        connect = databaseConnection()
        cursor = connect.cursor()
        deleteQuery = "DELETE FROM temperatures WHERE date < NOW() - INTERVAL %s DAY;"
        cursor.execute(deleteQuery, (6))
        connect.commit()
    except RuntimeError as error:
        print(error.args[0])
        time.sleep(0.1)
        continue
    time.sleep(60)
