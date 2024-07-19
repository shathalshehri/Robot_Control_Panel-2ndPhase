#include <WiFi.h>
#include <HTTPClient.h>

// Replace with your network credentials
const char* ssid = "your_SSID";
const char* pass = "your_PASSWORD";

// URL of the PHP script on your server
const String url = "http://your_server_ip/your_path/retrieve.php";

void setup() {
  // Start the serial communication
  Serial.begin(115200);
  
  // Set GPIO 25 as an output pin for the LED
  pinMode(25, OUTPUT); 
  
  // Attempt to connect to the WiFi network
  WiFi.begin(ssid, pass);
  
  int maxRetries = 20;
  // Wait for the WiFi connection to be established, retrying up to maxRetries times
  while (WiFi.status() != WL_CONNECTED && maxRetries-- > 0) {
    delay(500);
    Serial.print(".");
  }

  // Check if the WiFi connection was successful
  if (WiFi.status() == WL_CONNECTED) {
    Serial.println("\nWiFi Connected!");
    Serial.print("IP Address: ");
    Serial.println(WiFi.localIP());
  } else {
    Serial.println("\nFailed to connect to WiFi.");
  }
}

void loop() {
  // Check if the WiFi is still connected
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(url);
    
    // Send HTTP GET request to the server
    int httpResponCode = http.GET();
    
    // Check if the HTTP request was successful
    if (httpResponCode > 0) {
      Serial.print("HTTP Response Code: ");
      Serial.println(httpResponCode);
      
      // Get the response payload from the server
      String payload = http.getString();
      payload.trim();  // Remove any leading or trailing whitespace
      Serial.print("Payload: ");
      Serial.println(payload);

      // Control the LED based on the payload
      if (payload == "F") {
        digitalWrite(25, HIGH);  // Turn the LED on
        Serial.println("LED ON");
      } else {
        digitalWrite(25, LOW);  // Turn the LED off
        Serial.println("LED OFF");
      }
    } else {
      Serial.print("Error: ");
      Serial.println(httpResponCode);
    }

    http.end();  // Close the HTTP connection
  } else {
    Serial.println("WiFi not connected");
  }

  delay(1000);  // Wait for 1 second before sending the next request
}
