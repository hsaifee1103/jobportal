<?php 
$id = $this->session->userdata('admin_id'); 
if (!empty( $id))
{

    $this->session->set_flashdata('loginfirst', true);
    redirect("Admin/dashboard");
  
}
if(!empty($this->session->userdata("companylogged")))
  {
    redirect("Company/dashboard");

  }
  
?>
<?php include 'header.php'; ?>
<section>
     <div class="container">
       <div class="row">
         <div class="col-md-4 col-md-offset-4 well">
          <h2 class="text-center">Admin Login Panel</h2>
          <p class="text-danger text-center">NOTE: This panel is Only for administration use!! </p>
            <form method="post" action="<?= site_url('homecontroller/check_admin_login') ?>">
            <div class="form-group">
            <label for="username">User Name </label>
            <input type="text" class="form-control" id="username" name="username" placeholder="User Name">
            </div>
            <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <?php
            $errormessage = $this->session->flashdata('loginError');
            if ($errormessage == true) 
            {
                ?>
                 <div class="alert alert-danger">Invalid Username/Password </div>
                
            <?php
            }
            ?>
            <div class="text-center">
            <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
         </div>
       </div>
     </div>
</section>
<?php include 'footer.php'; ?>