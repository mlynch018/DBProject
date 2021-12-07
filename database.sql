CREATE TABLE MANAGER(ManagerID varchar(80) UNIQUE,
Email varchar(80),
Area_code integer,
Local_phone integer,
PRIMARY KEY (ManagerID)
);

CREATE TABLE ADMIN(ManID varchar(80) NOT NULL,
Username varchar(80) NOT NULL, 
Passwd varchar(80) NOT NULL,
PRIMARY KEY (Username),
FOREIGN KEY (ManID) REFERENCES MANAGER(ManagerID)
);

CREATE TABLE MANNAMES(ManID varchar(80) NOT NULL,
Fname varchar(80) NOT NULL,
Mname varchar(80),
Lname varchar(80) NOT NULL,
FOREIGN KEY (ManID) REFERENCES MANAGER(ManagerID)
);

CREATE TABLE UNIONS(UnionID varchar(80) UNIQUE,
Union_name varchar(80) NOT NULL, 
PRIMARY KEY(UnionID)
);

CREATE TABLE PROFESSIONALS(IDno varchar(80) NOT NULL,
Fname varchar(80) NOT NULL,
Mname varchar(80),
Lname varchar(80) NOT NULL,
UID varchar(80),
ManID varchar(80),
PRIMARY KEY (IDno),
FOREIGN KEY (UID) REFERENCES UNIONS(UnionID),
FOREIGN KEY(ManID) REFERENCES Manager(ManagerID)
);

CREATE TABLE CHARACTERISTICS(ProfID varchar(80) NOT NULL, 
Shoe_size DOUBLE(3,1),
Eye_color varchar(80),
Headshot varchar(100),
Hair_color varchar(80),
Weight Double(3,1),
Height Integer,
FOREIGN KEY (ProfID) REFERENCES PROFESSIONALS(IDno)
);

CREATE TABLE CHILD(ProfID varchar(80) NOT NULL,
DOB date NOT NULL,
FOREIGN KEY (ProfID) REFERENCES PROFESSIONALS(IDno)
);

CREATE TABLE ADULTMAN(ProfID varchar(80) NOT NULL,
suitSize varchar(80),
waist integer,
inseam integer,
sleeve integer,
neck integer,
FOREIGN KEY (ProfID) REFERENCES PROFESSIONALS(IDno)
);

CREATE TABLE ADULTWOMAN(ProfID varchar(80) NOT NULL,
dressSize integer,
bust integer,
FOREIGN KEY (ProfID) REFERENCES PROFESSIONALS(IDno)
);

CREATE TABLE ACTORS(ProfID varchar(80) NOT NULL,
Demo_reel varchar(100),
FOREIGN KEY (ProfID) REFERENCES PROFESSIONALS(IDno)
);

CREATE TABLE PORTFOLIOS(PortNo varchar(80) NOT NULL, 
Portfolio varchar(100),
PRIMARY KEY (PortNo)
);

CREATE TABLE REELS(reelID varchar(80) NOT NULL,
Voice_Reels varchar(100),
PRIMARY KEY (reelID)
);

CREATE TABLE MODEL(ProfID varchar(80) NOT NULL,
PortNo varchar(80),
FOREIGN KEY (ProfID) REFERENCES PROFESSIONALS(IDno),
FOREIGN KEY (PortNo) REFERENCES PORTFOLIOS(PortNo)
);

CREATE TABLE VOICEACTORS(ProfID varchar(80) NOT NULL,
reelID varchar(80),
FOREIGN KEY (ProfID) REFERENCES PROFESSIONALS(IDno),
FOREIGN KEY (reelID) REFERENCES REELS(ReelID)
);

-- insert some default values 
INSERT INTO MANAGER VALUES ('1','bobsmith@gmail.com','207','6514105');
INSERT INTO MANAGER VALUES ('2','jking@talent.net','425','2647545');
INSERT INTO MANAGER VALUES ('3','marvinsclients@hotmail.com','618','3048634');

INSERT INTO MANNAMES VALUES('1','Bob','Drew','Smith');
INSERT INTO MANNAMES VALUES('2','Jessica','Anne','Kingston');
INSERT INTO MANNAMES VALUES('3','Marvin','Austin','Frank');

INSERT INTO UNIONS VALUES('1','Actors United');
INSERT INTO UNIONS VALUES('2','Talent Equality Association');

INSERT INTO PROFESSIONALS VALUES('1','Candace','Dana','Norris','2','1');
INSERT INTO PROFESSIONALS VALUES('2','Jeff','Eddie','Barker','1','2');
INSERT INTO PROFESSIONALS VALUES('3','Frankie','Lucas','Waters','1','3');
INSERT INTO PROFESSIONALS VALUES('4','Ben','Curtis','Brooks','1','3');
INSERT INTO PROFESSIONALS VALUES('5','June','May','Maxwell','2','2');
INSERT INTO PROFESSIONALS VALUES('6','Wendy','Allison','French','2','1');

INSERT INTO ADULTMAN VALUES('3','38R','29','32','34','15');
INSERT INTO ADULTMAN VALUES('4', '42R', '30', '33', '34', '16');

INSERT INTO ADULTWOMAN VALUES('5', '12', '36');
INSERT INTO ADULTWOMAN VALUES('6','8','34');

INSERT INTO CHILD VALUES('1','2007-08-19');
INSERT INTO CHILD VALUES('2', '2005-02-04');

INSERT INTO ACTORS VALUES('2','barker.com/videos');
INSERT INTO ACTORS VALUES ('3', 'realtalent.com/frankie_demos');
