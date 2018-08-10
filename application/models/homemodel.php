<?php

/**
 * 
 */
class Homemodel extends CI_model
{
	
	public function jobs() 
	{
		$this->db->select('*');
	    $this->db->order_by('rand()');
	    $this->db->limit(4);
	    $this->db->from('job_post');
	    $q = $this->db->get();
		//$q = $this->db->get('job_post');
		return $q->result();

	}
	public function search() 
	{
		$this->db->select('*');
	    $this->db->from('job_post');
	    $q = $this->db->get();
		//$q = $this->db->get('job_post');
		return $q->result_array();

	}
	public function check_login_details($login_data) 
	{
		
		$q = $this->db->get_where('users' ,$login_data);
		if ($q->num_rows()>0) 
		{
			$data = $q->row();
			$this->session->set_userdata('username' ,$data->firstname);
			return $data->user_id;
		}

	}
	public function check_admin($login_data) 
	{
		
		$q = $this->db->get_where('admin' ,$login_data);
		if ($q->num_rows()>0) 
		{
			$data = $q->row();
			$this->session->set_userdata('username' ,$data->username);
			return $data->admin_id;
		}

	}
	public function add_user_details($user_data) 
	{
		
		$q = $this->db->insert('users' ,$user_data);
		if ($q >0) 
		{
			return true;
		}
		else
		{
			return false;
		}

	}
	public function add_comp_details($comp_data) 
	{
		
		$q = $this->db->insert('company' ,$comp_data);
		if ($q >0) 
		{
			return true;
		}
		else
		{
			return false;
		}

	}
	public function check_comp_login_details($login_data) 
	{
		
		$q = $this->db->get_where('company' ,$login_data);
		if ($q->num_rows()>0) 
		{
			$data = $q->row();
			if($data->active == '2')
			{
				$this->session->set_flashdata('notapprove' ,true);
				redirect("homecontroller/comp_loginpage");
			}
			elseif ($data->active == '0') 
			{
				$this->session->set_flashdata('rejected' ,true);
				redirect("homecontroller/comp_loginpage");
			}
			else
			{
				$this->session->set_userdata('companyname' ,$data->companyname);
			    return $data->company_id;
			} 
			
		}

	}
	public function getcountry() 
	{
		$q = $this->db->get('countries');

		return  $q->result();


	}
	public function showjob($job_id)
	{
		$this->db->select("*");
		$this->db->from("job_post");
		$this->db->join("company" , 'job_post.company_id = company.company_id');
		$this->db->where("job_post.job_id = $job_id");
		$q = $this->db->get();

		//('job_post', "job_id = $job_id");
		return $q->result();
	}
}

?>