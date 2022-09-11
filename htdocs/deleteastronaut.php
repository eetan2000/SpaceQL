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
            <form action="processdeleteastronaut.php" method="post" class="main__content">
                <h1>Delete astronaut entities</h1>
                <h3>Select which astronaut to delete:</h3>
                <?php
                    $result = $conn->query("select astroid,fname,lname from astronauts");
                    echo "<select name='astroid'>";
                    while($row = $result->fetch_assoc()) {
                        unset($astroid);
                        $astroid = $row['astroid'];
                        unset($name);
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        echo "<option value=\"$astroid\">$astroid $fname $lname</option>";
                    }
                    echo "</select>";
                ?>

                <input type="submit" value="Delete" name="submit">
            </form>
        </div>
    </div>