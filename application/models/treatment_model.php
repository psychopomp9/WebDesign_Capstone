<?php

class treatment_model extends CI_model
{
	public function inserttreatment($data)
	{
		$this->db->insert('treatmenttb',$data);
		return $this->db->insert_id();
	}

	public function updatetreatment($data)
	{
		$this->db->where('treatment_id_pk',$data['treatment_id_pk']);
		return $this->db->update('treatmenttb',$data);
	}

	public function deletetreatment($id)
	{
		$this->db->where('treatment_id_pk',$id);
		$this->db->set('is_active',0);
		$this->db->update('treatmenttb');
	}
	public function treatmentdata($id)
	{
	 $query=$this->db->get_where('treatmenttb',array('is_active'=>1,'treatment_id_pk'=>$id));
		return $query->row_array();
	}
	public function treatmentlist()
	{
		$this->db->select('t.*,d.doctor_name');
		$this->db->from('treatmenttb t');
		$this->db->where('t.is_active',1);
		$this->db->join('doctortb d','d.doctor_id_pk=t.doctor_id_fk');
		$query=$this->db->get();
	//   $query=$this->db->get_where('treatmenttb',array('is_active'=>1));
	     return $query->result_array();
    }
    public function treatmenttoplist()
	{
		$this->db->select('t.*,d.doctor_name');
		$this->db->from('treatmenttb t');
		$this->db->where('t.is_active',1);
		$this->db->join('doctortb d','d.doctor_id_pk=t.doctor_id_fk');
		$this->db->limit(4);
		$query=$this->db->get();
	
	     return $query->result_array();
}

}

?>