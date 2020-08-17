/*
*@Name CompetitionDatabase
*@Author Shay Walker
*@Date 2-14-2018* @Engine MS SQL
*/
CREATE DATABASE CompetitionDatabase

CREATE TABLE Seasons( 
	--Calendar year or academic/sport year
	SeasonYear CHAR(9) 
	--may be numeric, character (F,W,S,SP), or descriptive (Jan, Mar)
	,Season CHAR(3)
	,StartDate DATE
	,EndDate DATE 
	-- Characer T or C or Training or Competition 
	,SeasonStatus VARCHAR(1)
	,PRIMARY KEY (SeasonYear,Season) 

);

CREATE TABLE Players(
	PlayerID INT NOT NULL IDENTITY(1,1)
	,FirstName  VARCHAR NOT NULL(50)
	,MiddleInitial VARCHAR(2)
	,LastName  VARCHAR NOT NULL(50)
	--Characters (F,M, or O) ideal for gender input
	,Gender VARCHAR NOT NULL(1)
	,Age NOT NULL INT(2)
	--Can include decimal places and conforms to lb or km
	,Weight NUMBER(7)
	--Can include decimal places and conforms to in or cm
	,Height NUMBER(6)
	,Bio VARCHAR(500)
	,PRIMARY KEY (PlayerID)
);

CREATE TABLE PlayersStatsOverall(
	PlayerID INT NOT NULL
	,Position VARCHAR(100)
	,Errors INT(3)
	,Assists INT(3)
	-- to be continually updated
	,PointsEarned INT(4)
	-- to be continually updated
	,PointsLost INT (4)	
	,Injuries VARCHAR(100)
	,FOREIGN KEY (PlayerID) REFERENCES Players (PlayerID)
	
);

CREATE TABLE PlayersStatsSeasonal(
	PlayerID INT NOT NULL
	--Calendar year or academic/sport year
	,SeasonYear CHAR(9) 
	--may be numeric, character (F,W,S,SP), or descriptive (Jan, Mar)
	,Season CHAR(3)
	,Position VARCHAR(100)
	,Errors INT(3)
	,Assists INT(3)
	,PointsEarned INT(4)
	,PointsLost INT (4)	
	,Injuries VARCHAR(100)
	,PRIMARY KEY (PlayerID,SeasonYear,Season) 
	,FOREIGN KEY (SeasonYear,Season) REFERENCES Seasons (SeasonYear,Season)
	,FOREIGN KEY (PlayerID) REFERENCES Players (PlayerID)
);

CREATE TABLE Teams(
	TeamID INT NOT NULL IDENTITY(1,1)
	,TeamName VARCHAR(100) NOT NULL 
	,League VARCHAR(200)
	,CompetitionType  VARCHAR(500) NOT NULL
	-- Input in format # of Wins-# of Losses
	,WinLossRatio VARCHAR(8)
	,PRIMARY KEY (TeamID)
);

CREATE TABLE TeamRoster(
	PlayerID INT NOT NULL
	,TeamID INT NOT NULL
	,Position VARCHAR(100)
	,FOREIGN KEY (PlayerID) REFERENCES Players (PlayerID)
	,FOREIGN KEY (TeamName) REFERENCES Teams (TeamName)
	,FOREIGN KEY (Postition) REFERENCES Players (Position)
);

CREATE TABLE TeamStatsOffense (
	TeamID INT NOT NULL
	,TeamName VARCHAR(100) NOT NULL 
	,SumErrors INT(4)
	,SumPointsEarned INT (4)
	,FOREIGN KEY (TeamID) REFERENCES Team (TeamID)
	,FOREIGN KEY (TeamName) REFERENCES Team (TeamName)
);

CREATE TABLE TeamStatsDefense (
	TeamID INT NOT NULL
	,TeamName VARCHAR(100) NOT NULL 
	,SumErrors INT(4)
	,SumPointsLost INT (4) 
	,FOREIGN KEY (TeamID) REFERENCES Team (TeamID)
	,FOREIGN KEY (TeamName) REFERENCES Team (TeamName)
);






