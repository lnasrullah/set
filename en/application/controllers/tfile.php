<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tfile extends MY_Controller_auth {


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
		$this->showdir(urlencode(urlencode('uploads/files/')));
	}
	
	public function showdir($base)
	{
		$this->check_permission("tfile.read");
		
		/*$this->load->model("Tfilemodel");
		
		$data["content"]=$this->Tfilemodel->getAll();*/
		
		$data["content"]= directory_map(urldecode(urldecode($base)));
		
		$data["base"]=urldecode(urldecode($base));
		
		$data["page"]="read";
		$this->load->view("view_template",$data);
	}
	
	public function create($dir)
	{
		$this->check_permission("tfile.create");
		$this->load->model("Tfilemodel");
		$data["content"]=$this->Tfilemodel->init();
		
		if($this->input->post("submit"))
		{
			
			$config['upload_path'] = APPPATH.'../'.urldecode(urldecode($dir));
			
			$config['allowed_types'] = true;
				
			$this->upload->initialize($config);
			
			if($this->upload->do_upload("file"))
			{
				
				$this->session->set_flashdata('success', 'Record added.');
				redirect("tfile/showdir/".$dir,"location");
			}
			
		}
		
		$data["page"]="form";
		$this->load->view("view_template",$data);
	}
	
	public function delete($dir,$file)
	{
		$this->check_permission("tfile.delete");
		
		if(unlink(APPPATH."../".urldecode(urldecode($dir)).urldecode(urldecode($file))))
		{
			
			$this->session->set_flashdata('success', 'Record deleted.');
			redirect("tfile/showdir/".$dir,"location");
		}
	}
	
	public function deletedir($dir,$file)
	{
		$this->check_permission("tfile.deletedir");
		
		if(rmdir (APPPATH."../".urldecode(urldecode($dir)).urldecode(urldecode($file))))
		{
			
			$this->session->set_flashdata('success', 'Record deleted.');
			redirect("tfile/showdir/".$dir,"location");
		}
	}
	
	public function createdir($dir)
	{
		$this->check_permission("tfile.createdir");
		
		if($this->input->post("submit"))
		{
			//echo APPPATH."../".urldecode(urldecode($dir)).$this->input->post("name");
			if(mkdir(APPPATH."../".urldecode(urldecode($dir)).$this->input->post("name")))
			{
				
				$this->session->set_flashdata('success', 'Record added.');
				redirect("tfile/showdir/".$dir,"location");
			}
		}
		$data["page"]="formdir";
		$this->load->view("view_template",$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */