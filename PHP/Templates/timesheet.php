<?php
include 'nav.php';
?>

<div class="form">
	<h1>Time Sheet</h1>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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



	<body>
		<form action="save_timesheet.php" method="POST">


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

			<button type="submit">Save Time Sheet</button>&nbsp &nbsp<button type="reset" value="Reset">Clear
				Form</button>
		</form>

</div>