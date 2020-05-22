<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mconfigmodel extends MY_Model {
	
	function __construct() {
        parent::__construct();
    }

	public function tableName()
	{
		return 'm_config';
	}
	
	public function rules()
	{
		return array(
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
			"name"=>"Name",
			"value"=>"Value",
			"status_active"=>"Status Active",
			"created_by"=>"Created By",
			"created_date"=>"Created Date",
			"modified_by"=>"Modified By",
			"modified_date"=>"Modified Date",
		);
	}
}