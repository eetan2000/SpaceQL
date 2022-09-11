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
            <form action="processupdatemoon.php" method="post" class="main__content">
                <h1>Update moon attributes</h1>
                <h2>(Leave empty if no change)</h2>
                <h3>Select which moon to update:</h3>
                <?php
                    $result = $conn->query("select name from moons");
                    echo "<select name='name'>";
                    while($row = $result->fetch_assoc()) {
                        unset($name);
                        $name = $row['name'];
                        echo '<option value="'.$name.'">'.$name.'</option>';
                    }
                    echo "</select>";
                ?>

                </br>
                </br>
                <input type="text" name="diameter" placeholder="Diameter (integer)">

                </br>
                </br>
                <input type="text" name="rotationalperiod" placeholder="Rotational Period (float)">

                </br>
                </br>
                <input type="text" name="orbitalperiod" placeholder="Orbital Period (float)">

                </br>
                </br>
                <input type="text" name="orbitdistance" placeholder="Orbit Distance (integer)">

                </br>
                </br>
                <input type="text" name="orbitspeed" placeholder="Orbit Speed (integer)">

                <input type="submit" value="Update" name="submit">
            </form>
        </div>
    </div>