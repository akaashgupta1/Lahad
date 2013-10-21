<?php
class view extends CI_Controller{
	public function __construct(){
		parent::__construct();
		
				
	}
	
	public function display($page = 'welcome_message'){
		
		if ( ! file_exists('application/views/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			//show_404();
		}
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		
		$this->load->view('templates/header', $data);
		$this->load->view($page, $data);
		$this->load->view('templates/footer', $data);
		
		
	}
	
	public function test($message = "Hello World"){
		echo $message;
	
	}
		
}
?>