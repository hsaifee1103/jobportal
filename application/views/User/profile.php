<?php 
$id = $this->session->userdata('user_id'); 
if (empty( $id))
{

    $this->session->set_flashdata('loginfirst', true);
    redirect("homecontroller/loginpage");
  
}
if(!empty($this->session->userdata("companylogged")))
  {
    redirect("Company/dashboard");

  }
 
?>
<?php include_once 'header.php'; ?>

 <section>
     <div class="container">
       <div class="row">
         <div class="col-md-6 col-md-offset-3 well">
          <h2 class="text-center">Profile</h2>
            <form method="post" action="<?= site_url('User/dashboard/updateProfile') ?>">
              <?php foreach($userdata as $data ):?>
            <div class="form-group">
            <label for="frst_name">First Name</label>
            <input type="text" class="form-control" id="frst_name" name="fname" value="<?php echo $data['firstname'] ?>">
            </div> 
            <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="lname" value="<?php echo $data['lastname'] ?>">
            </div> 
            <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" readonly="" class="form-control" id="email" name="email" value="<?php echo $data['email'] ?>">
            </div>
            <div class="form-group">
            <label for="address">Address</label>
            <textarea  class="form-control" id="address" name="address"  rows="5" >
              <?php echo $data['address'] ?>
            </textarea>
            </div>
            <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" value="<?php echo $data['city'] ?>" >
            </div>
             <div class="form-group">
            <label for="state">State</label>
            <input type="text" class="form-control" id="state" name="state" value="<?php echo $data['state'] ?>" >
            </div>
             <div class="form-group">
            <label for="contactno">Contact no.</label>
            <div class="input-group">
            <span class="input-group-addon">+91</span><input type="text" class="form-control" id="contactno" minlength="10" maxlength="10" autocomplete="no" onkeypress="return validatePhone()" name="contactno" value="<?php echo $data['contactno'] ?>" >
            </div>
            </div>
            
             <div class="form-group">
            <label for="qualification">Qualification</label>
            <input type="text" class="form-control" id="qualification" name="qualification" value="<?php echo $data['qualification'] ?>" >
            </div>
             <div class="form-group">
            <label for="stream">Stream</label>
            <input type="text" class="form-control" id="stream" name="stream" value="<?php echo $data['stream'] ?>" >
            </div>
             <div class="form-group">
            <label for="passingyear">Passing Year</label>
            <input type="date" class="form-control" id="passingyear" name="passingyear" placeholder="passingyear" >
            </div>
             <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" max="2005-01-01" min="1960-01-01" value="<?php echo $data['dob'] ?>" >
            </div>
             <div class="form-group">
            <label for="age">Age</label>
            <input type="text" readonly="" class="form-control" id="age" name="age" value="<?php echo $data['age'] ?>" >
            </div>
             <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $data['designation'] ?>" >
            </div>             
            <?php endforeach; ?>
            <div class="text-center">
            <button type="submit" class="btn btn-success">Update</button>
            </div>
          </form>
         </div>
       </div>
     </div>
   </section>
   <?php include_once 'footer.php'; ?>
<script type="text/javascript">
      function validatePhone()
      {
        var key = window.event ? event.keyCode : event.which;
         if (event.keyCode == 8 ||event.keyCode == 46 ||event.keyCode == 37 ||event.keyCode == 39 ) 
         {
          return true;
         }
         else if(key < 48 || key > 57 )
         {
          return false;
         }
         else{
          return true;
         }
      }

      $(function()
        {
          $("#dob").on("change" , function()
            {
              var today = new Date();
              var birthdate = new Date($("#dob").val());
              var Tyear = today.getFullYear();
              var Byear = birthdate.getFullYear();
              var age = $("#age").val(Tyear - Byear);
            });
        });
    </script>