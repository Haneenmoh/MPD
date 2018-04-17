#include <SoftwareSerial.h>


int sensor_pin=A0;  // variable for sensor



String apiKey = "9Y26X2VOKTMU98F5";
SoftwareSerial ser(2,3); // RX, TX



void setup() { 
  Serial.begin(9600); 
  ser.begin(115200);
// ser.println("AT+RST");
  
}


void loop() {
  
  Read_Sensor();
  GSM_Shield();
}

void Read_Sensor()
{

  
}
void GSM_Shield()
{

 
  Serial.println(sensor_pin);
   

  String cmd = "AT+CIPSTART=\"TCP\",\"";
  cmd += "184.106.153.149"; // api.thingspeak.com
  cmd += "\",80";
  ser.println(cmd);
  
  if(ser.find("Error")){
    Serial.println("AT+CIPSTART error");
    return;
  }
  
  // prepare GET string
  String getStr = "GET /update?api_key=";
  getStr += apiKey;
  getStr +="&field1=";
  getStr += String(sensor_pin);
  getStr += "\r\n\r\n";

  // send data length
  cmd = "AT+CIPSEND=";
  cmd += String(getStr.length());
  ser.println(cmd);



  if(ser.find(">")){
    ser.print(getStr);
  }
  else{
    ser.println("AT+CIPCLOSE");
    // alert user
    Serial.println("AT+CIPCLOSE");
  }
    
  // thingspeak needs 15 sec delay between updates
  delay(15000);  
}


