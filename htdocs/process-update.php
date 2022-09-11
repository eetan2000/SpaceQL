<?php
    include 'connect.php';
    $id = $_POST['id'];
    $customerzip = $_POST['customerzip'];
    $conn = OpenCon();
    $sql = "update customer set customerzip =
    '$customerzip' where customerid = '$id'";
    if ($conn->query($sql) === TRUE) { 
        echo "Record updated successfully";
    } 
    else {
        echo "Error updating record: " . $conn->error;
    }
?>