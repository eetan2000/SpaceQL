<head>
    <link rel="stylesheet" type="text/css" href="styles.css?v=1" >
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

    
    <div class="main">
        <div class="main__container-2">
            <div class="main__content">
                <?php
                                        
                    function myTable($obConn,$sql)
                    {
                        $rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
                        if(mysqli_num_rows($rsResult)>0)
                        {
                        //We start with header. >>>Here we retrieve the field names<<< 
                            echo "<table width=\"100%\" border=\"0\"
                            cellspacing=\"2\"
                            cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#CCCCCC\">";
                            $i = 0;
                            while ($i < mysqli_num_fields($rsResult)){
                                $field = mysqli_fetch_field_direct($rsResult, $i);
                                $fieldName=$field->name;
                                echo "<td><strong>$fieldName</strong></td>";
                                $i = $i + 1;
                            }
                            echo "</tr>";
                            //>>>Field names retrieved<<<
                            //We dump info
                            $bolWhite=true;
                            while ($row = mysqli_fetch_assoc($rsResult)) {
                                echo $bolWhite ? "<tr bgcolor=\"#CCCCCC\">" : "<tr bgcolor=\"#FFF\">";
                                $bolWhite=!$bolWhite; 
                                foreach($row as $data) {
                                    echo "<td>$data</td>";
                                }
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else {
                            echo "<h2>No records that match</h2>";
                        }
                    }

                    include 'connect.php';
                    $table = $_POST['table'];
                    $conn = OpenCon();
                    $sql = "select count(*) from $table";
                    myTable($conn,$sql);

                ?>
            </div>
        </div>
    </div>


</body>

<?php

?>