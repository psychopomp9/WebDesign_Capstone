<?php

class user_model extends CI_Model
{
	function insertuser($data)
	{
		$this->db->insert('usertb',$data);
		return $this->db->insert_id();
	}

	function userdata($id)
	{
		$qry=$this->db->get_where('usertb',array('user_id_fk'=>$id));
		return $qry->row_array();
	}
	function user_auth($user_email,$user_password)
	{
		$qry=$this->db->get_where('usertb',array('user_email'=>$user_email,'user_password'=>$user_password));
		return $qry->row_array();
	}
	function user_pass($useremail)
	{
		$qry=$this->db->get_where('usertb',array('user_email'=>$useremail));
		return $qry->row_array();
	}

	function userlist()
	{
		$qry=$this->db->get_where('usertb');
		return $qry->result_array();
	}
	function updateuser($data)
	{
		$this->db->where('user_id_fk',$data['user_id_fk']);
		return $this->db->update('usertb',$data);
	}
	function updatedpass($data)
	{
		$this->db->where('user_id_pk',$data['user_id_pk']);
		return $this->db->update('usertb',$data);
	}
	function deleteuser($id)
	{
		$this->db->where('user_id_pk',$id);
		$this->db->set('is_active',0);
		$this->db->update('usertb');
	}
}
?>