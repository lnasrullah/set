<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	function __construct() {
        parent::__construct();
		$this->data=NULL;
    }
	
	public function init()
	{
		$fields=$this->db->list_fields($this->tableName());
		
		foreach ($fields as $field)
		{
			$this->data->$field=NULL;
		} 
		
		return $this;
	}
	
	public function getAll($order=NULL)
	{
		if($order)
		{
			if(is_array($order[0]))
			{
				foreach($order as $order1)
				{
					$this->db->order_by($order1[0],$order1[1]);
				}
			}
			else
			{
				$this->db->order_by($order[0],$order[1]);
			}
		}
		
		$data=$this->db->get($this->tableName());
		if($data->num_rows>0)
		{
			$this->data=$data->result();
			$this->createRelation();
		}
		
		return $this;
	}
	
	public function getWhere($where,$order=NULL)
	{
		if($order)
		{
			if(is_array($order[0]))
			{
				foreach($order as $order1)
				{
					$this->db->order_by($order1[0],$order1[1]);
				}
			}
			else
			{
				$this->db->order_by($order[0],$order[1]);
			}
		}
		$data=$this->db->get_where($this->tableName(),$where);
		if($data->num_rows>0)
		{
			$this->data=$data->result();
			$this->createRelation();
		}
		
		return $this;
	}
	
	private function createRelation()
	{
		$relation=$this->relations();
		
		for($i=0;$i<count($this->data) && $relation;$i++)
		{
			foreach($relation as $key=>$val)
			{
				$this->load->model($val[1]);
				$relationdata=$this->$val[1]->findByPK($this->data[$i]->$val[2]);
				$this->data[$i]->$key=$relationdata;
			}
		}
	}
	
	public function findByPK($array)
	{
		if(is_array($array))
		{
			$this->getWhere($array);
		}
		else
		{
			$this->getWhere(array("id"=>$array));
		}
		
		if($this->data!=NULL)
		{
			$this->data=reset($this->data);
		}
		return $this;
	}
	
	public function getLabel($attribute)
	{
		$labels=$this->attributeLabels();
		$label=$attribute;
		if(array_key_exists($attribute,$labels))
		{
			$label=$labels[$attribute];
		}
		
		return $label;
	}
	
	public function save($where=NULL)
	{
		if($this->input->post("submit"))
		{
			$rules=$this->rules();
			if($rules)
			{
				foreach($rules as $name=>$rule)
				{
					$this->form_validation->set_rules(get_class($this)."[".$name."]", $this->getLabel($name), $rule);
				}
			}
			
			if ($this->form_validation->run() ||!$rules)
			{
				$post=$this->input->post(get_class($this));
				
				if($post)
				{
					foreach($post as $attribute=>$value)
					{
						$this->data->$attribute=$value;
					}
				}
				$this->data->modified_date=date("Y-m-d H:i:s");
				$this->data->modified_by=$this->session->userdata("username");
				
				if($where!=NULL)
				{
					if(is_array($where))
					{
						$this->db->update($this->tableName(),$this->data,$where);
					}
					else
					{
						$this->db->update($this->tableName(),$this->data,array("id"=>$where));
					}
					return $this->db->affected_rows();
				}
				else
				{
					$this->data->created_date=date("Y-m-d H:i:s");
					$this->data->created_by=$this->session->userdata("username");
					$this->db->insert($this->tableName(),$this->data);
					return $this->db->insert_id();
				}
			}
		}
		else
		{
			$this->data->modified_date=date("Y-m-d H:i:s");
			$this->data->modified_by=$this->session->userdata("username");
			
			if($where!=NULL)
			{
				if(is_array($where))
				{
					$this->db->update($this->tableName(),$this->data,$where);
				}
				else
				{
					$this->db->update($this->tableName(),$this->data,array("id"=>$where));
				}
				return $this->db->affected_rows();
			}
			else
			{
				$this->data->created_date=date("Y-m-d H:i:s");
				$this->data->created_by=$this->session->userdata("username");
				$this->db->insert($this->tableName(),$this->data);
				return $this->db->insert_id();
			}
		}
	}
	
}