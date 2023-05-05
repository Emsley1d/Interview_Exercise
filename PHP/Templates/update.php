<?php
include 'nav.php';
?>

<div class="form"?>

<h1>Update:</h1>

<h3>Add or remove employees/job types:</h3>
<br>

<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

<form action="#" method="POST">

<h3 class="update_header">Employee:</h3>

<label for="start_time">Add:</label>
		<input type="text" id="add_employee" name="add_employee">&nbsp<button type="submit">Add</button><br><br>

    <label for="employee">Remove:</label>
    <select id="remove_employee" name="remove_employee">
        <option value="">Select employee</option>
        <option value="job1">Dan Emsley</option>
        <option value="job2">John Smith</option>
        <option value="job3">Sophie Hunt</option>
    </select>&nbsp<button type="submit">Remove</button><br><br>

    <br>


<h3 class="update_header">Job:</h3>

<label for="start_time">Add:</label>
		<input type="text" id="add_job" name="add_job">&nbsp<button type="submit">add</button><br><br>

    <label for="job">Remove:</label>
    <select id="remove_job" name="remove_job">
        <option value="">Select job type</option>
        <option value="job1">Job 1</option>
        <option value="job2">Job 2</option>
        <option value="job3">Job 3</option>
    </select>&nbsp<button type="submit">Remove</button><br><br>


</div>