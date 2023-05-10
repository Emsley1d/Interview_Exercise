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

// ! Add employee
// Handle form submission to add employee
if (isset($_POST['add_employee'])) {
    $name = $_POST['add_employee'];

    // Insert new employee into database
    $stmt = $conn->prepare("INSERT INTO employees (name) VALUES (?)");
    $stmt->bind_param("s", $name);
    if ($stmt->execute()) {
        echo "Employee successfully added.";
    } else {
        echo "Error adding employee: " . mysqli_error($conn);
    }

}
// ! Remove employee
// Handle form submission to remove employee
if (isset($_POST['remove_employee'])) {
    $name = $_POST['remove_employee'];

    // Remove employee from database
    $sql = "DELETE FROM employees WHERE name = '$name'";
    // mysqli_query($conn, $sql);
    $stmt->bind_param("s", $name);
    if ($stmt->execute()) {
        echo "Employee successfully removed.";
    } else {
        echo "Error adding employee: " . mysqli_error($conn);
    }
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

// ! Add job type
// Handle form submission to add job type
if (isset($_POST['add_job'])) {
    $job = $_POST['add_job'];

    // Insert new job type into database
    $sql = "INSERT INTO job_types (job) VALUES ('$job')";
    mysqli_query($conn, $sql);
        if ($stmt->execute()) {
        echo "Job type successfully added.";
    } else {
        echo "Error adding job type: " . mysqli_error($conn);
    }

}

// ! Remove job type
// Handle form submission to remove job type
if (isset($_POST['remove_job'])) {
    $job = $_POST['remove_job'];

    // Remove job type from database
    $sql = "DELETE FROM job_types WHERE job = '$job'";
    mysqli_query($conn, $sql);
    if ($stmt->execute())  {
        echo "Job type successfully removed.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<?php
