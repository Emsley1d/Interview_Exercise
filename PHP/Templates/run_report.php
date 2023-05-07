<?php

include 'nav.php';
include 'config.php';


// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the search criteria
    $employee = $_POST['employee'] ?? '';
    $job = $_POST['job'] ?? '';
    $date = $_POST['date'] ?? '';

    // Construct query based on search criteria
    $query = "SELECT * FROM timesheets WHERE 1=1";
    if (!empty($employee)) {
        $query .= " AND employee='$employee'";
    }
    if (!empty($job)) {
        $query .= " AND job='$job'";
    }
    if (!empty($date)) {
        $query .= " AND date='$date'";
    }

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Display results
    if (mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<tr><th>Employee</th><th>Job Type</th><th>Date</th><th>Start Time</th><th>End Time</th><th>Created At</th></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['employee'] . '</td>';
            echo '<td>' . $row['job'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . $row['start_time'] . '</td>';
            echo '<td>' . $row['end_time'] . '</td>';
            echo '<td>' . $row['created_at'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No results found; please search using a different criteria.';
    }
}

?>