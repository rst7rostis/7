<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
		
		
		public function change_info(){
			$id=$this->input->get('id');
			$this->load->model('face_model');
			$this->data_to_change = $this->face_model->correct_in_db($id);
			$this->load->view('change_info', $this->data_to_change);			
		}		
		public function correct_in_db(){
			$id=$this->input->get('id');
			$data['title'] =   $this->input->post('title');
			$data['comment'] = $this->input->post('comments');
			$data['manager'] = $this->input->post('manager');
			$data['summ'] = $this->input->post('summ');
			$data['summ2'] = $this->input->post('summ2');
			$data['sum2win'] = $this->input->post('summ2win');
			$data['winner'] = $this->input->post('winner');
			$data['ip'] = $this->input->post('organization');
			$data['suplydate'] = $this->input->post('suplydate');
			$data['regdate'] = $this->input->post('month');
			$data['suplytype'] = $this->input->post('suply');
			$data['auction_date'] = $this->input->post('auction_date');
			$data['auction_date'].= " ".$this->input->post('atime');
			$data['auction_date'].= ":".$this->input->post('amins');
			//print_r($data['auction_date']);
			$this->load->model('face_model');
			$this->data_to_change = $this->face_model->update_in_db($id, $data);
			$this->load->view('page');			
		}
		
		
	}