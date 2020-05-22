<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpagemoduledetailmodel extends MY_Model {
	
	function __construct() {
        parent::__construct();
    }

	public function tableName()
	{
		return 't_page_module_detail';
	}
	
	public function rules()
	{
		return array(
			"title"=>"trim|required",
			"page_module_id"=>"trim|numeric|required",
			"value1"=>"trim",
			"value2"=>"trim",
			"value3"=>"trim",
			"status_active"=>"trim|required",
		);
	}
	
	public function relations()
	{
		return array(
			//'page' => array("BELONGS_TO", 'TPage', 'page_id'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			"title"=>"Title",
			"page_module_id"=>"Page Module ID",
			"order"=>"Order",
			"value1"=>"Description",
			"value2"=>"Image",
			"value3"=>"Link",
			"status_active"=>"Status Active",
			"created_by"=>"Created By",
			"created_date"=>"Created Date",
			"modified_by"=>"Modified By",
			"modified_date"=>"Modified Date",
		);
	}
	
	public function getAll($order=NULL)
	{
		parent::getAll(array("order","asc"));
		
		return $this;
	}
	
	public function getWhere($where,$order=NULL)
	{
		parent::getWhere($where,array("order","asc"));
		
		return $this;
	}
}