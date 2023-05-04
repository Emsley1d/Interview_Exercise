# Interview Exercise

## Brief:

        ## Objective

        The goal of this exercise is to provide a showcase of your software design capabilities, your software
        development skills and your knowledge of best practices.

        For this reason, this exercise tries to cover several different aspects of a typical software solution.
        This is not a production exercise and it will never be used in a real environment; it is not expected to
        use real data. The purpose of this exercise is merely academic, to show your knowledge and
        technical skills in different aspects of what would be representative of your potential future role as a
        Software Developer within the team.
        #

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
        # 

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

For the above reasons I then chose to develop a Web Based Application using PHP; despite having never used it before. I decided to avoid ASP.NET; as it's more suited to large scale applications I think it would be overkill for WEF's needs.
#

## Build Notes.

Ordinarily I would create a Wireframe and ERD before starting to create a project however having never used PHP before (and having immediately run in to problems with Windows Forms) I wanted to make sure I could get some basic files and folders up and running in VS Code and on localhost.

I researched the basic PHP file structure.<br>
Test.php file created and running on live server.<br>
Base.php file created and attempted to extend to login.php; it didn't work and I established I needed to install Smarty to allow me to do so.<br>
Installed composer which then allowed me to install Smarty. Created .gitignore to prevent vendor files uploading to GitHub.<br>

Smarty set up in main.php but not rendering base.tpl or login.tpl; instead I receive a 404 error and my code automatically downloads.
Google would suggest my web server isn't set up to serve files with a .tpl extension? Established I would need to add "AddType application/x-httpd-php .tpl" to my Apache "httpd.conf" file. Looked at alternative ways to render my the .tpl files but I understand using the .tpl file extension is the best practice. Updated my Apache "httpd.conf" file and restarted Apache however still having problems. Walkthroughs suggested creating a ".htaccess" file in my project and populating it with "AddType application/x-httpd-php .tpl"; I have done this but my .tpl files still don't render in browser and continue to download automatically.<br>





