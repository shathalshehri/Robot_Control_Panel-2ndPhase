# Robot Control Panel

This project contains files necessary for controlling a robot via a web interface. The project uses PHP for server-side logic, SQL for database management, and CSS for styling. The web interface is designed to send directional commands to a robot and log them into a database.

## Files Included

- `page.php`: Main web interface file for controlling the robot.
- `retrieve.php`: PHP script for handling and logging directional commands.
- `Robot.sql`: SQL file for creating the necessary database table.
- `style.css`: CSS file for styling the web interface.
- `Http_request_in_ESP32.ino`: Arduino code for setting up the ESP32 to send HTTP GET requests and control an LED based on server responses.

## Requirements

- XAMPP or any other local server environment.
- A web browser.
- Basic understanding of PHP, SQL, and CSS.
- Arduino IDE.

## Setup Instructions

### Setting Up the Local Server

1. Download and install [XAMPP](https://www.apachefriends.org/index.html).
2. Start Apache and MySQL from the XAMPP control panel.

### Database Setup

1. Open phpMyAdmin by visiting `http://localhost/phpmyadmin`.
2. Create a new database named `Robot`.
3. Import the `Robot.sql` file into the `Robot` database.

### Project Files

1. Place the `RobotProj` folder inside the `htdocs` directory of your XAMPP installation.
2. The directory structure should look like this:
   
```plaintext
xampp/
└── htdocs/
    └── RobotProj/
        ├── page.php
        ├── retrieve.php
        ├── Robot.sql
        ├── style.css
        └── favicon.png

```

### Accessing the Web Interface

1. Open your web browser and navigate to `http://localhost/RobotProj/page.php`.

You can see how the interface appears when accessed from a web browser in the screenshot below:
    ![Web Interface](https://github.com/shathalshehri/Robot_Control_Panel-2ndPhase/raw/main/RobotMovementController-DesktopInterface.png)

### Setting Up the ESP32 with Arduino IDE

1. **Install the Arduino IDE:**
- Download and install the [Arduino IDE](https://www.arduino.cc/en/software).

2. **Install ESP32 Board Package:**
- Open the Arduino IDE.
- Go to `File > Preferences`.
- In the `Additional Board Manager URLs` field, add the following URL: `https://raw.githubusercontent.com/espressif/arduino-esp32/gh-pages/package_esp32_index.json`.
- Go to `Tools > Board > Boards Manager`.
- Search for `ESP32` and install the `esp32` package.

3. **Set Up ESP32 Board:**
- Connect your WEMOS D1 mini ESP32 to your computer.
- In the Arduino IDE, go to `Tools > Board` and select `ESP32 WEMOS D1 MINI`.
- Go to `Tools > Port` and select the port that corresponds to your ESP32 board.
- Set the `Upload Speed` to `115200` (this is often the default and works well for most setups).
  
4. **Creating and Uploading the Code:**

    1. **Create a New File**: In the Arduino IDE, create a file named `Http_request_in_ESP32.ino`.

    2. **Code Overview**:
        - **Includes Required Libraries**: `WiFi.h` and `HTTPClient.h`.
        - **Connects to WiFi**: Uses provided SSID and password.
        - **Sends HTTP Requests**: Periodically sends GET requests to the specified URL.
        - **Controls LED**: Turns the LED on GPIO 25 based on the server's response ("F" turns it on, otherwise off).

    3. **Replace Placeholders**:
        - Update `your_SSID` and `your_PASSWORD` with your WiFi credentials.
        - Replace `your_server_ip` and `your_path` with your server’s IP address and path to the `retrieve.php` file.

    4. **Connect and Upload**:
        - Connect an LED to GPIO 25 on the ESP32.
        - Upload the code to the ESP32.

    For the complete code, refer to the [`Http_request_in_ESP32.ino`](https://github.com/shathalshehri/Robot_Control_Panel-2ndPhase/blob/main/Http_request_in_ESP32.ino) file.



## Hardware Requirements

- **WEMOS D1 mini ESP32**
- **LED**
- **Wires**
- **Breadboard**

### Usage

- Use the web interface to control the robot by sending directional commands.
- The commands will be logged into the `remote` table in the `Robot` database.
- The ESP32 will send HTTP GET requests to the server and control the LED based on the response.

### Additional Information

- **page.php:** Contains the HTML and PHP code for the main interface. It uses `style.css` for styling.
- **retrieve.php:** Handles the AJAX requests sent by `page.php` to log commands into the database.
- **Robot.sql:** Creates the `remote` table in the `Robot` database with fields for storing command data.
- **style.css:** Provides basic styling for the web interface.
- **Http_request_in_ESP32.ino:** Connects the ESP32 to WiFi, sends HTTP GET requests to the server, and controls an LED based on the server's response. 
- To obtain the IP address of your server on macOS, use the command:
```sh
ipconfig getifaddr en0
```

## Demonstrations

- **Forward Button Interaction**: Watch the GIF below to see how pressing the `F` button on the web interface triggers the transition from `page.php` to `retrieve.php`:

    ![Forward Button Interaction](https://github.com/shathalshehri/Robot_Control_Panel-2ndPhase/raw/main/1-Clicking-the-ForwardButton.gif)

- **LED Activation**: Watch the GIF below to see the LED's response when the Right button is clicked, which demonstrates the LED turning off:

    ![LED Activation](https://github.com/shathalshehri/Robot_Control_Panel-2ndPhase/raw/main/2-AfterClickingF.gif)

- **Effect of Other Buttons**: Watch the GIF below to see the effect of clicking the `Stop`, `Left`, `Right`, and `Backward` buttons on the web interface, all of which turn the LED off:

    ![Other Buttons Effect](https://github.com/shathalshehri/Robot_Control_Panel-2ndPhase/raw/main/3-AnyOtherButtons.gif)

- **Serial Monitor Output and Database Update**: Watch the GIF below to see the output on the serial monitor when clicking the `Stop` button and the database update reflecting 'S' added to the table:

    ![Serial Monitor and Database Update](https://github.com/shathalshehri/Robot_Control_Panel-2ndPhase/raw/main/4-SerialMonitorOP-DB.gif)

- **Clicking Any Other Button Result**: Watch the GIF below to see the result of clicking the `Right` button, which turns the LED off:

    ![Clicking Any Other Button Result](https://github.com/shathalshehri/Robot_Control_Panel-2ndPhase/raw/main/5-ClickingAnyOtherButtonResult.gif)
