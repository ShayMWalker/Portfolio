// There are missing entries here in this file, some are listed in the .cpp file and commented below. 
#include "Arduino.h"
class LaserTag {
  public:
  LaserTag();
    String transmitJoinTeam(String ip, int team);
    //transmitJoinTeam();
    String checkHit( int hit,String ip, int totalHitsPlayer);
    //transmitcheckHit ();
    int syncScore(int team, int totalHits);
    //transmitscoreSync ();
   // evaluateResponse ();
  private:
    int flow;
  
};
