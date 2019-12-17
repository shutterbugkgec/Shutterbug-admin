<?php 
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Contact Admin</b></h1>
  </div>

  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
            <?php
                if(isset($_SESSION['sent']) && $_SESSION['sent'] != '')
                {
                    echo '<div class="alert alert-success" role="alert">'.$_SESSION['sent'].'</div>';
                    unset($_SESSION['sent']);
                }

                if(isset($_SESSION['failed']) && $_SESSION['failed'] != '')
                {
                    echo '<div class="alert alert-danger" role="alert">'.$_SESSION['failed'].'</div>';
                    unset($_SESSION['failed']);
                }
                ?>
           
            <form action="msgwebadmin.php" method="POST">  

                <input type='hidden' name='uname' value="<?php echo $_SESSION['usernameu']; ?>">
                <div class="form-group">
                <label> Subject </label>
                    <input type="text" name="subject" class="form-control" placeholder="Enter Your Subject">
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea type="text" name="message" class="form-control" placeholder="Enter Your Message"></textarea>
                </div>
                
                <a href="index.php" class="btn btn-danger">Cancel</a> 
                <button type="submit" name="msendbtn" class="btn btn-primary">Send</button>

            </form>


        </div>
    </div>
</div>






<?php
include('includes/scripts.php');
include('includes/footer.php');
?>