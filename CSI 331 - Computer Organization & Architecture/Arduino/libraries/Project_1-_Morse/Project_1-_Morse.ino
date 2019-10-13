/*
  Blink

  Turns an LED on for one second, then off for one second, repeatedly.

  Most Arduinos have an on-board LED you can control. On the UNO, MEGA and ZERO
  it is attached to digital pin 13, on MKR1000 on pin 6. LED_BUILTIN is set to
  the correct LED pin independent of which board is used.
  If you want to know what pin the on-board LED is connected to on your Arduino
  model, check the Technical Specs of your board at:
  https://www.arduino.cc/en/Main/Products

  modified 8 May 2014
  by Scott Fitzgerald
  modified 2 Sep 2016
  by Arturo Guadalupi
  modified 8 Sep 2016
  by Colby Newman

  This example code is in the public domain.

  http://www.arduino.cc/en/Tutorial/Blink
*/
int pauseLength;

void playDot(){
  //a dot is on 1 count, and off for 1 count
  digitalWrite(LED_BUILTIN, HIGH);   // turn the LED on (HIGH is the voltage level)
  delay(pauseLength);                      
  digitalWrite(LED_BUILTIN, LOW);    // turn the LED off by making the voltage LOW
  delay(pauseLength);                       
  
}
void playDash(){
  //a dot is on 3 count, and off for 1 count generating a dash
  digitalWrite(LED_BUILTIN, HIGH);   // turn the LED on (HIGH is the voltage level)
  delay(3*pauseLength);                      
  digitalWrite(LED_BUILTIN, LOW);    // turn the LED off by making the voltage LOW
  delay(3*pauseLength);  
  
}
void playZero(){
  //Long tone zero is on 7 count, and off for 1 count
  digitalWrite(LED_BUILTIN, HIGH);   // turn the LED on (HIGH is the voltage level)
  delay(7*pauseLength);                      
  digitalWrite(LED_BUILTIN, LOW);    // turn the LED off by making the voltage LOW
  delay(7*pauseLength);  
  
}
void playSpace(){
  //a dot is on 3 count, and off for 1 count
  digitalWrite(LED_BUILTIN, HIGH);   // turn the LED on (HIGH is the voltage level)
  delay(3*pauseLength);                      
  digitalWrite(LED_BUILTIN, LOW);    // turn the LED off by making the voltage LOW
  delay(3*pauseLength);  
  
}
void playMorse(char* morse, int len){
  for (int tptr=0; tptr<len; tptr++) {
    char letter = morse[tptr];
    if(letter =='.') playDot();
    if(letter =='-') playDash();
    if(letter ==' ') playSpace();
    if(letter =='0') playZero();
    
    
  }
  
}
char* convertTextToMorse(char* text, int len){
  char* rtn;// return value
  int rptr = 0;//offset for memory
  rtn = malloc(6*len);//give enough memory for each letter
  for (int tptr=0; tptr<len; tptr++){//start count at 0, as long as tptr is less than len continue, add by one to tptr
    char letter = text[tptr];
    if (toupper(letter)=='A'){rtn[rptr]=".-"; rptr+=2;} 
    if (toupper(letter)=='B'){rtn[rptr]="-..."; rptr+=4;} 
    if (toupper(letter)=='C'){rtn[rptr]="-.-."; rptr+=4;}
    if (toupper(letter)=='D'){rtn[rptr]="-.."; rptr+=3;} 
    if (toupper(letter)=='E'){rtn[rptr]="."; rptr+=1;} 
    if (toupper(letter)=='F'){rtn[rptr]="..-."; rptr+=4;}
    if (toupper(letter)=='G'){rtn[rptr]="--."; rptr+=3;}
    if (toupper(letter)=='H'){rtn[rptr]="...."; rptr+=4;}
    if (toupper(letter)=='I'){rtn[rptr]=".."; rptr+=2;}
    if (toupper(letter)=='J'){rtn[rptr]=".---"; rptr+=4;}
    if (toupper(letter)=='K'){rtn[rptr]="-.-"; rptr+=3;} 
    if (toupper(letter)=='L'){rtn[rptr]=".-.."; rptr+=4;} 
    if (toupper(letter)=='M'){rtn[rptr]="--"; rptr+=2;}  
    if (toupper(letter)=='N'){rtn[rptr]="-."; rptr+=2;}
    if (toupper(letter)=='O'){rtn[rptr]="---"; rptr+=3;}
    if (toupper(letter)=='P'){rtn[rptr]=".--."; rptr+=4;}       
    if (toupper(letter)=='S'){rtn[rptr]="..."; rptr+=3;} //Single quote is used for one character, double for strings
   
    if (toupper(letter)=='5'){rtn[rptr]="....."; rptr+=5;} 
    if (toupper(letter)=='\''){rtn[rptr]=".----."; rptr+=6;} 
    if (toupper(letter)==' '){rtn[rptr]=" "; rptr++;} //space
  }
  rtn[rptr]=0;
  return rtn;
   
}
// the setup function runs once when you press reset or power the board
void setup() {
  pauseLength = 100;
  // initialize digital pin LED_BUILTIN as an output.
  pinMode(LED_BUILTIN, OUTPUT);
  char* text;
  text ="SOS";
  char* morse;
  morse= convertTextToMorse(text,strlen(text));
  playMorse(morse,strlen(morse));
  
}

// the loop function runs over and over again forever
void loop() {
  
}
