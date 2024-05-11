<?php 

include "config.php"; 


if (isset($_GET['s_no'])) {

    $id = $_GET['s_no'];

    $sql = "DELETE FROM `contact` WHERE `s_no`='$id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "<script>window.location.href='database.php';</script>";
        exit;

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 