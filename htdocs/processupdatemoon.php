<head>
    <link rel="stylesheet" href="styles.css">
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
                <?php
                    include 'connect.php';
                    $conn = OpenCon();

                    $name = $_POST['name'];

                    $sql = "select diameter,rotationalperiod,orbitalperiod,orbitdistance,orbitspeed from moons where '$name'=name";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                    $diameter = $_POST['diameter'];
                    $rotationalperiod = $_POST['rotationalperiod'];
                    $orbitalperiod = $_POST['orbitalperiod'];
                    $orbitdistance = $_POST['orbitdistance'];
                    $orbitspeed = $_POST['orbitspeed'];


                    if(strcmp($diameter,"") == 0) {
                        unset($diameter);
                        $diameter = $row['diameter'];
                    }
                    if(strcmp($rotationalperiod,"") == 0) {
                        unset($rotationalperiod);
                        $rotationalperiod = $row['rotationalperiod'];
                    }
                    if(strcmp($orbitalperiod,"") == 0) {
                        unset($orbitalperiod);
                        $orbitalperiod = $row['orbitalperiod'];
                    }
                    if(strcmp($orbitdistance,"") == 0) {
                        unset($orbitdistance);
                        $orbitdistance = $row['orbitdistance'];
                    }
                    if(strcmp($orbitspeed,"") == 0) {
                        unset($orbitspeed);
                        $orbitspeed = $row['orbitspeed'];
                    }
                    
                        
                    unset($sql);
                    $sql = "update moons set diameter=$diameter,rotationalperiod=$rotationalperiod,orbitalperiod=$orbitalperiod,orbitdistance=$orbitdistance,orbitspeed=$orbitspeed where '$name'=name;";
                    
                    if($conn->query($sql) === TRUE) {
                        echo "<h2>Updated successfully!</h2>";
                    }
                    else {
                        echo "<h2>Error occurred</h2>";
                    }
                ?>
            </div>
        </div>
    </div>

</body>