<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->input->post('username') && $this->input->post('password'))
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'required|md5|callback_user_auth['.$this->input->post('username').']');
			if ($this->form_validation->run())
			{
				redirect('home/', 'location');
			}
		}
		
		else if($this->input->post('resetpwd'))
		{
			
			//redirect
			redirect('login', 'location');
			
		}
		$this->load->view("view_login");
	}
	
	public function user_auth($pwd,$id)
	{
		$user=$this->db->get_where("m_user",array("username"=>$id,"password"=>$pwd,"status_active"=>"active"));
		
		if ($user->num_rows()==1)
		{
			$this->session->set_userdata('username', $user->row()->username);
			$this->session->set_userdata('id', $user->row()->id);
			$this->session->set_userdata('name', $user->row()->name);
			
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('user_auth', 'The ID or password you entered is incorrect. ');
			return FALSE;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */