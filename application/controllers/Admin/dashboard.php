<?php
class Dashboard extends CI_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('adminmodel');
	}
	function Index()
	{
		$query = $this->adminmodel->newcomp();
		$data['numrows'] = $query['num'];
		$data['newcomp'] = $query['records'];
		$this->load->view('Admin/dashboard' ,$data);
	}
	public function users()
	{
		$query = $this->adminmodel->users();
		$data['numrows'] = $query['num'];
		$data['users'] = $query['records'];
		$this->load->view('Admin/users', $data);
	}
	public function companies()
	{
		$query = $this->adminmodel->companies();
		$data['numrows'] = $query['num'];
		$data['comp'] = $query['records'];
		$this->load->view('Admin/companies', $data);	
	}
	public function jobposts()
	{
		$query = $this->adminmodel->jobposts();
		$data['numrows'] = $query['num'];
		$data['jobpost'] = $query['records'];
		$this->load->view('Admin/jobposts', $data);
	}
	public function approve_company()
	{
		$company_id = $_GET['company_id'];
		$this->adminmodel->approve_company($company_id);
	}
	public function reject_company()
	{
		$company_id = $_GET['company_id'];
		$this->adminmodel->reject_company($company_id);
	}
	public function delete_company()
	{
		$company_id = $_GET['company_id'];
		$this->adminmodel->delete_company($company_id);
	}
	public function delete_user()
	{
		$user_id = $_GET['user_id'];
		$this->adminmodel->delete_user($user_id);
	}
	public function delete_job()
	{
		$job_id = $_GET['job_id'];
		$this->adminmodel->delete_job($job_id);
	}



}