<?php

class Worker_model extends CI_Model {
	var $table = 'workers';
	public function worker_add($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	public function get_all_workers(){
		$this->db->from('workers');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_by_id($id){
		$this->db->from($this->table);
		$this->db->where('worker_name', $id);
		$query-> $this->db->get();
		return $query->row();
	}

	public function worker_update($where, $data){
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}	
	
}
