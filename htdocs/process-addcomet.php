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
                    $discoverydate = $_POST['discoverydate'];
                    $visiblefromearth = $_POST['visiblefromearth'];
                    $spaceagencyid = $_POST['spaceagencyid'];
                    $minobjid = rand();


                    $result = $conn->query("select minobjid from discoveredminorobjects");
                    while ($row = $result->fetch_assoc()) {
                        unset($id);
                        $id = $row['minobjid'];
                        if($minobjid == $id){
                            $minobjid = rand();
                        }
                    }
                    
                    $sql = "INSERT INTO discoveredminorobjects VALUES ('$minobjid','$name','$diameter', '$spaceagencyid','$discoverydate');";
                    if ($conn->query($sql) === TRUE) { 
                    } 
                    else {
                        echo "Error updating record: " . $conn->error;
                    }
                    $sql = "INSERT INTO comets VALUES ('$minobjid','$visiblefromearth')";
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