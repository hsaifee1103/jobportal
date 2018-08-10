<?php
class Searchcontroller extends CI_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('homemodel');
	}
	function Index()
	{
		$data['json'] =$this->homemodel->search();
		$this->load->view('refresh' , $data);
		//echo json_encode($data);
		

	}
}