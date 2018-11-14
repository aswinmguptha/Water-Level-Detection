#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

#define echo 13
#define trig 15
const char* ssid     = "SSID";
const char* password = "Password";

int wifiStatus;

void setup(){
  Serial.begin(115200);
  delay(200);
  pinMode(echo, INPUT);
  pinMode(trig, OUTPUT);
  digitalWrite(echo, HIGH);
  Serial.print("Your are connecting;");
  Serial.println(ssid);
      
  WiFi.begin(ssid, password);
      
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
}

void sendreading(int distance)
{
   wifiStatus = WiFi.status();

      if(wifiStatus == WL_CONNECTED){

         HTTPClient http;
         Serial.println("Sensor value to be sent");
         Serial.println(distance);
         Serial.println("Your are now connected!");  
         String ip = "<IP>";

         String d = String(distance);
         http.begin("http://" + ip + "/recieve.php?distance=" + d);
         int httpCode = http.GET();
         if(httpCode > 0)
         {
          Serial.println("[HTTP] GET... code: \n");
         }
         else{ 
          Serial.println("[HTTP] GET... failed, error: \n");
         }
        http.end();
      }
      else{
        Serial.println("");
        Serial.println("WiFi not connected");
      }
      delay(1000);
} 

void loop(){
  digitalWrite(trig, LOW); 
  delayMicroseconds(2);
  digitalWrite(trig, HIGH); 
  delayMicroseconds(10);
  digitalWrite(trig, LOW); 
  int distance = pulseIn(echo, HIGH,26000); 
  distance= (distance / 58) + 5;
  Serial.print(distance);
  Serial.println("   cm");                    
  sendreading(distance);
  delay(50);
}
