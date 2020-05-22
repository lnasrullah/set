<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mmodule extends MY_Controller_auth {


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
	 
	function __construct()
    {
        parent::__construct();
    }
	
	public function index()
	{
		$this->check_permission("mmodule.read");
		
		$this->load->model("Mmodulemodel");
		
		
		$this->Mmodulemodel->getAll();
		
		//$this->Musermodel->findByPK(array("id"=>1));
		//print_r($this->Musermodel);
		
		
		$data["page"]="read";
		$this->load->view("view_template",$data);
	}
	
	public function update($id)
	{
		$this->check_permission("mmodule.update");
		
		$this->load->model("Mmodulemodel");
		
		
		$data["content"]=$this->Mmodulemodel->findByPK($id);
		
		if($this->input->post("submit"))
		{
			if($this->Mmodulemodel->save($id))
			{
				$this->session->set_flashdata('success', 'Record updated.');
				redirect (current_url(),"location");
			}
		}
		
		$this->load->model("Mlovmodel","Statusactivemodel");
		$data["status_active"]=$this->Statusactivemodel->getWhere(array("group"=>"status_active", "status_active"=>"active"));
		
		
		$data["page"]="form";
		$this->load->view("view_template",$data);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */