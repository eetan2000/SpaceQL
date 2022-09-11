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
            <form action="processdeleteasteroid.php" method="post" class="main__content">
                <h1>Delete asteroid entities</h1>
                <h3>Select which asteroid to delete:</h3>
                <?php
                    $result = $conn->query("select astroidid from asteroids");
                    echo "<select name='astroidid'>";
                    while($row = $result->fetch_assoc()) {
                        unset($astroidid);
                        $astroidid = $row['astroidid'];
                        unset($result2);
                        $result2 = $conn->query("select name from discoveredminorobjects where $astroidid=minobjid");
                        $row2 = $result2->fetch_assoc();
                        unset($name);
                        $astroidid = $row['astroidid'];
                        $name = $row2['name'];
                        //echo '<option value="'.$astroidid.'">'.$name.'</option>';
                        echo "<option value=\"$astroidid\">$astroidid $name</option>";
                    }
                    echo "</select>";
                ?>

                <input type="submit" value="Delete" name="submit">
            </form>
        </div>
    </div>