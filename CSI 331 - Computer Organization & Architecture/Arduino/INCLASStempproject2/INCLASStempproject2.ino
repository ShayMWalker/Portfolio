// This code does not currently perform due to logic errors and bugs that have not been fixed yet. So please note that this code does not print data onto the LCD screen as of yet. SHAY WALKER
// Include the DHT11 sensor library and the LCD library.
#include <SimpleDHT.h>
#include <LiquidCrystal.h>

//Initialize variables
const int rs =7, en = 8, d4 =9, d5 = 10, d6 = 11, d7 = 12;

int buttonPin = 3; //push button is in 3, used for changing values displayed
int dhtPin =5; //temp and humidity sensor

LiquidCrystal lcd(rs,en,d4,d5,d6,d7);//define lcd pins
SimpleDHT11 dht11(dhtPin);
int lastButton = 0;
int thisButton = 0;
int buttonStatus = 0;

void setup() {
  // button in pin 3
  pinMode(buttonPin,INPUT);
  // set up the LCD's number of col and rows
  lcd.begin(16,2); // How big the LDC is
  //Print a test meassage
 // lcd.print("Temp:  Humidity:");



void loop() {
  // put your main code here, to run repeatedly
  delay(500);
  byte temperature = 0;
  byte humidity = 0;
  byte data[40] = {0};
  //Reads the data from the DHT11 Sensor. I am not sure if this is a correct way of getting said data, but none of my other attempts have worked thus far. 
  int err = SimpleDHTErrSuccess;
  if ((err = dht11.read(&temperature, &humidity, data)) != SimpleDHTErrSuccess) {
    Serial.print("Read DHT11 failed, err="); Serial.println(err);delay(1000);
    return;
  }
  // I am not sure if ths is part of my logic flaw, but I wonder if thisButton and buttonStatus should be the same thing. 
  thisButton == digitalRead(buttonPin);

  if(lastButton==LOW && thisButton==HIGH){// Button modulation by 4 for 0-3.
    buttonStatus=((buttonStatus+1)%4);
  }


  if(buttonStatus==0){// The temperature reading from the sensor is displayed in degrees Celcius.
  lcd.setCursor(0,0); // Sets the location at which subsequent text written to the LCD will be displayed
  lcd.print("Temp.: "); // Prints string "Temp." on the LCD
  lcd.print(temperature); // Prints the temperature value from the sensor
  lcd.print(" C");
  }
  else if (buttonStatus==1){//The button is pushed again and the temperature reading from the sensor is modified to display in degrees Farienheight.
//Is this how to get temp in F
 lcd.print("Temp.: "); // Prints string "Temp." on the LCD
  lcd.print((float)round(1.8*temperature+32));
  lcd.println(" F");
  }
  else if (buttonStatus==2){//The button is pushed again and the humidity reading from the sensor is displayed as a percent.
  lcd.print("Humi.: ");
  lcd.print(humidity);
  lcd.print(" %");
  }
  else if (buttonStatus==3){//The button is pushed again and the Raw bits are then displayed, below is the code for it to scroll across the LCD.
    
  lcd.print("Sample RAW Bits: ");
  for (int i = 0; i < 40; i++) {
    lcd.print((int)data[i]);
      if (i > 0 && ((i + 1) % 4) == 0) {
       lcd.print(' ');
    }
  }
  // Code from: https://www.arduino.cc/en/Tutorial/LiquidCrystalScroll
  // I am not able to tell if this actually worked due to a logic flaw above, once that issue has been resolved then I will come back to testing this. 
    // scroll 40 positions (string length) to the left
  // to move it offscreen left:
  for (int positionCounter = 0; positionCounter < 40; positionCounter++) {
    // scroll one position left:
    lcd.scrollDisplayLeft();
    // wait a bit:
    delay(150);
  }
}
  lastButton=thisButton;

}
