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
            <form action="processupdatemeteors.php" method="post" class="main__content">
                <h1>Update meteor attributes</h1>
                <h2>(Leave empty if no change)</h2>
                <h3>Select which meteor to update:</h3>
                <?php
                    $result = $conn->query("select meteroid from meteors");
                    echo "<select name='meteroid'>";
                    while($row = $result->fetch_assoc()) {
                        unset($meteroid);
                        $meteroid = $row['meteroid'];
                        unset($result2);
                        $result2 = $conn->query("select name from discoveredminorobjects where $meteroid=minobjid");
                        $row2 = $result2->fetch_assoc();
                        unset($name);
                        $meteroid = $row['meteroid'];
                        $name = $row2['name'];
                        echo '<option value="'.$meteroid.'">'.$name.'</option>';
                    }
                    echo "</select>";
                ?>

                </br>
                </br>
                <input type="text" name="diameter" placeholder="Diameter (integer)">

                </br>
                </br>
                <input type="text" name="type" placeholder="Type">
                
                </br>
                </br>
                <input name="discoverydate" type="text" placeholder="Date Discovered YYYY-MM-DD">

                <input type="submit" value="Update" name="submit">
            </form>
        </div>
    </div>