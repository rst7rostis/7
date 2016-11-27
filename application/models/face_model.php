<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Face_model extends CI_Model {

		public function dumbindb($data){

			$this->db->insert('vid_base', $data);
		}
		
		public function setdbinfo(){
			$data['title'] =   $this->input->post('title');
			$data['comment'] = $this->input->post('comments');
			$data['actor'] = $this->input->post('actor');
			$data['type'] = $this->input->post('type');
			$data['link'] = $this->input->post('link');
			$data['vidsize'] = $this->input->post('vidsize');
			$data['vidtime'] = $this->input->post('vidtime');

			
			if($this->input->post('status')==NULL){
				$data['status'] = 0;
			}else{
				$data['status'] = 1;
			}

		return $this->db->insert('vid_base', $data);
		}
		
		public function correct_in_db($id){
			$query = $this->db->query("SELECT * FROM `vid_base` where id=$id");
			return $query->result();
		}		
		public function update_in_db($id, $data){
			$this->db->where('id', $id);
			$this->db->update('vid_base', $data);
			return $e="<div class='dialog'>Информация обновлена<br> <a href='/'>Вернуться на главную</a></div>";
		}		
		public function search_i_db($title, $type){
		if($title==TRUE){
			$query = $this->db->query("SELECT id, title, comment, type FROM `vid_base` where title like '%$title%'");
		}elseif($manager==TRUE){
			$query = $this->db->query("SELECT id, title, comment, type FROM `vid_base` where type='$type'");
		}else{
			die('Пустой запрос <a href="/">Вернуться</a>');
		}
		return $query->result();
		}
	}
