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
            
            <a href="<?= site_url('User/dashboard') ?>" class="btn btn-success">Return To Dashboard</a>
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center">Applied Jobs</h2>
            <table border="0" class="table table-striped">
              <thead>
                <th>Job Name</th>
                <th>Job Description</th>
                <th>Minimum Salary</th>
                <th>Maximum Salary</th>
                <th>Experience Required</th>
                <th>Qualification</th>
                <th>Created At</th>
              </thead>
              <tbody>
                <?php foreach($appliedjobs as $data): ?>
                   <tr>
                      <td><?php echo $data['title']; ?></td>
                      <td><?php echo $data['description']; ?></td>
                      <td><?php echo $data['minimumsalary']; ?></td>
                      <td><?php echo $data['maximumsalary']; ?></td>
                      <td><?php echo $data['experience']; ?></td>
                      <td><?php echo $data['qualification']; ?></td>
                      <td><?php echo date("D-M-Y" ,strtotime($data['createAt'])); ?></td>
                      
                    </tr>

                    <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
<?php include_once 'footer.php'; ?>    