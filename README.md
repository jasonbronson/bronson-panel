# Bronson-panel

[![Homeautomation](https://dl.dropboxusercontent.com/s/vz9h2suq4x584nc/homeautomation.jpeg)]()

Bronson-panel is a touchscreen-enabled, mobile-ready, web powered home automation control panel system. 

  - Raspberry pi 3
  - Arduino with rfm69
  - mqtt

Open source software used:
  - Rasbian OS
  - Laravel PHP Framework
  - Bootstrap
  - Fontawesome
  - Jquery
  - Backstretch JS
  - Simpleweather JS
  - Jquery Idle
  - PHP, Composer, Nginx/Apache
  

Features a slideshow on idle of screen pictures located in folder public/slideshow, automatically pulls in weather data, wind speed for your location. More to come.
 


### Installation

Bronson-panel requires PHP, Composer

Install the dependencies and start the web server. Point to public/ as primary directory for web server.

Setup Laravel requirements
```sh
$ cd where-you-downloaded-code
$ composer update
$ chmod 755 -R storage
$ chmod 755 -R bootstrap/cache/
```

Make sure you have rasbian setup and install on SD card then setup an autoscript to run chrome on boot in kiosk mode. 

Example from Rasbian
put the following into file /home/pi/scripts/start_chromium_browser
```sh
#!/bin/bash
chromium-browser --kiosk --app=$(head -n 1 /home/pi/site.txt)
```
Setup the file /home/pi/site.txt with the URL where to open project should be where webserver is located. Ideally you could setup /etc/hosts with homeautomation.dev entry to the location of the server or run it directly on the PI as well.

Option B:
Install something like fullOS
https://github.com/guysoft/FullPageOS


