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

                    $planetid = $_POST['planetid'];

                    $sql = "select name,diameter,mass,discoverdate from discoveredlargeobjects where $planetid=largeobjid";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                    $diameter = $_POST['diameter'];
                    $mass = $_POST['mass'];
                    $discoverdate = $_POST['discoverdate'];
                    $orbitalperiod = $_POST['orbitalperiod'];
                    $rotationalperiod = $_POST['rotationalperiod'];
                    $name = $row['name'];


                    if(strcmp($diameter,"") == 0) {
                        unset($diameter);
                        $diameter = $row['diameter'];
                    }
                    if(strcmp($mass,"") == 0) {
                        unset($mass);
                        $mass = $row['mass'];
                    }
                    if(strcmp($discoverdate,"") == 0) {
                        unset($discoverdate);
                        $discoverdate = $row['discoverdate'];
                    }

                        
                    unset($sql,$result,$row);

                    $sql = "select orbitalperiod,rotationalperiod from planets where $planetid=planetid";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    

                    if(strcmp($orbitalperiod,"") == 0) {
                        unset($orbitalperiod);
                        $orbitalperiod = $row['orbitalperiod'];
                    }
                    if(strcmp($rotationalperiod,"") == 0) {
                        unset($rotationalperiod);
                        $rotationalperiod = $row['rotationalperiod'];
                    }

                    unset($sql);
                    $sql = "update discoveredlargeobjects set name='$name',diameter=$diameter,mass='$mass',discoverdate='$discoverdate' where $planetid=largeobjid;";
                    
                    if($conn->query($sql) === TRUE) {
                        unset($sql);
                        $sql = "update planets set orbitalperiod=$orbitalperiod,rotationalperiod=$rotationalperiod where $planetid=planetid;";
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