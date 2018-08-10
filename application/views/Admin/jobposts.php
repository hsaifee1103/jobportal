<?php 
$id = $this->session->userdata('admin_id'); 
if (empty( $id))
{

    $this->session->set_flashdata('loginfirst', true);
    redirect("homecontroller/adminloginpage");
  
}
if(!empty($this->session->userdata("companylogged")))
  {
    redirect("Company/dashboard");

  }
  
?>
<?php include_once 'header.php'; ?>
 <div class="container">
        <div class="row">
          <?php if(!empty($this->session->flashdata('deleted'))): ?>
          <div class="alert alert-success">job Deleted Successfully!! <span class="glyphicon glyphicon-ok"></span></div>
        <?php endif ?>
          <div class="col-md-2">
           <div class="list-group">
              <a href="<?= site_url('Admin/dashboard') ?>" class="list-group-item ">Dashboard</a>
              <a href="<?= site_url('Admin/dashboard/users') ?>" class="list-group-item ">Users</a>
              <a href="<?= site_url('Admin/dashboard/companies') ?>" class="list-group-item ">Companies</a>
              <a href="<?= site_url('Admin/dashboard/jobposts') ?>" class="list-group-item active">Job Posts</a>
            </div>
           </div>
            <div class="col-md-10">
            	<?=  "<h3>Total Job Posts :".$numrows."</h3>"; ?>
              <div class="table-responsive">
              <table class="table ">
              	<thead>
					<th>S.no</th>
					<th>Job Title</th>
					<th>Descripton</th>
					<th>Minimum Salary No</th>
					<th>Maximum Salary</th>
					<th>Experience</th>
					<th>Qualification</th>
					<th>Create At</th>
					<th>Action</th>
              	</thead>
              	<tbody>
              	<?php $i =0; ?>
              	<?php foreach($jobpost as $data): ?>
					<tr>
					<td><?php echo ++$i; ?></td>	
					<td><?php echo $data['title'] ?></td>	
					<td><?php echo $data['description'] ?></td>	
					<td><?php echo $data['minimumsalary'] ?></td>	
					<td><?php echo $data['maximumsalary'] ?></td> 
					<td><?php echo $data['experience'] ?></td> 
					<td><?php echo $data['qualification'] ?></td>
					<td><?php echo $data['createAt'] ?></td>	
					<td><a href="<?= site_url('Admin/dashboard/delete_job') ?>?job_id=<?php echo $data['job_id'] ?>" class="btn btn-danger">Delete</a></td>	
					</tr>
              	<?php endforeach; ?>	
              	</tbody>
              </table>
            </div>
            </div>
          
          </div>
      </div>
    </section>

<?php include_once 'footer.php'; ?>