<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class forms_model extends CI_Model{

		function __construct()
		{
			parent::__construct();
			//$this->load->database();
			$this->load->library("cimongo/Cimongo");
		}

		function insert_form($forms_data)
		{
        	$this->cimongo->insert('forms', $forms_data);
        	return TRUE;
		}

		function submit_data($items)
		{
        	$this->cimongo->insert('items', $items);
        	// It will be generate an ObjectId
        	return TRUE;
		}

		function update_form($form_id, $update_code)
		{
			$wheres = array("_id"=>new MongoId($form_id));
			$updata = array('form_code'=>$update_code);

			if ($this->cimongo->where($wheres)->update('forms', $updata ))
        	//if ($this->cimongo->where($wheres)->set($updata)->update('forms'))
        	{return TRUE; } else {return FALSE; }
		}

		function forms_list()
		{
			$data = $this->cimongo->order_by(array('create_time'=>'DESC'))->limit(10)->get("forms")->result_array();
			return  $data;
		}

		function items_list()
		{
			$data = $this->cimongo->order_by(array('_id'=>'DESC'))->limit(10)->get("items")->result_array();
			return  $data;
		}

		function form_id($item_id)
		{
			$wheres = array("_id"=>new MongoId("$item_id"));
			$data = $this->cimongo->where($wheres)->get("items")->result_array();
			return  $data;
		}

		function my_form($form_id)
		{
			$wheres = array("_id"=>new MongoId("$form_id"));
			$query = $this->cimongo->where($wheres)->get('forms');
			$data = $query->result_array();
			return  $data;
		}

		function form_items($form_id) {
			$query=$this->cimongo->where(array(0=>$form_id))->get("items");
			$data = $query->result_array();
			return  $data;
		}

		function my_item($item_id)
		{
			$wheres = array("_id"=>new MongoId("$item_id"));
			$query = $this->cimongo->where($wheres)->get('items');
			$data = $query->result_array();
			return  $data;
		}
	}