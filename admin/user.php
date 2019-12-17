<?php 

include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="modal fade" id="addadminProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Login Registration Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
            <div class="form-group">
            <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="userbtn" class="btn btn-primary">Save</button>
      </div>
      </form>


    </div>
  </div>
</div>



<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Members Login Panel</b></h1>
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addadminProfile">Add Members Login</button>
  </div>

  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <?php
                if(isset($_SESSION['successus']) && $_SESSION['successus'] != '')
                {
                    echo '<div class="alert alert-success" role="alert">'.$_SESSION['successus'].'</div>';
                    unset($_SESSION['successus']);
                }

                if(isset($_SESSION['statusus']) && $_SESSION['statusus'] != '')
                {
                    echo '<div class="alert alert-danger" role="alert">'.$_SESSION['statusus'].'</div>';
                    unset($_SESSION['statusus']);
                }
                ?>

              <div class="table-responsive">

              <?php
                

                $query='SELECT * FROM userdb';
                $query_run=mysqli_query($connection,$query);



               ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      
                      <th>Name</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if (mysqli_num_rows($query_run)>0)
                    {
                        while($row=mysqli_fetch_assoc($query_run))
                        {
                            ?>

                            
                    <tr>
                      
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['username']; ?></td>
                      <td><?php echo $row['password']; ?></td>
                      <td>
                        <form action="user_edit.php" method="POST">
                            <input type="hidden" name="uedit_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="uedit_btn" class="btn btn-outline-success">Edit</button>
                        </form>
                      </td>
                      <td>
                        <form action="code.php" method="POST"> 
                        <input type="hidden" name="udelete_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="udelete_btn" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                    </tr>
                    <?php

                        }
                    }
                    else
                    {
                        echo "No record found";
                    }
                    ?>
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>














</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>