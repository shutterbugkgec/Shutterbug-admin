<?php 

include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>




<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Members List</b></h1>
    
  </div>

  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
          

              <div class="table-responsive">

              <?php


                $query='SELECT * FROM memberdb';
                $query_run=mysqli_query($connection,$query);



               ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      
                      <th>Name</th>
                      
                      <th>Department</th>
                      
                      <th>Phone</th>
                      <th>Email</th>
                
                      
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
                      
                      <td><?php echo $row['dept']; ?></td>
                      
                      <td><?php echo $row['phone']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                  
                      
    
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