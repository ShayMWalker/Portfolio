/*Recieved Guidance From:
https://youtu.be/FvppunbosmU
https://github.com/SnapDragon64/ACMFinalsSolutions/tree/master/finals2016
https://www.tutorialspoint.com/cplusplus/cpp_references.htm
http://www.cplusplus.com/reference
*/

//Header that defines the standard input/output stream objects
#include <iostream>
//Header that defines the vector container class: Vector / Vector of bool
#include <vector>
//A namespace is like adding a new group name to which you can add functions and other data, so that it will become distinguishable.
using namespace std;
/* Binary Search Tree Insertion
Insert right is greater to the left if it is less (recursively)
Given: n<=50 sequences k<=20 ints/sequence
Build a binary search tree: insert numbers in order
Identify the trees with the same shape... given n sequences with k unique #'s how many unique tree shapes are there?'

1. Read in data
2. Generate each search tree
3. Keep track and compare the uniqueness (n^2)
*/
//generate trees ( tree a vs tree b )
// size of trees generated is checked, then trees shape is determined
bool doit(const vector<int>& a, const vector<int>& b) {
  if (a.size() != b.size()) return false;
  if (a.size() <= 1) return true;
  vector<int> al, ar, bl, br;
  for (int i = 1; i < a.size(); i++) {
    (a[i] < a[0] ? al : ar).push_back(a[i]);
    (b[i] < b[0] ? bl : br).push_back(b[i]);
  }
  return doit(al, bl) && doit(ar, br);
}
//verifying the uniqueness (...?)
int main() {
  int N, K;
  while (cin >> N >> K) {
    vector<vector<int>> tree(N, vector<int>(K));
    int ret = 0;
    for (int i = 0; i < N; i++) {
      for (int j = 0; j < K; j++) cin >> tree[i][j];
      int j;
      //calling doit to compare trees of same size/shape
      for (j = 0; j < i; j++) if (doit(tree[i], tree[j])) break;
      if (j == i) ret++;
    }
    cout << ret << endl;
  }
}
