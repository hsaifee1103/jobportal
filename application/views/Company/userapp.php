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
        <h3 class="text-center">User Application</h3>
        <table class="table table-responsive">
          <thead>
            <th>Job Post Name</th>
            <th>Job Description</th>
            <th>User Name</th>
            <th>Action</th>
          </thead>
          <tbody>
            <?php foreach($userapp as $data): ?> 
            <tr>
              <td><?php echo $data["title"] ?></td>
              <td><?php echo $data["description"] ?></td>
              <td><?php echo $data["firstname"]." ".$data["lastname"] ?></td>
              <td><a href="view-user-application.php?id=<?php echo $data["user_id"] ?>&jid=<?php echo $data["job_id"] ?>" class="btn">View</a></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
<?php include_once 'footer.php'; ?>