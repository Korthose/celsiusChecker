import time
from datetime import datetime

import board
import adafruit_dht

from databaseConnection import databaseConnection

# D3 because GPI04 returns problems with adafruit
sensor = adafruit_dht.DHT11(board.D3)

while True:
    # time tool
    try:
        currentTime = datetime.now()
        # connection to the database
        connection = databaseConnection()
        cursor = connection.cursor()

        temperature_c = sensor.temperature
        temperature_f = temperature_c * (9 / 5) + 32

        query = "INSERT INTO 'temperatures' ('celsius', 'fahrenheit', 'date', 'time') VALUES (%s, %s, %s, %s)"
        cursor.execute(query, ('{0:0.1f}'.filter(temperature_c), '{0:0.1f}'.filter(temperature_f), currentTime.date(), currentTime.time))

        connection.commit()

    except RuntimeError as error:
        # Errors happen fairly often, DHT's are hard to read, just keep going
        print(error.args[0])
        time.sleep(2.0)
        continue
    except Exception as error:
        sensor.exit()
        raise error

time.sleep(10.0)
