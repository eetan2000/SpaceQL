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
            <form action="processdeletegalaxy.php" method="post" class="main__content">
                <h1>Delete galaxy entities</h1>
                <h3>Select which galaxy to delete:</h3>
                <?php
                    $result = $conn->query("select galxid,name from galaxies");
                    echo "<select name='galxid'>";
                    while($row = $result->fetch_assoc()) {
                        unset($galxid);
                        $galxid = $row['galxid'];
                        unset($name);
                        $name = $row['name'];
                        echo '<option value="'.$galxid.'">'.$name.'</option>';
                    }
                    echo "</select>";
                ?>

                <input type="submit" value="Delete" name="submit">
            </form>
        </div>
    </div>