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
            <form action="processupdatesa.php" method="post" class="main__content">
                <h1>Update space agency attributes</h1>
                <h2>(Leave empty if no change)</h2>
                <h3>Select which space agency to update:</h3>
                <?php
                    $result = $conn->query("select spaceagencyid,name from spaceagencies");
                    echo "<select name='spaceagencyid'>";
                    while($row = $result->fetch_assoc()) {
                        unset($spaceagencyid);
                        $spaceagencyid = $row['spaceagencyid'];
                        unset($name);
                        $name = $row['name'];
                        echo '<option value="'.$spaceagencyid.'">'.$name.'</option>';
                    }
                    echo "</select>";
                ?>

                </br>
                </br>
                <input type="text" name="country" placeholder="Country">

                </br>
                </br>
                <input type="text" name="datefounded" placeholder="Date Founded YYYY-MM-DD">

                </br>
                </br>
                <input name="president" type="text" placeholder="President">

                <input type="submit" value="Update" name="submit">
            </form>
        </div>
    </div>