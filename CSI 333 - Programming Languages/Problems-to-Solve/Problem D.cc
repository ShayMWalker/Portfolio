/*Recieved Guidance From:
https://youtu.be/VP835B2Xb68
https://github.com/SnapDragon64/ACMFinalsSolutions/tree/master/finals2016
https://www.tutorialspoint.com/cplusplus/cpp_references.htm
http://www.cplusplus.com/reference
*/
//Strings are objects that represent sequences of characters.
//The standard string class provides support for such objects with an interface similar to that of a standard container of bytes, but adding features specifically designed to operate with strings of single-byte characters.
#include <string>

//Header that defines the vector container class: Vector / Vector of bool
#include <vector

//A namespace is like adding a new group name to which you can add functions and other data, so that it will become distinguishable.
using namespace std;

/* We are building a clock (digital). Displayed as XX:XX.
Midnight - 00:00 | Minute before - 23:59
Segments could be burnt in, burnt out, or working (Perm. On, Perm. Off, or functional)
In the grid below (display) X signifies on.
Take each starting minute and check the consecutive minites to check.
Colons should be on at all times.

1 <= n <= 100

*/
typedef vector<string> VS;
//Digits comprised here
char digit[7][10][5] = {
{".XX.","....",".XX.",".XX.","....",".XX.",".XX.",".XX.",".XX.",".XX."},
{"X..X","...X","...X","...X","X..X","X...","X...","...X","X..X","X..X"},
{"X..X","...X","...X","...X","X..X","X...","X...","...X","X..X","X..X"},
{"....","....",".XX.",".XX.",".XX.",".XX.",".XX.","....",".XX.",".XX."},
{"X..X","...X","X...","...X","...X","...X","X..X","...X","X..X","...X"},
{"X..X","...X","X...","...X","...X","...X","X..X","...X","X..X","...X"},
{".XX.","....",".XX.",".XX.","....",".XX.",".XX.","....",".XX.",".XX."}
};
//Clock display here (? for segments that can switch states (on, off, etc.))
char display[7][22] = {
".??...??.....??...??.",
"?..?.?..?...?..?.?..?",
"?..?.?..?.?.?..?.?..?",
".??...??.....??...??.",
"?..?.?..?.?.?..?.?..?",
"?..?.?..?...?..?.?..?",
".??...??.....??...??."
};

void DisplayDigit(int x, int dig, VS* display) {
  for (int y = 0; y < 7; y++)
  for (int i = 0; i < 4; i++)
    (*display)[y][x+i] = digit[y][dig][i];
}

VS SetDisplay(int time) {
  VS ret(7, string(21, '.'));
  ret[2][10] = ret[4][10] = 'X';
  if (time >= 10*60) DisplayDigit(0, time/10/60, &ret);
  DisplayDigit(5, (time/60)%10, &ret);
  DisplayDigit(12, ((time%60)/10)%10, &ret);
  DisplayDigit(17, time%10, &ret);
  return ret;
}

main() {
  int N;
  while (cin >> N && N) {
    vector<VS> d(N, VS(7));
    for (int i = 0; i < N; i++)
    for (int y = 0; y < 7; y++)
      cin >> d[i][y];

    VS ret(7);
    for (int y = 0; y < 7; y++) ret[y] = display[y];

    for (int i = 1; i < N; i++)
    for (int y = 0; y < 7; y++)
    for (int x = 0; x < 21; x++)
      if (d[i-1][y][x] != d[i][y][x])
        ret[y][x] = 'W';
    for (int y = 0; y < 7; y++)
    for (int x = 0; x < 21; x++)
      if (ret[y][x] == '?')
        ret[y][x] = (d[0][y][x] == 'X') ? '1' : '0';

    bool valid = false;
    for (int stime = 0; stime < 24*60; stime++) {
      vector<VS> displays(N);
      for (int i = 0; i < N; i++) {
        displays[i] = GetDisplay((stime + i) % (24*60));
        for (int y = 0; y < 7; y++)
        for (int x = 0; x < 21; x++)
          if (ret[y][x] == 'W' && displays[i][y][x] != d[i][y][x]) {
            goto fail;
          }
      }
//NOT FINISHED YET....
