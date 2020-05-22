<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mgroupmodel extends MY_Model {
	
	function __construct() {
        parent::__construct();
    }

	public function tableName()
	{
		return 'm_group';
	}
	
	public function rules()
	{
		return array(
			"name"=>"trim|required",
			"notes"=>"trim",
			"status_active"=>"trim|required",
		);
	}
	
	public function relations()
	{
		return array(
			//'customer_detail' => array("BELONGS_TO", 'Mclientmaster', 'Customer'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			"notes"=>"Notes",
			"name"=>"Name",
			"status_active"=>"Status Active",
			"created_by"=>"Created By",
			"created_date"=>"Created Date",
			"modified_by"=>"Modified By",
			"modified_date"=>"Modified Date",
		);
	}
}