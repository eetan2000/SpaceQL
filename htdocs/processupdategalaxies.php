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

                    $galxid = $_POST['galxid'];

                    $sql = "select diameter from galaxies where $galxid=galxid";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                    $diameter = $_POST['diameter'];

                    if(strcmp($diameter,"") == 0) {
                        unset($diameter);
                        $diameter = $row['diameter'];
                    }
                        
                    unset($sql);
                    $sql = "update galaxies set diameter=$diameter where $galxid=galxid;";
                    
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