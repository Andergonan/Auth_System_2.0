<?php
    $conn = mysqli_connect("localhost", "root", "", "auth_system_2");
    if ( mysqli_connect_errno() ) {    
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
?>