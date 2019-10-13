/*Define pins for LEDs, Button, and ldrs (photoresistors)*/
/*All Serial Reads are for tesing purposes.*/
const int ledPin = 13;
const int ledPin2 = 12;
const int ledPin3 = 11;
const int ledPin4 = 10;
const int ledPin5 = 9;

const int ledPin6 = 25;
const int ledPin7 = 27;
const int ledPin8 = 29;
const int ledPin9 = 31;
const int ledPin10 =33;
/*turns digital pin on Arduino to a 5V pin.*/
const int voltagePin = 50;
const int buttonPin = 2;
/*Define button state to be used later*/
int state;


const int ldrPinG = A0;
const int ldrPinW = A8;

void setup() {

Serial.begin(9600);
/*Button power,state,ouput*/
pinMode(voltagePin, OUTPUT);
digitalWrite(voltagePin, HIGH);
pinMode(buttonPin, INPUT);
 state = 1;
/*LED OUTPUT (Green and White but had to remove white)(Left in all pins to add in white LEDs agian at a later date)*/
pinMode(ledPin, OUTPUT);
pinMode(ledPin2, OUTPUT);
pinMode(ledPin3, OUTPUT);
pinMode(ledPin4, OUTPUT);
pinMode(ledPin5, OUTPUT);
/*(INPUT for Green and White combo LEDs, reads photoresitor level and responds*/
pinMode(ldrPinG, INPUT);
/*OUTPUT for White only LEDs*/
pinMode(ledPin6, OUTPUT);
pinMode(ledPin7, OUTPUT);
pinMode(ledPin8, OUTPUT);
pinMode(ledPin9, OUTPUT);
pinMode(ledPin10, OUTPUT);
/*(INPUT for White LEDs, reads photoresitor level and responds*/
pinMode(ldrPinW, INPUT);

}

void loop() {
/*Button has three states,(all off, Photoresistor & potentiometer controled, and all on). When button is pushed there is a delay and goes to the next state.*/
int buttonPush = digitalRead(buttonPin);
  if (buttonPush == HIGH){
    /*Mod for 3 States*/
    state = ((state+1)%3);
    /*Delay for button in milliseconds*/
    delay(2000);
    Serial.println(state);
  }
/*Reading Photoresistor for Green and White Combo. Photoresitors are analog reads.*/
int ldrstateG = analogRead(ldrPinG);
/*The number conrols the level of light or darkness for the photoresitor to trip on the LEDs, it is also conroled by the potentiometer in this project.*/
if ((ldrstateG <=500 && state==1) || state==2) {
/*LEDS ON*/
digitalWrite(ledPin, HIGH);
digitalWrite(ledPin2, HIGH);
digitalWrite(ledPin3, HIGH);
digitalWrite(ledPin4, HIGH);
digitalWrite(ledPin5, HIGH);

/*For testing.*/
Serial.println("LDR is DARK, LED is ON");

}

else {
/*LEDS OFF*/
digitalWrite(ledPin, LOW);
digitalWrite(ledPin2, LOW);
digitalWrite(ledPin3, LOW);
digitalWrite(ledPin4, LOW);
digitalWrite(ledPin5, LOW);
Serial.println("---------------");
}
/*Reading Photoresistor for White. Photoresitors are analog reads.*/
int ldrstateW = analogRead(ldrPinW);
/*The number conrols the level of light or darkness for the photoresitor to trip on the LEDs, it is also conroled by the potentiometer in this project.*/
if ((ldrstateW <=500 && state==1) || state==2) {
/*LEDS ON*/
digitalWrite(ledPin6, HIGH);
digitalWrite(ledPin7, HIGH);
digitalWrite(ledPin8, HIGH);
digitalWrite(ledPin9, HIGH);
digitalWrite(ledPin10, HIGH);

}else{
 /*LEDS OFF*/
digitalWrite(ledPin6, LOW);
digitalWrite(ledPin7, LOW);
digitalWrite(ledPin8, LOW);
digitalWrite(ledPin9, LOW);
digitalWrite(ledPin10, LOW);
Serial.println("---------------");

}

}
