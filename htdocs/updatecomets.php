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
            <form action="processupdatecomets.php" method="post" class="main__content">
                <h1>Update comets attributes</h1>
                <h2>(Leave empty if no change)</h2>
                <h3>Select which comets to update:</h3>
                <?php
                    $result = $conn->query("select cometid from comets");
                    echo "<select name='cometid'>";
                    while($row = $result->fetch_assoc()) {
                        unset($cometid);
                        $cometid = $row['cometid'];
                        unset($result2);
                        $result2 = $conn->query("select name from discoveredminorobjects where $cometid=minobjid");
                        $row2 = $result2->fetch_assoc();
                        unset($name);
                        $cometid = $row['cometid'];
                        $name = $row2['name'];
                        echo '<option value="'.$cometid.'">'.$name.'</option>';
                    }
                    echo "</select>";
                ?>

                </br>
                </br>
                <input type="text" name="diameter" placeholder="Diameter (integer)">

                </br>
                </br>
                <h3>Visible from earth?</h3>
                <select name="visiblefromearth">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
                
                </br>
                </br>
                <input name="discoverydate" type="text" placeholder="Date Created YYYY-MM-DD">

                <input type="submit" value="Update" name="submit">
            </form>
        </div>
    </div>