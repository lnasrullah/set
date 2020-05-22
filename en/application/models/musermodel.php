<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Musermodel extends MY_Model {
	
	function __construct() {
        parent::__construct();
    }

	public function tableName()
	{
		return 'm_user';
	}
	
	public function rules()
	{
		return array(
			"username"=>"trim|required",
			"password"=>"trim|md5",
			"name"=>"trim|required",
			"status_active"=>"trim",
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
			"username"=>"Username",
			"password"=>"Password",
			"name"=>"Name",
			"status_active"=>"Status Active",
			"created_by"=>"Created By",
			"created_date"=>"Created Date",
			"modified_by"=>"Modified By",
			"modified_date"=>"Modified Date",
		);
	}
}