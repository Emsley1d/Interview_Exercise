<?php

require_once 'vendor/autoload.php';

$smarty = new Smarty();


// Render the template
$smarty->display('PHP/Templates/base.php');
$smarty->display("PHP/Templates/login.php");
$smarty->display("PHP/Templates/register.php");


?>