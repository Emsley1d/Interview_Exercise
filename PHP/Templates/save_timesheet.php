<?php
include 'config.php';

// Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee = $_POST["employee"];
    $job = $_POST["job"];
    $date = $_POST["date"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
    $time_taken = $_POST["time_taken"];

    // Inserting time sheet data into database
    $sql = "INSERT INTO timesheets (employee, job, date, start_time, end_time, time_taken) 
            VALUES ('$employee', '$job', '$date', '$start_time', '$end_time', '$time_taken')";

    if ($conn->query($sql) === TRUE) {
        echo "Time sheet saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>