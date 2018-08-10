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
          <h2 class="text-center">Create Job Post</h2>
            <form method="post" action="<?= site_url('Company/dashboard/addjob') ?>">
            <div class="form-group">
            <label for="jobtitle">Job Title</label>
            <input type="text" class="form-control" id="jobtitle" name="title" placeholder="Job Title" required="">
            </div> 
            <div class="form-group">
            <label for="description">Job Description</label>
            <textarea  class="form-control" id="description" name="description" rows="5" required=""></textarea>
            </div> 
            <div class="form-group">
            <label for="minimumsalary">Minimum Salary</label>
            <input type="number" class="form-control" id="minimumsalary" autocomplete="off" min="1000" name="minimumsalary" placeholder="minimumsalary" required="">
            </div>
            <div class="form-group">
            <label for="maximumsalary">Maximum Salary</label>
            <input type="number" class="form-control" id="maximumsalary" autocomplete="off" min="1000" name="maximumsalary" placeholder="maximum salary" required="">
            </div>
            <div class="form-group">
            <label for="qualification">Qualification Required</label>
            <input type="qualification" class="form-control" id="qualification" name="qualification" placeholder="Qualification Required" required="">
            </div>
            <div class="form-group">
            <label for="experience">Experience Required</label>
            <select class="form-control" id="experience" name="experience" required="">
              <option value="" selected="">Select Experience</option>
                  <option value="fresher">fresher</option>
                  <option value="1 Year">1 Year</option>
                  <option value="2 Year">2 Year</option>
                  <option value="3 Year">3 Year</option>
                  <option value="4 Year">4 Year</option>
                  <option value="5 Year">5 Year</option>
                </select>
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
         </div>
       </div>
     </div>
   </section>
<?php include_once 'footer.php'; ?>