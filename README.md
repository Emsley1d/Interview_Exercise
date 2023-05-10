# Interview Exercise


## Brief:

The goal of this exercise is to provide a showcase of your software design capabilities, your software
development skills and your knowledge of best practices.

For this reason, this exercise tries to cover several different aspects of a typical software solution.
This is not a production exercise and it will never be used in a real environment; it is not expected to
use real data. The purpose of this exercise is merely academic, to show your knowledge and
technical skills in different aspects of what would be representative of your potential future role as a
Software Developer within the team.


## Description

The task is to develop an application where end users can enter and track Timesheets for given
employees.

For reference, the technologies used within our team that could be used for this exercise are:

• Windows Forms (C#, VB.NET)<br>
• Web Based Applications (PHP, ASP.NET)<br>
• Mobile Applications (Xamarin, PowerApps)<br>
• Office Based Applications (Excel, Word)<br>

For the purposes of this exercise, we encourage you to use these, but we would consider
applicants using a different approaches if the solution provided is well designed and/or is
creative enough.


## Business Case

WEF would like you to manage their timesheets electronically for their employees.

Currently, they submit their timesheets via paper which is then stored in Folders within their office.
They have grown to a size where they can no longer manage this.

WEF have no strong feelings around which technology they would like to use, they are
simply looking to digitise this process to minimise errors and speed up entry.

The timesheet application needs to be able to select a Job, an Employee and the time taken on that
job in each day, once data has been entered, they would like to be able to review timesheets
entered via a Timesheet Summary Report.

They have also added, if possible, to be able to automatically calculate time remaining on each job
based on what timesheets have been entered up to now and if any Employee works over 10 hours in
a day, an email should be automatically sent to management.
 #

## Technology Used

After researching the various technologies used within the team I initially decided to use Windows Forms (C#, VB.NET) for a couple of reasons:

-   Although I haven't created anything with C# I do have some prior knowledge of it.
-   Of all the options C# is most like the languages I am more proficient with.
-   I am keen to try working with Windows Forms and interested to see how they interact with C#.
-   Windows Forms look like the quickest way of creating a suitable UI for the application.
-   I don't think I stand to gain much in the way of experience if I opt to use Office Based Applications (Excel, Word).
-   I have never worked with Mobile Applications (Xamarin, PowerApps) before and although I would like to do so, with the timescale involved I don't think now is the best time to start.
-   Although I am familiar Web Based Applications I have never used PHP or ASP.NET.
#

## Planning

Before getting to work I wanted to establish the best way to create a Windows Forms based application. The general consensus is that Visual Studio is better to create Windows Forms based applications with than VS Code. I downloaded Visual Studio and attempted to create a "Windows Forms.App(.NET)" project however soon learned that working on a Mac I was unable to create such a project. I then came to realise that developing a Timesheet Application that was limited to use on Windows desktop devices (at least without the installation of additional software) could be somewhat limiting and an unnecessary hurdle for WEF and their employees. 
#

## Actual Technology Used

For the above reasons I then chose to develop a Web Based Application using PHP; despite having never used it before. I decided to avoid ASP.NET; my research suggests it's more suited to large scale applications so it would be overkill for WEF's needs.
#

## Build Notes:

Ordinarily I would create a Wireframe and ERD before starting to create a project however having never used PHP before (and having immediately run in to problems with Windows Forms) I wanted to make sure I could get some basic files and folders up and running in VS Code and on localhost.

I researched the basic PHP file structure.<br>
Test.php file created and running on live server.<br>
Base.php file created and attempted to extend to login.php; it didn't work and I established I needed to install Smarty to allow me to do so.<br>
Installed composer which then allowed me to install Smarty. Created .gitignore to prevent vendor files uploading to GitHub.<br>

I set Smarty up in main.php but not rendering base.tpl or login.tpl; instead I receive a 404 error and my code automatically downloads.<br>
Google would suggest my web server isn't set up to serve files with a .tpl extension?<br>
Established I would need to add "AddType application/x-httpd-php .tpl" to my Apache "httpd.conf" file. Looked at alternative ways to render my the .tpl files but I understand using the .tpl file extension is the best practice. Updated my Apache "httpd.conf" file and restarted Apache however still having problems. Walkthroughs suggested creating a ".htaccess" file in my project and populating it with "AddType application/x-httpd-php .tpl"; I have done this but my .tpl files still don't render in browser and continue to download automatically. <br>
I do receive a "200" status code for the get request (::1]:52243 [200]: GET /PHP/Templates/login.tpl) so my templates are being found and served to the browser.<br>
I attempted to use the .smarty file extension in place of .tpl but my VS Code failed to recognise the file extension and treated them as plain text. I changed my .tpl files to .php (having not worked with PHP before I believe this isn't the done thing?); they now render in my browser however base.php does not extend to my other pages. Realised I could extend base.php to other php files by including the below on them:

        <?php
        include 'base.php';
        ?>

base.php was effectively going to be a homepage but I can't get the block content to extend to other pages so I am just going to turn it into the nav bar.

## Forms:

I was going to create login and registration functions (authentication and authorisation are two of my favourite things to develop) but the brief doesn't stipulate these are required so I changed login.php to timesheet.php and created A Time Sheet Form. Having said that as this is a Web Application anyone could access it so it'll need to be protected with credentials. 

Created Time Sheet Report page so you can search by Employee, Job Type and Date (search yet to work).<br>
Created Update page to add/remove employees/job type.(add/remove functions yet to work).<br>
Creating CalculateTime function to calculate time taken from job start to finish. (written in JS (as opposed to PHP) as keen to get starting on database/form functionality)<br>

I am happy with the basics of the Front End so am going to turn my attention to creating a database.

## Database & Time Sheet Form:

I considered using SQLite for the database (being a good option for small to medium sized web applications) but without knowing WEF Engineering's current employee count (hopefully small if they've been doing it on paper!) or potential future count I thought it best to play it safe and future proof the application by using MySQL due to the scalability it offers vs SQLite. 

MySQL installed via brew and new user created.<br>
Tried to create a MYSQL database but kept running into a syntax error "ERROR 1064 (42000)"; eventually realised the user password had to be in speech marks.<br>
Created a table in my database as below:

        mysql> CREATE TABLE timesheets (
        ->     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        ->     employee VARCHAR(30) NOT NULL,
        ->     job VARCHAR(30) NOT NULL,
        ->     date DATE NOT NULL,
        ->     start_time TIME NOT NULL,
        ->     end_time TIME NOT NULL,
        ->     time_taken TIME NOT NULL,
        ->     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        -> );

Linked the timesheet HTML form to save_timesheet.php.<br>
Populated a timesheet form to test it however when clicking the "Save Time Sheet" button I receive the below error in browser:

![save_timesheet error 1](/Images/Screenshot%202023-05-05%20at%2016.18.55.png)

Added "include 'PHP/config.php'" to the top of save_timesheet.php and tested again however another error appeared in addition to the one above:

![save_timesheet error 2](/Images/Screenshot%202023-05-05%20at%2016.19.30.png)

Moved config.php in to the PHP/Templates folder and amended the path on save_timesheet.php to "config.php" which resolved the issue; I'm unsure why it wouldn't work with config.php being in its original location and with the correct path on save_timesheet.php. I'll have to have a rethink of my file structure though.

Tested again with config.php having been moved and I have made some progress. The database is now connected but the data is unable to be saved into it:

![save_timesheet error 3](/Images//Screenshot%202023-05-05%20at%2016.32.03.png)

MySQL doesn't appear to like the way my "time_taken" is formatted and there appears to be an error with line 17 of save_timesheet.php:

        if ($conn->query($sql) === TRUE) {

I commented out time_taken and the calculateTime function from timesheet.php and deleted time_taken from save_timesheet.php. I then deleted the time_taken row from the MySQL table and tested the form again; this time submitting the form was succesful:

![timesheet saved succesfully](/Images/Screenshot%202023-05-06%20at%2009.26.58.png)

The data saved into MySQL; albeit the job type was duplicated into the employee field and the id field was "null":

![MySQL](/Images/Screenshot%202023-05-06%20at%2009.27.45.png)

The employee and job type drop downs obviously differ on timesheet.php and nor is job/$job duplicated on save_timesheet.php.

## Update Form:

With the form/database atleast now working I want to turn my attention to the add/remove options for updating the options on the employee/job type drop downs.<br>
I created save_update.php to be in keeping with save_timesheet.php.<br>

I created a new table in MySQL for employee details; for the purpose of this exercise I just included the employee's names but the table could hold contact details, salary, position etc etc:

        CREATE TABLE employees (
        name VARCHAR(50) NOT NULL );

I created a second table for job types; again this could hold more information such as typical cost, average length of time but for this exercise I am just including the job type:

        CREATE TABLE job_types (
        job VARCHAR(50) NOT NULL );

When I attempted to add names I received error messages:

![employee add error message](/Images/Screenshot%202023-05-06%20at%2012.05.19.png)

The names do save into the employees table in MySQL; however they do so with blank rows between them.

![employee table](/Images/Screenshot%202023-05-06%20at%2012.35.17.png)

These names then appear on the Update page (including blank rows) but not in the select employee drop down; which remains empty.

![employee update](/Images/Screenshot%202023-05-06%20at%2012.37.09.png)

Testing the page I realised the blank rows between names are created when I try to add a job type. The job type does not save to the job_types MySQL table but creates blank rows in the employee tables. 

Unsure exactly how but in playing around with the save_update.php file I managed to remove the blank rows from the employees table in MySQL.

I rewrote "Insert new employee into database" and included error handling. However, I receive a success message of "Employee added successfully" however the added employee name doesn't appear in the Employees table in MySQL. 

Corrected a few mismatches between field names in the tables vs field names in the save_update.php code. For example; I had incorrectly referred to the job_types table as just 'job'. This has resolved the above issue and now employee names are saved into their respective table in MySQL.

## Update Form sitrep:

As it stands regarding adding/removing employees and job types on the update page:

- Employee names can be added to the employee table (confirmed in MySQL).
- The "select employee" drop down for removing an employee does not populate with the added employee names and remains blank.
- I am unable to test the job add/remove functionality as nothing beyond the employee drop down is rendered in the browser:

![employee drop down](/Images/Screenshot%202023-05-06%20at%2014.37.15.png)

I want to establish why the job options do not appear below the employee options; they have previously before I updated a couple of things on save_update.php. If I can resolve the issue I can then test the job functionality. If the functionality works fine it'll help me establish why the remove function for employees does not work. 

I realised thay if I delete "<?php echo generateEmployeeList($conn); ?>" from update.php then the job options appear.

Testing the job functionality it would appear to be in the same sitation as the employee functionality. Jobs can be added and appear in the job_types table in MySQL however the remove drop down appears empty. 

Interestingly if I try and add an employee whilst line "<?php echo generateEmployeeList($conn); ?>" remains deleted then the employee is still added to the table in MySQL.<br> 
I have also deleted line "<?php echo generateJobTypeList($conn); ?>" but can continue to still 
Each time I add a new job or employee it creates a blank entry in the other table. 

I have turned my attenion to timesheet.php and save_timesheet.php. I want to see if I can get the employee/job type drop downs working on the time sheet form to see if that'll help me get them working on the updates page.<br>
I added fetch queries to save_timesheet.php:

        // Fetch employees from the database
        $employee_query = "SELECT name FROM employees";
        $employee_result = mysqli_query($conn, $employee_query);

        // Fetch job types from the database
        $job_query = "SELECT job FROM job_types";
        $job_result = mysqli_query($conn, $job_query);

Added the below to timesheet.php; however, but as with update.php doing so prevented anything rendering on the page beyond these lines of code:

Employee:

	<?php while ($employee_row = mysqli_fetch_assoc($employee_result)) { ?>
		<option value="<?php echo $employee_row['name']; ?>"><?php echo $employee_row['name']; ?></option>
        <?php } ?>

Job:

	<?php while ($job_row = mysqli_fetch_assoc($job_result)) { ?>
		<option value="<?php echo $job_row['job']; ?>"><?php echo $job_row['job']; ?></option>
	<?php } ?>

Employee/job fetch requsts will need to be used 3 times; on the timesheet update page and the report page. I realised it would be best practice to have a seperate file so I removed the fetch requests from save_timesheet and created fetch_requests.php which can then be included on the 3 pages. 

The employee names now appear on each of the 3 pages however, not in the drop down menus:

![fetch requests](/Images/Screenshot%202023-05-06%20at%2020.58.08.png)

I added echo statements to the employee fetch requests and now the names do appear in a drop down... just not the drop down I wanted:

![fetch request drop down](/Images/Screenshot%202023-05-06%20at%2021.11.26.png)

Realised I can then add the echo statements directly into the HTML so removed them from fetch_requests and added the echo statements to each of the 3 pages (timesheet, report and update).There must be a way to call the echo statements from fetch_requests but I'll investigate doing so once I have the report and update functionality working correcty. 

I tested the timesheet and timesheets are now saved correctly without the job type duplicating into the employee field:

![timesheets correct](/Images/Screenshot%202023-05-07%20at%2014.07.23.png)

I also tested the add/remove functionality for both employees and jobs and both work correctly. Deleting a blank each from the drop downs appears to delete all blank rows however when a new job type or employee name is added a blank record is still created in the other table. I'm sure I could resolve this by having splitting the employee and job options on to different pages but it would be nice to keep them on one.
I'll come back and revisit this problem if I can get the report form up and running.

## Report Form.

The brief for the exercise states "they would like to be able to review timesheets
entered via a Timesheet Summary Report" and this is what my report page will hopefully offer. WEF Engineering will be able to search by a combination of employee, job type and date to create a report. 

I deleted all existing data in my databases as there were still some rows where job type had been duplicated in the employee column. I deleted employee and job types via my update page but for the time sheets I had created thus far I did so in MySQL using the TRUNCATE TABLE command.

I then used my timesheet page to add fresh data to MySQL.

I created run_report.php and had a few issues where I mistakenly referred to the "job" column in my timesheets table as "job_type" which resulted in a couple of errors.

I can now search by the following and return records:

* employee

![dan emsley employee](/Images/Screenshot%202023-05-07%20at%2015.14.14.png)

* employee and job type

![dan emsley employee and job type](/Images/Screenshot%202023-05-07%20at%2016.54.53.png)

* employee and date

![dan emsley employee and date](/Images/Screenshot%202023-05-07%20at%2016.47.57.png)

However, searching by the below does not currently work:

* job type
* date
* date and job type
* all fields empty (to return all timesheets)

I added an else statement to run_report.php to show all time sheets if no options were selected. However, it currently results in the "No results found; please search using a different criteria" message.<br>
I realised my else statement included its own if/else statements; I removed these and tested the search function (with all search fields empty) and now a table appears; albeit currently empty:

![empty search table](/Images/Screenshot%202023-05-08%20at%2021.00.22.png)

## Time taken function

I am aware my time taken function is still not working (I commented it out during development and am yet to revisit it) as per the brief of "The timesheet application needs to be able to select a Job, an Employee and the time taken on that job in each day" my current fields of "start time" and "end time" aren't sufficient. With the exercise deadline drawing near my priority now (having gotten most other things working to some degree) is to be able to calculate the time taken.

I added a time taken column to the timesheets table in MySQL using command:

        ALTER TABLE timesheets ADD COLUMN time_taken TIME NOT NULL AFTER end_time;

And I reinstated the previously commented out "Calculate Time Taken" button to my timesheet.php file and the
"$time_taken = $_POST["time_taken"]" from my save_timesheet.php file.

Upon submitting my update time sheet form I received the below error; this is the same error I originally received and led me to commenting out the calculateTime function for the time being:

![time taken error](/Images/Screenshot%202023-05-10%20at%2011.21.48.png)

#

## Fixes required:

* Search functionality.
* When an employee is removed, a new job type added, or a job type delected the success message "employee succesfully added" appears.
* Why are empty entries created in employees/job_types when an entry is added to the other table?
* The calculate time taken function.

## Reminders:

* What can be deleted; .htaccess, vendor files etc? As no longer using Smarty.
* Possible registration/login options.
* Though CSS isn't my priority (I would rather focus on the functionality as it is more difficult) it would be nice to find a PHP library to improve the appearance of the forms. 


## Future Improvements:

* Add a delete button to the report page to allow users to delete records.
* Add an export button to the report page to allow users to export records to excel. 