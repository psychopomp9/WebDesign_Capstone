<?php

class history_model extends CI_model
{
	public function inserthistory($data)
	{
		$this->db->insert('historytb',$data);
		return $this->db->insert_id();
	}

	public function updatehistory($data)
	{
		$this->db->where('history_id_pk',$data['history_id_pk']);
		return $this->db->update('historytb',$data);
	}

	public function deletehistory($id)
	{
		$this->db->where('history_id_pk',$id);
		$this->db->set('is_active',0);
		$this->db->update('historytb');
	}
	public function historydata($id)
	{
	 $query=$this->db->get_where('historytb',array('is_active'=>1,'history_id_pk'=>$id));
		return $query->row_array();
	}
	public function historylist()
	{
		$this->db->select('h.*,p.patient_name,t.treatment_name,d.doctor_name');
		$this->db->from('historytb h');
		$this->db->where('h.is_active',1);
		$this->db->join('patienttb p','p.patient_id_pk=h.patient_id_fk');
		$this->db->join('treatmenttb t','t.treatment_id_pk=h.treatment_id_fk');
		$this->db->join('doctortb d','d.doctor_id_pk=h.doctor_id_fk');
		$query=$this->db->get();
	  // $query=$this->db->get_where('historytb',array('is_active'=>1));
	    return $query->result_array();
}

}

?>