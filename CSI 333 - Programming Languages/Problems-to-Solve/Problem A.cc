/*Recieved Guidance From:
https://www.youtube.com/watch?v=ls5kkQlQJMA
https://github.com/SnapDragon64/ACMFinalsSolutions/tree/master/finals2016
https://www.tutorialspoint.com/cplusplus/cpp_references.htm
http://www.cplusplus.com/reference
*/
//Header that defines the standard input/output stream objects
#include <iostream>
//Header that defines the queue and priority_queue container adaptor classes:FIFO / Priority
#include <queue>
//Header that defines the vector container class: Vector / Vector of bool
#include <vector>
//A namespace is like adding a new group name to which you can add functions and other data, so that it will become distinguishable.
using namespace std;
/*Given: M types of sweets
  f1,f2,...,fm = frequency of each types
  s1,...,sm = count of sweet types already choosen
Constraint: fin-1 < si < fin+1
  (for each sweet type there is a desired frequency time the number of sweets already eaten)
Goal: Buy one sweet each day, maintaining balance constraint, for as long as possible
  Before: fin-1 < si        After: si+1 < fi(n+1)+1
Create Lower & Upper bounds
   Tell when Danny may buy a sweet and maintian balance
   [L,U] time range for each sweet. Order by U, take the least.
Scheduling algorithm: order the intervals in two ways. L = for sweets not yet available or by increasing lower bound, U = sweets that are currently availible, increasing upper bound (choose the first one)
 Always take one sweet with the lowerst upper bound create a new interval and then put that interval into the priorty queues until it cannot be done.
*/
//Generates or Inputs list of integers into the respective Lower and Upper Bounds
// NoteToSelf: Lower was atot, Upper was ftot
int main() {
  int M, K;
  //cin = Standard input stream (object)
  while (cin >> M >> K) {
    vector<int> f(M);
    for (int i = 0; i < M; i++) cin >> f[i];
    long long Upper = 0;
    for (int i = 0; i < M; i++) Upper += f[i];
    vector<int> Lower(M);
    for (int i = 0, x; i < K; i++) {
      cin >> x;
      Lower[x-1]++;
    }
    //Generates the pairs, then tests to see how long the goal can be met (forever vs. number of days)
    priority_queue<pair<int, int> > q;
    for (int i = 0; i < M; i++) {
      //queue::push = Inserts a new element at the end of the queue, after its current last element. The content of this new element is initialized to val.
      q.push(make_pair(-((Lower[i]+1)*Upper+f[i]-1)/f[i], i));
    }
    int n;
    for (n = K+1; n <= K+2*Upper; n++) {
//cerr << n << ' ' << -q.top().first << ' ' << q.top().second << endl;
      if (-q.top().first < n) {n = -q.top().first; break;}
      int i = q.top().second;
      Lower[i]++;
      //queue::pop = Removes the next element in the queue, effectively reducing its size by one.
      //The element removed is the "oldest" element in the queue whose value can be retrieved by calling member queue::front.
      q.pop();
      q.push(make_pair(-((Lower[i]+1)*Upper+f[i]-1)/f[i], i));
    }

    if (n > K+2*Upper) {
      //cout = output
      cout << "forever" << endl;
    } else {
      cout << n-K-1 << endl;
    }
  }
}
