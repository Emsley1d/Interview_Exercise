<?php
include 'config.php';

// ! EMPLOYEE OPTIONS
// Generate HTML for dynamic employee drop-down list
function generateEmployeeList($conn)
{
    // Retrieve list of employees from database
    $sql = "SELECT * FROM employees";
    $result = mysqli_query($conn, $sql);

    // Generate HTML for drop-down list
    $select = '<select id="remove_employee" name="remove_employee">';
    $select .= '<option value="">Select employee</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        $select .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
    $select .= '</select>';
    return $select;
}

// Handle form submission to add employee
if (isset($_POST['add_employee'])) {
    $name = $_POST['add_employee'];

    // Insert new employee into database
    $sql = "INSERT INTO employees (name) VALUES ('$name')";
    mysqli_query($conn, $sql);
}

// Handle form submission to remove employee
if (isset($_POST['remove_employee'])) {
    $id = $_POST['remove_employee'];

    // Remove employee from database
    $sql = "DELETE FROM employees WHERE id = $id";
    mysqli_query($conn, $sql);
}

// Generate HTML for dynamic job type drop-down list
function generateJobTypeList($conn)
{
    // Retrieve list of job types from database
    $sql = "SELECT * FROM job_types";
    $result = mysqli_query($conn, $sql);

    // Generate HTML for drop-down list
    $select = '<select id="remove_job" name="remove_job">';
    $select .= '<option value="">Select job type</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        $select .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
    $select .= '</select>';
    return $select;
}
// ! JOB OPTIONS
// Handle form submission to add job type
if (isset($_POST['add_job'])) {
    $name = $_POST['add_job'];

    // Insert new job type into database
    $sql = "INSERT INTO job_types(name) VALUES ('$name')";
    mysqli_query($conn, $sql);
}

// Handle form submission to remove job type
if (isset($_POST['remove_job'])) {
    $id = $_POST['remove_job'];

    // Remove job type from database
    $sql = "DELETE FROM job WHERE id = $id";
    mysqli_query($conn, $sql);
}
?>