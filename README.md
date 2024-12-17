# User Guide
## General Info
This Project was made with a Raspberry Pi 4 and Raspbian GNU/Linux 11 (bullseye). Depending on the time you clone this 
update, things could've changed. 
## Python
To set up your python environment, go into /bin and set up 
your local virtual environment with the following commands:
```
python -m venv .venv
source .venv/bin/activate
```
After that, install the required extensions
```
pip install dotenv
pip install load_dotenv
pip install adafruit-circuitpython-dht
pip install pymysql
```

If you want to run the website on its own, you should setup a systemd service for _temperatureCheckingScript.py_ and _deletingOldDays.py_ . 
In my case, these services can be found under ```etc/systemd/system```. Make a file named **_name_.service**.

Here is an example for a .service file you could use:
```
[Unit]
Description=Service for my temperature checking script

[Service]
User= your_choice
ExecStart=path_to_venv/bin/python path_to_directory/temperatureCheckingScript.py
Restart=always

[Install]
WantedBy=multi-user.target
```
sudo chmod 644 temperature.service 
Update your daemon, enable and start your service with:
```
sudo systemctl daemon-reload
sudo systemctl enable name.service
sudo systemctl start name.service
```