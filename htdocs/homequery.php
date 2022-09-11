<head>
    <link rel="stylesheet" type="text/css" href="styles.css?v=1" >
</head>

<body>
    <div class="navbar">
        <div class="navbar__container">
            <ul class="navbar__menu">
            </br>
                <li class="navbar__btn">
                    <a href="/home.html" class="button">
                        Home
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main">
        <div class="main__container-2">
            <div class="main__content">
                </br>
                </br>
                <form method="post" action="selectionquery.php">
                    <h2>Selection query for diameters of astronomical objects:</h2>
                    <h3>Choose a table</h3>
                    <select name="table">
                        <option value="discoveredlargeobjects">Discovered Large Objects (Planets/Stars)</option>
                        <option value="galaxies">Galaxies</option>
                        <option value="solarsystemingalaxy">Solar Systems</option>
                        <option value="moons">Moons</option>
                        <option value="discoveredminorobjects">Discovered Minor Objects (Asteroids/Meteors/Comets)</option>
                    </select>
                    </br>
                    </br>

                    <h3>Choose a condition</h3>
                    <select name="condition">
                        <option value="="> = </option>
                        <option value="<"> < (less than) </option>
                        <option value="<="> <= </option>
                        <option value=">"> > (bigger than) </option>
                        <option value=">="> >= </option>
                        <option value="!="> != </option>
                    </select>
                    </br>
                    </br>

                    <h3>Enter a diameter number for the selection</h3>
                    <input name="diameter" type="text" placeholder="Diameter (integer)">

                    </br>
                    </br>
                    <input type="submit" value="Submit Selection">
                </form>


                </br>
                </br>                    
                </br>
                </br>


                <form method="post" action="projectionquery.php">
                    <h2>Projection query for space technologies:</h2>
                    </br>
                    </br>

                    <h3>Choose an attribute</h3>
                    <select name="attribute">
                        <option value="datecreated">Date Created</option>
                        <option value="operational">Operational</option>
                        <option value="largeobjid">Large Object ID</option>
                        <option value="orbitdistance">Orbit Distance</option>
                        <option value="orbitspeed">Orbit Speed</option>
                        <option value="arrivaldate">Arrival Date</option>
                    </select>
                    </br>
                    </br>

                    <input type="submit" value="Submit Projection">
                </form>


                </br>
                </br>
                </br>
                </br>


                <form method="post" action="joinquery.php">
                    <h2>Join query for space technologies located at large astronomical objects:</h2>
                    </br>
                    </br>

                    <h3>Choose a technology</h3>
                    <select name="table">
                        <option value="satellites">Satellites</option>
                        <option value="telescopes">Telescopes</option>
                        <option value="rovers">Rovers</option>
                        <option value="spacestations">Space Stations</option>
                    </select>
                    </br>
                    </br>

                    <input type="submit" value="Submit Join">
                </form>


                </br>
                </br>
                </br>
                </br>


                <form method="post" action="aggregationquery.php">
                    <h2>Aggregation query for the number of selected object in database</h2>
                    </br>
                    </br>

                    <h3>Choose a table</h3>
                    <select name="table">
                        <option value="discoveredlargeobjects">Discovered Large Objects</option>
                        <option value="planets">Planets</option>
                        <option value="stars">Stars</option>
                        <option value="spaceagencies">Space Agencies</option>
                        <option value="galaxies">Galaxies</option>
                        <option value="solarsystemingalaxy">Solar Systems</option>
                        <option value="moons">Moons</option>
                        <option value="astronauts">Astronauts</option>
                        <option value="technologylocatedat">Technology</option>
                        <option value="satellites">Satellites</option>
                        <option value="telescopes">Telescopes</option>
                        <option value="rovers">Rovers</option>
                        <option value="spacestations">Space Stations</option>
                        <option value="discoveredminorobjects">Discovered Minor Objects</option>
                        <option value="asteroids">Asteroids</option>
                        <option value="meteors">Meteors</option>
                        <option value="comets">Comets</option>
                        <option value="orbit">Planetary orbits</option>
                        <option value="hasa">Has-a relationship</option>
                        <option value="workfor">Astronaut work-for space agency</option>
                        <option value="astronautvisitedmoon">Astronaut-moon visits</option>
                        <option value="astronautvisitedplanet">Astronaut-planet visits</option>
                        <option value="stationed">Astronaut-stationed</option>
                        <option value="own">Technology owned by space agencies</option>
                    </select>
                    </br>
                    </br>

                    <input type="submit" value="Submit Aggregation">
                </form>
                </br>
                </br>                    
                </br>
                </br>


                <form method="post" action="nestedaggregation.php">
                    <h2>Nested aggregation query space agencies where the number of technology owned is more/less than the average space agency</h2>
                    </br>
                    </br>

                    <h3>Choose condition</h3>
                    <select name="condition">
                        <option value=">"> > (More)</option>
                        <option value="<"> < (Less)</option>
                    </select>
                    </br>
                    </br>

                    <input type="submit" value="Submit Nested Aggregation">
                </form>
                </br>
                </br>                    
                </br>
                </br>


                <form method="post" action="divisionquery.php">
                    <h2>Division query for all astronauts stationed on space stations</h2>
                    </br>
                    </br>

                    <h3>Choose astronaut attributes</h3>
                    <select name="attribute">
                        <option value="fname">First Name</option>
                        <option value="lname">Last Name</option>
                        <option value="dob">dob</option>
                        <option value="fname,lname">First Name, Last Name</option>
                        <option value="fname,lname,dob">First Name, Last Name, dob</option>
                    </select>
                    </br>
                    </br>
                    <input type="submit" value="Submit division">
                </form>
                </br>
                </br>                    
                </br>
                </br>



            </div>
        </div>
    </div>
</body>