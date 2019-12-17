<?php 
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Edit User Profile</b></h1>
  </div>

  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
            <?php
                
                if(isset($_POST['uedit_btn']))
                {
                    $id=$_POST['uedit_id'];
                    
                    $query="SELECT * FROM userdb WHERE id='$id'";
                    $query_run=mysqli_query($connection,$query);
                
                foreach($query_run as $row)
                {
                    ?>

            
            <form action="code.php" method="POST">  

                <input type='hidden' name='uedit_id' value="<?php echo $row['id']; ?>">
                <div class="form-group">
                <label> Username </label>
                    <input type="text" name="uedit_username" value="<?php echo $row['username']; ?>" class="form-control" placeholder="Enter Admin Username">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="uedit_name" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Enter Admin Name">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="uedit_password" value="<?php echo $row['password']; ?>" class="form-control" placeholder="Enter Password">
                </div>
                <a href="user.php" class="btn btn-danger">Cancel</a> 
                <button type="submit" name="uupdatebtn" class="btn btn-primary">Save</button>

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