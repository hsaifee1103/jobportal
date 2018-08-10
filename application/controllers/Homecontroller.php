<?php
class Homecontroller extends CI_controller
{

/*============================Home Section Start here ===========================================*/

	function __construct()
	{
		parent::__construct();
		$this->load->model('homemodel');
	}
	function Index()
	{
		$data['jobs'] =$this->homemodel->jobs();
		//$this->load->view('home' , $data);
		if (empty($this->session->userdata('user_id'))) 
		{
			$this->load->view("header");
		    $this->load->view('home', $data);
		    $this->load->view("footer");
			
		}
		else
		{
			if (!empty($this->session->userdata('companylogged'))) 
			{
				$this->load->view("company/header");
			    $this->load->view('home', $data);
			    $this->load->view("company/footer");
				
			}
			else
			{
				$this->load->view("user/header");
			    $this->load->view('home', $data);
			    $this->load->view("user/footer");
		    }
		}

	}
	public function search()
	{
		
		if (empty($this->session->userdata('user_id'))) 
		{
			$this->load->view("header");
		    $this->load->view('search');
		    $this->load->view("footer");
			
		}
		else
		{
			if (empty($this->session->userdata('companylogged'))) 
			{
				$this->load->view("user/header");
		        $this->load->view('search');
		        $this->load->view("user/footer");
			}
			else
			{
				$this->load->view("company/header");
		        $this->load->view('search');
		        $this->load->view("company/footer");
			}
			
		}
	}
	public function login_as()
	{
		$this->load->view('login_as');
	}
	public function reg_as()
	{
		$this->load->view('reg_as');
	}
	public function logout()
	{
		 $this->session->sess_destroy();

        redirect('Homecontroller','refresh');
	}
	public function apply_jobs()
	{
		$job_id = $_GET['id'];
		$job['data'] = $this->homemodel->showjob($job_id);
		if (empty($this->session->userdata('user_id'))) 
		{
			$this->load->view("header");
		    $this->load->view('singlejob', $job);
		    $this->load->view("footer");
			
		}
		else
		{
			$this->load->view("user/header");
		    $this->load->view('singlejob', $job);
		    $this->load->view("user/footer");
		}
	}
/*============================Home Section End here ===========================================*/


/*============================User Data is here ===========================================*/

	public function Regpage()
	{
		$this->load->view('registration');
	}
	public function adduser()
	{

		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('fname','firstname','trim|required|alpha');
		$this->form_validation->set_rules('lname','lastname','trim|required|alpha');
		$this->form_validation->set_rules('password','Password','required|min_length[5]|max_length[12]');
		/*validation*/
		if ($this->form_validation->run()) 
		{

	   
			$user_data = array
			(
				'firstname' =>$this->input->post('fname') , 
				'lastname' =>$this->input->post('lname') , 
				'email' =>$this->input->post('email') , 
				'password' => base64_encode(strrev(md5($this->input->post('password'))))
		    );
		    $response = $this->homemodel->add_user_details( $user_data);
		    if ($response==true) 
		    {
		    	$this->session->set_flashdata('reg_success', true );
		    	redirect('Homecontroller/loginpage');
		    }
			else
			{
				$this->session->set_flashdata('reg_fail',true );
		    	redirect('Homecontroller/regpage');
			}
		}
		else
		{
			$this->load->view('registration');

		}
	}

	public function loginpage()
	{
		$this->load->view('login');
	}
	
	public function checklogin()
	{
		$email =$this->input->post('email');
		$pass =$this->input->post('password');
		$pass = base64_encode(strrev(md5($pass)));
		$details =  array('email' => $email,'password' => $pass );
		$id = $this->homemodel->check_login_details( $details);
		if ($id) 
		{
			$this->session->set_userdata('user_id', $id);
			redirect("User/dashboard");

		}
		else
		{
			$this->session->set_flashdata('loginError', true);
			redirect("Homecontroller/loginpage");
		}
	}

/*============================USer End ===========================================*/


/*============================Admin Details check here ===========================================*/

    public function admin()
	{
		$this->load->view('adminloginpage');
	}

	public function check_admin_login()
	{
		$username =$this->input->post('username');
		$pass =$this->input->post('password');
		//$pass = base64_encode(strrev(md5($pass)));
		$details =  array('username' => $username,'password' => $pass );
		$id = $this->homemodel->check_admin( $details);
		if ($id) 
		{
			$this->session->set_userdata('admin_id', $id);
			redirect("Admin/dashboard");

		}
		else
		{
			$this->session->set_flashdata('loginError', true);
			redirect("Homecontroller/admin");
		}
	}

/*===============================Admin panel End==============================================*/

	
	

/*============================Company data is here ===========================================*/


	public function comp_loginpage()
	{
		$this->load->view('comp_login');
	}
	public function comp_regpage()
	{
		$data['country'] = $this->homemodel->getcountry();
		$this->load->view('comp_registration' , $data);
	}
	public function checkcompanylogin()
	{
		$email =$this->input->post('email');
		$pass =$this->input->post('password');
		$pass = base64_encode(strrev(md5($pass)));
		$details =  array('cemail' => $email,'password' => $pass );
		$id = $this->homemodel->check_comp_login_details( $details);
		if ($id) 
		{
			$this->session->set_userdata('user_id', $id);
			$this->session->set_userdata('companylogged', true);
			redirect("Company/dashboard");

		}
		else
		{
			$this->session->set_flashdata('loginError', true);
			redirect("Homecontroller/comp_loginpage");
		}
	}
	public function addcomp()
	{

		$this->form_validation->set_rules('cemail','Email','trim|required|valid_email|is_unique[company.cemail]');
		$this->form_validation->set_rules('cname','Companyname','trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('hoffice','Office City','trim|required|alpha');
		$this->form_validation->set_rules('contactno','Contact no','required|integer|exact_length[10]');
		$this->form_validation->set_rules('website','Website','trim|required|valid_url');
		$this->form_validation->set_rules('password','Password','required|min_length[5]|max_length[12]');
		/*validation*/
		if ($this->form_validation->run()) 
		{

	   
			$comp_data = array
			(
				'companyname' =>$this->input->post('cname') , 
				'headofficecity' =>$this->input->post('hoffice') , 
				'country' =>$this->input->post('country') , 
				'state' =>$this->input->post('state') , 
				'city' =>$this->input->post('city') , 
				'contactno' =>$this->input->post('contactno') , 
				'website' =>$this->input->post('website') , 
				'companytype' =>$this->input->post('companytype') , 
				'cemail' =>$this->input->post('cemail') , 
				'password' => base64_encode(strrev(md5($this->input->post('password'))))
		    );
		    $response = $this->homemodel->add_comp_details( $comp_data);
		    if ($response==true) 
		    {
		    	$this->session->set_flashdata('reg_success', true );
		    	redirect('Homecontroller/comp_loginpage');
		    }
			else
			{
				$this->session->set_flashdata('reg_fail',true );
		    	redirect('Homecontroller/comp_regpage');
			}
		}
		else
		{
			$this->load->view('comp_registration');

		}
	}

/*============================Company data end here ===========================================*/

	

}

?>