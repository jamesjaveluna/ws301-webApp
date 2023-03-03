<?php

require_once('config.php');

function db_connect() {
    // Establish a connection to the database using the credentials in config.php
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Check for errors
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Return the connection object
    return $conn;
}


function getStudent(){
    // Establish a database connection
    $conn = db_connect();
    
    // Query the database for student data
    $result = mysqli_query($conn, "SELECT * FROM student");
    
    // Create an array to hold the student data
    $students = array();
    
    // Loop through the results and add each row to the array
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }
    
    // Close the database connection
    mysqli_close($conn);
    
    // Return the student data as JSON
    return json_encode($students);
}
