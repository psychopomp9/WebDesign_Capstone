<?php
class doctor_model extends CI_model
{
	 function insertdoctor($data)
	 {
         $this->db->insert('doctortb',$data);
        return  $this->db->insert_id();
	 }

	 function updatedoctor($data)
	 {
	 	$this->db->where('doctor_id_pk',$data['doctor_id_pk']);
	 	return $this->db->update('doctortb',$data);
	 }
	 function deletedoctor($id)
	 {
	 	$this->db->where('doctor_id_pk',$id);
	 	$this->db->set('is_active',0);
	 	$this->db->update('doctortb');
	 }

	 function doctordata($id)
	 {
	  $query=$this->db->get_where('doctortb',array('is_active'=>1,'doctor_id_pk'=>$id));
      return $query->row_array();
	 }

	 function doctorlist()
	 {
         $query=$this->db->get_where('doctortb',array('is_active'=>1));
         return $query->result_array();
	 }
	  function doctortoplist()
	 {
	 	$this->db->limit(4);
         $query=$this->db->get_where('doctortb',array('is_active'=>1));
         
         return $query->result_array();
	 }
	   function countdoctor()
     {
     	$this->db->select('*');
     	$this->db->from('doctortb');
     	return $this->db->count_all_results();
     }
}

?>