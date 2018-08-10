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
 <section>
     <div class="container">
       <div class="row">
         <div class="col-md-4 col-md-offset-4 well">
          <h2 class="text-center">Update Job Post</h2>
            <form method="post" action="<?= site_url('Company/dashboard/updatejp') ?>">
            <?php foreach($editjob as $data): ?>
            <div class="form-group">
            <label for="jobtitle">Job Title</label>
            <input type="text" class="form-control" id="jobtitle" name="title" value="<?php echo $data['title'] ?>">
            </div> 
            <div class="form-group">
            <label for="description">Job Description</label>
            <textarea  class="form-control" id="description" name="description" rows="5"><?php echo $data['description'] ?>
            </textarea>
            </div> 
            <div class="form-group">
            <label for="minimumsalary">Minimum Salary</label>
            <input type="number" class="form-control" id="minimumsalary" autocomplete="off" min="1000" name="minimumsalary" value="<?php echo $data['minimumsalary'] ?>">
            </div>
            <div class="form-group">
            <label for="maximumsalary">Maximum Salary</label>
            <input type="number" class="form-control" id="maximumsalary" autocomplete="off" min="1000" name="maximumsalary" value="<?php echo $data['maximumsalary'] ?>">
            </div>
            <div class="form-group">
            <label for="qualification">Qualification Required</label>
            <input type="qualification" class="form-control" id="qualification" name="qualification" value="<?php echo $data['qualification'] ?>">
            </div>
            <div class="form-group">
            <label for="experience">Experience Required</label>
            <select class="form-control" id="experience" name="experience" required="">
              <option value="<?php echo $data['experience'] ?>" selected=""><?php echo $data['experience'] ?></option>
                  <option value="fresher">fresher</option>
                  <option value="1 Year">1 Year</option>
                  <option value="2 Year">2 Year</option>
                  <option value="3 Year">3 Year</option>
                  <option value="4 Year">4 Year</option>
                  <option value="5 Year">5 Year</option>
                </select>
            <input type="hidden" name="target_id" value="<?php echo $data['job_id']; ?>">
            </div>
             <?php endforeach; ?>
            <div class="text-center">
            <button type="submit" class="btn btn-success">Update</button>
            </div>
          </form>
         </div>
       </div>
     </div>
   </section>
<?php include_once 'footer.php'; ?>