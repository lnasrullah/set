<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpagemodel extends MY_Model {
	
	function __construct() {
        parent::__construct();
    }

	public function tableName()
	{
		return 't_page';
	}
	
	public function rules()
	{
		return array(
			"title"=>"trim|required",
			"article"=>"trim",
			"header_image"=>"trim",
			"status_link"=>"trim|required",
			"link_location"=>"trim|required",
			"status_active"=>"trim|required",
			"parent"=>"trim|numeric|required",
		);
	}
	
	public function relations()
	{
		return array(
		);
	}
	
	public function attributeLabels()
	{
		return array(
			"title"=>"Title",
			"article"=>"Article",
			"header_image"=>"Header Image",
			"parent"=>"Parent",
			"order"=>"Order",
			"status_link"=>"Status Link",
			"link_location"=>"Link Location",
			"status_active"=>"Status Active",
			"created_by"=>"Created By",
			"created_date"=>"Created Date",
			"modified_by"=>"Modified By",
			"modified_date"=>"Modified Date",
		);
	}
	
	public function getAll($order=NULL)
	{
		parent::getAll(array(array("link_location","desc"),array("order","asc")));
		
		return $this;
	}
	
	public function getWhere($where,$order=NULL)
	{
		parent::getWhere($where,array(array("link_location","desc"),array("order","asc")));
		
		return $this;
	}
}