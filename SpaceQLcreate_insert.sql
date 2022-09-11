CREATE TABLE spaceagencies (
spaceagencyid integer PRIMARY KEY,
country char(20),
datefounded date,
name char(20),
president char(20)
);

CREATE TABLE discoveredlargeobjects (
	largeobjid integer,
	name char(20),
	diameter integer,
	mass char(20),
	discoverspaceagencyid integer,
	discoverdate date,
	PRIMARY KEY (largeobjid),
	FOREIGN KEY (discoverspaceagencyid) REFERENCES
	spaceagencies(spaceagencyid)
		ON DELETE SET NULL
		ON UPDATE CASCADE
);

CREATE TABLE planets ( 
    planetid integer,
	orbitalperiod float,
	rotationalperiod float,
	PRIMARY KEY (planetid),
	FOREIGN KEY (planetid) REFERENCES
	discoveredlargeobjects(largeobjid)
		ON DELETE CASCADE
		ON UPDATE CASCADE
);


CREATE TABLE stars (
	starid Integer,
	composition char(20),
	PRIMARY KEY (starid),
	FOREIGN KEY (starid) REFERENCES
	discoveredlargeobjects(largeobjid)
		ON DELETE CASCADE
    	ON UPDATE CASCADE
);

CREATE TABLE galaxies (
	galxid integer PRIMARY KEY,
	name char(20),
	diameter integer
);

CREATE TABLE solarsystemingalaxy (
	solarsysid integer,
	galxid integer NOT NULL,
	name char(20),
	diameter float,
	PRIMARY KEY (solarsysid),
	FOREIGN KEY (galxid) REFERENCES galaxies(galxid)
		ON DELETE CASCADE
		ON UPDATE CASCADE
);


CREATE TABLE moons (
	name char(20),
	planetid integer,
	diameter integer,
	rotationalperiod float,
	orbitalperiod float,
	orbitdistance integer,
	orbitspeed integer,
	PRIMARY KEY (name, planetid),
	FOREIGN KEY (planetid) REFERENCES planets(planetid)
		ON DELETE CASCADE
		ON UPDATE CASCADE
);


CREATE TABLE astronauts (
astroid integer PRIMARY KEY,
fname char(20),
lname char(20),
dob date
);

CREATE TABLE technologylocatedat (
techid integer,
name char(20),
datecreated date,
operational boolean,
largeobjid integer,
orbitdistance integer,
orbitspeed integer,
arrivaldate date,
PRIMARY KEY(techid, largeobjid),
FOREIGN KEY (largeobjid) REFERENCES
discoveredlargeobjects(largeobjid)
ON DELETE CASCADE
ON UPDATE CASCADE
);

CREATE TABLE satellites (
satid integer PRIMARY KEY,
type char(20),
FOREIGN KEY (satid) REFERENCES technologylocatedat(techid)
ON DELETE CASCADE
ON UPDATE CASCADE
);

CREATE TABLE telescopes (
telid integer PRIMARY KEY,
FOREIGN KEY (telid) REFERENCES technologylocatedat(techid)
ON DELETE CASCADE
ON UPDATE CASCADE
);

CREATE TABLE rovers (
rovid integer PRIMARY KEY,
FOREIGN KEY (rovid) REFERENCES technologylocatedat(techid)
ON DELETE CASCADE
ON UPDATE CASCADE
);

CREATE TABLE spacestations (
spacestationid integer PRIMARY KEY,
FOREIGN KEY (spacestationid) REFERENCES
technologylocatedat(techid)
ON DELETE CASCADE
ON UPDATE CASCADE
);

CREATE TABLE discoveredminorobjects (
minobjid integer PRIMARY KEY,
name char(20),
diameter integer,
discoveryspaceagencyid integer,
discoverydate date,
FOREIGN KEY (discoveryspaceagencyid) REFERENCES
spaceagencies(spaceagencyid)
ON DELETE SET NULL
ON UPDATE CASCADE
);

CREATE TABLE asteroids (
astroidid integer,
extinctionthreat boolean,
PRIMARY KEY (astroidid),
FOREIGN KEY (astroidid) REFERENCES
discoveredminorobjects(minobjid)
ON DELETE CASCADE
ON UPDATE CASCADE
);

CREATE TABLE meteors (
meteroid integer PRIMARY KEY,
type char(20),
FOREIGN KEY (meteroid) REFERENCES
discoveredminorobjects(minobjid)
ON DELETE CASCADE
ON UPDATE CASCADE
);

CREATE TABLE comets (
cometid integer PRIMARY KEY,
visiblefromearth boolean,
FOREIGN KEY (cometid) REFERENCES
discoveredminorobjects(minobjid)
ON DELETE CASCADE
ON UPDATE CASCADE
);


CREATE TABLE orbit (
planetid integer,
starid integer,
orbitdist integer,
orbitspd integer,
PRIMARY KEY (planetid, starid),
FOREIGN KEY (planetid) REFERENCES planets(planetid)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
FOREIGN KEY (starid) REFERENCES stars(starid)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

CREATE TABLE hasa (
planetid integer,
starid integer,
solarsysid integer,
PRIMARY KEY (planetid, starid, solarsysid),
FOREIGN KEY (planetid) REFERENCES planets(planetid)
ON DELETE CASCADE
ON UPDATE CASCADE,
FOREIGN KEY (starid) REFERENCES stars(starid)
ON DELETE CASCADE
ON UPDATE CASCADE,
FOREIGN KEY (solarsysid) REFERENCES
solarsystemingalaxy(solarsysid)
ON DELETE CASCADE
ON UPDATE CASCADE
);

CREATE TABLE workfor (
astroid integer,
spaceagencyid integer,
date date,
PRIMARY KEY (astroid, spaceagencyid),
FOREIGN KEY (astroid) REFERENCES astronauts(astroid)
ON DELETE CASCADE
ON UPDATE CASCADE,
FOREIGN KEY (spaceagencyid) REFERENCES
spaceagencies(spaceagencyid)
ON DELETE CASCADE
ON UPDATE CASCADE
);

CREATE TABLE astronautvisitedmoon (
astroid integer,
moonname char(20),
planetid integer,
date date,
PRIMARY KEY (astroid, moonname, planetid),
FOREIGN KEY (astroid) REFERENCES astronauts(astroid)
ON DELETE CASCADE
ON UPDATE CASCADE,
FOREIGN KEY (moonname) REFERENCES moons(name)
ON DELETE CASCADE
ON UPDATE CASCADE,
FOREIGN KEY (planetid) REFERENCES planets(planetid)
ON DELETE CASCADE
ON UPDATE CASCADE
);

CREATE TABLE astronautvisitedplanet (
astroid integer,
planetid integer,
date date,
PRIMARY KEY (astroid, planetid),
FOREIGN KEY (planetid) REFERENCES planets(planetid)
ON DELETE CASCADE
ON UPDATE CASCADE,
FOREIGN KEY (astroid) REFERENCES astronauts(astroid)
ON DELETE CASCADE
ON UPDATE CASCADE
);

CREATE TABLE stationed (
astroid integer,
spacestationid integer,
startdate date,
enddate date,
PRIMARY KEY (astroid, spacestationid),
FOREIGN KEY (astroid) REFERENCES astronauts(astroid)
ON DELETE CASCADE
ON UPDATE CASCADE,
FOREIGN KEY (spacestationid) REFERENCES
spacestations(spacestationid)
ON DELETE CASCADE
ON UPDATE CASCADE
);

CREATE TABLE own (
spaceagencyid integer,
techid integer,
PRIMARY KEY(spaceagencyid, techid),
FOREIGN KEY (spaceagencyid) REFERENCES
spaceagencies(spaceagencyid)
ON DELETE CASCADE
ON UPDATE CASCADE,
FOREIGN KEY (techid) REFERENCES
technologylocatedat(techid)
ON DELETE CASCADE
ON UPDATE CASCADE
);


INSERT INTO spaceagencies VALUES ('1','USA','1958-07-29','NASA','Bill Nelson');
INSERT INTO spaceagencies VALUES ('2','USA','2002-03-14','SpaceX','Elon Musk');
INSERT INTO spaceagencies VALUES ('3','China','1993-04-22','CNSA','Zhang Kejian');
INSERT INTO spaceagencies VALUES ('4','Russia','1991-12-26','ROSCOSMOS','Yury Borisov');
INSERT INTO spaceagencies VALUES ('5','India','1969-08-15','ISRO','Sreedhara Somanath');
INSERT INTO spaceagencies VALUES ('6','Italy','1998-01-01','ASI','Giorgio Saccoccia');
INSERT INTO spaceagencies VALUES ('7','Japan','2003-10-01','JAXA','Hiroshi Yamakawa');
INSERT INTO spaceagencies VALUES ('8','France','1961-12-19','CNES','Philippe Baptiste');
INSERT INTO spaceagencies VALUES ('9','Canada','1989-03-01','CSA','Lisa Campbell');
INSERT INTO spaceagencies VALUES ('10','China','1993-06-01','CMSA','Hao Chun');

INSERT INTO discoveredlargeobjects VALUES ('0000', 'Earth', '12742', '5.972 * 10^24', NULL, NULL);
INSERT INTO discoveredlargeobjects VALUES ('0001', 'Sun', '1392700', '1.989 * 10^30', NULL, NULL);
INSERT INTO discoveredlargeobjects VALUES ('0002', 'Mercury', '4829', '3.285 * 10^23', NULL, NULL);
INSERT INTO discoveredlargeobjects VALUES ('0003', 'Venus', '12104', '4.867 * 10^24', NULL, NULL);
INSERT INTO discoveredlargeobjects VALUES ('0004', 'Mars', '6779', '6.39 * 10^23', NULL, NULL);
INSERT INTO discoveredlargeobjects VALUES ('0005', 'Jupiter', '139820', '1.898 * 10^27', NULL, NULL);
INSERT INTO discoveredlargeobjects VALUES ('0006', 'Saturn', '116460', '5.683 * 10^26', NULL, NULL);
INSERT INTO discoveredlargeobjects VALUES ('0007', 'Neptune', '49244', '1.024 * 10^26', NULL, NULL);
INSERT INTO discoveredlargeobjects VALUES ('0008', 'Pluto', '2376', '1.309 * 10^22', NULL, NULL);
INSERT INTO discoveredlargeobjects VALUES ('0009', 'Sirius', '2400000', '4.103 * 10^30', NULL, NULL);
INSERT INTO discoveredlargeobjects VALUES ('0010', '14 Andromedae b', '160793', '9.110 * 10^27', '1', '2008-07-02');
INSERT INTO discoveredlargeobjects VALUES ('0011', 'Gliese 876', '500900', '6.643 * 10^29', NULL, NULL);
INSERT INTO discoveredlargeobjects VALUES ('0012', 'Gliese 876 b', '166388', '2.2756 Jupiters', '1', '1998-06-22');
INSERT INTO discoveredlargeobjects VALUES ('0013', 'Gliese 876 c', '174778', '0.7142 Jupiters', '1', '2001-01-09');
INSERT INTO discoveredlargeobjects VALUES ('0014', 'Gliese 876 d','31320','6.83 Earths', '1','2005-06-13');
INSERT INTO discoveredlargeobjects VALUES ('0015', 'Gliese 876 e', '48938','14.6 Earths', '1', '2010-06-23');
INSERT INTO discoveredlargeobjects VALUES ('0016', 'Uranus', '50724', '8.681 * 10^25', NULL, NULL);
INSERT INTO discoveredlargeobjects VALUES ('0017', 'Proxima Centauri','214550','2.446 * 10^29',NULL,'1915-02-01');
INSERT INTO discoveredlargeobjects VALUES ('0018','Tau Ceti','1103400','1.557 * 10^30',NULL,NULL);

INSERT INTO planets VALUES ('0000', '365', '24');
INSERT INTO planets VALUES ('0002', '88', '1407');
INSERT INTO planets VALUES ('0003', '225', '2802');
INSERT INTO planets VALUES ('0004', '687', '24');
INSERT INTO planets VALUES ('0005', '4380', '10');
INSERT INTO planets VALUES ('0006', '10585', '10');
INSERT INTO planets VALUES ('0007', '60225', '16');
INSERT INTO planets VALUES ('0008', '90520', '153');
INSERT INTO planets VALUES ('0010', '186', '4');
INSERT INTO planets VALUES ('0012', '61.1', NULL);
INSERT INTO planets VALUES ('0013', '30.1', NULL);
INSERT INTO planets VALUES ('0014', '1.9', NULL);
INSERT INTO planets VALUES ('0015', '124.3', NULL);
INSERT INTO planets VALUES ('0016', '30678', '17');

INSERT INTO stars VALUES ('0001', 'Hydrogen, Helium');
INSERT INTO stars VALUES ('0009', 'Carbon, Oxygen');
INSERT INTO stars VALUES ('0011', 'Hydrogen, Helium');
INSERT INTO stars VALUES ('0017', 'Hydrogen, Helium');
INSERT INTO stars VALUES ('0018', 'Hydrogen,Helium,Iron');

INSERT INTO galaxies VALUES ('001','Milky Way', '105700');
INSERT INTO galaxies VALUES ('002', 'Andromeda', '220000');
INSERT INTO galaxies VALUES ('003', 'Pinwheel Galaxy', '170000');
INSERT INTO galaxies VALUES ('004','Cigar Galaxy','37000');
INSERT INTO galaxies VALUES ('005','Whirlpool Galaxy','76000');
INSERT INTO galaxies VALUES ('006','Triangulum Galaxy','60000');

-- unit for solar system diameter is astronimical unit
INSERT INTO solarsystemingalaxy VALUES ('01','001','Our System', '79');
INSERT INTO solarsystemingalaxy VALUES ('02', '001', 'Proxima System', '1.489');
INSERT into solarsystemingalaxy VALUES ('03', '001', 'Gliese 876 System', '0.72');
INSERT INTO solarsystemingalaxy VALUES ('04','001','TRAPPIST-1 System','0.06');
INSERT INTO solarsystemingalaxy VALUES ('05','001','HD 10180','3.4');

-- unit for periods is days
-- earth
INSERT INTO moons VALUES ('The Moon', '0000', '3475', '29.530589', '29.530589', '384400', '1000');
-- mars 
INSERT INTO moons VALUES ('Phobos', '0004', '23', '0.31891023', '0.31891023', '9375', '2138');
INSERT INTO moons VALUES ('Deimos', '0004', '12', '1.263', '1.263', '23460', '1351');
-- jupiter
INSERT INTO moons VALUES ('Ganymede', '0005', '5268', '7.15455296', '7.15455296', '1070400', '10880');
INSERT INTO moons VALUES ('Europa', '0005', '3122', '3.551181', '3.551181', '670900', '13743');
-- saturn
INSERT INTO moons VALUES ('Titan', '0006', '5149', '15.945', '15.945', '1221850', '5570');
INSERT INTO moons VALUES ('Rhea', '0006', '1528', '4.518212', '4.518212', '527040', '8480');
-- uranus
INSERT INTO moons VALUES ('Titania', '0016', '1577', '8.706234', '8.706234', '435910', '3640');
INSERT INTO moons VALUES ('Miranda', '0016', '472', '1.413479', '1.413479', '129390', '	6660');

INSERT INTO astronauts VALUES ('1101', 'Neil', 'Armstrong', '1930-08-05');
INSERT INTO astronauts VALUES ('1102', 'Buzz', 'Aldrin', '1930-01-20');
INSERT INTO astronauts VALUES ('1103', 'Pete', 'Conrad', '1930-06-02');
INSERT INTO astronauts VALUES ('1104', 'Alan', 'Bean', '1932-03-15');
INSERT INTO astronauts VALUES ('1105', 'Alan', 'Shepard', '1923-11-18');
INSERT INTO astronauts VALUES ('1106', 'Frank', 'Borman', '1928-03-14');
INSERT INTO astronauts VALUES ('1107', 'Jim', 'Lovell', '1928-03-25');
INSERT INTO astronauts VALUES ('1108', 'Bill', 'Anders', '1933-10-17');
INSERT INTO astronauts VALUES ('1109', 'Tom', 'Stafford', '1930-09-17');
INSERT INTO astronauts VALUES ('1110', 'Michael', 'Collins', '1930-10-31');
INSERT INTO astronauts VALUES ('1111', 'Yuri', 'Gagarin', '1934-03-09');
INSERT INTO astronauts VALUES ('1112', 'Valentina', 'Tereshkova', '1937-03-06');

-- unit for orbit distance is astronomical unit 
INSERT INTO orbit VALUES ('0012','0011','0.2083', NULL);
INSERT INTO orbit VALUES ('0013','0011','0.1296', NULL);
INSERT INTO orbit VALUES ('0014','0011','0.0208', NULL);
INSERT INTO orbit VALUES ('0015','0011','0.3343', NULL);
INSERT INTO orbit VALUES ('0000','0001','1', '30');
INSERT INTO orbit VALUES ('0002','0001','0.4', '47.36');
INSERT INTO orbit VALUES ('0003','0001','0.7', '35.02');
INSERT INTO orbit VALUES ('0004','0001','1.5','24.07');
INSERT INTO orbit VALUES ('0005','0001','5.2','13.06');
INSERT INTO orbit VALUES ('0006','0001','9.6','9.68');
INSERT INTO orbit VALUES ('0007','0001','30.0','5.43');
INSERT INTO orbit VALUES ('0016','0001','19.2','6.80');


INSERT INTO technologylocatedat VALUES ('2201', 'Anik F1', '2000-01-01','1','0000','35900','11300','2006-11-21'); -- Canada
INSERT INTO technologylocatedat VALUES ('2202','SCISAT','2003-06-12','1','0000','650','27360','2003-08-12'); -- Canada
INSERT INTO technologylocatedat VALUES ('2203','ALOS-2','2014-02-09','1','0000','638','27360','2014-05-24'); -- japan
INSERT INTO technologylocatedat VALUES ('2204','ACRIMSAT','1999-05-12','0','0000','720','27200','1999-12-20'); -- nasa
INSERT INTO technologylocatedat VALUES ('2205','MAVEN','2013-11-18','1','0004','4500','12466','2014-09-21'); -- nasa

INSERT INTO technologylocatedat VALUES ('2206','Hubble','1985-04-14','1','0000','540','27300','1990-04-24'); -- nasa
INSERT INTO technologylocatedat VALUES ('2207','James Webb','2021-12-25','1','0001','151500000','2798','2022-01-24');-- nasa
INSERT INTO technologylocatedat VALUES ('2208','HETE-2','2000-01-15','0','0000','650','27200','2000-10-09'); -- nasa
INSERT INTO technologylocatedat VALUES ('2209','Chandra X-ray','1998-12-15','1','0000',NULL,'6129','1999-07-23'); -- nasa
INSERT INTO technologylocatedat VALUES ('2210','Spitzer','2003-08-25','0','0001','150000000','1707','2003-12-18'); -- nasa

INSERT INTO technologylocatedat VALUES ('2211','Sojourner','1996-12-14','0','0004',NULL,NULL,'1997-07-04'); -- nasa
INSERT INTO technologylocatedat VALUES ('2212','Spirit','2003-06-10','0','0004',NULL,NULL,'2004-01-04'); -- nasa
INSERT INTO technologylocatedat VALUES ('2213','Zhurong','2020-07-23','1','0004',NULL,NULL,'2021-05-22'); -- cnsa china
INSERT INTO technologylocatedat VALUES ('2214','Curiosity','2011-11-26','1','0004',NULL,NULL,'2012-08-06'); -- nasa
INSERT INTO technologylocatedat VALUES ('2215','Perseverance','2020-07-30','1','0004',NULL,null,'2021-02-18'); -- nasa

INSERT INTO technologylocatedat VALUES ('2216','Mir','1986-02-16','0','0000','374','27700','1986-02-20'); -- roscosmos
INSERT INTO technologylocatedat VALUES ('2217','ISS','1998-11-01','1','0000','422','27600','1998-11-20'); -- nasa,roscosmos,csa,jaxa
INSERT INTO technologylocatedat VALUES ('2218','SKylab','1973-05-02','0','0000','274','27900','1973-05-14'); -- nasa
INSERT INTO technologylocatedat VALUES ('2219','Tiangong','2021-04-27','1','0000','384','27700','2021-04-29'); -- cmsa
INSERT INTO technologylocatedat VALUES ('2220','Tiangong-1','2016-08-31','0','0000','378','27680','2016-09-15'); -- cmsa

INSERT INTO satellites VALUES ('2201','Communication');
INSERT INTO satellites VALUES ('2202','Earth Observation');
INSERT INTO satellites VALUES ('2203','Earth Observation');
INSERT INTO satellites VALUES ('2204','Earth Observation');
INSERT INTO satellites VALUES ('2205','Mars Observation');

INSERT INTO telescopes VALUES ('2206');
INSERT INTO telescopes VALUES ('2207');
INSERT INTO telescopes VALUES ('2208');
INSERT INTO telescopes VALUES ('2209');
INSERT INTO telescopes VALUES ('2210');

INSERT INTO rovers VALUES ('2211');
INSERT INTO rovers VALUES ('2212');
INSERT INTO rovers VALUES ('2213');
INSERT INTO rovers VALUES ('2214');
INSERT INTO rovers VALUES ('2215');

INSERT INTO spacestations VALUES ('2216');
INSERT INTO spacestations VALUES ('2217');
INSERT INTO spacestations VALUES ('2218');
INSERT INTO spacestations VALUES ('2219');
INSERT INTO spacestations VALUES ('2220');

INSERT INTO discoveredminorobjects VALUES ('3301','511 Davida', '298','1','1903-05-30');
INSERT INTO discoveredminorobjects VALUES ('3302','87 Sylvia', '274','3','1866-05-16');
INSERT INTO discoveredminorobjects VALUES ('3303','1950 DA','2','1','1950-02-23'); 
INSERT INTO discoveredminorobjects VALUES ('3304','2 Pallas','511','9','1802-03-28');
INSERT INTO discoveredminorobjects VALUES ('3305','88 Thisbe','218','7','1866-06-15');

INSERT INTO discoveredminorobjects VALUES ('3306','Aarhus','1','7','1951-10-02');
INSERT INTO discoveredminorobjects VALUES ('3307','Pavlovka','20','9','1882-08-02');
INSERT INTO discoveredminorobjects VALUES ('3308','Sutters Mill','3','1','2012-04-24');
INSERT INTO discoveredminorobjects VALUES ('3309','Hoba','70','1','1920-05-05');
INSERT INTO discoveredminorobjects VALUES ('3310','Millbillillie','13','8','1970-11-24');

INSERT INTO discoveredminorobjects VALUES ('3311','Hale-Bopp','75','6','1995-07-23');
INSERT INTO discoveredminorobjects VALUES ('3312','Halley','1100','1','1758-04-03');
INSERT INTO discoveredminorobjects VALUES ('3313','Borrelly','500','5','1904-12-28');
INSERT INTO discoveredminorobjects VALUES ('3314','Wild 2','490','8','1978-04-12');
INSERT INTO discoveredminorobjects VALUES ('3315','Mrkos','98','7','1957-07-29');

INSERT INTO asteroids VALUES ('3301',FALSE);
INSERT INTO asteroids VALUES ('3302',FALSE);
INSERT INTO asteroids VALUES ('3303',TRUE);
INSERT INTO asteroids VALUES ('3304',FALSE);
INSERT INTO asteroids VALUES ('3305',FALSE);

INSERT INTO meteors VALUES ('3306','Chondrite');
INSERT INTO meteors VALUES ('3307','Achondrite');
INSERT INTO meteors VALUES ('3308','Chrondrite');
INSERT INTO meteors VALUES ('3309','Iron');
INSERT INTO meteors VALUES ('3310','Achondrite');

INSERT INTO comets VALUES ('3311',TRUE);
INSERT INTO comets VALUES ('3312',TRUE);
INSERT INTO comets VALUES ('3313',FALSE);
INSERT INTO comets VALUES ('3314',FALSE);
INSERT INTO comets VALUES ('3315',FALSE);

INSERT INTO hasa VALUES ('0000','0001','01');
INSERT INTO hasa VALUES ('0002','0001','01');
INSERT INTO hasa VALUES ('0003','0001','01');
INSERT INTO hasa VALUES ('0004','0001','01');
INSERT INTO hasa VALUES ('0005','0001','01');
INSERT INTO hasa VALUES ('0006','0001','01');
INSERT INTO hasa VALUES ('0007','0001','01');
INSERT INTO hasa VALUES ('0016','0001','01');
INSERT INTO hasa VALUES ('0012','0011','03');
INSERT INTO hasa VALUES ('0013','0011','03');
INSERT INTO hasa VALUES ('0014','0011','03');
INSERT INTO hasa VALUES ('0015','0011','03');

INSERT INTO workfor VALUES ('1101','1','1945-12-23');
INSERT INTO workfor VALUES ('1102','1','1965-05-21');
INSERT INTO workfor VALUES ('1103','1','1953-02-12');
INSERT INTO workfor VALUES ('1104','1','1942-08-23');
INSERT INTO workfor VALUES ('1105','1','1943-03-18');
INSERT INTO workfor VALUES ('1106','1','1947-06-19');
INSERT INTO workfor VALUES ('1107','1','1956-10-16');
INSERT INTO workfor VALUES ('1108','1','1965-04-30');
INSERT INTO workfor VALUES ('1109','1','1954-11-11');
INSERT INTO workfor VALUES ('1110','1','1969-09-02');
INSERT INTO workfor VALUES ('1111','4','1946-12-29');
INSERT INTO workfor VALUES ('1112','4','1965-04-13');

INSERT INTO astronautvisitedmoon VALUES ('1101','The Moon','0000','1969-07-21');
INSERT INTO astronautvisitedmoon VALUES ('1102','The Moon','0000','1969-07-21');
INSERT INTO astronautvisitedmoon VALUES ('1103','The Moon','0000','1969-11-19');
INSERT INTO astronautvisitedmoon VALUES ('1104','The Moon','0000','1969-11-19');
INSERT INTO astronautvisitedmoon VALUES ('1105','Miranda','0016','1975-02-05');
INSERT INTO astronautvisitedmoon VALUES ('1106','Miranda','0016','1975-02-05');

INSERT INTO astronautvisitedplanet VALUES ('1102','0000','2025-12-11');
INSERT INTO astronautvisitedplanet VALUES ('1110','0004','2050-03-12');
INSERT INTO astronautvisitedplanet VALUES ('1104','0003','2100-07-17');
INSERT INTO astronautvisitedplanet VALUES ('1108','0005','2098-06-14');
INSERT INTO astronautvisitedplanet VALUES ('1107','0007','2134-06-21');

INSERT INTO stationed VALUES ('1103','2218','1973-05-25','1973-06-22');
INSERT INTO stationed VALUES ('1104','2218','1973-07-28','1973-09-25');
INSERT INTO stationed VALUES ('1105','2218','1973-11-16','1974-02-28');
INSERT INTO stationed VALUES ('1111','2216','1986-03-31','1986-04-29');
INSERT INTO stationed VALUES ('1112','2216','1986-06-22','1986-08-10');

INSERT INTO own VALUES ('9','2201');
INSERT INTO own VALUES ('9','2202');
INSERT INTO own VALUES ('7','2203');
INSERT INTO own VALUES ('1','2204');
INSERT INTO own VALUES ('1','2205');
INSERT INTO own VALUES ('1','2206');
INSERT INTO own VALUES ('1','2207');
INSERT INTO own VALUES ('1','2208');
INSERT INTO own VALUES ('1','2209');
INSERT INTO own VALUES ('1','2210');
INSERT INTO own VALUES ('1','2211');
INSERT INTO own VALUES ('1','2212');
INSERT INTO own VALUES ('3','2213');
INSERT INTO own VALUES ('1','2214');
INSERT INTO own VALUES ('1','2215');
INSERT INTO own VALUES ('4','2216');
INSERT INTO own VALUES ('1','2217');
INSERT INTO own VALUES ('4','2217');
INSERT INTO own VALUES ('9','2217');
INSERT INTO own VALUES ('7','2217');
INSERT INTO own VALUES ('1','2218');
INSERT INTO own VALUES ('10','2219');
INSERT INTO own VALUES ('10','2220');