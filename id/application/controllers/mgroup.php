<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mgroup extends MY_Controller_auth {


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
		$this->check_permission("mgroup.read");
		
		$this->load->model("Mgroupmodel");
		
		
		$this->Mgroupmodel->getAll();
		
		//$this->Musermodel->findByPK(array("id"=>1));
		//print_r($this->Musermodel);
		
		
		$data["page"]="read";
		$this->load->view("view_template",$data);
	}
	
	public function update($id)
	{
		$this->check_permission("mgroup.update");
		
		$this->load->model("Mgroupmodel");
		$this->load->model("Mmodulemodel");
		$this->load->model("Mgroupmodulemodel");
		
		$this->Mmodulemodel->getWhere(array("status_active"=>"active"),array("code","asc"));
		
		$this->Mgroupmodulemodel->getWhere(array("group_id"=>$id, "status_active"=>"active"));
		
		$data["privilege"]=array();
		
		if($this->Mgroupmodulemodel->data)
		{
		
			foreach($this->Mgroupmodulemodel->data as $groupmodule)
			{
				$data["privilege"][]=$groupmodule->module_id;
			}
		}
		
		
		$data["content"]=$this->Mgroupmodel->findByPK($id);
		
		if($this->input->post("submit"))
		{
			if($this->Mgroupmodel->save($id))
			{
				if($this->input->post("privilege"))
				{
					$privilege=$this->input->post("privilege");
					
					$this->db->update("m_group_module",array("status_active"=>"inactive"),array("group_id"=>$id));
					
					foreach($privilege as $privilege1)
					{
						$groupmodule=$this->db->get_where("m_group_module",array("group_id"=>$id,"module_id"=>$privilege1));
						if($groupmodule->num_rows)
						{
							$this->db->update("m_group_module",array("status_active"=>"active"),array("group_id"=>$id,"module_id"=>$privilege1));
						}
						else
						{
							$this->db->insert("m_group_module",array("status_active"=>"active","group_id"=>$id,"module_id"=>$privilege1));
						}
					}
				}
				
				$this->session->set_flashdata('success', 'Record updated.');
				redirect (current_url(),"location");
			}
		}
		
		$this->load->model("Mlovmodel","Statusactivemodel");
		$data["status_active"]=$this->Statusactivemodel->getWhere(array("group"=>"status_active", "status_active"=>"active"));
		
		
		$data["page"]="form";
		$this->load->view("view_template",$data);
	}
	
	public function create()
	{
		$this->check_permission("mgroup.create");
		
		$this->load->model("Mgroupmodel");
		$this->load->model("Mmodulemodel");
		
		$this->Mmodulemodel->getWhere(array("status_active"=>"active"),array("code","asc"));

		$data["privilege"]=array();
		
		$data["content"]=$this->Mgroupmodel->init();
		
		if($this->input->post("submit"))
		{
			if($id=$this->Mgroupmodel->save())
			{
				if($this->input->post("privilege"))
				{
					$privilege=$this->input->post("privilege");
					
					$this->db->update("m_group_module",array("status_active"=>"inactive"),array("group_id"=>$id));
					
					foreach($privilege as $privilege1)
					{
						$groupmodule=$this->db->get_where("m_group_module",array("group_id"=>$id,"module_id"=>$privilege1));
						if($groupmodule->num_rows)
						{
							$this->db->update("m_group_module",array("status_active"=>"active"),array("group_id"=>$id,"module_id"=>$privilege1));
						}
						else
						{
							$this->db->insert("m_group_module",array("status_active"=>"active","group_id"=>$id,"module_id"=>$privilege1));
						}
					}
				}
				
				$this->session->set_flashdata('success', 'Record updated.');
				redirect ("mgroup","location");
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