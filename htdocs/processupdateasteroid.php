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

                    $astroidid = $_POST['astroidid'];

                    $sql = "select diameter,discoverydate from discoveredminorobjects where $astroidid=minobjid";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                    $diameter = $_POST['diameter'];
                    $discoverydate = $_POST['discoverydate'];
                    $extinctionthreat = $_POST['extinctionthreat'];


                    if(strcmp($diameter,"") == 0) {
                        unset($diameter);
                        $diameter = $row['diameter'];
                    }
                    if(strcmp($discoverydate,"") == 0) {
                        unset($discoverydate);
                        $discoverydate = $row['discov$discoverydate'];
                    }
                        
                    unset($sql,$result,$row);

                    $sql = "select extinctionthreat from asteroids where $astroidid=astroidid";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    
                    if(strcmp($extinctionthreat,"") == 0) {
                        unset($extinctionthreat);
                        $extinctionthreat = $row['extinctio$extinctionthreat'];
                    }

                    unset($sql);
                    $sql = "update discoveredminorobjects set diameter=$diameter,discoverydate='$discoverydate' where $astroidid=minobjid;";
                    
                    if($conn->query($sql) === TRUE) {
                        unset($sql);
                        $sql = "update asteroids set extinctionthreat='$extinctionthreat' where $astroidid=astroidid;";
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