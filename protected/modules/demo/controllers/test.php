<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Test extends T_Controller{
/*    
    function __construct() {
		parent::__construct();
		$this->load->database();
        $this->load->model('demo_model');
	}

    function index(){
        $data = array();
        $data['forms_list'] = $this->demo_model->forms_list();
        $this->load->view('demo', $data);
    }
*/
    function __construct() {
		parent::__construct();
		$this->load->model('demo_model');
	}

	public function index()
	{
	    $data = array();
        $data['forms_list'] = $this->demo_model->forms_list();
		$this->load->view('demo', $data);	
	}        
}