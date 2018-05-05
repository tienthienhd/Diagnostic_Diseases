<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class authentication_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getAllData(){
		$this->db->select('*');
		$dulieu = $this->db->get('information');
		$ketqua = $dulieu->result_array();
		
		return $ketqua;
	}

}

/* End of file authentication_model.php */
/* Location: ./application/models/authentication_model.php */