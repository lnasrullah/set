<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mconfig extends MY_Controller_auth {


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
		$this->check_permission("mconfig.read");
		
		$this->load->model("Mconfigmodel");
		
		
		$this->Mconfigmodel->getAll();
		
		//$this->Musermodel->findByPK(array("id"=>1));
		//print_r($this->Musermodel);
		
		
		$data["page"]="read";
		$this->load->view("view_template",$data);
	}
	
	public function update($id)
	{
		$this->check_permission("mconfig.update");
		
		$this->load->model("Mconfigmodel");
		
		
		$data["content"]=$this->Mconfigmodel->findByPK($id);
		
		if($this->input->post("submit"))
		{
			if($this->Mconfigmodel->data->type=="file")
			{
				$config['upload_path'] = APPPATH.'../uploads/config/';
				$config['overwrite'] = TRUE;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] = $this->Mconfigmodel->data->code;
				
				//$config['max_size']	= '100';
				//$config['max_width']  = '1024';
				//$config['max_height']  = '768';
				
				$this->upload->initialize($config);
				
				if($this->upload->do_upload("file"))
				{
					$uploaddata=$this->upload->data();
					
					$this->Mconfigmodel->data->value='uploads/config/'.$uploaddata["file_name"];
				}
				else
				{
					echo  $this->upload->display_errors();
				}
			}
			if($this->Mconfigmodel->save($id))
			{
				$this->session->set_flashdata('success', 'Record updated.');
				//redirect (current_url(),"location");
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