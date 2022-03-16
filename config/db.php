<?php 
    // connect to database
    $conn = mysqli_connect('localhost', 'levi', 'test1234', 'helio');

    // check connection
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }
?>