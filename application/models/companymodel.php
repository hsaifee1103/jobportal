<?php

/**
 * 
 */
class companymodel extends CI_model
{
	
	public function createjp($postdata) 
	{
		
		//$id = $this->session->userdata('user_id');
		$q = $this->db->insert("job_post" ,$postdata );
		if ($q > 0 ) 
		{
			$this->session->set_flashdata('jobposted' , true);
			redirect('Company/dashboard');
		}
		

	}
	public function userapp()
	{
		$id = $this->session->userdata('user_id');
		 $this->db->select("*");
		 $this->db->from("apply_job_post");
		 $this->db->where("id_company = $id");
		 $q =  $this->db->get();
		 return $q->num_rows();
	}
	public function viewjp()
	{
		$id = $this->session->userdata('user_id');
		 $this->db->select("*");
		 $this->db->from("job_post");
		 $this->db->where("company_id = $id");
		 $q =  $this->db->get();
		 return $q->result_array();
	}
	public function editjp($id)
	{
		 $this->db->select("*");
		 $this->db->from("job_post");
		 $this->db->where("job_id = $id");
		 $q =  $this->db->get();
		 return $q->result_array();
	}
	public function updatejp($set , $where) 
	{
		
		//$id = $this->session->userdata('user_id');
		$q = $this->db->update("job_post", $set ,"job_id = $where" );
		if ($q > 0 ) 
		{
			$this->session->set_flashdata('jobupdated' , true);
			redirect('Company/dashboard/viewjp');
		}
		

	}
	public function deletejp($where) 
	{
		
		//$id = $this->session->userdata('user_id');
		$q = $this->db->delete("job_post" ,"job_id = $where" );
		if ($q > 0 ) 
		{
			$this->session->set_flashdata('jobdeleted' , true);
			redirect('Company/dashboard/viewjp');
		}
		

	}
	public function userapplications() 
	{
		
		$id = $this->session->userdata('user_id');
		$this->db->select("*");
		$this->db->from("apply_job_post");
		$this->db->join("job_post", "job_post.job_id = apply_job_post.id_job" );
		$this->db->join("users", "apply_job_post.id_user = users.user_id" );
		$this->db->where("apply_job_post.id_company = $id" );
		$q = $this->db->get();
		if ($q->num_rows() > 0 ) 
		{
			return $q->result_array();
		}
		

	}

	
		
}		