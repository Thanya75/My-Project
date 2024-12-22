<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "new_rmu_package_db";

    // Create Connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error($conn));
    }
    
    // set character set utf-8
    mysqli_query($conn, 'SET CHARACTER SET UTF8');
    date_default_timezone_set('Asia/Bangkok');
?>