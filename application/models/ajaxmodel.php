<?php
class ajaxmodel extends CI_model
{
	
	public function getstate($country_id) 
	{
		$q = $this->db->get_where('states',array('country_id'=>$country_id));
		if ($q->num_rows()>0) 
		{
			return $q->result_array();
		}
		else
		{
			return false;
		}
	}
	public function getcity($state_id) 
	{
		$q = $this->db->get_where('cities',array('state_id'=>$state_id));
		if ($q->num_rows()>0) 
		{
			return $q->result_array();
		}
		else
		{
			return false;
		}
	}
}
?>	