<?php
class Dashboard extends CI_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('companymodel');
	}
	function Index()
	{
		$data['rows'] = $this->companymodel->userapp();
		$this->load->view('Company/dashboard' ,$data);
	}
	public function createjp()
	{
		$this->load->view('Company/createjp');
	}
	public function addjob()
	{
		$jobdata = array
		(
			'company_id' =>  $this->session->userdata('user_id'), 
			'title' => $this->input->post('title'), 
			'description' => $this->input->post('description'), 
			'minimumsalary' => $this->input->post('minimumsalary'), 
			'maximumsalary' => $this->input->post('maximumsalary'), 
			'qualification' => $this->input->post('qualification'), 
			'experience' => $this->input->post('experience'), 
		);
		$this->companymodel->createjp($jobdata);
		
	}
	public function viewjp()
	{
		$data['viewjob'] = $this->companymodel->viewjp();
		$this->load->view("Company/viewjp", $data);
	}
	public function editjp()
	{
		$id = $_GET['id'];
		$data['editjob'] = $this->companymodel->editjp($id);
		$this->load->view("Company/editjp", $data);
	}
	public function updatejp()
	{
		$id = $this->input->post('target_id');
		$jpdata = array
		(
			'title' => $this->input->post('title'), 
			'description' => $this->input->post('description'), 
			'minimumsalary' => $this->input->post('minimumsalary'), 
			'maximumsalary' => $this->input->post('maximumsalary'), 
			'qualification' => $this->input->post('qualification'), 
			'experience' => $this->input->post('experience'), 
		);
		$this->companymodel->updatejp($jpdata ,$id);
		
	}
	public function deletejp()
	{
		$id = $_GET['id'];
		$this->companymodel->deletejp($id);
	}
	public function userapp()
	{
		$data['userapp'] = $this->companymodel->userapplications();
		$this->load->view('Company/userapp', $data);
		
	}

}
?>		