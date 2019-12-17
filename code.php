<?php

if(isset($_POST['mainadlog']))
{
    header('Location: admin/index.php');
}

if(isset($_POST['mainmemlog']))
{
    header('Location: members/index.php');
}
?>
