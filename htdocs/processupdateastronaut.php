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

                    $astroid = $_POST['astroid'];

                    $sql = "select fname,lname,dob from astronauts where $astroid=astroid";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $dob = $_POST['dob'];

                    if(strcmp($fname,"") == 0) {
                        unset($fname);
                        $fname = $row['fname'];
                    }
                    if(strcmp($lname,"") == 0) {
                        unset($lname);
                        $lname = $row['lname'];
                    }
                    if(strcmp($dob,"") == 0) {
                        unset($dob);
                        $dob = $row['dob'];
                    }
                        
                    unset($sql);
                    $sql = "update astronauts set fname='$fname',lname='$lname',dob='$dob' where $astroid=astroid;";
                    
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