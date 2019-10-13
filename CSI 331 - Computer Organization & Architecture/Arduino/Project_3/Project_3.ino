// Example code: https://create.arduino.cc/projecthub/Noshirt/arduino-keyboard-faea5d?ref=tag&ref_id=music&offset=12
/*I want the LED Matrix to display the letter of the note that was pressed but I do not have the correct wiring or understanding of the wiring & code
Thus it does not work yet, also the e note will not work and I cannot fiure out why as of the moment.*/
#include <LedControl.h>
LedControl lc=LedControl(13,12,11);
//#include <hcsr04.h> // I do not remember what this is or what it does
#include "pitches.h" //Notes are stored into this library
// pins for notes
int C = 3; //First button on pin 3
int D = 4; //Second button on pin 4
int E = 5; //Third button on pin 5
int F = 6; //Fourth button on pin 6
int G = 7; //Fifth button on pin 7
int A = 8; //Sixth button on pin 8
int B = 9; //Seventh button on pin 9
// gets note from pitches.h library
int c[] = {N_C5}; //Plays C Note
int d[] = {N_D5}; //Plays D Note
int e[] = {N_E5}; //Plays E Note
int f[] = {N_F5}; //Plays F Note
int g[] = {N_G5}; //Plays G Note
int a[] = {N_A5}; //Plays A Note
int b[] = {N_B5}; //Plays B Note

int duration(500); //Every note lasts 500 milliseconds. 

void setup() {
  //Set every button as an INPUT_PULLUP
  pinMode(C, INPUT_PULLUP);
  pinMode(D, INPUT_PULLUP);
  pinMode(E, INPUT_PULLUP);
  pinMode(F, INPUT_PULLUP);
  pinMode(G, INPUT_PULLUP);
  pinMode(A, INPUT_PULLUP);
  pinMode(B, INPUT_PULLUP);

    /*
   The MAX72XX is in power-saving mode on startup,
   we have to do a wakeup call
   */
  lc.shutdown(0,false);
  /* Set the brightness to a medium values */
  lc.setIntensity(0,8);
  /* and clear the display */
  lc.clearDisplay(0);

}
/*I am not enirely sure of what or how I need this? */
void writeNotesOnMatrix() {
/* generates the cells to light up specifically...?*/
/*  const byte rows[] = {
    ROW_1, ROW_2, ROW_3, ROW_4, ROW_5, ROW_6, ROW_7, ROW_8
};
const byte col[] = {
  COL_1,COL_2, COL_3, COL_4, COL_5, COL_6, COL_7, COL_8
};
*/
  /* Here is the data for the characters */
byte A[8] = {B00000000,B00011000,B00100100,B00100100,B00111100,B00100100,B00100100,B00000000};
byte B[8] = {B01111000,B01001000,B01001000,B01110000,B01001000,B01000100,B01000100,B01111100};
byte C[8] = {B00000000,B00011110,B00100000,B01000000,B01000000,B01000000,B00100000,B00011110};
byte D[8] = {B00000000,B00111000,B00100100,B00100010,B00100010,B00100100,B00111000,B00000000};
byte E[8] = {B00000000,B00111100,B00100000,B00111000,B00100000,B00100000,B00111100,B00000000};
byte F[8] = {B00000000,B00111100,B00100000,B00111000,B00100000,B00100000,B00100000,B00000000};
byte G[8] = {B00000000,B00111110,B00100000,B00100000,B00101110,B00100010,B00111110,B00000000};
}

void loop() {
  if (digitalRead(C) == LOW) { //Reads button state when pressed
    for (int Note = 0; Note < 1; Note++) {
      tone(2, c[Note], duration); //Plays note on pin 6, where the Buzzer is connected (change it if you connected it on another pin)
    }
    //Not sure if this goes here to work the LED once the buton is pressed?
    lc.setRow(0,0,c[0]);
    lc.setRow(0,1,c[1]);
    lc.setRow(0,2,c[2]);
    lc.setRow(0,3,c[3]);
    lc.setRow(0,4,c[4]);
  }
  if (digitalRead(D) == LOW) {
    for (int Note = 0; Note < 1; Note++) {
      tone(2, d[Note], duration); 
    }
    lc.setRow(0,0,d[0]);
    lc.setRow(0,1,d[1]);
    lc.setRow(0,2,d[2]);
    lc.setRow(0,3,d[3]);
    lc.setRow(0,4,d[4]);
  }
  if (digitalRead(E) == LOW) {
    for (int Note = 0; Note < 1; Note++) {
      tone(2, e[Note], duration);
    }
    lc.setRow(0,0,e[0]);
    lc.setRow(0,1,e[1]);
    lc.setRow(0,2,e[2]);
    lc.setRow(0,3,e[3]);
    lc.setRow(0,4,e[4]);
  }
  if (digitalRead(F) == LOW) {
    for (int Note = 0; Note < 1; Note++) {
      tone(2, f[Note], duration);
    }
   lc.setRow(0,0,f[0]);
   lc.setRow(0,1,f[1]);
   lc.setRow(0,2,f[2]);
   lc.setRow(0,3,f[3]);
   lc.setRow(0,4,f[4]);
  }
  if (digitalRead(G) == LOW) {
    for (int Note = 0; Note < 1; Note++) {
      tone(2, g[Note], duration);
    }
  lc.setRow(0,0,g[0]);
  lc.setRow(0,1,g[1]);
  lc.setRow(0,2,g[2]);
  lc.setRow(0,3,g[3]);
  lc.setRow(0,4,g[4]);
  }
  if (digitalRead(A) == LOW) {
    for (int Note = 0; Note < 1; Note++) {
      tone(2, a[Note], duration);
    }
  lc.setRow(0,0,a[0]);
  lc.setRow(0,1,a[1]);
  lc.setRow(0,2,a[2]);
  lc.setRow(0,3,a[3]);
  lc.setRow(0,4,a[4]);
  }
  if (digitalRead(B) == LOW) {
    for (int Note = 0; Note < 1; Note++) {
      tone(2, b[Note], duration);
    }
  lc.setRow(0,0,b[0]);
  lc.setRow(0,1,b[1]);
  lc.setRow(0,2,b[2]);
  lc.setRow(0,3,b[3]);
  lc.setRow(0,4,b[4]);
  }
}
