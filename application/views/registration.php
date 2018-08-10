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
          <h2 class="text-center">Register</h2>
            <form method="post" action="<?= site_url('homecontroller/adduser') ?>">
            <div class="form-group">
            <label for="frst_name">First Name</label>
            <input type="text" class="form-control" id="frst_name" name="fname" placeholder="First Name" value="<?= set_value('fname')?>">
            <?php echo form_error('fname',"<p class='text-danger'>","</p>"); ?>
            </div> 
            <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="lname" placeholder="Last Name" value="<?= set_value('lname')?>">
            <?php echo form_error('lname',"<p class='text-danger'>","</p>"); ?>
            </div> 
            <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email')?>">
             <?php echo form_error('email',"<p class='text-danger'>","</p>"); ?>
            </div>
            <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
            <?php echo form_error('password',"<p class='text-danger'>","</p>"); ?>
            </div>
               
            <div class="text-center">
            <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
         </div>
       </div>
     </div>
   </section>

<?php include 'footer.php'; ?>