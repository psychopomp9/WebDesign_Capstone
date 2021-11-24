<?php

class appointment_model extends CI_model
{
	public function insertappointment($data)
	{
		$this->db->insert('appointmenttb',$data);
		return $this->db->insert_id();
	}

	public function updateappointment($data)
	{
		$this->db->where('ap_id_pk',$data['ap_id_pk']);
		return $this->db->update('appointmenttb',$data);
	}

	public function deleteappointment($id)
	{
		$this->db->where('ap_id_pk',$id);
		$this->db->set('is_active',0);
		$this->db->update('appointmenttb');
	}
	public function appointmentdata($id)
	{
	 $query=$this->db->get_where('appointmenttb',array('is_active'=>1,'ap_id_pk'=>$id));
		return $query->row_array();
	}
	
	public function appointmentlist()
	{
		   
           $this->db->select('a.*,t.treatment_name');
           $this->db->from('appointmenttb a');
           $this->db->where('a.is_active',1);
           $this->db->where('a.is_read',1);
           $this->db->join('treatmenttb t','t.treatment_id_pk=a.treatment_id_fk');
           $query=$this->db->get();
	      return $query->result_array();
     }
     function countappointment()
     {
     	$this->db->select('*');
     	$this->db->from('appointmenttb');
     	return $this->db->count_all_results();
     }
      function countnotification()
     {
     	$this->db->select('*');
     	$this->db->from('appointmenttb');
     	$this->db->where('is_active',1);
     	$this->db->where('is_read',1);
     	return $this->db->count_all_results();
     }

}

?>