<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class demo_model extends CI_Model{

		public function __construct()
		{
			parent::__construct();
			$this->load->library("cimongo/Cimongo");
		}

		public function forms_list()
		{
			$cimongo = new Cimongo();
		   $query = $this->cimongo->order_by(array('create_time'=>'DESC'))->get("forms");
		   $data = $query->result_array();
			return  $data;
		}

		public function my_form($id)
		{
			$data = $this->db->where('id', $id)->get('forms')->result_array();
			return  $data;
		}

	}