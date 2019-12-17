<?php 

include('security.php'); 


// Equipment Register ---------------------------------------------------------------------------------------------------------

if(isset($_POST['equip_registerbtn']))
{   
    $code="SHTBG-";
    $no=strval(rand(100,1000));
    $equipname=$_POST['equipname'];
    $manname=$_POST['manname'];
    $addname=$_SESSION['username'];
    $caddname=$_SESSION['username'];
    $unique=$code.$no;
    
    

    if($addname==$caddname)
    {
        $query="INSERT INTO equipment_db (equipname,manufacname,adder,uniqno) VALUES ('$equipname','$manname','$addname','$unique')";
        $query_run=mysqli_query($connection,$query);

        if($query_run)
        {
            $_SESSION['success'] = "Equipment added";
            header('Location: equipments.php');
        }
        else
        {
            $_SESSION['status'] = "Equipment is not added";
            header('Location: equipments.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Password and Confirm Password donot match";
        header('Location: equipments.php');
    }


} 

if(isset($_POST['eq_edit_btn']))
{
    $id=$_POST['edit_id'];
    
    $query="SELECT * FROM equipment_db WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);
}

if(isset($_POST['eq_updatebtn']))
{
    $id=$_POST['edit_id'];
    $equipname=$_POST['edit_equipname'];
    $manname=$_POST['edit_manname'];
   

    $query="UPDATE equipment_db SET equipname='$equipname', manufacname='$manname' WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);
    if($query_run)
        {
            $_SESSION['successe'] = "Equipments Info Updated";
            header('Location: equipments.php');
        }
    else
    {
        $_SESSION['statuse'] = "Equipments Info is not Updated";
        header('Location: equipments.php');
    }
}

if(isset($_POST['eq_delete_btn']))
{
    $id=$_POST['delete_id'];
    $query="DELETE FROM equipment_db WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);

    if($query_run)
        {
            $_SESSION['success'] = "Equipments Info Deleted";
            header('Location: equipments.php');
        }
    else
    {
        $_SESSION['status'] = "Equipments Info is not Deleted";
        header('Location: requipments.php');
    }
}

?>