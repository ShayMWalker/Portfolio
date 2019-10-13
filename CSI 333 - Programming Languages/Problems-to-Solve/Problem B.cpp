/*Recieved Guidance From:
https://youtu.be/4xyhMgQnS88
https://github.com/SnapDragon64/ACMFinalsSolutions/tree/master/finals2016
https://www.tutorialspoint.com/cplusplus/cpp_references.htm
http://www.cplusplus.com/reference
*/

//The header <algorithm> defines a collection of functions especially designed to be used on ranges of elements.
#include <algorithm>
//Header that defines the standard input/output stream objects
#include <iostream>
//Header that defines the queue and priority_queue container adaptor classes:FIFO / Priority
#include <queue>
//Header that defines the vector container class: Vector / Vector of bool
#include <vector>
//A namespace is like adding a new group name to which you can add functions and other data, so that it will become distinguishable.
using namespace std;

/* Graph problem. HQ with n different verticies, s = the # of groups.
within each group they need to send a message to onanother but all must go through HQ.
All edges have different langths. Minimize the paths with minimus s groups (...?)
For each vertex there will be some messages going to HQ and the same number of messages going out through the vertex.
1. So use dijkstra to measeure from/ to HQ from each vertex.
2. Sort Distances
		Group Cost = (group size - 1) * ( sum of member cost or distances found in part 1)
3. Dynamic Programming, Speedup Trick
		x parameter = length of prefix | y parameter = number of peices produced (what is the cheapest way to divide each segment into y peices)
			n possiblities for x, n possiblities for y (n^3) Optimization = groups of the same # (n^2)
*/

//dijkstra = shortest path algorithm (return distance)
//we generate a SPT (shortest path tree) with given source as root. We maintain two sets, one set contains vertices included in shortest path tree, other set includes vertices not yet included in shortest path tree. At every step of the algorithm, we find a vertex which is in the other set (set of not yet included) and has a minimum distance from the source.
vector<int> dijkstra(const vector<vector<int>>& e,
	const vector<vector<int>>& el,
	int s) {
	vector<int> dist(e.size(), 1e9);
	priority_queue<pair<int, int>> q;
	q.push(make_pair(0, s));
	while (!q.empty()) {
		int d = -q.top().first, x = q.top().second;
		q.pop();
		if (d >= dist[x]) continue;
		dist[x] = d;
		for (int i = 0; i < e[x].size(); i++) {
			q.push(make_pair(-d - el[x][i], e[x][i]));
		}
	}
	return dist;
}

int main() {
	int N, B, S, R;
	while (cin >> N >> B >> S >> R) {
		vector<vector<int> > fe(N), fel(N), be(N), bel(N);
		for (int i = 0; i < R; i++) {
			int X, Y, L;
			cin >> X >> Y >> L;
			X--; Y--;
			fe[X].push_back(Y);
			fel[X].push_back(L);
			be[Y].push_back(X);
			bel[Y].push_back(L);
		}

		vector<int> fdist = dijkstra(fe, fel, B);
		vector<int> bdist = dijkstra(be, bel, B);
		vector<int> dist(B);
		for (int i = 0; i < B; i++) dist[i] = fdist[i] + bdist[i];
		sort(dist.begin(), dist.end());
		vector<long long> cumdist(B + 1);
		for (int i = 0; i < B; i++) cumdist[i + 1] = cumdist[i] + dist[i];

		vector<long long> dyn(B + 1);
		for (int i = 1; i <= B; i++) dyn[i] = (i - 1)*cumdist[i];//see 2 above
		for (int s = 2; s <= S; s++) {
			vector<long long> dyn2 = dyn;
			for (int i = 1; i <= B; i++)
				for (int j = 1; j*s <= i; j++) {
					dyn2[i] = min(dyn2[i], dyn[i - j] + (j - 1)*(cumdist[i] - cumdist[i - j]));
				}
			dyn.swap(dyn2);
		}

		cout << dyn[B] << endl;
	}
}
