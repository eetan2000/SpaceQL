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

                    $starid = $_POST['starid'];

                    $sql = "delete from discoveredlargeobjects where $starid=largeobjid";
                    $result = $conn->query($sql);
                    if($conn->query($sql) === TRUE) {
                        unset($sql);
                        $sql = "delete from stars where $starid=starid";
                        if($conn->query($sql) === TRUE) {
                            echo "<h2>Entity deleted</h2>";
                        }
                        else {
                            echo "<h2>Error occured</h2>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>

</body>