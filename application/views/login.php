<?php 
$id = $this->session->userdata('user_id'); 
if (!empty( $id))
{
   if(!empty($this->session->userdata("companylogged")))
  {
    redirect("Company/dashboard");

  }else
  {
    //$this->session->set_flashdata('loginfirst', true);
    redirect("User/dashboard");
  }
  
}

  
?>
<?php include 'header.php'; ?>
<section>
     <div class="container">
       <div class="row">
         <div class="col-md-4 col-md-offset-4 well">
          <h2 class="text-center">Login</h2>
            <form method="post" action="<?= site_url('homecontroller/checklogin') ?>">
            <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
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
              <?php
            if (!empty($this->session->flashdata('reg_success'))) {
              
           
            ?><div class="text-center">
              <p class="alert alert-success">Registeration Successfully Please Login!!</p>
            </div>
            <?php
             }
            ?>   
            <?php
            if (!empty($this->session->flashdata('loginfirst'))) {
              
           
            ?><div class="text-center">
              <p class="alert alert-warning">You must login first!!</p>
            </div>
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