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

## Build Notes.

Ordinarily I would create a Wireframe and ERD before starting to create a project however having never used PHP before (and having immediately run in to problems with Windows Forms) I wanted to make sure I could get some basic files and folders up and running in VS Code and on localhost.

I researched the basic PHP file structure.<br>
Test.php file created and running on live server.<br>
Base.php file created and attempted to extend to login.php; it didn't work and I established I needed to install Smarty to allow me to do so.<br>
Installed composer which then allowed me to install Smarty. Created .gitignore to prevent vendor files uploading to GitHub.<br>

Smarty set up in main.php but not rendering base.tpl or login.tpl; instead I receive a 404 error and my code automatically downloads.
Google would suggest my web server isn't set up to serve files with a .tpl extension? Established I would need to add "AddType application/x-httpd-php .tpl" to my Apache "httpd.conf" file. Looked at alternative ways to render my the .tpl files but I understand using the .tpl file extension is the best practice. Updated my Apache "httpd.conf" file and restarted Apache however still having problems. Walkthroughs suggested creating a ".htaccess" file in my project and populating it with "AddType application/x-httpd-php .tpl"; I have done this but my .tpl files still don't render in browser and continue to download automatically. <br>
I do receive a "200" status code for the get request (::1]:52243 [200]: GET /PHP/Templates/login.tpl) so my templates are being found and served to the browser.
I attempted to use the .smarty file extension in place of .tpl but my VS Code failed to recognise the file extension and treated them as plain text. I changed my .tpl files to .php (having not worked with PHP before I believe this isn't the done thing?); they now render in my browser however base.php does not extend to my other pages. Realised I could extend base.php to other php files by including the below on them:

        <?php
        include 'base.php';
        ?>

base.php was effectively going to be a homepage but I can't get the block content to extend to other pages so I am just going to turn it into the nav bar.

## Forms

I was going to create login and registration functions (authentication and authorisation are two of my favourite things to develop) but the brief doesn't stipulate these are required so I changed login.php to timesheet.php and created A Time Sheet Form. Having said that as this is a Web Application anyone could access it so it'll need to be protected with credentials. 

Created Time Sheet Report page so you can search by Employee, Job Type and Date (search yet to work).<br>
Created Update page to add/remove employees/job type.(add/remove functions yet to work).<br>
Creating CalculateTime function to calculate time taken from job start to finish. (written in JS (as opposed to PHP) as keen to get starting on database/form functionality)<br>

I am happy with the basics of the Front End so am going to turn my attention to creating a database.

## Database & Time Sheet Form

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

## Update Form

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

### Update Form sitrep

As it stands regarding adding/removing employees and job types on the update page:

- Employee names can be added to the employee table (confirmed in MySQL).
- The "select employee" drop down for removing an employee does not populate with the added employee names and remains blank.
- I am unable to test the job add/remove functionality as nothing beyond the employee drop down is rendered in the browser:

![employee drop down](/Images/Screenshot%202023-05-06%20at%2014.37.15.png)

I want to establish why the job options do not appear below the employee options; they have previously before I updated a couple of things on save_update.php. If I can resolve the issue I can then test the job functionality. If the functionality works fine it'll help me establish why the remove function for employees does not work. 




