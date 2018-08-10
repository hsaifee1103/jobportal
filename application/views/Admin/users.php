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
          <div class="alert alert-success">User Deleted Successfully!! <span class="glyphicon glyphicon-ok"></span></div>
        <?php endif ?>
          <div class="col-md-2">
           <div class="list-group">
              <a href="<?= site_url('Admin/dashboard') ?>" class="list-group-item ">Dashboard</a>
              <a href="<?= site_url('Admin/dashboard/users') ?>" class="list-group-item active">Users</a>
              <a href="<?= site_url('Admin/dashboard/companies') ?>" class="list-group-item ">Companies</a>
              <a href="<?= site_url('Admin/dashboard/jobposts') ?>" class="list-group-item">Job Posts</a>
            </div>
           </div>
            <div class="col-md-10">
            	<?=  "<h3>Total Users :".$numrows."</h3>"; ?>
              <table class="table">
              	<thead>
              		<th>S.no</th>
              		<th>FirstName</th>
              		<th>LastName</th>
              		<th>Email</th>
              		<th>Address</th>
              		<th>Action</th>
              	</thead>
              	<tbody>
              	<?php $i =0; ?>
              	<?php foreach($users as $data): ?>
  				<tr>
  					<td><?php echo ++$i; ?></td>	
  					<td><?php echo $data['firstname'] ?></td>	
  					<td><?php echo $data['lastname'] ?></td>	
  					<td><?php echo $data['email'] ?></td>	
  					<td><?php echo $data['address'] ?></td>	
  					<td><a href="<?= site_url('Admin/dashboard/delete_user') ?>?user_id=<?php echo $data['user_id'] ?>" class="btn btn-danger">Delete</a></td>	
  				</tr>
              	<?php endforeach; ?>		
              	</tbody>
              </table>
            </div>
          
          </div>
      </div>
    </section>

<?php include_once 'footer.php'; ?>