<?php
/* Le formulaire à bien été rempli */
if (isset($_POST['project_name']) && isset($_POST['dbserv']) && isset($_POST['dbname']) && isset($_POST['dbuser'])
&& isset($_POST['dbpass']) && isset($_POST['suname']) && isset($_POST['supass2']))
{
    $project_name = $_POST['project_name'];
    $dbserv = $_POST['dbserv'];
    $dbname = $_POST['dbname'];
    $dbuser = $_POST['dbuser'];
    $dbpass = $_POST['dbpass'];
    $suname = $_POST['suname'];
    $supass = $_POST['supass2'];
    
    include_once('install.php');
    
    $funs = new AdminFunctionnalities();
    /* $success = $funs->createDatabase($dbserv,$dbname,$dbuser,$dbpass);
       $success = $funs->createSuperUser($suname, $supass); */
    /* Decompress site */
    $tar = new PharData('../site.tar.gz');
    /* creates site.tar */
    $tar->decompress();
    try {
        $tar->extractTo('../', null, true);
    }
    catch (Exception $e) {
        echo "Erreur lors de l'extration de l'archive " . $e;
        exit;
    }
    /* Prepare config.ini file */
    $arr = array(
        'application' => array(
            'app_name' => $project_name,
        ),
        'database' => array(
            'db_hostname' => $dbserv,
            'db_name' => $dbname,
            'db_user' => $dbuser,
            'db_password' => $dbpass,
        ));
    $success = $funs->create_ini_file($arr, "../site/conf/app.ini");
    if($success == 1)
        header("location:../site/index.php");
    else
        echo 'Erreur lors de l\'extraction et la creation du site'
}
