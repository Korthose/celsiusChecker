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
        humidity = sensor.humidity

        # Format the values before binding
        temperature_c_formatted = f"{temperature_c:0.1f}"
        temperature_f_formatted = f"{temperature_f:0.1f}"
        humidity_formatted = f"{humidity:0.1f}"

        query = "INSERT INTO temperatures (celsius, fahrenheit,humidity, date, time) VALUES (%s, %s, %s, %s, %s)"
        cursor.execute(query, (temperature_c_formatted, temperature_f_formatted, humidity_formatted, currentTime.date(), currentTime.time()))
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
