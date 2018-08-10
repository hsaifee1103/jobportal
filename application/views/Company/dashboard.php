<?php 
$id = $this->session->userdata('user_id'); 
if (empty( $id))
{
  $this->session->set_flashdata('loginfirst', true);
 redirect("homecontroller/comp_loginpage");
}
if(empty($this->session->userdata("companylogged")))
  {
    redirect("User/dashboard");

  }
?>
<?php include_once 'header.php'; ?>
<div class="content-wrapper" style="margin-left: 0px;">
<section>

       <div class="container">
      <div class="row">
        <?php if(!empty($this->session->flashdata('jobposted'))): ?>
          <div class="alert alert-success">Job Posted Successfully!! <span class="glyphicon glyphicon-ok"></span></div>
        <?php endif ?>
        <h2 class="text-center">Company Dashboard</h2>

        <div class="col-md-2">
          <a href="<?= site_url('Company/dashboard/createjp') ?>" class="btn btn-success btn-block btn-lg">Create Job Post</a>
        </div>
        <div class="col-md-2">
          <a href="<?= site_url('Company/dashboard/viewjp') ?>" class="btn btn-success btn-block btn-lg">View Job Post</a>
        </div>
        
            <div class="col-md-3">
               <a href="<?= site_url('Company/dashboard/userapp') ?>" class="btn btn-success btn-block btn-lg">User Application <span class="badge"><?= $rows ?> </span></a>
            </div>
      </div>
    </div>
</section>
</div>
<?php include_once 'footer.php'; ?>
