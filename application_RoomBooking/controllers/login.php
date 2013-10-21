<?php
class login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');	
	}
	
	public function login_user(){
		//echo $message;
	$userarray=$this->session->userdata('logged_in');
	if($userarray['username']==NULL)
	{
	$this->load->view("Login_View\guestLogin");
	}
	else
	{
		$this->load->view("Login_view\guestLogin");
	}
	}
	public function checkLogin()
	{
		
		//This method will have the credentials validation
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_database');

		if($this->form_validation->run() == FALSE)
		{
			//Field validation failed.  User redirected to login page
			$this->load->view("Login_view\guestLoginFailed");
			return ;
		}
		
		$databaseCheckValue = $this->checkDatabase();
		//echo($databaseCheckValue);
		
		if($databaseCheckValue == FALSE)
		{
			
			$this->load->view("Login_view\guestLoginFailed");
		}
		else
		{
			//Go to private area
			$this->load->view("Login_view\guestLogin");
//			echo(this->session->$sess_array['username']);
//			echo"redirect";
			//redirect('home', 'refresh');
		}
	}
	public function checkDatabase()
	{
		//echo "Working";
		$username =$this->input->post('username');
		$password =$this->input->post('password');
		//echo "Adsadasd";
		//echo($username);
		//echo($password);
		$query= $this->db->query("SELECT * FROM Users WHERE email='$username' and password='$password'");
		$count=$query->num_rows();
		
				
		if($count==1){
			$sess_array = array();
			foreach($query->result() as $row)
     {
			$sess_array = array(
            'username' => $row->email,
			'first_name'=> $row->first_name
       );
	   
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
		}
else {
		//$this->form_validation->set_message('check_database', 'Invalid username or password');
		return false;
	}
	}

	public function checkAdmin()
	{
		$userArray = $this->session->userdata('logged_in');
		$customerEmail=$userArray['username'];
		$adminQuery= $this->db->query("SELECT isAdmin FROM Users WHERE email='$customerEmail'");
		return ($adminQuery->row()->isAdmin);

	}
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->login_user();
	}
}
	
?>