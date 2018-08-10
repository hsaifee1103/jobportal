<?php
class Dashboard extends CI_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('usermodel');
	}
	function Index()
	{
		$jobs = $this->usermodel->activejobs();
		$data['activejobs'] = $jobs['job_post'];
		$data['applyjobs'] = $jobs['apply_job_post'];
		/*echo "<pre>";
		print_r($data);
		echo "</pre>";*/
		$this->load->view('User/dashboard', $data);
	}
	public function apply_job()
	{
		$jobid = $_GET['id'];
		$numrows = $this->usermodel->already_applied_job($jobid);
		if (empty($this->session->userdata('user_id'))) 
		{
			$this->session->set_flashdata('loginfirst', true);
            redirect("homecontroller/loginpage");
		}
		elseif($numrows>0) 
		{
			$this->session->set_flashdata('already_applied', true);
            redirect("homecontroller/apply_jobs?id=$jobid");
		}
		else
		{
			
			$this->usermodel->applied_job($jobid);
		}
	}
	public function profile()
	{
		$data['userdata'] = $this->usermodel->profile();
		$this->load->view('User/profile' , $data);
	}
	public function updateProfile()
	{
			$user_data = array
			(
				'firstname' =>$this->input->post('fname') , 
				'lastname' =>$this->input->post('lname') , 
				'address' =>$this->input->post('address') , 
				'state' =>$this->input->post('state') , 
				'city' =>$this->input->post('city') , 
				'contactno' =>$this->input->post('contactno') , 
				'qualification' =>$this->input->post('qualification') , 
				'stream' =>$this->input->post('stream') , 
				'passingyear' =>$this->input->post('passingyear') , 
				'dob' =>$this->input->post('dob') , 
				'age' =>$this->input->post('age') , 
				'designation' =>$this->input->post('designation')  
				
		    );
		$this->usermodel->Updateprofile($user_data);
		
	}
	public function applied_jobs()
	{
		$data['appliedjobs'] =$this->usermodel->applied();
		$this->load->view('User/appliedjobs' ,$data);
	}
	public function resume()
	{
		$data['resume'] = $this->usermodel->viewresume();
		$this->load->view('User/resume' ,$data);
	}
	public function uploadresume()
	{
		$this->load->view('User/uploadresume');
	}
	public function uploadfile()
	{

		$config['upload_path']   = './uploads/';
		$config['allowed_types']  = 'txt|doc|docx|pdf';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		$config['max_size']   = 5000;
		if( ! $this->upload->do_upload('resume'))
		{
		    $error = array('error' => $this->upload->display_errors());

		   $this->load->view('User/uploadresume', $error);
		     //redirect('User/dashboard/resume');
        }
	    else
	    {
	        $upload_data = $this->upload->data();

			$this->usermodel->uploadresumefile($upload_data['file_name']);

            $data = array('upload_data' => $this->upload->data());

            $this->session->set_flashdata('success',true);

           $this->load->view('User/uploadresume', $data);
            
		}
	}
}
?>		