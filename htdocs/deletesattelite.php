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
            <form action="processdeletesattelite.php" method="post" class="main__content">
                <h1>Delete sattelite entities</h1>
                <h3>Select which sattelite to delete:</h3>
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
                        //echo '<option value="'.$satid.'">'.$name.'</option>';
                        echo "<option value=\"$satid\">$satid $name</option>";
                    }
                    echo "</select>";
                ?>

                <input type="submit" value="Delete" name="submit">
            </form>
        </div>
    </div>