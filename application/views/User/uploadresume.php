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
        	<?php if(isset($error)) :?>
          <?= $error,"<p class='text-danger'>",'</p>' ?>
        <?php endif ?>
        
          <div class="col-md-5 col-md-offset-2">
           <div class="panel panel-default">
             <div class="panel-heading">
               <h3>Upload Resume</h3>
             </div>
             <div class="panel-body">
               <form action="<?= site_url('User/dashboard/uploadfile') ?>" method="post" enctype="multipart/form-data">
                 <div class="form-group">
                   <label for="resume">Upload file</label>
                   <input class="form-control" type="file" name="resume" id="resume">
                 </div>
                 <input type="submit" name="upload" class="btn btn-success" value="Upload">
               </form>
               <?php if(!empty($this->session->flashdata('success'))) :?>
          <p class="text-success">Resume Uploaded Successfully!!</p>
        <?php endif ?>
             </div>
           </div>
            
          </div>
        </div>
</section>
<?php include_once 'footer.php'; ?>