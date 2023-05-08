<?php
include 'config.php';

// ! EMPLOYEE OPTIONS
// Generate HTML for dynamic employee drop-down list
function generateEmployeeList($conn)
{
    // Retrieve list of employees from database
    $sql = "SELECT id, name FROM employees";
    $result = mysqli_query($conn, $sql);

    // Generate HTML for drop-down list
    $select = '<select id="remove_employee" name="remove_employee">';
    $select .= '<option value="">Select employee</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        $select .= '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
    }
    $select .= '</select>';
    return $select;
}

// Handle form submission to add employee
if (isset($_POST['add_employee'])) {
    $name = $_POST['add_employee'];

    // Insert new employee into database
    $stmt = $conn->prepare("INSERT INTO employees (name) VALUES (?)");
    $stmt->bind_param("s", $name);
    if ($stmt->execute()) {
        echo "Employee added successfully.";
    } else {
        echo "Error adding employee: " . mysqli_error($conn);
    }

}

// Handle form submission to remove employee
if (isset($_POST['remove_employee'])) {
    $name = $_POST['remove_employee'];

    // Remove employee from database
    $sql = "DELETE FROM employees WHERE name = '$name'";
    mysqli_query($conn, $sql);
}

// ! JOB OPTIONS
// Generate HTML for dynamic job type drop-down list
function generateJobTypeList($conn)
{
    // Retrieve list of jobs types from database
    $sql = "SELECT id, job FROM job_types";
    $result = mysqli_query($conn, $sql);

    // Generate HTML for drop-down list
    $select = '<select id="remove_job" name="remove_job">';
    $select .= '<option value="">Select job type</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        $select .= '<option value="' . $row['id'] . '">' . $row['job'] . '</option>';
    }
    $select .= '</select>';
    return $select;
}

// Handle form submission to add job type
if (isset($_POST['add_job'])) {
    $job = $_POST['add_job'];

    // Insert new job type into database
    $sql = "INSERT INTO job_types (job) VALUES ('$job')";
    mysqli_query($conn, $sql);
    
    // ! Attempting to add job success message
    // // Insert new job type into database
    // $sql = $conn->prepare("INSERT INTO job_types (job) VALUES (?)");
    // $stmt->bind_param("s", $job);
    // if ($stmt->execute()) {
    //     echo "Job type added successfully.";
    // } else {
    //     echo "Error adding job type: " . mysqli_error($conn);
    // }
}


// Handle form submission to remove job type
if (isset($_POST['remove_job'])) {
    $job = $_POST['remove_job'];

    // Remove job type from database
    $sql = "DELETE FROM job_types WHERE job = '$job'";
    mysqli_query($conn, $sql);
}
?>