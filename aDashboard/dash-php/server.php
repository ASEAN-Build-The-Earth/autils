<?php 

    $servername = "14.182.76.206";
    $username = "adashboardadmin";
    $password = "adashboard.ga";
    $dbname = "adashboard_userdb";

    // Create Connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    } 

?>