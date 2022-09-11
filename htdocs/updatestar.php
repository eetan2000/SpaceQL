<head>
    <link rel="stylesheet" href="styles.css?v=1" type="text/css">
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

    <?php
        include 'connect.php';
        $conn = OpenCon();
    ?>

    <div class="main">
        <div class="main__container-2">
            <form action="processupdatestar.php" method="post" class="main__content">
                <h1>Update star attributes</h1>
                <h2>(Leave empty if no change)</h2>
                <h3>Select which star to update:</h3>
                <?php
                    $result = $conn->query("select starid from stars");
                    echo "<select name='starid'>";
                    while($row = $result->fetch_assoc()) {
                        unset($starid);
                        $starid = $row['starid'];
                        unset($result2);
                        $result2 = $conn->query("select name from discoveredlargeobjects where $starid=largeobjid");
                        $row2 = $result2->fetch_assoc();
                        unset($name);
                        $starid = $row['starid'];
                        $name = $row2['name'];
                        echo '<option value="'.$starid.'">'.$name.'</option>';
                    }
                    echo "</select>";
                ?>

                </br>
                </br>
                <input type="text" name="diameter" placeholder="Diameter (integer)">

                </br>
                </br>
                <input type="text" name="mass" placeholder="Mass">
                
                </br>
                </br>
                <input name="discoverdate" type="text" placeholder="Discover Date YYYY-MM-DD">

                </br>
                </br>
                <input name="composition" type="text" placeholder="Composition">

                <input type="submit" value="Update" name="submit">
            </form>
        </div>
    </div>