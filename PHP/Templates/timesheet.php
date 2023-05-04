<?php
include 'nav.php';
?>

<div class="timesheet">
	<h1>Time Sheet</h1>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>
		<form action="#" method="POST">


			<label for="employee">Employee:</label>
			<select id="employee" name="employee" required>
				<option value="">Select employee</option>
				<option value="job1">Dan Emsley</option>
				<option value="job2">John Smith</option>
				<option value="job3">Sophie Hunt</option>
			</select><br><br>

			<label for="job">Job:</label>
			<select id="job" name="job" required>
				<option value="">Select job type</option>
				<option value="job1">Job 1</option>
				<option value="job2">Job 2</option>
				<option value="job3">Job 3</option>
			</select><br><br>


			<label for="start_time">Date:</label>
			<input type="date" id="date" name="date" required><br><br>

			<label for="start_time">Start Time:</label>
			<input type="time" id="start_time" name="start_time" required><br><br>

			<label for="end_time">End Time:</label>
			<input type="time" id="end_time" name="end_time" required><br><br>

			<button type="button" onclick="calculateTime()">Calculate Time Taken</button><br><br>

			<label for="time_taken">Time Taken:</label>
			<input type="text" id="time_taken" name="time_taken" readonly><br><br>

			<button type="submit">Submit Form</button>  <button type="reset" value="Reset">Clear Form</button>
		</form>

		<script>

	</script>
</div>