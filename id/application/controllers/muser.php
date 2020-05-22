<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Muser extends MY_Controller_auth {


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
		$this->check_permission("muser.read");
		
		$this->load->model("Musermodel");
		
		
		$this->Musermodel->getAll();
		
		//$this->Musermodel->findByPK(array("id"=>1));
		//print_r($this->Musermodel);
		
		
		$data["page"]="read";
		$this->load->view("view_template",$data);
	}
	
	public function update($id)
	{
		$this->check_permission("muser.update");
		
		$this->load->model("Musermodel");
		$this->load->model("Mgroupmodel");
		
		$this->Mgroupmodel->getWhere(array("status_active"=>"active"));
		
		$data["usergroup"]=$this->db->get_where("m_user_group",array("user_id"=>$id))->row();
		
		$data["content"]=$this->Musermodel->findByPK($id);
		
		if($this->input->post("submit"))
		{
			if($this->Musermodel->save($id))
			{
				$this->db->update("m_user_group",array("group_id"=>$this->input->post("group")),array("user_id"=>$id));
				
				$this->session->set_flashdata('success', 'Record updated.');
				redirect ("muser","location");
			}
		}
		
		$this->load->model("Mlovmodel","Statusactivemodel");
		$data["status_active"]=$this->Statusactivemodel->getWhere(array("group"=>"status_active", "status_active"=>"active"));
		
		
		$data["page"]="form";
		$this->load->view("view_template",$data);
	}
	
	public function changepwd($id)
	{
		$this->check_permission("muser.changepwd");
		
		$this->load->model("Musermodel");
		
		
		$data["content"]=$this->Musermodel->findByPK($id);
		
		if($this->input->post("submit"))
		{
			if($this->input->post("Muser[password]") == $this->input->post("c_password"))
			{
				$this->Musermodel->save($id);
				$this->session->set_flashdata('success', 'Record updated.');
				redirect (current_url(),"location");
			}
			else
			{
				$this->session->set_flashdata('error', 'Password doesn\'t match.');
			}
		}
		
		$data["page"]="form_pwd";
		$this->load->view("view_template",$data);
	}
	
	public function create()
	{
		$this->check_permission("muser.create");
		
		$this->load->model("Musermodel");
		$this->load->model("Mgroupmodel");
		
		$this->Mgroupmodel->getWhere(array("status_active"=>"active"));
		
		$data["usergroup"]=NULL;
		
		$data["content"]=$this->Musermodel->init();
		
		if($this->input->post("submit"))
		{
			if($id=$this->Musermodel->save())
			{
				$this->db->insert("m_user_group",array("group_id"=>$this->input->post("group"),"user_id"=>$id));
				
				$this->session->set_flashdata('success', 'Record updated.');
				redirect ("muser","location");
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