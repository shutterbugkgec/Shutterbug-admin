<?php
session_start();
if(isset($_POST['logoutu_btn']))
{   
    
    session_destroy();
    unset($_SESSION['usernameu']);
    header('Location: login.php');
}




?>
