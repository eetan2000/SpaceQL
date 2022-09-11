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

                    $cometid = $_POST['cometid'];

                    $sql = "select diameter,discoverydate from discoveredminorobjects where $cometid=minobjid";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                    $diameter = $_POST['diameter'];
                    $discoverydate = $_POST['discoverydate'];
                    $visiblefromearth = $_POST['visiblefromearth'];


                    if(strcmp($diameter,"") == 0) {
                        unset($diameter);
                        $diameter = $row['diameter'];
                    }
                    if(strcmp($discoverydate,"") == 0) {
                        unset($discoverydate);
                        $discoverydate = $row['discov$discoverydate'];
                    }
                        
                    unset($sql,$result,$row);

                    $sql = "select visiblefromearth from comets where $cometid=cometid";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    
                    if(strcmp($visiblefromearth,"") == 0) {
                        unset($visiblefromearth);
                        $visiblefromearth = $row['visiblefromearth'];
                    }

                    unset($sql);
                    $sql = "update discoveredminorobjects set diameter=$diameter,discoverydate='$discoverydate' where $cometid=minobjid;";
                    
                    if($conn->query($sql) === TRUE) {
                        unset($sql);
                        $sql = "update comets set visiblefromearth='$visiblefromearth' where $cometid=cometid;";
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