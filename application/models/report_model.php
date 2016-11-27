<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

		public function get_report($report_date_start, $report_date_end){
			//$query = $this->db->query("SELECT * FROM vid_base");
			/*$report_date_start.=' 00:00:00';
			$report_date_end.=' 00:00:00';*/
			$query = $this->db->query("SELECT * FROM `vid_base` where date between '$report_date_start' AND '$report_date_end' ");
			return $query->result();
		}		
		public function get_averege_month($report_date_start, $report_date_end){
			//$query = $this->db->query("SELECT * FROM vid_base");
			/*$report_date_start.=' 00:00:00';
			$report_date_end.=' 00:00:00';*/
			$query = $this->db->query("SELECT distinct regdate  FROM `vid_base` where date between '$report_date_start' AND '$report_date_end' ");
			return $query->result();
		}		
		public function get_manager($manager='', $report_date_start, $report_date_end){
			//$query = $this->db->query("SELECT * FROM vid_base");
			/*$report_date_start.=' 00:00:00';
			$report_date_end.=' 00:00:00';*/
			$query = $this->db->query("SELECT count(*) FROM `vid_base` where manager = '$manager' and date between '$report_date_start' AND '$report_date_end' ");
			return $query->result();
		}		
		
		public function get_org_wins($org='', $report_date_start, $report_date_end){
			$query = $this->db->query(
			"SELECT count(*) FROM `vid_base` 
			where ip=$org 
			and status='0' and winner!=' '
			and date between '$report_date_start' AND '$report_date_end'"
			);
			return $query->result();
		}		
		public function get_org_chalenge($org='', $report_date_start, $report_date_end){
			$query = $this->db->query(
			"SELECT count(*) FROM `vid_base` where ip=$org and date between '$report_date_start' AND '$report_date_end'"
			);
			return $query->result();
		}
		
		public function get_tender_per_month($report_date_start, $report_date_end){
			/*$month_start = date('Y-08-03').' 00:00:00';
			$month_end = date('Y-08-31').' 23:59:59';*/
			
			/*$report_date_start.=' 00:00:00';
			$report_date_end.=' 00:00:00';*/
			$query = $this->db->query("SELECT count(*) FROM `vid_base` where date between '$report_date_start' AND '$report_date_end' ");
			return $query->result();
		}		
		
		public function get_to_face_info(){
			$query = $this->db->query("SELECT id, title, rate FROM `vid_base` order by id desc");
			return $query->result();
		}		
		
		public function show_info($id){
			$query = $this->db->query("SELECT * FROM `vid_base` where id=$id");
			return $query->result();
		}
	}
