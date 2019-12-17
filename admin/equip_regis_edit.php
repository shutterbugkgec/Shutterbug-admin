<?php 
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Edit Equipment Informations</b></h1>
  </div>

  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
            <?php
                
                if(isset($_POST['eq_edit_btn']))
                {
                    $id=$_POST['edit_id'];
                    
                    $query="SELECT * FROM equipment_db WHERE id='$id'";
                    $query_run=mysqli_query($connection,$query);
                
                foreach($query_run as $row)
                {
                    ?>

            
            <form action="equip_code.php" method="POST">  

                <input type='hidden' name='edit_id' value="<?php echo $row['id']; ?>">
                <div class="form-group">
                <label> Equipment Name </label>
                    <input type="text" name="edit_equipname" value="<?php echo $row['equipname']; ?>" class="form-control" placeholder="Enter Admin Username">
                </div>
                <div class="form-group">
                    <label>Manufacturer Name</label>
                    <input type="text" name="edit_manname" value="<?php echo $row['manufacname']; ?>" class="form-control" placeholder="Enter Admin Name">
                </div>
               
                <a href="equipments.php" class="btn btn-danger">Cancel</a> 
                <button type="submit" name="eq_updatebtn" class="btn btn-primary">Save</button>

            </form>

            <?php
                }

            }

        ?>
            

        </div>
    </div>
</div>








<?php
include('includes/scripts.php');
include('includes/footer.php');
?>