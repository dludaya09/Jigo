CREATE TABLE user(
userid INTEGER(8),
email VARCHAR(30),
password VARCHAR(30),
createdat datetime,
PRIMARY KEY(userid));

CREATE TABLE profile(
userid INTEGER(8),
firstname VARCHAR(20),
middlename VARCHAR(20),
lastname VARCHAR(20),
city VARCHAR(20),
state VARCHAR(20),
country VARCHAR(20),
zip INTEGER(5),
PRIMARY KEY(userid),
INDEX(userid),
CONSTRAINT FOREIGN KEY(userid) REFERENCES user(userid));

CREATE TABLE friend(
userid INTEGER(8),
friendid INTEGER(8),
notification boolean not null default 0,
senttime datetime,
responsetime datetime,
PRIMARY KEY(userid, friendid, senttime),
INDEX(userid),
INDEX(friendid),
CONSTRAINT FOREIGN KEY(userid) REFERENCES user(userid),
CONSTRAINT FOREIGN KEY(friendid) REFERENCES user(userid));

CREATE TABLE location(
locationid INTEGER(8),
latitude DECIMAL(2, 2),
longitude DECIMAL(2, 2),
currentdate datetime,
PRIMARY KEY(locationid));

CREATE TABLE schedule(
scheduleid INTEGER(8),
fromhour DECIMAL(2, 2),
tohour DECIMAL(2, 2),
fromWeekDay ENUM('1', '2', '3', '4', '5', '6', '7'),
toWeekDay ENUM('1', '2', '3', '4', '5', '6', '7'),
fromMonthDay ENUM('1','2','3','4', 

'5','6','7','8','9','10','11','12','13','1','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'),
toMonthDay ENUM('1','2','3','4', 

'5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'),
fromMonth ENUM('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'),
toMonth ENUM('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'),
fromYear INTEGER(4),
toYear INTEGER(4),
PRIMARY KEY(scheduleid));


CREATE TABLE tags(
tagid INTEGER(8),
tagname VARCHAR(40),
PRIMARY KEY(tagid));

CREATE TABLE notes(
notesid INTEGER(8),
notes VARCHAR(50),
hyperlink VARCHAR(50),
locationid NUMBER(8),
radius DECIMAL(3,4),
userid INTEGER(8),
scheduleid INTEGER(8),
tagid INTEGER(8),
PRIMARY KEY(notesid),
INDEX(userid),
INDEX(scheduleid),
INDEX(locationid),
INDEX(tagid),
CONSTRAINT FOREIGN KEY(userid) REFERENCES user(userid),
CONSTRAINT FOREIGN KEY(scheduleid) REFERENCES schedule(scheduleid),
CONSTRAINT FOREIGN KEY(locationid) REFERENCES location(locationid),
CONSTRAINT FOREIGN KEY(tagid) REFERENCES tags(tagid));

CREATE TABLE state(
stateid INTEGER(8),
state VARCHAR(30),
PRIMARY KEY(stateid));

CREATE TABLE filter(
userid INTEGER(8),
notesid INTEGER(8),
filterid INTEGER(8),
allowTag BOOLEAN NOT NULL DEFAULT 0,
allowComments BOOLEAN NOT NULL DEFAULT 0,
repeatNotes BOOLEAN NOT NULL DEFAULT 0,
repeatSchedule BOOLEAN NOT NULL DEFAULT 0,
locationid INTEGER(8),
currentstate VARCHAR(20),
stateid INTEGER(8),
PRIMARY KEY(userid, notesid, filterid),
CONSTRAINT FOREIGN KEY(userid) REFERENCES user(userid),
CONSTRAINT FOREIGN KEY(notesid) REFERENCES notes(notesid),
CONSTRAINT FOREIGN KEY(stateid) REFERENCES state(stateid));

CREATE TABLE comment(
commentid INTEGER(8),
comments VARCHAR(50),
latitude DECIMAL(2, 2),
longitude DECIMAL(2, 2),
notesid INTEGER(8),
userid INTEGER(8),
PRIMARY KEY(commentid),
INDEX(notesid),
INDEX(userid),
CONSTRAINT FOREIGN KEY(notesid) REFERENCES notes(notesid),
CONSTRAINT FOREIGN KEY(userid) REFERENCES user(userid));

CREATE TABLE receive(
userid INTEGER(8),
stateid INTEGER(8),
currenttime datetime,
currentlocation VARCHAR(20),
PRIMARY KEY(userid, stateid, currenttime),
INDEX(userid),
INDEX(stateid),
INDEX(currentlocation),
CONSTRAINT FOREIGN KEY(userid) REFERENCES user(userid),
CONSTRAINT FOREIGN KEY(stateid) REFERENCES state(stateid),
CONSTRAINT FOREIGN KEY(currentlocation) REFERENCES location(locationid));


CREATE TABLE state(
stateid INTEGER(8),
state VARCHAR(30),
PRIMARY KEY(stateid));

CREATE TABLE filter(
userid INTEGER(8),
notesid INTEGER(8),
filterid INTEGER(8),
allowTag BOOLEAN NOT NULL DEFAULT 0,
allowComments BOOLEAN NOT NULL DEFAULT 0,
repeatNotes BOOLEAN NOT NULL DEFAULT 0,
repeatSchedule BOOLEAN NOT NULL DEFAULT 0,
locationid INTEGER(8),
currentstate VARCHAR(20),
stateid INTEGER(8),
PRIMARY KEY(userid, notesid, filterid),
CONSTRAINT FOREIGN KEY(userid) REFERENCES user(userid),
CONSTRAINT FOREIGN KEY(notesid) REFERENCES notes(notesid),
CONSTRAINT FOREIGN KEY(stateid) REFERENCES state(stateid));

CREATE TABLE comment(
commentid INTEGER(8),
comments VARCHAR(50),
latitude DECIMAL(2, 2),
longitude DECIMAL(2, 2),
notesid INTEGER(8),
userid INTEGER(8),
PRIMARY KEY(commentid),
INDEX(notesid),
INDEX(userid),
CONSTRAINT FOREIGN KEY(notesid) REFERENCES notes(notesid),
CONSTRAINT FOREIGN KEY(userid) REFERENCES user(userid));

CREATE TABLE receive(
userid INTEGER(8),
stateid INTEGER(8),
currenttime DATETIME,
currentlocation INTEGER(8),
PRIMARY KEY(userid, stateid, currenttime), 
INDEX(userid),
INDEX(stateid),
INDEX(currentlocation),
CONSTRAINT FOREIGN KEY(userid) REFERENCES user(userid),
CONSTRAINT FOREIGN KEY(stateid) REFERENCES state(stateid),
CONSTRAINT FOREIGN KEY(currentlocation) REFERENCES location(locationid));


Insert Values into tables
INSERT INTO user VALUES(1001, 'ebay@ebay.com', 'ebay123','2013-01-24 14:00:00');
INSERT INTO user VALUES(1002, 'john@gmail.com', 'john123','2013-02-21 11:00:00');
INSERT INTO user VALUES(1003, 'jane@hotmail.com', 'jane123', '2013-04-04 9:00:00');
INSERT INTO user VALUES(1004, 'jake@gmail.com', 'jake123','2013-03-24 17:00:00');

INSERT INTO profile VALUES(1001, 'john', 'samuel','' , 'Queens', 'New York', 'United States', 11417);
INSERT INTO profile VALUES(1002,'john','joe','jammy', 'Queens', 'New Jersy', 'United States', 11291);
INSERT INTO profile VALUES(1003, 'puppy', 'mary', 'cathe', 'Bronx', 'New york', 'United States', 11419);
INSERT INTO profile VALUES(1004, 'subba', 'rao', 'akella', 'Brooklyn', 'New York', 'United States', 11418);


INSERT INTO friend VALUES(1001, 1002, 0,'2013-01-24 14:10:00', '2013-01-24 14:30:00');
INSERT INTO friend VALUES(1002, 1001, 1, '2013-02-21 11:10:00', '2013-02-21 11:30:00');
INSERT INTO friend VALUES(1003, 1002, 0, '2013-04-04 9:10:00', '2013-04-04 10:00:00');
INSERT INTO friend VALUES(1004, 1002, 0, '2013-03-24 17:10:00', '2013-03-24 17:50:00');
INSERT INTO friend VALUES(1004, 1001, 1, '2013-03-24 17:20:00', '2013-03-24 17:40:00');
INSERT INTO friend VALUES(1003, 1004, 0, '2013-04-04 9:10:00', '2013-04-04 18:00:00');

INSERT INTO location VALUES(2001, 23.45, 43.56, '2013-10-24 10:00:00');
INSERT INTO location VALUES(2002, 56.54, 67.43, '2013-09-04 10:30:00');
INSERT INTO location VALUES(2003, 78.43, 98.44, '2013-02-04 10:30:00');
INSERT INTO location VALUES(2004, 87.90, 78.99, '2013-04-04 10:40:00');

INSERT INTO schedule VALUES(3001, 01.00, 02.00, 1, 7, 9, 15, 1, 12, 2013, 2014);
INSERT INTO schedule VALUES(3002, 02.20, 03.30, 2, 5, 1, 30, 1, 6, 2013, 2013);
INSERT INTO schedule VALUES(3003, 12.00, 16.00, 1, 4, 1, 15, 6, 12, 2013, 2013);

INSERT INTO notes VALUES(4001, 'having lunch', 'www.subway.com', 2001, 400, 1001, 3001, 7001);
INSERT INTO notes VALUES(4002, 'working out', 'www.nike.com', 2003,300, 1002, 3001, 7002);
INSERT INTO notes VALUES(4004, 'having lunch', 'www.subway.com', 2001, 400, 1001, 3001, 7001);
INSERT INTO notes VALUES(4003, 'dancing', 'www.poly.edu', 2004,200, 1002, 3002, 7003);

INSERT INTO STATE VALUES(5001, 'eating');
INSERT INTO STATE VALUES(5002, 'playing');
INSERT INTO STATE VALUES(5003, 'exercise');
INSERT INTO STATE VALUES(5004, 'dance class');

INSERT INTO filter VALUES(1001, 4001, 9001, 1, 1, 1, 1, 2001, 'eating', 5001);
INSERT INTO filter VALUES(1002, 4003,9002, 0, 0, 1, 1, 2002, 'in gym', 5004);
INSERT INTO filter VALUES(1004, 4001,9003, 1, 1, 1, 0, 2003, 'dinner', 5002);
INSERT INTO filter VALUES(1003, 4002,9002, 1, 0, 1, 1, 2001, 'stepup', 5003);

INSERT INTO comment VALUES(5001, 'nice food', 34.56, 22.89, 4001, 1001);
INSERT INTO comment VALUES(5002, 'not soo good veg food', 56.55, 67.66, 4001, 1001);
INSERT INTO comment VALUES(5003, 'great veg sub', 90.89, 09.00, 4001, 1001);
INSERT INTO comment VALUES(5004, 'great dance show', 44.53, 45.65, 4003, 1002);

INSERT INTO tags VALUES(7001, 'hungry');
INSERT INTO tags VALUES(7002, 'paining legs');
INSERT INTO tags VALUES(7003, 'feeling refreshed');

UPDATE user SET password='ebay456' WHERE userid=1001;
UPDATE profile SET middlename='peter' WHERE userid=1001;

delete from tags where notesid=4001;
delete from filter where notesid=4001;
delete from comment where notesid=4001;
delete from state where notesid=4001;
delete from notes where notesid=4001;

Select distinct n.notesid from notes n , location l, filter f, tags t, schedule sc
where 
l.userid=n.userid and sc.scheduleid=n.scheduleid and
n.notesid=f.notesid and n.notesid=t.notesid
and l.latitude=n.latitude and l.longitude=n.longitude
and year(l.currentdate) between sc.fromYear and sc.toYear
and month(l.currentdate) between sc.fromMonth and sc.toMonth
and hour(l.currentdate) between hour(sc.fromHour) and hour(sc.toHour)
and f.allowTag=1
and f.currentstate='eating'
and t.tagname='hungry';

Select distinct n.notesid from notes n , location l, filter f, tags t, schedule sc, rated r
where 
l.userid=n.userid and sc.scheduleid=n.scheduleid and
n.notesid=f.notesid and n.notesid=t.notesid
and l.latitude=n.latitude and l.longitude=n.longitude
and r.noteid=n.noteid and r.userid=n.userid
and year(l.currentdate) between sc.fromYear and sc.toYear
and month(l.currentdate) between sc.fromMonth and sc.toMonth
and hour(l.currentdate) between hour(sc.fromHour) and hour(sc.toHour)
and f.allowTag=1
and f.currentstate='eating'
and t.tagname='hungry'
and n.notes like '%lunch%'
and r.rating between 3 and 5;

create table rated(
notesid INTEGER(8),
userid INTEGER(8),
rating ENUM('1', '2', '3', '4', '5'),
PRIMARY KEY(notesid, userid),
INDEX(notesid),
INDEX(userid),
CONSTRAINT FOREIGN KEY(notesid) REFERENCES notes(notesid),
CONSTRAINT FOREIGN KEY(userid) REFERENCES user(userid));

insert into rated values(4001, 1001, 5);
insert into rated values(4002, 1002, 4);
insert into rated values(4003, 1002, 2);
