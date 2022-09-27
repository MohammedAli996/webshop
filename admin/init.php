<?php
include 'connect.php';
//Router
$tpl = 'includes/templetes/'; // Template Directory
$en = 'includes/lang/'; // languages Directory
$css = 'layout/css/'; // Css Directory
$csss = 'includes/templetes/'; // Css Directory
$img = 'layout/img/'; // languages Directory
$js = 'layout/js/'; // Js Directory
$jss = 'includes/templetes/'; // Js Directory
$func = 'includes/functions/'; //Functions Directory

// Includ The Important Files 
include $func . 'functions.php';
include $en . 'en.php';
include $tpl . 'header.php';

// Include Navbar On All Page Expect The One With $noNavbar Vairable 
if (!isset($noNavbar)) {
    include $tpl . 'navbar.php';
}