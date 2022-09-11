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

                    $spaceagencyid = $_POST['spaceagencyid'];

                    $sql = "select country,datefounded,president from spaceagencies where $spaceagencyid=spaceagencyid";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                    $country = $_POST['country'];
                    $datefounded = $_POST['datefounded'];
                    $president = $_POST['president'];


                    if(strcmp($country,"") == 0) {
                        unset($country);
                        $country = $row['country'];
                    }
                    if(strcmp($datefounded,"") == 0) {
                        unset($datefounded);
                        $datefounded = $row['datefounded'];
                    }
                    if(strcmp($president,"") == 0) {
                        unset($president);
                        $president = $row['president'];
                    }
                        
                    unset($sql);
                    $sql = "update spaceagencies set country='$country',datefounded='$datefounded',president='$president' where $spaceagencyid=spaceagencyid;";
                    
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