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
            <form action="processupdatesattelite.php" method="post" class="main__content">
                <h1>Update satellite attributes</h1>
                <h2>(Leave empty if no change)</h2>
                <h3>Select which satellite to update:</h3>
                <?php
                    $result = $conn->query("select satid from satellites");
                    echo "<select name='satid'>";
                    while($row = $result->fetch_assoc()) {
                        unset($satid);
                        $satid = $row['satid'];
                        unset($result2);
                        $result2 = $conn->query("select name from technologylocatedat where $satid=techid");
                        $row2 = $result2->fetch_assoc();
                        unset($name);
                        $satid = $row['satid'];
                        $name = $row2['name'];
                        echo '<option value="'.$satid.'">'.$name.'</option>';
                    }
                    echo "</select>";
                ?>

                </br>
                </br>
                <input type="text" name="datecreated" placeholder="Date Created YYYY-MM-DD">

                </br>
                </br>
                <select name="operational">
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
                
                </br>
                </br>
                <input name="orbitdistance" type="text" placeholder="Orbit Distance (integer)">

                </br>
                </br>
                <input name="orbitspeed" type="text" placeholder="Orbit Speed (integer)">

                </br>
                </br>
                <input name="arrivaldate" type="text" placeholder="Arrival Date YYYY-MM-DD">

                </br>
                </br>
                <input name="type" type="text" placeholder="Type">

                <input type="submit" value="Update" name="submit">
            </form>
        </div>
    </div>