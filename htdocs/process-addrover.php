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
                    $datecreated = $_POST['datecreated'];
                    $operational = $_POST['operational'];
                    $orbitaldistance = $_POST['orbitaldistance'];
                    $orbitalspeed = $_POST['orbitalspeed'];
                    $arrivaldate = $_POST['arrivaldate'];
                    $techid = rand();
                    $largeobjid = $_POST['largeobjid'];

                    $result = $conn->query("select techid from technologylocatedat");
                    while ($row = $result->fetch_assoc()) {
                        unset($id);
                        $id = $row['techid'];
                        if($techid == $id){
                            $techid = rand();
                        }
                    }
                    
                    $sql = "INSERT INTO technologyLocatedAt VALUES ('$techid','$name','$datecreated', '$operational','$largeobjid','$orbitaldistance','$orbitalspeed','$arrivaldate');";
                    if ($conn->query($sql) === TRUE) { 
                    } 
                    else {
                        echo "Error updating record: " . $conn->error;
                    }
                    $sql = "INSERT INTO rovers VALUES ('$techid')";
                    if ($conn->query($sql) === TRUE) { 
                        echo "<h2>Record updated successfully</h2>";
                    } 
                    else {
                        echo "Error updating record: " . $conn->error;
                    }
                ?>
            </div>
        </div>
    </div>
</body>