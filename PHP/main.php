<?php

require_once 'vendor/autoload.php';

$smarty = new Smarty();

// include "templates/base.tpl";

// Assign some variables to the template
// $smarty->assign('title', 'My Page Title');
// $smarty->assign('body', 'This is the body content of my page.');

// Render the template
$smarty->display('PHP/Templates/base.tpl');
$smarty->display('PHP/Templates/login.tpl');

?>