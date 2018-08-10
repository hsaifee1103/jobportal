<?php
class ajaxdata extends CI_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('ajaxmodel');
	}
	function Index()
	{

	}
	public function getstate($country_id)
	{
		$data = $this->ajaxmodel->getstate($country_id);
		echo json_encode($data);
		
	}
	public function getcity($state_id)
	{
		$data = $this->ajaxmodel->getcity($state_id);
		
		echo json_encode($data);
	}
}	