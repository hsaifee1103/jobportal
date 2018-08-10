<?php

/**
 * 
 */
class usermodel extends CI_model
{
	
	public function activejobs() 
	{
		//$q = $this->db->get('job_post');
		//return $q->result_array();
		$id = $this->session->userdata('user_id');
		
		$q = $this->db->get("job_post");
		$q1 = $this->db->get_where("apply_job_post" , "id_user = $id");
		return array('job_post'=> $q->result_array() , 'apply_job_post' =>$q1->result_array());

	}
	public function applied_job($job_id) 
	{
		$id = $this->session->userdata('user_id');
		$this->db->select('company_id');
		$this->db->from("job_post");
		$this->db->where("job_id = $job_id");
		$q = $this->db->get();
		$data = $q->row();
		$company_id = $data->company_id;
		$inserted = $this->db->insert("apply_job_post" ,array('id_job' =>$job_id ,'id_company'=>$company_id , 'id_user'=>$id ));
		if ($inserted>0) 
		{
			$this->session->set_flashdata('applied_success', true );
		    redirect('User/dashboard');
		}
		else
		{
			$this->session->set_flashdata('applied_failed', true );
		    redirect('User/dashboard');
		}

	}
	public function profile()
	{
		$id = $this->session->userdata('user_id');
		$q = $this->db->get_where('users', "user_id = $id");
		return $q->result_array();
	}
	public function Updateprofile($user_data)
	{
		$id = $this->session->userdata('user_id');
		$q = $this->db->update('users',$user_data, "user_id = $id");
		if ($q >0) 
		{
			$q1 = $this->db->get_where('users' , "user_id = $id");
			$data = $q1->row();
			$name = $data->firstname;
			$this->session->set_userdata('username', $name);
			$this->session->set_flashdata('updated',true);
			redirect('User/dashboard');
		}
	}
	public function uploadresumefile($filename)
	{
		$id = $this->session->userdata('user_id');
		$q = $this->db->get_where('users',"user_id = $id");
		if ($q->num_rows()>0) 
		{
			$data = $q->row();
			if ($data->resume == '') 
			{
				
		        $this->db->update("users" , array('resume'=>$filename) ,"user_id = $id ");
			}
			else
			{
				unlink("./uploads/".$data->resume);
				$this->db->update("users" , array('resume'=>$filename) ,"user_id = $id ");
			}
			
		}
	}
		public function viewresume()
		{
			$id = $this->session->userdata('user_id');
		    $q = $this->db->get_where('users',"user_id = $id");
		    if ($q->num_rows()>0) 
		    {
			  $data = $q->row();
			  return $data->resume;
			}

		}
		public function applied()
		{
			$id = $this->session->userdata('user_id');
		    $this->db->select("*");
		    $this->db->from("job_post");
		    $this->db->join("apply_job_post" ,"job_post.job_id = apply_job_post.id_job");
		    $this->db->where("apply_job_post.id_user = $id " );
		    $q = $this->db->get();
		    $data = $q->result_array();

		    return $data ;

		}
		public function already_applied_job($jobid)
		{
			$id = $this->session->userdata('user_id');
		    $this->db->select("*");
		    $this->db->from("apply_job_post" );
		    $this->db->where(array("id_job" => $jobid , "id_user" => $id));
		    $q = $this->db->get();
		    return $q->num_rows();
		}

		
}		