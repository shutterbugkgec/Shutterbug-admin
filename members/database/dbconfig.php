<?php

$server_name='sql202.epizy.com';
$user="epiz_24686164";
$password="DHMVFUUQkj";
$dbname="epiz_24686164_shutterbugadmin";

$connection=mysqli_connect($server_name,$user,$password);
$dbconfig = mysqli_select_db($connection,$dbname);

if($dbconfig)
{
    //echo "Database Connected";
}
else
{
    header('Location: ../dberror.php');
}


?>