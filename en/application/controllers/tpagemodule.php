<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpagemodule extends MY_Controller_auth {


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
	
	public function create($id)
	{
		$this->check_permission("tpagemodule.create");
		$this->load->model("Tpagemodulemodel");
		$data["content"]=$this->Tpagemodulemodel->init();
		$data["content"]->data->page_id=$id;
		
		if($this->input->post("submit"))
		{
			$this->load->model("Tpagemodulemodel","Siblingsmodel");
			$siblings=$this->Siblingsmodel->getWhere(array("page_id"=>$id));
			$this->Tpagemodulemodel->data->order=count($siblings->data)+1;
			
			if($insertid=$this->Tpagemodulemodel->save())
			{	
				$this->session->set_flashdata('success', 'Page module added.');
				redirect("tpage/update/".$this->Tpagemodulemodel->data->page_id,"location");
			}
		}
		
		$this->load->model("Mlovmodel","Statusactivemodel");
		$this->load->model("Mlovmodel","Moduletypemodel");
		
		$data["status_active"]=$this->Statusactivemodel->getWhere(array("group"=>"status_active", "status_active"=>"active"));
		$data["module_type"]=$this->Moduletypemodel->getWhere(array("group"=>"module_type", "status_active"=>"active"));
		
		
		$data["page"]="form";
		$this->load->view("view_template",$data);
	}
	
	public function update($id)
	{
		$this->check_permission("tpagemodule.update");
		$this->load->model("Tpagemodulemodel");
		$this->Tpagemodulemodel->findByPK($id);
		
		if($this->input->post("submit"))
		{
			if($this->Tpagemodulemodel->save($id))
			{
				$this->session->set_flashdata('success', 'Record updated.');
				redirect(current_url(),"location");
			}
		}
		else if($this->input->post("saveorder")||$this->input->post("savemoduleorder"))
		{
			$nodes=$this->load->model("Tpagemoduledetailmodel","Node");
			
			$indexes=$this->input->post("indexes");
			foreach($indexes as $key=>$index)
			{
				$this->Node->findByPK($key);
				$this->Node->data->order=$index;
				$this->Node->save($key);
			}
			
			$this->session->set_flashdata('success', 'Order updated.');
			redirect(current_url(),"location");
		}
		
		
		$data["content"]=$this->Tpagemodulemodel;
		
		
		$this->load->model("Tpagemoduledetailmodel");
		$this->Tpagemoduledetailmodel->getWhere(array("page_module_id"=>$id));
		
		$this->load->model("Mlovmodel","Statusactivemodel");
		$this->load->model("Mlovmodel","Moduletypemodel");
		
		$data["status_active"]=$this->Statusactivemodel->getWhere(array("group"=>"status_active", "status_active"=>"active"));
		$data["module_type"]=$this->Moduletypemodel->getWhere(array("group"=>"module_type", "status_active"=>"active"));
		
		$data["page"]="form";
		$this->load->view("view_template",$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */