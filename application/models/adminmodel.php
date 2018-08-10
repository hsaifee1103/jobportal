<?php

/**
 * 
 */
class adminmodel extends CI_model
{
	
	public function newcomp()
	{
		$this->db->select("*");
		$this->db->from("company");
		$this->db->where("active = 2");
		$q = $this->db->get();
		return array('records' => $q->result_array(),'num' => $q->num_rows());
	}
	public function users()
	{
		$q = $this->db->get('users');
		return array('records' => $q->result_array(),'num' => $q->num_rows());
	}
	public function companies()
	{
		$q = $this->db->get_where('company' , "active = 1");
		return array('records' => $q->result_array(),'num' => $q->num_rows());
	}
	public function jobposts()
	{
		$q = $this->db->get('job_post');
		return array('records' => $q->result_array(),'num' => $q->num_rows());
	}
	public function approve_company($id)
	{
		$q = $this->db->update('company', array('active'=>1), "company_id = $id");
		if ($q>0) 
		{
			$this->session->set_flashdata('approved' , true);
			redirect('Admin/dashboard');
		}
		else
		{
			$this->session->set_flashdata('approvedError' , true);
			redirect('Admin/dashboard');
		}
	}
	public function reject_company($id)
	{
		$q = $this->db->update('company', array('active'=>0), "company_id = $id");
		if ($q>0) 
		{
			$this->session->set_flashdata('reject' , true);
			redirect('Admin/dashboard');
		}
		else
		{
			$this->session->set_flashdata('rejectError' , true);
			redirect('Admin/dashboard');
		}
	}
	public function delete_company($id)
	{
		$q = $this->db->delete('company', "company_id = $id");
		if ($q>0) 
		{
			$this->session->set_flashdata('deleted' , true);
			redirect('Admin/dashboard/companies');
		}
		else
		{
			$this->session->set_flashdata('deleteError' , true);
			redirect('Admin/dashboard/companies');
		}
	}
	public function delete_user($id)
	{
		$q = $this->db->delete('users', "user_id = $id");
		if ($q>0) 
		{
			$this->session->set_flashdata('deleted' , true);
			redirect('Admin/dashboard/users');
		}
		else
		{
			$this->session->set_flashdata('deleteError' , true);
			redirect('Admin/dashboard/users');
		}
	}
	public function delete_job($id)
	{
		$q = $this->db->delete('job_post', "job_id = $id");
		if ($q>0) 
		{
			$this->session->set_flashdata('deleted' , true);
			redirect('Admin/dashboard/jobposts');
		}
		else
		{
			$this->session->set_flashdata('deleteError' , true);
			redirect('Admin/dashboard/jobposts');
		}
	}






		
}		