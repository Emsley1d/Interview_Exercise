<?php

include 'config.php';

// ! EMPLOYEE FETCH REQUEST

// Fetch employees from the database
$employee_query = "SELECT name FROM employees";
$employee_result = mysqli_query($conn, $employee_query);

// Loop through the results + display
while ($employee_row = mysqli_fetch_assoc($employee_result)) {
     echo '<option value="' . $employee_row['name'] . '">' . $employee_row['name'] . '</option>';
}

// ! JOB FETCH REQUESTS

// Fetch job types from the database
$job_query = "SELECT job FROM job_types";
$job_result = mysqli_query($conn, $job_query);

// Loop through the results + display
while ($employee_row = mysqli_fetch_assoc($employee_result)) {
    echo '<option value="' . $employee_row['name'] . '">' . $employee_row['name'] . '</option>';
}




?>