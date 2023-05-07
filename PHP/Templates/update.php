<?php
include 'nav.php';
include 'fetch_requests.php';
include 'save_update.php';
?>

<div class="form">

    <h1>Update:</h1>

    <h3>Add or remove employees/job types:</h3>
    <br>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <form action="#" method="POST">

        <h3 class="update_header">Employee:</h3>

        <label for="add_employee">Add:</label>
        <input type="text" id="add_employee" name="add_employee">&nbsp<button type="submit">Add</button><br><br>

        <label for="remove_employee">Remove:</label>
        <select id="remove_employee" name="remove_employee">
            <option value="name">Select employee</option>
            <?php
            $employee_query = "SELECT name FROM employees";
            $employee_result = mysqli_query($conn, $employee_query);

            // Loop through the results and display them as options in the drop-down menu
            while ($employee_row = mysqli_fetch_assoc($employee_result)) {
                echo '<option value="' . $employee_row['name'] . '">' . $employee_row['name'] . '</option>';
            }
            ?>

        </select>&nbsp<button type="submit">Remove</button><br><br>

        <br>


        <h3 class="update_header">Job:</h3>

        <label for="add_job">Add:</label>
        <input type="text" id="add_job" name="add_job">&nbsp<button type="submit">Add</button><br><br>

        <label for="remove_job">Remove:</label>
        <select id="remove_job" name="remove_job">
            <option value="job">Select job type</option>
            <?php
            $job_query = "SELECT job FROM job_types";
            $job_result = mysqli_query($conn, $job_query);

            // Loop through the results and display them as options in the drop-down menu
            while ($job_row = mysqli_fetch_assoc($job_result)) {
                echo '<option value="' . $job_row['job'] . '">' . $job_row['job'] . '</option>';
            }
            ?>

        </select>&nbsp<button type="submit">Remove</button><br><br>

    </form>

</div>