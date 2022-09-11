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
            <form action="processdeletestar.php" method="post" class="main__content">
                <h1>Delete star entities</h1>
                <h3>Select which star to delete:</h3>
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
                        //echo '<option value="'.$starid.'">'.$name.'</option>';
                        echo "<option value=\"$starid\">$starid $name</option>";
                    }
                    echo "</select>";
                ?>

                <input type="submit" value="Delete" name="submit">
            </form>
        </div>
    </div>