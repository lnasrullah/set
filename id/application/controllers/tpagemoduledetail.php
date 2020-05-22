<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpagemoduledetail extends MY_Controller_auth {


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
		$this->check_permission("tpagemoduledetail.create");
		$this->load->model("Tpagemoduledetailmodel");
		$data["content"]=$this->Tpagemoduledetailmodel->init();
		$data["content"]->data->page_module_id=$id;
		
		
		$this->load->model("Tpagemodulemodel");
		$data["Tpagemodule"]=$this->Tpagemodulemodel->findByPK($id);
		
		
		if($this->input->post("submit"))
		{
			$this->load->model("Tpagemoduledetailmodel","Siblingsmodel");
			$siblings=$this->Siblingsmodel->getWhere(array("page_module_id"=>$id));
			$this->Tpagemoduledetailmodel->data->order=count($siblings->data)+1;
			
			if($insertid=$this->Tpagemoduledetailmodel->save())
			{	
				$this->Tpagemoduledetailmodel->findByPK($insertid);
				if(!file_exists ( APPPATH.'../uploads/modules/'.$id ))
				{
					mkdir(APPPATH.'../uploads/modules/'.$id);
				}
				
				$config['upload_path'] = APPPATH.'/../uploads/modules/'.$id.'/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['overwrite'] = TRUE;
				$config['file_name'] = $insertid;
				
				//$config['max_size']	= '100';
				//$config['max_width']  = '1024';
				//$config['max_height']  = '768';
				
				$this->upload->initialize($config);
				
				if($this->upload->do_upload("file"))
				{
					$uploaddata=$this->upload->data();
					
					unset($_POST);
					
					$this->Tpagemoduledetailmodel->data->value2='uploads/modules/'.$id.'/'.$uploaddata["file_name"];
					$this->Tpagemoduledetailmodel->save($insertid);
				}
				
				$this->session->set_flashdata('success', 'Page module detail added.');
				redirect("tpagemodule/update/".$id,"location");
			}
		}
		
		$this->load->model("Mlovmodel","Statusactivemodel");
		$data["status_active"]=$this->Statusactivemodel->getWhere(array("group"=>"status_active", "status_active"=>"active"));
		
		$data["page"]="form";
		$this->load->view("view_template",$data);
	}
	
	public function update($id)
	{
		$this->check_permission("tpagemoduledetail.update");
		$this->load->model("Tpagemoduledetailmodel");
		$this->Tpagemoduledetailmodel->findByPK($id);
		
		$this->load->model("Tpagemodulemodel");
		$data["Tpagemodule"]=$this->Tpagemodulemodel->findByPK($this->Tpagemoduledetailmodel->data->page_module_id);
		
		if($this->input->post("submit"))
		{
			
			if($this->input->post("Tpagemoduledetailmodel[value2]")==="")
			{
				//echo APPPATH."../".$this->Tpagemoduledetailmodel->data->value2;
				unlink(APPPATH."../".$this->Tpagemoduledetailmodel->data->value2);
			}
			
			if($this->Tpagemoduledetailmodel->save($id))
			{
				$config['upload_path'] = APPPATH.'../uploads/modules/'.$this->Tpagemoduledetailmodel->data->page_module_id.'/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['overwrite'] = TRUE;
				$config['file_name'] = $id;
				
				//$config['max_size']	= '100';
				//$config['max_width']  = '1024';
				//$config['max_height']  = '768';
				
				$this->upload->initialize($config);
				
				if($this->upload->do_upload("file"))
				{
					$uploaddata=$this->upload->data();
					
					unset($_POST);
					
					$this->Tpagemoduledetailmodel->data->value2='uploads/modules/'.$this->Tpagemoduledetailmodel->data->page_module_id.'/'.$uploaddata["file_name"];
					$this->Tpagemoduledetailmodel->save($id);
				}
				else
				{
					echo  $this->upload->display_errors();
				}
				
				
				//$this->session->set_flashdata('success', 'Record updated.');
				//redirect(current_url(),"location");
			}
		}
		
		
		$data["content"]=$this->Tpagemoduledetailmodel;
		
		$this->load->model("Mlovmodel","Statusactivemodel");
		
		$data["status_active"]=$this->Statusactivemodel->getWhere(array("group"=>"status_active", "status_active"=>"active"));
		
		$data["page"]="form";
		$this->load->view("view_template",$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */