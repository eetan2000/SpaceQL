<head>
    <link rel="stylesheet" type="text/css" href="styles.css?v=1">
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
                <h1>Add new entity</h1>
                <h2>Scroll down for more information</h2>
            </div>
        </div>
    </div>

    <?php
        include 'connect.php';
        $conn = OpenCon();
    ?>
    <div class="services">
        <div class="services__container">

            <!-- PLANET -->
            <form action="process-addplanet.php" method="post" class="services__card services__card-4">
                <input name="name" type="text" placeholder="Name">
                <input name="diameter" type="text" placeholder="Diameter (integer)">
                <input name="mass" type="text" placeholder="Mass">
                <input name="discoverdate" type="text" placeholder="Discover Date YYYY-MM-DD">
                <input name="orbitalperiod" type="text" placeholder="Orbital Period (float)">
                <input name="rotationalperiod" type="text" placeholder="Rotational Period (float)">
                <h3>Select the space agency that made the discovery:<h3>
                <?php
                    $result = $conn->query("select spaceagencyid, name from spaceagencies");
                    echo "<select name='spaceagencyid'>";
                    while($row = $result->fetch_assoc()) {
                        unset($spaceagencyid,$name);
                        $spaceagencyid = $row['spaceagencyid'];
                        $name = $row['name'];
                        echo '<option value="'.$spaceagencyid.'">'.$name.'</option>';
                    }
                    echo '<option value="NULL">NULL</option>';
                    echo "</select>"
                ?>
                <input type="submit" value="Insert">
                <h2>Add planet</h2>
            </form>


            <!-- STAR -->
            <form action="process-addstar.php" method="post" class="services__card services__card-5">
                <input name="name" type="text" placeholder="Name">
                <input name="diameter" type="text" placeholder="Diameter (integer)">
                <input name="mass" type="text" placeholder="Mass">
                <input name="discoverdate" type="text" placeholder="Discover Date YYYY-MM-DD">
                <input name="composition" type="text" placeholder="Composition">
                <h3>Agency that made the discovery:<h3>
                <?php
                    $result = $conn->query("select spaceagencyid, name from spaceagencies");
                    echo "<select name='spaceagencyid'>";
                    while($row = $result->fetch_assoc()) {
                        unset($spaceagencyid,$name);
                        $spaceagencyid = $row['spaceagencyid'];
                        $name = $row['name'];
                        echo '<option value="'.$spaceagencyid.'">'.$name.'</option>';
                    }
                    echo '<option value="NULL">NULL</option>';
                    echo "</select>";

                ?>
                <input type="submit" value="Insert">
                <h2>Add star</h2>
            </form>
            
            <!-- SPACE AGENCY -->
            <form action="process-addspaceagency.php" method="post" class="services__card services__card-6">
                <input name="country" type="text" placeholder="Country">
                <input name="datefounded" type="text" placeholder="Date Founded YYYY-MM-DD">
                <input name="name" type="text" placeholder="Name of Space Agency">
                <input name="president" type="text" placeholder="Name of President">
                <input type="submit" value="Insert">
                <h2>Add a new space agency</h2>
            </form>

            <!-- GALAXY -->
            <form action="process-addgalaxy.php" method="post" class="services__card services__card-7">
                <input name="name" type="text" placeholder="Name">
                <input name="diameter" type="text" placeholder="Diameter (integer)">
                <input type="submit" value="Insert">
                <h2>Add a galaxy</h2>
            </form>

            <!-- SOLAR SYSTEM -->
            <form action="process-addsolarsystem.php" method="post" class="services__card services__card-8">
                <input name="name" type="text" placeholder="Name">
                <input name="diameter" type="text" placeholder="Diameter (integer)">
                <h3>Select the galaxy the solar system is in</h3>
                <?php
                    $result = $conn->query("select galxid, name from galaxies");
                    echo "<select name='galxid'>";
                    while($row = $result->fetch_assoc()) {
                        unset($galxid,$name);
                        $galxid = $row['galxid'];
                        $name = $row['name'];
                        echo '<option value="'.$galxid.'">'.$name.'</option>';
                    }
                    echo "</select>";
                ?>
                <input type="submit" value="Insert">
                <h2>Add a solar system</h2>
            </form>

            <!-- MOON -->
            <form action="process-addmoon.php" method="post" class="services__card services__card-9">
                <input name="name" type="text" placeholder="Name">
                <input name="diameter" type="text" placeholder="Diameter (integer)">
                <input name="orbitalperiod" type="text" placeholder="Orbital Period (float)">
                <input name="rotationalperiod" type="text" placeholder="Rotational Period (float)">
                <input name="orbitaldistance" type="text" placeholder="Orbital Distance (integer)">
                <input name="orbitalspeed" type="text" placeholder="Orbital Speed (integer)">
                <h3>Select the planet:</h3>
                <?php
                    $result = $conn->query("select planetid from planets");
                    echo "<select name='planetid'>";
                    while($row = $result->fetch_assoc()) {
                        unset($planetid);
                        $planetid = $row['planetid'];
                        unset($result2);
                        $result2 = $conn->query("select name from discoveredlargeobjects where $planetid=largeobjid");
                        $row2 = $result2->fetch_assoc();
                        unset($name);
                        $planetid = $row['planetid'];
                        $name = $row2['name'];
                        echo '<option value="'.$planetid.'">'.$name.'</option>';
                    }
                    echo "</select>";
                ?>
                <input type="submit" value="Insert">
                <h2>Add a moon</h2>
            </form>
            
            
            <!-- ASTRONAUT -->
            <form action="process-addastronaut.php" method="post" class="services__card services__card-10">
                <input name="fname" type="text" placeholder="First Name">
                <input name="lname" type="text" placeholder="Last Name">
                <input name="dob" type="text" placeholder="Date of Birth YYYY-MM-DD">
                <input type="submit" value="Insert">
                <h2>Add an astronaut</h2>
            </form>

             <!-- sattelite -->
            <form action="process-addsatellite.php" method="post" class="services__card services__card-11">
                <input name="name" type="text" placeholder="Name">
                <input name="datecreated" type="text" placeholder="Date Created YYYY-MM-DD">
                <h3>Is this technology operational?</h3>
                <select name="operational">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
                </br>
                <input name="orbitaldistance" type="text" placeholder="Orbital Distance (integer)">
                <input name="orbitalspeed" type="text" placeholder="Orbital Speed (integer)">
                <input name="arrivaldate" type="text" placeholder="Arrival Date YYYY-MM-DD">
                <input name="type" type="text" placeholder="Type of Sattelite">

                <h3>Select where this is located:</h3>
                <?php
                    $result = $conn->query("select largeobjid, name from discoveredlargeobjects");
                    echo "<select name='largeobjid'>";
                    while($row = $result->fetch_assoc()) {
                        $largeobjid = $row['largeobjid'];
                        $name = $row['name'];
                        echo '<option value="'.$largeobjid.'">'.$name.'</option>';
                    }
                    echo "</select>";

                ?>
                <input type="submit" value="Insert">
                <h2>Add a sattelite</h2>
            </form>


            <!-- telescope -->
            <form action="process-addtelescope.php" method="post" class="services__card services__card-12">
                <input name="name" type="text" placeholder="Name">
                <input name="datecreated" type="text" placeholder="Date Created YYYY-MM-DD">
                <h3>Is this technology operational?</h3>
                <select name="operational">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
                </br>
                <input name="orbitaldistance" type="text" placeholder="Orbital Distance (integer)">
                <input name="orbitalspeed" type="text" placeholder="Orbital Speed (integer)">
                <input name="arrivaldate" type="text" placeholder="Arrival Date YYYY-MM-DD">

                <h3>Select which object this technology is located at:</h3>
                <?php
                    $result = $conn->query("select largeobjid, name from discoveredlargeobjects");
                    echo "<select name='largeobjid'>";
                    while($row = $result->fetch_assoc()) {
                        $largeobjid = $row['largeobjid'];
                        $name = $row['name'];
                        echo '<option value="'.$largeobjid.'">'.$name.'</option>';
                    }
                    echo "</select>";

                ?>
                <input type="submit" value="Insert">
                <h2>Add a telescope</h2>
            </form>


            <!-- rovers -->
            <form action="process-addrover.php" method="post" class="services__card services__card-13">
                <input name="name" type="text" placeholder="Name">
                <input name="datecreated" type="text" placeholder="Date Created YYYY-MM-DD">
                <h3>Is this technology operational?</h3>
                <select name="operational">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
                </br>
                <input name="orbitaldistance" type="text" placeholder="Orbital Distance (integer)">
                <input name="orbitalspeed" type="text" placeholder="Orbital Speed (integer)">
                <input name="arrivaldate" type="text" placeholder="Arrival Date YYYY-MM-DD">

                <h3>Select which object this technology is located at:</h3>
                <?php
                    $result = $conn->query("select largeobjid, name from discoveredlargeobjects");
                    echo "<select name='largeobjid'>";
                    while($row = $result->fetch_assoc()) {
                        $largeobjid = $row['largeobjid'];
                        $name = $row['name'];
                        echo '<option value="'.$largeobjid.'">'.$name.'</option>';
                    }
                    echo "</select>";

                ?>
                <input type="submit" value="Insert">
                <h2>Add a rover</h2>
            </form>


             <!-- space station -->
             <form action="process-addspacestation.php" method="post" class="services__card services__card-14">
                <input name="name" type="text" placeholder="Name">
                <input name="datecreated" type="text" placeholder="Date Created YYYY-MM-DD">
                <h3>Is this technology operational?</h3>
                <select name="operational">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
                </br>
                <input name="orbitaldistance" type="text" placeholder="Orbital Distance (integer)">
                <input name="orbitalspeed" type="text" placeholder="Orbital Speed (integer)">
                <input name="arrivaldate" type="text" placeholder="Arrival Date YYYY-MM-DD">

                <h3>Select which object this technology is located at:</h3>
                <?php
                    $result = $conn->query("select largeobjid, name from discoveredlargeobjects");
                    echo "<select name='largeobjid'>";
                    while($row = $result->fetch_assoc()) {
                        $largeobjid = $row['largeobjid'];
                        $name = $row['name'];
                        echo '<option value="'.$largeobjid.'">'.$name.'</option>';
                    }
                    echo "</select>";

                ?>
                <input type="submit" value="Insert">
                <h2>Add a space station</h2>
            </form>

            <!-- asteroid -->
            <form action="process-addasteroid.php" method="post" class="services__card services__card-15">
                <input name="name" type="text" placeholder="Name">
                <input name="diameter" type="text" placeholder="Diameter (integer)">
                <input name="discoverydate" type="text" placeholder="Discovery Date YYYY-MM-DD">
                <h3>Extinction threat?</h3>
                <select name="extinctionthreat">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
                </br>
                <h3>Agency that made the discovery:</h3>
                <?php
                    $result = $conn->query("select spaceagencyid, name from spaceagencies");
                    echo "<select name='spaceagencyid'>";
                    while($row = $result->fetch_assoc()) {
                        $spaceagencyid = $row['spaceagencyid'];
                        $name = $row['name'];
                        echo '<option value="'.$spaceagencyid.'">'.$name.'</option>';
                    }
                    echo "</select>";

                ?>

                <input type="submit" value="Insert">
                <h2>Add an asteroid</h2>
            </form>


            <!-- meteor -->
            <form action="process-addmeteor.php" method="post" class="services__card services__card-16">
                <input name="name" type="text" placeholder="Name">
                <input name="diameter" type="text" placeholder="Diameter (integer)">
                <input name="discoverydate" type="text" placeholder="Discovery Date YYYY-MM-DD">
                <input name="type" type="text" placeholder="Type">

                <h3>Agency that made the discovery:</h3>
                <?php
                    $result = $conn->query("select spaceagencyid, name from spaceagencies");
                    echo "<select name='spaceagencyid'>";
                    while($row = $result->fetch_assoc()) {
                        $spaceagencyid = $row['spaceagencyid'];
                        $name = $row['name'];
                        echo '<option value="'.$spaceagencyid.'">'.$name.'</option>';
                    }
                    echo "</select>";

                ?>

                <input type="submit" value="Insert">
                <h2>Add a meteor</h2>
            </form>

            <!-- comet -->
            <form action="process-addcomet.php" method="post" class="services__card services__card-17">
                <input name="name" type="text" placeholder="Name">
                <input name="diameter" type="text" placeholder="Diameter (integer)">
                <input name="discoverydate" type="text" placeholder="Discovery Date YYYY-MM-DD">
                <h3>Visible from Earth?</h3>
                <select name="visiblefromearth">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
                </br>
                <h3>Agency that made the discovery:</h3>
                <?php
                    $result = $conn->query("select spaceagencyid, name from spaceagencies");
                    echo "<select name='spaceagencyid'>";
                    while($row = $result->fetch_assoc()) {
                        $spaceagencyid = $row['spaceagencyid'];
                        $name = $row['name'];
                        echo '<option value="'.$spaceagencyid.'">'.$name.'</option>';
                    }
                    echo "</select>";

                ?>

                <input type="submit" value="Insert">
                <h2>Add a comet</h2>
            </form>



        </div>
    </div>

</body>