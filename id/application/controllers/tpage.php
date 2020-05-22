<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpage extends MY_Controller_auth {


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
		$this->check_permission("tpage.read");
		
		$this->load->model("Tpagemodel");
		
		
		if($this->input->post("saveorder"))
		{
			$indexes=$this->input->post("indexes");
			foreach($indexes as $id=>$index)
			{
				$this->Tpagemodel->findByPK($id);
				$this->Tpagemodel->data->order=$index;
				$this->Tpagemodel->save($id);
			}
			
			$this->session->set_flashdata('success', 'Order updated.');
			redirect(current_url(),"location");
		}
		
		$this->Tpagemodel->getWhere(array("parent"=>"0"));
		
		$data["content"]=$this->Tpagemodel;
		
		$data["page"]="read";
		$this->load->view("view_template",$data);
	}
	
	public function create($id)
	{
		$this->check_permission("tpage.create");
		$this->load->model("Tpagemodel");
		$data["content"]=$this->Tpagemodel->init();
		
		if($this->input->post("submit"))
		{
			$this->load->model("Tpagemodel","Siblingsmodel");
			$siblings=$this->Siblingsmodel->getWhere(array("parent"=>$id));
			$this->Tpagemodel->data->order=count($siblings->data)+1;
			
			if($insertid=$this->Tpagemodel->save())
			{
				
				$this->Tpagemodel->findByPK($insertid);
				if(!file_exists ( APPPATH.'../uploads/pages/'.$insertid ))
				{
					mkdir(APPPATH.'../uploads/pages/'.$insertid);
				}
				
				$config['upload_path'] = APPPATH.'../uploads/pages/'.$insertid.'/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['overwrite'] = TRUE;
				$config['file_name'] = "header";
				
				//$config['max_size']	= '100';
				//$config['max_width']  = '1024';
				//$config['max_height']  = '768';
				
				$this->upload->initialize($config);
				
				if($this->upload->do_upload("file"))
				{
					$uploaddata=$this->upload->data();
					
					unset($_POST);
					
					$this->Tpagemodel->data->header_image='uploads/pages/'.$insertid.'/'.$uploaddata["file_name"];
					$this->Tpagemodel->save($insertid);
				}
				
				$this->session->set_flashdata('success', 'Record added.');
				redirect("tpage/update/".$this->Tpagemodel->data->parent,"location");
			}
		}
		
		$data["content"]->data->parent=$id;
		
		$this->load->model("Mlovmodel","Linklocationmodel");
		$this->load->model("Mlovmodel","Statusactivemodel");
		$this->load->model("Mlovmodel","Statuslinkmodel");
		$this->load->model("Tpagemodel","Parentmodel");
		
		$data["parent"]=$this->Parentmodel->getWhere(array("parent IS NOT NULL"=>NULL, "status_active"=>"active"));
		
		$data["link_location"]=$this->Linklocationmodel->getWhere(array("group"=>"link_location", "status_active"=>"active"));
		
		$data["status_active"]=$this->Statusactivemodel->getWhere(array("group"=>"status_active", "status_active"=>"active"));
		
		$data["status_link"]=$this->Statusactivemodel->getWhere(array("group"=>"status_active", "status_active"=>"active"));
		
		$data["page"]="form";
		$this->load->view("view_template",$data);
	}
	
	public function update($id)
	{
		$this->check_permission("tpage.update");
		$this->load->model("Tpagemodel","Submenu");
		$this->load->model("Tpagemodel");
		$this->Tpagemodel->findByPK($id);
		
		if($this->input->post("submit"))
		{
			if($this->input->post("Tpagemodel[header_image]")==="")
			{
				unlink(APPPATH."../".$this->Tpagemodel->data->header_image);
			}
			
			if($this->Tpagemodel->save($id))
			{
				
				if(!file_exists ( APPPATH.'../uploads/pages/'.$id ))
				{
					mkdir(APPPATH.'../uploads/pages/'.$id);
				}
				
				$config['upload_path'] = APPPATH.'../uploads/pages/'.$id.'/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['overwrite'] = TRUE;
				$config['file_name'] = "header";
				
				//$config['max_size']	= '100';
				//$config['max_width']  = '1024';
				//$config['max_height']  = '768';
				
				$this->upload->initialize($config);
				
				if($this->upload->do_upload("file"))
				{
					$uploaddata=$this->upload->data();
					
					unset($_POST);
					
					$this->Tpagemodel->data->header_image='uploads/pages/'.$id.'/'.$uploaddata["file_name"];
					$this->Tpagemodel->save($id);
				}
				
				$this->session->set_flashdata('success', 'Record updated.');
				redirect(current_url(),"location");
			}
		}
		else if($this->input->post("saveorder")||$this->input->post("savemoduleorder"))
		{
			$node;
			if($this->input->post("saveorder"))
			{
				$nodes=$this->load->model("Tpagemodel","Node");
			}
			else if($this->input->post("savemoduleorder"))
			{
				$nodes=$this->load->model("Tpagemodulemodel","Node");
			}
			
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
		
		
		$data["content"]=$this->Tpagemodel;
		
		$this->load->model("Mlovmodel","Linklocationmodel");
		$this->load->model("Mlovmodel","Statusactivemodel");
		$this->load->model("Mlovmodel","Statuslinkmodel");
		
		$this->load->model("Tpagemodel","Parentmodel");
		
		$data["parent"]=$this->Parentmodel->getWhere(array("parent IS NOT NULL"=>NULL, "id !="=>$id, "status_active"=>"active"));
		
		$data["link_location"]=$this->Linklocationmodel->getWhere(array("group"=>"link_location", "status_active"=>"active"));
		
		$data["status_active"]=$this->Statusactivemodel->getWhere(array("group"=>"status_active", "status_active"=>"active"));
		
		$data["status_link"]=$this->Statusactivemodel->getWhere(array("group"=>"status_active", "status_active"=>"active"));
		
		
		$this->Submenu->getWhere(array("parent"=>$id));
		$data["submenu"]=$this->Submenu;
		
		
		$this->load->model("Tpagemodulemodel");
		$this->Tpagemodulemodel->getWhere(array("page_id"=>$id));
		$data["pagemodule"]=$this->Tpagemodulemodel;
		
		$data["page"]="form";
		$this->load->view("view_template",$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */