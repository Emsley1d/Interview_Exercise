<?php
include 'nav.php';
include 'fetch_requests.php'
?>

<div class="form">
	<h1>Time Sheet Report</h1>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <h3>Please search by one or more fields:</h3>

<form action="#" method="POST">


    <label for="employee">Search By Employee:</label>
    <select id="employee" name="employee">
        <option value="">Select employee</option>
        <option value="job1">Dan Emsley</option>
        <option value="job2">John Smith</option>
        <option value="job3">Sophie Hunt</option>
    </select><br><br>

    <label for="job">Search by Job Type:</label>
    <select id="job" name="job">
        <option value="">Select job type</option>
        <option value="job1">Job 1</option>
        <option value="job2">Job 2</option>
        <option value="job3">Job 3</option>
    </select><br><br>


    <label for="start_time">Search By Date:</label>
    <input type="date" id="date" name="date"><br><br>

    <button type="submit">Search</button>&nbsp &nbsp<button type="reset" value="Reset">Clear Form</button>

</form>
