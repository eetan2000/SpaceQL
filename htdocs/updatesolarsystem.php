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
            <form action="processupdatesolarsystems.php" method="post" class="main__content">
                <h1>Update solar system attributes</h1>
                <h2>(Leave empty if no change)</h2>
                <h3>Select which solar system to update:</h3>
                <?php
                    $result = $conn->query("select solarsysid,name from solarsystemingalaxy");
                    echo "<select name='solarsysid'>";
                    while($row = $result->fetch_assoc()) {
                        unset($solarsysid);
                        $solarsysid = $row['solarsysid'];
                        unset($name);
                        $name = $row['name'];
                        echo '<option value="'.$solarsysid.'">'.$name.'</option>';
                    }
                    echo "</select>";
                ?>

                </br>
                </br>
                <input type="text" name="diameter" placeholder="Diameter (integer)">

                <input type="submit" value="Update" name="submit">
            </form>
        </div>
    </div>