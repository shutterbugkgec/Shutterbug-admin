<?php 
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>






<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>JOIN US Form</b></h1>

  </div>

  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
            <?php
                if(isset($_SESSION['successacc']) && $_SESSION['successacc'] != '')
                {
                    echo '<div class="alert alert-success" role="alert">'.$_SESSION['successacc'].'</div>';
                    unset($_SESSION['successacc']);
                }

                if(isset($_SESSION['statusacc']) && $_SESSION['statusacc'] != '')
                {
                    echo '<div class="alert alert-danger" role="alert">'.$_SESSION['statusacc'].'</div>';
                    unset($_SESSION['statusacc']);
                }
                ?>

              <div class="table-responsive">

              <?php
               
                $query='SELECT * FROM joinus';
                $query_run=mysqli_query($connection,$query);



               ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Department</th>
                      <th>Year</th>
                      <th>Interest</th>
                      <th>Why want to join Shutterbug?</th>
                      <th>Image</th>
                      <th>Accept</th>
                      <th>Reject</th>
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
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['phone']; ?></td>
                      <td><?php echo $row['dept']; ?></td>
                      <td><?php echo $row['year']; ?></td>
                      <td><?php echo $row['interest']; ?></td>
                      <td><?php echo $row['reason']; ?></td>
                      <td><?php echo '<a href="joinupload/'.$row['image'].'"><img src="joinupload/'.$row['image'].'"width="100px;" height="100px;" alt="Image"></a>' ?></td>
                      <td>
                        <form action="join_code.php" method="POST">
                            <input type="hidden" name="acc_name" value="<?php echo $row['name']; ?>">
                            <input type="hidden" name="acc_year" value="<?php echo $row['year']; ?>">
                            <input type="hidden" name="acc_dept" value="<?php echo $row['dept']; ?>">
                            <input type="hidden" name="acc_phone" value="<?php echo $row['phone']; ?>">
                            <input type="hidden" name="acc_email" value="<?php echo $row['email']; ?>">
                            
                            <button type="submit" name="acc_btn" class="btn btn-outline-success">Accept</button>
                        </form>
                      </td>
                      <td>
                        <form action="join_code.php" method="POST"> 
                        <input type="hidden" name="rej_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="rej_btn" class="btn btn-outline-danger">Reject</button>
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