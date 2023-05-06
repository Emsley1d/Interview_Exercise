<?php

include 'nav.php';
include 'config.php';

// Connect to the database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch employees from the database
$employee_query = "SELECT name FROM employees";
$employee_result = mysqli_query($conn, $employee_query);

// Fetch job types from the database
$job_query = "SELECT job FROM job_types";
$job_result = mysqli_query($conn, $job_query);


// Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee = $_POST["employee"];
    $job = $_POST["job"];
    $date = $_POST["date"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
    // $time_taken = $_POST["time_taken"];

    // Inserting time sheet data into database

    // ! below contains removed time_taken
    // $sql = "INSERT INTO timesheets (employee, job, date, start_time, end_time, time_taken) 
    //         VALUES ('$employee', '$job', '$date', '$start_time', '$end_time', '$time_taken')";

    $sql = "INSERT INTO timesheets (employee, job, date, start_time, end_time) 
    VALUES ('$employee', '$job', '$date', '$start_time', '$end_time')";

    if ($conn->query($sql) === TRUE) {
        echo "Time sheet saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>