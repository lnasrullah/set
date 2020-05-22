<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mlovmodel extends MY_Model {
	
	function __construct() {
        parent::__construct();
    }

	public function tableName()
	{
		return 'm_lov';
	}
	
	public function rules()
	{
		return array(
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
			"status_active"=>"Status Active",
			"created_by"=>"Created By",
			"created_date"=>"Created Date",
			"modified_by"=>"Modified By",
			"modified_date"=>"Modified Date",
		);
	}
	
}