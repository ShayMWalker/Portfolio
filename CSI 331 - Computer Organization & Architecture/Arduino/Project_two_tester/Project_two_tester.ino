#include <LiquidCrystal.h>
#include <SimpleDHT.h>
const byte buttonPin = 3;
int dhtPin =5; //temp and humidity sensor
int buttonPushCounter = 0;   // counter for the number of button presses
boolean buttonState = LOW;         // current state of the button
boolean lastButtonState = LOW;     // previous state of the button

// lcd constructor made global in scope so the whole program can sse it
LiquidCrystal lcd(7,8,9,10,11,12);
SimpleDHT11 dht11(dhtPin);
void setup()
{
  Serial.begin(9600);
  lcd.begin(16, 2);
  // Print a message to the LCD.
  //lcd.print("Hello All");
  // initialize the pushbutton pin as an input:
  pinMode(buttonPin, INPUT);
  
}


void loop(){
    delay(500);
  byte temperature = 0;
  byte humidity = 0;
  byte data[40] = {0};
  int err = SimpleDHTErrSuccess;
  if ((err = dht11.read(&temperature, &humidity, data)) != SimpleDHTErrSuccess) {
    Serial.print("Read DHT11 failed, err="); Serial.println(err);delay(1000);
    return;
  }
  // read the pushbutton input pin:
  buttonState = digitalRead(buttonPin);
  // compare the buttonState to its previous state
  if (buttonState != lastButtonState)
  {
    if (buttonState == HIGH)
    {
      // if the current state is HIGH then the button
      // went from off to on:
      buttonPushCounter++;  // add one to counter
      lcd.clear();  
      if (buttonPushCounter > 4) // if couter over 3 reset the counter to 1 to show "Jon"
                                 // and not "Hello All"
      {
        buttonPushCounter = 1;
      }
      Serial.println(buttonPushCounter);
      switch (buttonPushCounter) // choose what to display based on buttonPushCounter value
      {
        case 0:
          lcd.print("Hello All"); // show "Hello All until first button press
          break;
        case 1:
            lcd.setCursor(0,0); // Sets the location at which subsequent text written to the LCD will be displayed
            lcd.print("Temp.: "); // Prints string "Temp." on the LCD
            lcd.print(temperature); // Prints the temperature value from the sensor
            lcd.print(" C");
          break;
        case 2:
           lcd.print("Temp.: "); // Prints string "Temp." on the LCD
           lcd.print((float)round(1.8*temperature+32));
           lcd.println(" F");
          break;
        case 3:
            lcd.print("Humi.: ");
            lcd.print(humidity);
            lcd.print(" %");
          break;
        case 4:
            lcd.print("Sample RAW Bits: ");
            for (int i = 0; i < 40; i++) {
              lcd.print((int)data[i]);
               if (i > 0 && ((i + 1) % 4) == 0) {
                 lcd.print(' ');
          break;
      }
    }
    // save the current state as the last state,
    //for next time through the loop
    lastButtonState = buttonState;
      }
    }
  }
}
