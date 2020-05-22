<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
		//$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    }
}

class MY_Controller_auth extends MY_Controller
{
	function __construct()
    {
        parent::__construct();
		if(!$this->session->userdata('username'))
		{
			redirect('login', 'location');
		}
		else
		{
			
		}
		
		$this->module_name="";
		$this->module_code="";
		
		$this->path=get_class ($this);
    }
	
	function check_permission($modulecode)
	{
		$module=$this->db->get_where("v_privilege",array("code"=>$modulecode,"user_id"=>$this->session->userdata('id'),"status_active"=>"active"));
		if($module->num_rows()>0)
		{
			$this->module_name=$module->row()->name;
			$this->module_code=$modulecode;
		}
		else
		{
			redirect('home', 'location');
		}
	}
}