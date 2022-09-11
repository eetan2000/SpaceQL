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
            <form action="processdeleteplanet.php" method="post" class="main__content">
                <h1>Delete planet entities</h1>
                <h3>Select which planet to delete:</h3>
                <?php
                    $result = $conn->query("select planetid from planets");
                    echo "<select name='planetid'>";
                    while($row = $result->fetch_assoc()) {
                        unset($planetid);
                        $planetid = $row['planetid'];
                        unset($result2);
                        $result2 = $conn->query("select name from discoveredlargeobjects where $planetid=largeobjid");
                        $row2 = $result2->fetch_assoc();
                        unset($name);
                        $planetid = $row['planetid'];
                        $name = $row2['name'];
                        //echo '<option value="'.$planetid.'">'.$name.'</option>';
                        echo "<option value=\"$planetid\">$planetid $name</option>";
                    }
                    echo "</select>";
                ?>

                <input type="submit" value="Delete" name="submit">
            </form>
        </div>
    </div>