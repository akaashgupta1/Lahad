<?php
class registration extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');	
	}
	
	public function register_user(){
		//echo $message;
	$this->load->view("Login_View\guestRegistration");
	}
	
	public function checkRegistration()
	{
		
		//This method will have the credentials validation
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('firstname', 'First name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|callback_check_database');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("Login_View\guestRegistration_unsuccessful");
			return;
		}
			
		$username =$this->input->post('username');
		$custFirstName =$this->input->post('firstname');
		$custLastName =$this->input->post('lastname');
		$password =$this->input->post('password');
		$confpassword = $this->input->post('confirm_password');	
		
		if($password != $confpassword)
		{
			$this->load->view("Login_View\guestRegistration_unsuccessful");
			return;
		}
		$this->load->helper('email');
		
		if (!valid_email($username))
		{
			$this->load->view("Login_View\guestRegistration_unsuccessful");
			return;
		}
		
		$this->registerInDatabase($username,$custFirstName,$custLastName,$password,$confpassword);
		
		
	}
	public function registerInDatabase($username,$custFirstName,$custLastName,$password,$confpassword)
	{	

		$query = $this->db->query("SELECT * FROM Users WHERE email='$username'");
		$count =$query->num_rows();
		if($count!=0)
		{
			$this->load->view("Login_View\guestRegistration_unsuccessful");
		}
		else
		{
			$queryInsert = $this->db->query("INSERT INTO Users VALUES('$custFirstName','$custLastName','$username','$password','0')");
			if($queryInsert)
			{
			$data = array(
				'firstname' => $custFirstName,
				'lastname' => $custLastName,
				'username' => $username
				);
			$this->load->view("Login_View\guestRegistration_successful",$data);
			}
			else 
				$this->load->view("Login_View\guestRegistration_unsuccessful");
		}
	}
	}
?>	