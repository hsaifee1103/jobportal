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
<div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header">
      <div class="container">
        <div class="row latest-job margin-top-50 margin-bottom-20">
          <h1 class="text-center margin-bottom-20">Sign Up</h1>
          <div class="col-md-6 latest-job ">
            <div class="small-box bg-yellow padding-5">
              <div class="inner">
                <h3 class="text-center">User Registration</h3>
              </div>
              <a href="<?= site_url('homecontroller/Regpage') ?>" class="small-box-footer">
                Register <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-md-6 latest-job ">
            <div class="small-box bg-red padding-5">
              <div class="inner">
                <h3 class="text-center">Company Registration</h3>
              </div>
              <a href="<?= site_url('homecontroller/comp_regpage') ?>" class="small-box-footer">
                Register <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    

  </div>

<?php include 'footer.php'; ?>