<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tfront extends MY_Controller {


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
		$this->content(urlencode(urlencode(base64_encode("1"))));
		//$this->content(1);
	}
	
	public function content($id, $string=NULL, $highlight=0)
	{
		$this->load->model("Mconfigmodel");
		
		$this->Mconfigmodel->getWhere(array("group"=>"front"));
		
		$data["config"]=array();
		
		foreach($this->Mconfigmodel->data as $data1)
		{
			$data["config"][$data1->code]=$data1->value;
		}
		
		if(trim($this->input->post("search")))
		{
			$this->db->like('title', strtolower(trim($this->input->post("search"))));
			$this->db->or_like('article', strtolower(trim($this->input->post("search")))); 
			$data["result"]=$this->db->get_where("t_page","status_active !='archieved'");
			
			$data["page"]="Tfront/search";
		}
		
		if($this->input->post("subscribe")||$this->input->post("subscribeemail"))
		{
			$this->email->from($this->input->post("subscribeemail"), $this->input->post("subscribeemail"));
			$this->email->to($data["config"]["contactmail"]);
			
			$this->email->subject('New Subscribe');
			$this->email->message('New Subscriber');
			
			$this->email->send();
			
			//echo $this->email->print_debugger();

			redirect(current_url(),"location");
		}
		
		if($this->input->post("contact"))
		{
			/*$this->email->from($this->input->post("email"), $this->input->post("name"));
			$this->email->to($data["config"]["contactmail"].($this->input->post("copy")?$this->input->post("email"):""));
			
			$this->email->subject($this->input->post("subject"));
			$this->email->message($this->input->post("message"));
			
			$this->email->send();*/
			
			$headers = "From: ".$this->input->post("name")."<".$this->input->post("email").">". "\r\n";
			
			mail($data["config"]["contactmail"].($this->input->post("copy")?", ".$this->input->post("email"):""),$this->input->post("subject"),$this->input->post("message"),$headers);

			redirect(current_url(),"location");
		}
		
		$id=base64_decode(urldecode(urldecode($id)));
		
		$data["highlight"]=$highlight;
		
		$data["navigation"]=$this->printnavigation(0,"navigation");
		
		$this->load->model("Tpagemodel");
		
		$this->Tpagemodel->findByPK($id);
		
		$parent=$this->findRootId($id);
		
		$data["submenu"]=$this->printnavigation($parent,"navigation");
		
		$data["footernavigation"]=$this->printnavigation(0,"footer");
		
		$this->load->model("Tpagemodulemodel");
		$this->Tpagemodulemodel->getWhere(array("page_id"=>$id,"status_active"=>"active"));
		
		$this->load->model("Tpagemoduledetailmodel");
		
		$this->load->view("Tfront/template",$data);
	}
	
	public function contact_us()
	{
		//$this->content(urlencode(base64_encode("1")));
	}
	
	private function printnavigation($parent=0,$position)
	{
		/*$modelname="Tpagemodel".$parent;
		if(!$this->$modelname)
		{
			$this->load->model("Tpagemodel",$modelname);
		}
		
		$pages=$this->$modelname->getWhere(array("parent"=>$parent,"link_location"=>$position));*/
		
		$pages=$this->db->order_by("order","asc")->get_where("t_page",array("parent"=>$parent,"link_location"=>$position,"status_active"=>"active"));
		
		$navigation="";
		
		if($pages->num_rows>0)
		{
			$navigation="<ul>";
			foreach($pages->result() as $page)
			{
				$navigation.="<li><a href=\"".($page->status_link=="active"?site_url("content/".urlencode(urlencode(base64_encode($page->id)))."/".urlencode(str_replace(" ","_",strtolower($page->title)))):"javascript:;")."\">".strtoupper($page->title)."</a>";
				$navigation.=$this->printnavigation($page->id,"navigation");
				$navigation.="</li>";
			}
			$navigation.="</ul>";
		}
		
		return $navigation;
	}
	
	private function createnavigation($parent=0,$position)
	{
		/*$modelname="Tpagemodel".$parent;
		
		if(!$this->$modelname)
		{
			$this->load->model("Tpagemodel",$modelname);
		}
		$pages=$this->$modelname->getWhere(array("parent"=>$parent,"link_location"=>$position));*/
		
		
		$pages=$this->db->get_where("t_page",array("parent"=>$parent,"link_location"=>$position));
		
		$navigation=array();
		
		if($pages->num_rows>0)
		{
			foreach($pages->result() as $page)
			{
				$navigation[]=array(
					"id"=>$page->id,
					"title"=>$page->title,
					"children"=>$this->createnavigation($page->id,"navigation")
				);
			}
		}
		
		return $navigation;
	}
	
	private function findRootId($id)
	{
		$page=$this->db->get_where("t_page",array("id"=>$id));
		if($page->row()->parent==0)
		{
			return $page->row()->id;
		}
		else
		{
			return $this->findRootId($page->row()->parent);
		}
	}
	
	public function module_open($id)
	{
		$detail=$this->db->get_where("t_page_module_detail",array("id"=>$id));
		
		$pagemodule=$this->db->get_where("t_page_module",array("id"=>$detail->row()->page_module_id));
		
		$page=$this->db->get_where("t_page",array("id"=>$pagemodule->row()->page_id));
		
		redirect("tfront/content/".urlencode(urlencode(base64_encode($pagemodule->row()->page_id)))."/".urlencode(str_replace(" ","_",strtolower($page->row()->title)))."/".$id,"location");
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */