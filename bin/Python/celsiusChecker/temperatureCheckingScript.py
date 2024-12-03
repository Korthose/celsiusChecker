import time
from datetime import datetime

import board
import adafruit_dht

from databaseConnection import databaseConnection

# D3 because GPI04 returns problems with adafruit
sensor = adafruit_dht.DHT11(board.D3)

while True:
    # time tool
    currentTime = datetime.now()

    # connection to the database
    connection = databaseConnection()
    cursor = connection.cursor()

    temperature_c = sensor.temperature
    temperature_f = temperature_c * (9 / 5) + 32

    query = "INSERT INTO 'temperatures' ('celsius', 'fahrenheit', 'date', 'time') VALUES (%s, %s, %s, %s)"
    cursor.execute(query, (temperature_c, temperature_f, currentTime.date(), currentTime.time))

    connection.commit()


time.sleep(10.0)
