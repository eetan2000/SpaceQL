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
