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
          <div class="alert alert-success">Company Deleted Successfully!! <span class="glyphicon glyphicon-ok"></span></div>
        <?php endif ?>
          <div class="col-md-2">
           <div class="list-group">
              <a href="<?= site_url('Admin/dashboard') ?>" class="list-group-item ">Dashboard</a>
              <a href="<?= site_url('Admin/dashboard/users') ?>" class="list-group-item">Users</a>
              <a href="<?= site_url('Admin/dashboard/companies') ?>" class="list-group-item active">Companies</a>
              <a href="<?= site_url('Admin/dashboard/jobposts') ?>" class="list-group-item">Job Posts</a>
            </div>
           </div>
            <div class="col-md-10">
            	<?=  "<h3>Total Companies :".$numrows."</h3>"; ?>
              <div class="table-responsive">
              <table class="table ">
              	<thead>
              		<th>S.no</th>
              		<th>Company Name</th>
              		<th>Headoffice City</th>
              		<th>Contact No</th>
              		<th>Website</th>
                  <th>CompanyType</th>
                  <th>Email</th>
              		<th>Create At</th>
              	</thead>
              	<tbody>
              	<?php $i =0; ?>
              	<?php foreach($comp as $data): ?>
      					<tr>
      						<td><?php echo ++$i; ?></td>	
      						<td><?php echo $data['companyname'] ?></td>	
      						<td><?php echo $data['headofficecity'] ?></td>	
      						<td><?php echo $data['contactno'] ?></td>	
      						<td><?php echo $data['website'] ?></td> 
      						<td><?php echo $data['companytype'] ?></td> 
      						<td><?php echo $data['cemail'] ?></td>  
      						<td><?php echo $data['createAt'] ?></td>	
      						<td><a href="<?= site_url('Admin/dashboard/delete_company') ?>?company_id=<?php echo $data['company_id'] ?>" class="btn btn-danger">Delete</a></td>	
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