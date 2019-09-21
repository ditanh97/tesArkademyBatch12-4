<?php

class Worker extends CI_Controller {

	public function _construct(){
		parent::_construct();
		$this->load->model('worker_model');
	}
	
	public function index(){
		$data['workers'] = $this->worker_model->get_all_workers();
		$this->load->view('worker_view', $data);
	}
	
	public function worker_add(){
		$data = array(
				'worker_name'=> $this->input->post('worker_name'),
				'worker_work'=> $this->input->post('worker_work'),
				'worker_salary'=> $this->input->post('worker_salary')
			);
		
		$insert = $this->worker_model->worker_add($data);
		echo json_encode(array("status"=>true));	
	}
	
	public function ajax_edit($id){
		$data = $this->worker_model->get_by_id($id);
		echo json_encode($data);
	}

	public function worker_update(){
		$data = array(
				'worker_name'=> $this->input->post('worker_name'),
				'worker_work'=> $this->input->post('worker_work'),
				'worker_salary'=> $this->input->post('worker_salary')		
			);
		$this->worker_model->worker_update(array('worker_name'=>$this->input->post('worker_name')), $data);
		
		echo json_encode(array("status"=>true))
	}

}
