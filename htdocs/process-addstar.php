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
                    $diameter = $_POST['diameter'];
                    $mass = $_POST['mass'];
                    $discoverdate = $_POST['discoverdate'];
                    $discoverspaceagency = $_POST['spaceagencyid'];
                    $composition = $_POST['composition'];
                    $largeobjid = rand();

                    $result = $conn->query("select largeobjid from discoveredlargeobjects");
                    while ($row = $result->fetch_assoc()) {
                        unset($id);
                        $id = $row['largeobjid'];
                        if($largeobjid == $id){
                            $largeobjid = rand();
                        }
                    }
                    
                    if(strcmp($discoverspaceagency,"NULL") == 0) {
                        $sql = "INSERT INTO discoveredlargeobjects VALUES ('$largeobjid','$name','$diameter','$mass',NULL,'$discoverdate');";
                    }
                    else {
                        $sql = "INSERT INTO discoveredlargeobjects VALUES ('$largeobjid','$name','$diameter','$mass','$discoverspaceagency','$discoverdate');";
                    }
                    if ($conn->query($sql) === TRUE) { 
                    } 
                    else {
                        echo "Error updating record: " . $conn->error;
                    }
                    $sql = "INSERT INTO stars VALUES ('$largeobjid','$composition');";
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