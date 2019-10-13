//Objectives:communicating which team you are on, communicating when you've been hit, and synchronizing scores.
#include "LaserTag.h"

// Assign static IP address as String variable.
String IPaddress;

//Assign teams based on a pin state. Team 1 are all whose pin state is Low and Team 2 are all whose pin state is High.
int team;

// Variable for the libarry I am creating.
LaserTag LB = new LaserTag ();

// Buffer to find.
String buffer;

// Number of times player has been hit
int toatalHitsPlayer;

// For each player there are 17 bytes of memory needed/saved.
byte* playerTable;
typedef struct {
  String IPaddress;
  int team;
  int score;
} playerInfo;
playerInfo* playerTable;
in lastPlayer;
void setup() {
  //Hard coded the IP address so that Arduino is not picing or being assigned one. Everyone who is connected will need to hard code there own specific IP.
IPaddress = "192.168.200.1";
//Pin that the state determines which team they are on. 
team = digitalRead(53);
//Pin that is controlled by the Photocell and will count the High states as hits.
hit = digitalRead(A15);
totalHitsPlayer = 0;
playerTable = malloc(512);
playerTable[0].IPaddress = IPaddress;
playerTable[0].team = team;
playerTable[0].score = totalHitsPlayer;
lastPlayer = 0;
Serial.begin(9600);
Serial.print(LB.transmitJoinTeam(IPaddress,team));
}



void loop() {
  //I do not remember what this is for, but it seems to be important, possibly flow/loop control.
char c = Serial.read();
  if(c==10){
   LB.evaluateResponse(buffer); 
  } else if(c>=32) buffer += c;
  
//checks to see if hit, if yes then stops photocell and moves on to next layer, if no moves on to next layer 
if(digitalRead(A15);=(HIGH);{
  totalHitsPlayer++;
 Serial.println (LB.checkHit(IPaddress, totalHitsPlayer));
}


//adds up score of opposite team if hit,then move on to communications layer

LB.scoreSync()


}

}
