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
            <form action="processdeletemoon.php" method="post" class="main__content">
                <h1>Delete moon entities</h1>
                <h3>Select which moon to delete:</h3>
                <?php
                    $result = $conn->query("select name,planetid from moons");
                    echo "<select name='planetidandname'>";
                    while($row = $result->fetch_assoc()) {
                        unset($name,$planetid);
                        $planetid = $row['planetid'];
                        $name = $row['name'];
                        echo "<option value=\"$planetid"."|"."$name\">$planetid $name</option>";
                    }
                    echo "</select>";
                ?>

                <input type="submit" value="Delete" name="submit">
            </form>
        </div>
    </div>