<?php 

include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="modal fade" id="addadminProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Intern Registration Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
            <div class="form-group">
            <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label>Year</label>
                <input type="text" name="year" class="form-control" placeholder="Enter Year">
            </div>
            <div class="form-group">
                <label>Department</label>
                <input type="text" name="dept" class="form-control" placeholder="Enter Department">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" placeholder="Confirm Phone">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Confirm Email">
            </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="internbtn" class="btn btn-primary">Save</button>
      </div>
      </form>


    </div>
  </div>
</div>



<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Interns</b></h1>
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addadminProfile">Add Interns</button>
  </div>

  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <?php
                if(isset($_SESSION['successin']) && $_SESSION['successin'] != '')
                {
                    echo '<div class="alert alert-success" role="alert">'.$_SESSION['successin'].'</div>';
                    unset($_SESSION['successin']);
                }

                if(isset($_SESSION['statusin']) && $_SESSION['statusin'] != '')
                {
                    echo '<div class="alert alert-danger" role="alert">'.$_SESSION['statusin'].'</div>';
                    unset($_SESSION['statusin']);
                }
                ?>

              <div class="table-responsive">

              <?php
                

                $query='SELECT * FROM interndb';
                $query_run=mysqli_query($connection,$query);



               ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      
                      <th>Name</th>
                      <th>Year</th>
                      <th>Department</th>
                      <th>Phone</th>
                      <th>Email</th>
                      
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
                      <td><?php echo $row['year']; ?></td>
                      <td><?php echo $row['dept']; ?></td>
                      <td><?php echo $row['phone']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      
                      <td>
                        <form action="code.php" method="POST"> 
                        <input type="hidden" name="int_delete_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="int_delete_btn" class="btn btn-outline-danger">Delete</button>
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