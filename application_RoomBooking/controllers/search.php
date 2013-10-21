<?php
class search extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('hotelSearch');
		$this->load->library('session');
	}

	public function index(){
		$this->load->view('search_view');
	}

	public function searchHotel(){
		$searchdata = $this->input->post('search');
		$result = $this->hotelSearch->searchHotel($searchdata);
		$data['searchdata'] = $searchdata;
		$data['error'] = 'False';
		if ($result != False){
			$data['queryResult'] = $result->result_array();
			$this->load->view('search_results', $data);
		}
		else {
			$data['error'] = 'True';
			$this->load->view('search_results', $data);
		}
	}
	

}

?>