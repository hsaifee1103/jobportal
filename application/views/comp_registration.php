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
          <h2 class="text-center">Company Register</h2>
            <form method="post" action="<?= site_url('homecontroller/addcomp') ?>">
            <div class="form-group">
            <label for="companyname">Company Name</label>
            <input type="text" class="form-control" id="companyname" name="cname" placeholder="Company Name" required="">
             <?php echo form_error('cname',"<p class='text-danger'>","</p>"); ?>
            </div> 
            <div class="form-group">
            <label for="headofficecity">Head Office City</label>
            <input type="text" class="form-control" id="headofficecity" name="hoffice" placeholder="Company head Office" required="">
             <?php echo form_error('hoffice',"<p class='text-danger'>","</p>"); ?>
            </div> 
            <div class="form-group">
            <label for="country">Country</label>
            <select class="form-control" id="country" name="country" >
              <option selected="" value="">--Select Country--</option>
               <?php  foreach($country as $show): ?>
              <option value="<?php echo $show->name ?>" data-id="<?php echo $show->id ?>"><?php echo  $show->name ?></option>
                 
               <?php endforeach; ?>
            </select>
            </div>
            <div id="stateDiv" class="form-group" style="display: none;">
            <label for="state">State</label>
            <select class="form-control" id="state" name="state" required="" >
              <option selected="" value="">--Select State--</option>
            </select>
            </div> 
            <div id="cityDiv" class="form-group" style="display: none;">
            <label for="city">City</label>
            <select class="form-control" id="city" name="city" required="" >
              <option selected="" value="">--Select City--</option>
            </select>
            </div> 
            <div class="form-group">
            <label for="contactno">Contact no.</label>
            <div class="input-group">
            <span class="input-group-addon">+91</span><input type="text" class="form-control" id="contactno" name="contactno"  placeholder="Contact no." required="">
             
            </div>
            <?php echo form_error('contactno',"<p class='text-danger'>","</p>"); ?>
            </div>
          
            <div class="form-group">
            <label for="website">Website</label>
            <input type="url" class="form-control" id="website" name="website" placeholder="Website" required="">
             <?php echo form_error('website',"<p class='text-danger'>","</p>"); ?>
            </div>
            <div class="form-group">
            <label for="companytype">Company Type</label>
            <input type="text" class="form-control" id="companytype" name="companytype" placeholder="Company type" required="">
            </div>
            <div class="form-group">
            <label for="cemail">Company Email address</label>
            <input type="text" class="form-control" id="cemail" name="cemail" placeholder="Company Email address" required="">
             <?php echo form_error('cemail',"<p class='text-danger'>","</p>"); ?>
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
<script type="text/javascript">
    $(function()
    {
        $("#country").on("change" ,function()
        {
           var id = $(this).find(":selected").attr("data-id");
           if (id!= '') 
          {
            $("#stateDiv").show();
            $.ajax(
            {
                method:"POST",
                url:"<?php echo site_url('ajaxdata/getstate').'/'?>"+id,
                dataType: 'json' ,
                success: function(data)
                {
                   task_data = '<option value="0">--Select State--</option>';
                    $.each(data, function(index, obj){
                        task_data += '<option data-id="'+obj.id+'" value="'+obj.name+'">'+obj.name+'</option>';
                    });
                    // append all task data in Task dropdown
                    $("#state").html(task_data);
                }
                
            })
         }
          else
         {
            $("#stateDiv").hide();
            $("#cityDiv").hide();
         }

        }); 
        $("#state").on("change" ,function()
        {
           var id = $(this).find(":selected").attr("data-id");
           if (id!= '') 
          {
            $("#cityDiv").show();
            $.ajax(
            {
                method:"POST",
                url:"<?php echo site_url('ajaxdata/getcity').'/'?>"+id,
                 dataType: 'json' ,
                success: function(data)
                {
                   task_data = '<option value="0">--Select State--</option>';
                    $.each(data, function(index, obj){
                        task_data += '<option value="'+obj.name+'">'+obj.name+'</option>';
                    });
                    // append all task data in Task dropdown
                    $("#city").html(task_data);
                }
            })
         }


        });
    });
</script>
 