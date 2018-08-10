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
          <div class="col-md-12">
            <h2 class="text-center">My Dashboard</h2>
            <a href="<?= site_url('User/dashboard/applied_jobs') ?>" class="btn btn-success">Applied Jobs</a>
            <a href="<?= site_url('User/dashboard/resume') ?>" class="btn btn-success">Resume</a>
            
          </div>
        </div>
        <!-- search and apply to job post -->
        <div class="row">
        <?php if(isset($error)) :?>
          <p><?= $error ?></p>
        <?php endif ?>
          <div class="col-md-12">
            <h2 class="text-center">Active Jobs</h2>
            <?php if(!empty($this->session->flashdata('applied_success'))): ?>
              <p class="text-success"><b>You have Applied successfully for the Job!</b></p>
            <?php endif ?>
            <?php if(!empty($this->session->flashdata('updated'))): ?>
              <p class="text-success"><b>Profile Updated successfully !</b></p>
            <?php endif ?> 
            <?php if(!empty($this->session->flashdata('applied_failed'))): ?>
              <p class="text-danger"><b>Something went wrong please try again!!</b></p>
            <?php endif ?>
            <table border="0" class="table table-striped">
              <thead>
                <th>S.no</th>
                <th>Job Name</th>
                <th>Job Description</th>
                <th>Minimum Salary</th>
                <th>Maximum Salary</th>
                <th>Experience Required</th>
                <th>Qualification</th>
                <th>Created At</th>
                <th>Action</th>
              </thead>
              <tbody>
               
               <?php $i = 0;
               foreach ($activejobs as $show ) 
               {?> 
                <tr>
                  <td><?= ++$i ?></td>
                  <td><?= $show['title'] ?></td>
                  <td><?= $show['description'] ?></td>
                  <td><?= $show['minimumsalary'] ?></td>
                  <td><?= $show['maximumsalary'] ?></td>
                  <td><?= $show['qualification'] ?></td>
                  <td><?= $show['experience'] ?></td>
                  <td><?= $show['createAt'] ?></td>
                  <td>
                  <a class="btn btn-primary" href="<?= site_url('homecontroller/apply_jobs') ?>?id=<?= $show['job_id'] ?>">Apply</a>
                  </td>
                </tr> 
               <?php 
               }
               ?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
<?php include_once 'footer.php'; ?>
