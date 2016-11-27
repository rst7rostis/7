<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
		
		public function index()
		{		
			$this->load->model('report_model');
			$this->data_inf = $this->report_model->get_to_face_info();	
			$this->load->view('face');
			$this->load->view('current_tender', $this->data_inf);
		}		
		
		public function viewinf()
		{	
			$id = $this->input->get('id');
			$this->load->model('report_model');
			$this->data_inf = $this->report_model->show_info($id);	
			$this->load->view('viewinf', $this->data_inf);
		}		
		
		public function settodb()
		{		
			$this->load->model('face_model');
			$this->face_model->setdbinfo();
			$this->load->view('face');
		}		
		public function make_report()
		{		
			$report_date_start = $this->input->post('date_start');
			$report_date_end = $this->input->post('date_end');
			
			$this->report_date = array(
				$report_date_start.=' 00:00:00',
				$report_date_end.=' 23:59:59'
			);
			$this->load->model('report_model');
			$this->res = $this->report_model->get_report($report_date_start, $report_date_end);
			
			$this->tender_cnt = $this->report_model->get_tender_per_month($report_date_start, $report_date_end);
			$this->load->view('report', $this->res, $this->tender_cnt, $this->report_date);
		}
		public function change_info(){
			$id=$this->input->get('id');
			$this->load->model('face_model');
			$this->data_to_change = $this->face_model->correct_in_db($id);
			$this->load->view('change_info', $this->data_to_change);			
		}		
		public function correct_db(){
			$id =   $this->input->post('ids');
			$data['title'] =   $this->input->post('title');
			$data['date'] =   $this->input->post('date');
			$data['comment'] = $this->input->post('comments');
			$data['manager'] = $this->input->post('manager');
			$data['tender_type'] = $this->input->post('tender_type');
			$data['summ'] = $this->input->post('summ');
			$data['summ2'] = $this->input->post('summ2');
			$data['sum2win'] = $this->input->post('summ2win');
			$data['winner'] = $this->input->post('winner');
			$data['ip'] = $this->input->post('organization');
			$data['suplydate'] = $this->input->post('suplydate');
			$data['regdate'] = $this->input->post('month');
			$data['suplytype'] = $this->input->post('suply');
			$data['status'] = $this->input->post('status');
			$data['auction_date'] = $this->input->post('auction_date');
			$data['auction_date'].= " ".$this->input->post('atime');
			$data['auction_date'].= ":".$this->input->post('amins');
			
			if($data['status']=='on'){
				$data['status']='1';
			}
			$this->load->model('face_model');
			$this->e=$this->face_model->update_in_db($id, $data);
			print_r($this->e);
		}		
		
		public function search_in_db(){
			$data['title'] =   $this->input->post('title');
			$data['manager'] = $this->input->post('manager');
			$this->load->model('face_model');
			$this->e=$this->face_model->search_i_db($data['title'], $data['manager']);
			$this->load->view('search_tender', $this->e);
		}
		
		public function download_report()
		{		
			$report_date_start = $this->input->get('date1');
			$report_date_end = $this->input->get('date2');
			$this->load->model('report_model');
			$this->res = $this->report_model->get_report($report_date_start, $report_date_end);
			$this->manager[] = $this->report_model->get_manager('Блохин', $report_date_start, $report_date_end);
			$this->manager[] = $this->report_model->get_manager('Бяшаров', $report_date_start, $report_date_end);
			$this->manager[] = $this->report_model->get_manager('Воробьев', $report_date_start, $report_date_end);
			$this->manager[] = $this->report_model->get_manager('Гусанов', $report_date_start, $report_date_end);
			$this->manager[] = $this->report_model->get_manager('Ковалевский', $report_date_start, $report_date_end);			
			$this->manager[] = $this->report_model->get_manager('Маслеников', $report_date_start, $report_date_end);
			$this->manager[] = $this->report_model->get_manager('Седенкова', $report_date_start, $report_date_end);
			$this->manager[] = $this->report_model->get_manager('Язвенко', $report_date_start, $report_date_end);
			$this->manager[] = $this->report_model->get_manager('Ясинский', $report_date_start, $report_date_end);			
			$this->av_month = $this->report_model->get_averege_month($report_date_start, $report_date_end);

				// pretend content (which is XML) is XLS native
				header("Pragma: public");
				header("Expires: 0");
				header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				header("Cache-Control: private", false);
				header("Content-Type: application/vnd.ms-excel"); 
				header("Content-Disposition: attachment; filename=\"sheet.xls\";" );
				
				
				$this->orgw[] = $this->report_model->get_org_wins(0, $report_date_start, $report_date_end);
				$this->orgw[] = $this->report_model->get_org_wins(1, $report_date_start, $report_date_end);
				$this->orgw[] = $this->report_model->get_org_wins(2, $report_date_start, $report_date_end);
				
				
				$this->orgch[] = $this->report_model->get_org_chalenge(0, $report_date_start, $report_date_end);
				$this->orgch[] = $this->report_model->get_org_chalenge(1, $report_date_start, $report_date_end);				
				$this->orgch[] = $this->report_model->get_org_chalenge(2, $report_date_start, $report_date_end);
				
				$report_date_start = $this->av_month;
				foreach($this->av_month as $k):
					//print_r($k);
				
				$report_date = array(
					//array( "Отчет за период: с $report_date_start по $report_date_end" )
					array( "Отчет за период: ". $k->regdate )
				);
				endforeach;
				
				$suz_report_head = array(
							array('ООО "Спецобъединение Юго-Запад"')								
								);
				$ip_report_head = array(
							array('"ИП"')								
								);				
				$uz_report_head = array(
							array('ООО "Юго-Запад"')								
								);	
				
				$head = array(
							array('№№', 'Название контрагента', 'менеджер', 'НМЦ', 'предложенная цена', 'сумма победы', 'победитель', 'статус'
								));
				$head_managers = array(
							array('Участия менеджеров'
								));	
								
				$head_orgs_wins = array(
							array('Победы организаций'
								));
				$head_orgs_ch = array(
							array('Участия организаций'
								));
				$cnt_ip=1;
				$cnt=1;
				$cnt_su=1;
				foreach($this->res as $row):
				if($row->ip==0)
				{
					$head_ip = array(

					array('№п/п', 'Наименование организации', 'сумма конкурса', 'месяц проведения', 'Способ поставки (разования/по заявкам)', 'сроки поставки (год/полугодие/квартал)')
				);
				/*$data_ip[] = array(
								$cnt, $row->title, $row->summ, $row->regdate, $row->suplytype, $row->suplydate
								);*/
				$data1[] = array(
								$cnt_ip, $row->title, $row->manager, $row->summ, $row->summ2, $row->sum2win, $row->winner, $row->status
								);
				$cnt_ip++;
				}else if($row->ip==1){
				$head_ip = array(

					array('№п/п', 'Наименование организации', 'сумма конкурса', 'месяц проведения', 'Способ поставки (разования/по заявкам)', 'сроки поставки (год/полугодие/квартал)')
				);
				$data_ip[] = array(
								$cnt, $row->title, $row->summ, $row->regdate, $row->suplytype, $row->suplydate
								);
				$cnt++;
				}else if($row->ip==2){
				/*$head_ip = array(

					array('№п/п', 'Наименование организации', 'сумма конкурса', 'месяц проведения', 'Способ поставки (разования/по заявкам)', 'сроки поставки (год/полугодие/квартал)')
				);*/
				$head_su = array(

					array('№п/п', 'Наименование организации', 'сумма конкурса', 'месяц проведения', 'Способ поставки (разования/по заявкам)', 'сроки поставки (год/полугодие/квартал)')
				);
				$data_su[] = array(
								$cnt_su, $row->title, $row->summ, $row->regdate, $row->suplytype, $row->suplydate
								);
				/*$data_ip[] = array(
								$cnt, $row->title, $row->summ, $row->regdate, $row->suplytype, $row->suplydate
								);*/
				
				$cnt_su++;
				}
				endforeach;
								//var_dump($head);
				// construct skeleton
				$dom = new DOMDocument('1.0', 'utf-8');
				$dom->formatOutput = $dom->preserveSpaces = true; // optional
				$n = new DOMProcessingInstruction('mso-application', 'progid="Excel.Sheet"');
				$dom->appendChild($n);

				$workbook = $dom->appendChild(new DOMElement('Workbook'));
				$workbook->setAttribute('xmlns','urn:schemas-microsoft-com:office:spreadsheet');
				$workbook->setAttribute('xmlns:o','urn:schemas-microsoft-com:office:office');
				$workbook->setAttribute('xmlns:x','urn:schemas-microsoft-com:office:excel');
				$workbook->setAttribute('xmlns:ss','xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet');
				$workbook->setAttribute('xmlns:html','http://www.w3.org/TR/REC-html40');

				$styles = $workbook->appendChild(new DOMElement('Styles'));
				$style = $styles->appendChild(new DOMElement('Style'));
				$style->setAttribute('ss:ID','Default');
				$worksheet = $workbook->appendChild(new DOMElement('Worksheet'));
				$worksheet->setAttribute('ss:Name','sheet1');
				$xmltable = $worksheet->appendChild(new DOMElement('Table'));
				// report head date
				foreach ($report_date as $datarow) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
				}}
				// suz-head
				foreach ($suz_report_head as $datarow) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }
				 }					 
				// populate with data
				foreach ($head as $datarow) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }
				 }				
				 foreach ($data1 as $datarow2) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow2 as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }
				 }
// ip-head
				foreach ($ip_report_head as $datarow) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }
				 }
//ip output
				 foreach ($head_ip as $datarow2) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow2 as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }
				 }				 
				 foreach ($data_ip as $datarow2) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow2 as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }
				 }
// uz-head
				foreach ($uz_report_head as $datarow) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }
				 }				 
//su output
				foreach ($head_su as $datarow2) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow2 as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }
				 }				 
				 foreach ($data_su as $datarow2) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow2 as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }
				 }
//managers make tender
			foreach ($head_managers as $datarow2) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow2 as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }
				 }

	$manager_data = array( 

			array(
			 'Блохин',
			 'Бяшаров',
			 'Воробьев',
			 'Гусанов',
			 'Ковалевский',
			 'Маслеников',
			 'Седенкова',
			 'Язвенко',
			 'Ясинский')
			 );		

				
							 
					 foreach ($manager_data as $datarow2) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow2 as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }}					 

foreach($this->manager as $k)	{
	foreach($k as $v){
		foreach($v as $j){
			$s[]= $j;
		}
	}
}
$m= array($s);
					 foreach ($m as $datarow2) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow2 as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }}	
					 //org wins head					 
					foreach ($head_orgs_wins as $datarow2) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow2 as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }}

					 	$org_data = array( 

			array(
			 'ООО "Спецобъединение Юго-Запад"',
			 'ИП',
			 'ООО "Юго-Запад"'
			 ));		

				
							 
					 foreach ($org_data as $datarow2) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow2 as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }}
					 
				foreach($this->orgw as $org)	{
	foreach($org as $j){
		foreach($j as $f){
			$o[]= $f;
		}
	}
}
$t= array($o);
					
					
					if(!$t[0][0] && !$t[0][1] && !$t[0][2]){}else{
					 foreach ($t as $datarow2) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow2 as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }}	
					}//end if

					 //org chalenge head					 
					foreach ($head_orgs_ch as $datarow2) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow2 as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }}		
					if($org_data)
					 foreach ($org_data as $datarow2) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow2 as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }}

				foreach($this->orgch as $orgch)	{
	foreach($orgch as $d){
		foreach($d as $p){
			$ch[]= $p;
		}
	}
}
$s= array($ch);	
//var_dump($s);	
					if(!$s[0][1] && !$s[0][1] && !$s[0][2]){}else{
					 foreach ($s as $datarow2) {
					 $xmlrow = $xmltable->appendChild(new DOMElement('Row'));
					 foreach ($datarow2 as $datacell) {
						 $xmlcell = $xmlrow->appendChild(new DOMElement('Cell'));
						 $xmldata = $xmlcell->appendChild(new DOMElement('Data', $datacell));
						 $xmldata->setAttribute('ss:Type', is_numeric($datacell) ? 'Number' : 'String');
					 }}
					}
					//end if	 
				// display and quit
				echo $dom->saveXML();
		}
	}
