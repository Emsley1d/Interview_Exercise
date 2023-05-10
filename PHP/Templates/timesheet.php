<?php

include 'nav.php';
include 'fetch_requests.php';

// ! I don't understand why I can't get the calculateTime in PHP working so I've reverted back to my original JavaScript version.
// function calculateTime($startTime, $endTime)
// {
// 	$startDateTime = DateTime::createFromFormat('H:i', $startTime);
// 	$endDateTime = DateTime::createFromFormat('H:i', $endTime);
// 	$timeDiff = abs($endDateTime->getTimestamp() - $startDateTime->getTimestamp());
// 	$hours = floor($timeDiff / 3600);
// 	$minutes = floor(($timeDiff % 3600) / 60);
// 	$formattedHours = $hours < 10 ? '0' . $hours : $hours;
// 	$formattedMinutes = $minutes < 10 ? '0' . $minutes : $minutes;
// 	$timeTaken = $formattedHours . ' : ' . $formattedMinutes;
// 	return $timeTaken;

// }

// if (isset($_POST['start_time']) && isset($_POST['end_time'])) {
// 	$timeTaken = calculateTime($_POST['start_time'], $_POST['end_time']);
// }


?>

<script>
		function calculateTime() {
			const startTime = document.getElementById('start_time').value;
			const endTime = document.getElementById('end_time').value;
			const startDateTime = new Date(`2000-01-01 ${startTime}`);
			const endDateTime = new Date(`2000-01-01 ${endTime}`);
			const timeDiff = Math.abs(endDateTime - startDateTime);
			const hours = Math.floor(timeDiff / 3600000);
			const minutes = Math.floor((timeDiff % 3600000) / 60000);
			const formattedHours = hours < 10 ? `0${hours}` : hours;
			const formattedMinutes = minutes < 10 ? `0${minutes}` : minutes;
			const timeTaken = `${formattedHours} : ${formattedMinutes}`;
			document.getElementById('time_taken').value = timeTaken;
		}
	</script>


<div class="form">
	<h1>Time Sheet</h1>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<body>
		<form action="save_timesheet.php" method="POST">

			<h3>Please populate all fields to submit a new time sheet:</h3>

			<label for="employee">Employee:</label>
			<select id="employee" name="employee" required>
				<option value="select_employee">Select employee</option>
				<?php
				$employee_query = "SELECT name FROM employees";
				$employee_result = mysqli_query($conn, $employee_query);

				// Loop through the results and display them as options in the drop-down menu
				while ($employee_row = mysqli_fetch_assoc($employee_result)) {
					echo '<option value="' . $employee_row['name'] . '">' . $employee_row['name'] . '</option>';
				}
				?>
			</select><br><br>

			<label for="job">Job:</label>
			<select id="job" name="job" required>
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


			<label for="start_time">Date:</label>
			<input type="date" id="date" name="date" required><br><br>

			<label for="start_time">Start Time:</label>
			<input type="time" id="start_time" name="start_time" required><br><br>

			<label for="end_time">End Time:</label>
			<input type="time" id="end_time" name="end_time" required><br><br>

			<!-- PHP onclick button. -->
			<!-- <button type="button" onclick="document.getElementById('time_taken').value = calculateTime()">Calculate Time Taken</button><br><br> -->

			<button type="button" onclick="calculateTime()">Calculate Time Taken</button><br><br>

			<label for="time_taken">Time Taken:</label>
			<input type="text" id="time_taken" name="time_taken" readonly><br><br>

			<button type="submit">Save Time Sheet</button>&nbsp &nbsp<button type="reset" value="Reset">Clear
				Form</button>
		</form>

	</body>

</div>