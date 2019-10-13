// Protcol is case sensitive.
// This is not finished, the PlayerTale is still needing to be used here. See .ino file. 
#include "LaserTag.h"

  LaserTag::LaserTag(){
    this->flow=0;
    }
   String LaserTag::JoinTeam(String IPaddress, int team){
    this->flow = 1
    return "PLAYERTEAM"+IPaddress+" "+team;
  }
  void LaserTag::transmitJoinTeam(String response){
  if (response.subsr(0,2)=="200"){
    // Ok, waiting for team list
  }
  else if (response.substr(0,2)=="501"){
    // Error (Ex. Same IP as one another would be a problem)
  }
 }

  
 }

 
  void LaserTag::checkHit(String IPaddress, int totalHitsPlayer){
  this->flow = 2;
  return "PLAYERHIT"+IPaddress+" "+totalHitsPlayer; 
 }
  void LaserTag::transmitcheckHit(String response){
   if (response.subsr(0,2)=="200"){
    // Ok, waiting for list of people hit.
  }
  else if (response.substr(0,2)=="501"){
    // Error 
  }
 }

  }

  
  void LaserTag::scoreSync(int team, int totalHits ){
  this->flow = 3;
  return "TEAM"+totalHits; //list of the #of times all players hit??? for each team
  
}
 void LaserTag::transmitscoreSync(String response){
   if (response.subsr(0,2)=="200"){
    // Ok, waiting for list of people hit
  }
  else if (response.substr(0,2)=="501"){
    // Error
  }
}
//Handle responses for all above in one entry.
  void LaserTag::evaluateResponse(String response){
     if (this->flow==0) {
        int cpos = response.indexOf (' ');
        String command = response.substring(0,cpos);
        // Protcol is case sensitive
        if (command =="PLAYERTEAM")[
        
     }

      if (this->flow==1) {
    this.transmitJoinTeam(response);
    return;
      }
      else if (this->flow==2) {
      this.transmitcheckHit(response);
      return;
        }
  else if (this->flow==3) {
      this.transmitscoreSync(response);
      return;
    }
  } 


 
