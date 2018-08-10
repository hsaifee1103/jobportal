<section>
      <div class="container">
       
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
              <?php foreach ($data as $job):?>
              <div class="panel-heading"><h2 class="text-center"><?php echo $job->title; ?></h2></div>
              <div class="panel-body">
                <h4><u>Company</u></h4>
                <p><?php echo $job->companyname ?></p>
                <h4><u>Description</u></h4>
                <p><?php echo $job->description ?></p> 
                <h4><u>Minimum Salary</u></h4>
                <p><?php echo $job->minimumsalary ?></p>
                <h4><u>Maximum Salary</u></h4>
                <p><?php echo $job->maximumsalary ?></p> 
                <?php $id = $this->session->userdata('user_id');?>
                <?php if (!empty( $id)): ?>
                <?php if(!empty($this->session->userdata("companylogged"))) : ?>
                       <strong>Not allowed</strong>
                       <?php else : ?>
                <a href=" <?= site_url('User/dashboard/apply_job') ?>?id=<?php echo $job->job_id ?>" class="btn btn-primary">Apply</a>
                 <?php endif ; ?>
                 <?php endif ; ?>
                <?php endforeach; ?>  
                <?php if(!empty($this->session->flashdata('already_applied'))): ?>
              <p class="text-danger"><b>You have Already Applied  for thisJob!</b></p>
            <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

