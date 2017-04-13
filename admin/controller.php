<?php
/* Le formulaire à bien été rempli */
if (isset($_POST['project_name']) && isset($_POST['dbserv']) && isset($_POST['dbname']) && isset($_POST['dbuser'])
    && isset($_POST['dbpass']) && isset($_POST['suname']) && isset($_POST['supass2']) && isset($_POST['location']))
{
    if (empty($_POST['location'])) $location = exec(pwd);
    else $location = $_POST['location'];

    $project_name = $_POST['project_name'];
    $dbserv = $_POST['dbserv'];
    $dbname = $_POST['dbname'];
    $dbuser = $_POST['dbuser'];
    $dbpass = $_POST['dbpass'];
    $suname = $_POST['suname'];
    $supass = $_POST['supass2'];

    include_once('install.php');

    $funs = new AdminFunctionnalities();
    createDatabase($dbserv,$dbname,$dbuser,$dbpass);
}
