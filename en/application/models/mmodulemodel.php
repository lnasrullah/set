<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mmodulemodel extends MY_Model {
	
	function __construct() {
        parent::__construct();
    }

	public function tableName()
	{
		return 'm_module';
	}
	
	public function rules()
	{
		return array(
			"name"=>"trim|required",
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
			"code"=>"Code",
			"path"=>"Path",
			"name"=>"Name",
			"status_active"=>"Status Active",
			"created_by"=>"Created By",
			"created_date"=>"Created Date",
			"modified_by"=>"Modified By",
			"modified_date"=>"Modified Date",
		);
	}
	
}