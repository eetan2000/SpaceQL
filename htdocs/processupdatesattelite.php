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

                    $satid = $_POST['satid'];

                    $sql = "select datecreated,operational,orbitdistance,orbitspeed,arrivaldate from technologylocatedat where $satid=techid";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                    $datecreated = $_POST['datecreated'];
                    $operational = $_POST['operational'];
                    $orbitdistance = $_POST['orbitdistance'];
                    $orbitspeed = $_POST['orbitspeed'];
                    $arrivaldate = $_POST['arrivaldate'];
                    $type = $row['type'];


                    if(strcmp($datecreated,"") == 0) {
                        unset($datecreated);
                        $datecreated = $row['datecreated'];
                    }
                    if(strcmp($operational,"") == 0) {
                        unset($operational);
                        $operational = $row['operational'];
                    }
                    if(strcmp($orbitdistance,"") == 0) {
                        unset($orbitdistance);
                        $orbitdistance = $row['orbitdistance'];
                    }
                    if(strcmp($orbitspeed,"") == 0) {
                        unset($orbitspeed);
                        $orbitspeed = $row['orbitspeed'];
                    }
                    if(strcmp($arrivaldate,"") == 0) {
                        unset($arrivaldate);
                        $arrivaldate = $row['arrivaldate'];
                    }
                        
                    unset($sql,$result,$row);

                    $sql = "select type from satellites where $satid=satid";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    
                    if(strcmp($type,"") == 0) {
                        unset($type);
                        $type = $row['type'];
                    }

                    unset($sql);
                    $sql = "update technologylocatedat set datecreated='$datecreated',operational=$operational,orbitspeed=$orbitspeed,orbitdistance=$orbitdistance where $satid=techid;";
                    
                    if($conn->query($sql) === TRUE) {
                        unset($sql);
                        $sql = "update satellites set type='$type' where $satid=satid;";
                        if($conn->query($sql) === TRUE) {
                            echo "<h2>Updated successfully!</h2>";
                        }
                        else {
                            echo "<h2>Error occurred</h2>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>

</body>