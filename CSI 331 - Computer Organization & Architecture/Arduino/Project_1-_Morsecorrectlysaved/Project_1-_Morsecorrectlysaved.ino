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
void playMorse(String morse, int len){
  for (int tptr=0; tptr<len; tptr++) {
    char letter = morse[tptr];
    if(letter =='.') playDot();
    if(letter =='-') playDash();
    if(letter ==' ') playSpace();
    if(letter =='0') playZero();
    delay(2*pauseLength);// Pause between characters? (not sure this works)
    
  }
  
}
String convertTextToMorse(String text, int len){
 String rtn ="";// return value
  int rptr = 0;
  for (int tptr=0; tptr<len; tptr++){//start count at 0, as long as tptr is less than len continue, add by one to tptr
    char letter = text[tptr];
    if (toupper(letter)=='A'){rtn+=".-"; rptr+=2;} 
    if (toupper(letter)=='B'){rtn+="-..."; rptr+=4;} 
    if (toupper(letter)=='C'){rtn+="-.-."; rptr+=4;}
    if (toupper(letter)=='D'){rtn+="-.."; rptr+=3;} 
    if (toupper(letter)=='E'){rtn+="."; rptr+=1;} 
    if (toupper(letter)=='F'){rtn+="..-."; rptr+=4;}
    if (toupper(letter)=='G'){rtn+="--."; rptr+=3;}
    if (toupper(letter)=='H'){rtn+="...."; rptr+=4;}
    if (toupper(letter)=='I'){rtn+=".."; rptr+=2;}
    if (toupper(letter)=='J'){rtn+=".---"; rptr+=4;}
    if (toupper(letter)=='K'){rtn+="-.-"; rptr+=3;} 
    if (toupper(letter)=='L'){rtn+=".-.."; rptr+=4;} 
    if (toupper(letter)=='M'){rtn+="--"; rptr+=2;}  
    if (toupper(letter)=='N'){rtn+="-."; rptr+=2;}
    if (toupper(letter)=='O'){rtn+="---"; rptr+=3;}
    if (toupper(letter)=='P'){rtn+=".--."; rptr+=4;} 
    if (toupper(letter)=='Q'){rtn+="--.-"; rptr+=4;} 
    if (toupper(letter)=='R'){rtn+="-.-"; rptr+=3;}    
    if (toupper(letter)=='S'){rtn+="..."; rptr+=3;} //Single quote is used for one character, double for strings
    if (toupper(letter)=='T'){rtn+="-"; rptr+=1;}
    if (toupper(letter)=='U'){rtn+="..-"; rptr+=3;}
    if (toupper(letter)=='V'){rtn+="...-"; rptr+=4;}
    if (toupper(letter)=='W'){rtn+=".--"; rptr+=3;}
    if (toupper(letter)=='X'){rtn+="-..-"; rptr+=4;}
    if (toupper(letter)=='Y'){rtn+="-.--"; rptr+=4;}
    if (toupper(letter)=='Z'){rtn+="--.."; rptr+=4;}

   // if (toupper(letter)=='0'){rtn+="-----"; rptr+=5;}We have playZero for this.
    if (toupper(letter)=='1'){rtn+=".----"; rptr+=5;}
    if (toupper(letter)=='2'){rtn+="..---"; rptr+=5;}
    if (toupper(letter)=='3'){rtn+="...--"; rptr+=5;}
    if (toupper(letter)=='4'){rtn+="....-"; rptr+=5;}
    if (toupper(letter)=='5'){rtn+="....."; rptr+=5;}
    if (toupper(letter)=='6'){rtn+="-...."; rptr+=5;}
    if (toupper(letter)=='7'){rtn+="--..."; rptr+=5;}
    if (toupper(letter)=='8'){rtn+="---.."; rptr+=5;}
    if (toupper(letter)=='9'){rtn+="----."; rptr+=5;}

    if (toupper(letter)=='.'){rtn+=".-.-.-"; rptr+=6;}
    if (toupper(letter)==','){rtn+="--..--"; rptr+=6;}
    if (toupper(letter)=='?'){rtn+="..--.."; rptr+=6;}
    if (toupper(letter)=='!'){rtn+="-.-.--"; rptr+=6;}
    if (toupper(letter)=='"'){rtn+=".-..-."; rptr+=6;}
    if (toupper(letter)=='('){rtn+="-.--."; rptr+=6;}
    if (toupper(letter)==')'){rtn+="-.--.-"; rptr+=6;}
    if (toupper(letter)=='&'){rtn+=".-..."; rptr+=5;}
    if (toupper(letter)==':'){rtn+="---..."; rptr+=6;}
    if (toupper(letter)==';'){rtn+="-.-.-."; rptr+=6;}
    if (toupper(letter)=='/'){rtn+="-..-."; rptr+=5;}
    if (toupper(letter)=='\''){rtn+=".----."; rptr+=6;}
    if (toupper(letter)=='_'){rtn+="..--.-"; rptr+=6;}
    if (toupper(letter)=='='){rtn+="-...-"; rptr+=5;}
    if (toupper(letter)=='+'){rtn+=".-.-."; rptr+=5;}
    if (toupper(letter)=='-'){rtn+="-....-"; rptr+=6;}
    if (toupper(letter)=='$'){rtn+="...-..-"; rptr+=7;}
    if (toupper(letter)=='@'){rtn+=".--.-."; rptr+=6;} 
    if (toupper(letter)==' '){rtn+=" "; rptr++;} //space
  }
  //rtn[rptr]=0;
  return rtn;
   
}
// the setup function runs once when you press reset or power the board
void setup() {
  pauseLength = 200;
  // initialize digital pin LED_BUILTIN as an output.
  pinMode(LED_BUILTIN, OUTPUT);
  digitalWrite(LED_BUILTIN, LOW);
  Serial.begin(9600);
  delay(2000);
  String text;
  text ="Hello World !";
 String morse;
  morse = convertTextToMorse(text,text.length());
  Serial.print(morse);
  playMorse(morse,morse.length());
}
// the loop function runs over and over again forever
void loop() {
  
}
