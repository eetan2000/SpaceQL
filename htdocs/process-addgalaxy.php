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
                    $galxid = rand();

                    $result = $conn->query("select galxid from galaxies");
                    while ($row = $result->fetch_assoc()) {
                        unset($id);
                        $id = $row['galxid'];
                        if($galxid == $id){
                            $galxid = rand();
                        }
                    }
                    
                    $sql = "INSERT INTO galaxies VALUES ('$galxid','$name','$diameter');";
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