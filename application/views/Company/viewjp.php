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
<div class="container">
      <div class="row">
      	 <?php if(!empty($this->session->flashdata('jobupdated'))): ?>
          <div class="alert alert-success">Job Updated Successfully!! <span class="glyphicon glyphicon-ok"></span></div>
        <?php endif ?>
        <?php if(!empty($this->session->flashdata('jobdeleted'))): ?>
          <div class="alert alert-danger">Job Deleted Successfully!! <span class="glyphicon glyphicon-ok"></span></div>
        <?php endif ?>
        <div class="col-md-12">
          <div class="table-responsive">
            <h3 class="text-center">All Job Post</h3>
            <table border="1" class="table table-striped">
              <thead>
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
                <?php foreach($viewjob as $data): ?>
                
                    
                    <tr>
                      <td><?php echo $data['title']; ?></td>
                      <td><?php echo $data['description']; ?></td>
                      <td><?php echo $data['minimumsalary']; ?></td>
                      <td><?php echo $data['maximumsalary']; ?></td>
                      <td><?php echo $data['experience']; ?></td>
                      <td><?php echo $data['qualification']; ?></td>
                      <td><?php echo date("D-M-Y" ,strtotime($data['createAt'])); ?></td>
                      <td><a href="<?= site_url('Company/dashboard/editjp') ?>?id=<?php echo $data['job_id']; ?>">Edit</a>
                          <a href="<?= site_url('Company/dashboard/deletejp') ?>?id=<?php echo $data['job_id']; ?>">Delete</a></td>
                    </tr>

                 <?php endforeach; ?>
               
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

<?php include_once 'footer.php'; ?>
