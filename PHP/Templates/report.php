<?php
include 'nav.php';
include 'fetch_requests.php'
    ?>

<div class="form">
    <h1>Time Sheet Report</h1>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <h3>Search by one or more fields; or just press search to show all time sheets:</h3>

    <form action="run_report.php" method="POST">


        <label for="employee">Search By Employee:</label>
        <select id="employee" name="employee">
            <option value="name">Select employee</option>
            <?php
            $employee_query = "SELECT name FROM employees";
            $employee_result = mysqli_query($conn, $employee_query);

            // Loop through the results and display them as options in the drop-down menu
            while ($employee_row = mysqli_fetch_assoc($employee_result)) {
                echo '<option value="' . $employee_row['name'] . '">' . $employee_row['name'] . '</option>';
            }
            ?>
        </select><br><br>

        <label for="job">Search by Job Type:</label>
        <select id="job" name="job">
            <option value="">Select job type</option>
            <?php
            $job_query = "SELECT job FROM job_types";
            $job_result = mysqli_query($conn, $job_query);

            // Loop through the results and display them as options in the drop-down menu
            while ($job_row = mysqli_fetch_assoc($job_result)) {
                echo '<option value="' . $job_row['job'] . '">' . $job_row['job'] . '</option>';
            }
            ?>
        </select><br><br>


        <label for="start_time">Search By Date:</label>
        <input type="date" id="date" name="date"><br><br>

        <button type="submit">Search</button>&nbsp &nbsp<button type="reset" value="Reset">Clear Form</button>

    </form>


