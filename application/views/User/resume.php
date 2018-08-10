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
 <div class="container"> 

      <div class="row">
        <h2 class="text-center">Resume</h2>
        <div class="col-md-2">
          <a href="<?= site_url('User/dashboard/uploadresume') ?>" class="btn btn-success">Upload Resume</a>
        </div>
        <?php if($resume != ''): ?> 
        <div class="col-md-2">
          <a href="<?= base_url('uploads/'.$resume) ?>" class="btn btn-success" download="">View Resume</a>
        </div>
      <?php endif ?>
      </div>
    </div>
    <?php include_once 'footer.php'; ?>