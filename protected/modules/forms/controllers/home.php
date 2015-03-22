<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Home extends T_Controller{

    function __construct() {
		parent::__construct();
        $this->load->model('forms_model');
	}

    public function index(){
        $data = array();
        $data['forms_list'] = $this->forms_model->forms_list();
        $data['items_list'] = $this->forms_model->items_list();
        $this->load->view('home', $data);
    }
    
    public function create_form(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('author', 'Author', 'required');
        if ($this->form_validation->run() == FALSE)
          {
           echo "<script>if(confirm('Please input Author!')==true){location.href='javascript:history.go(-1);'}</script>";
           exit();
          }
    	$data = array();
    	$form_code = $data['form_code'] = $this->input->post('form_code');
    	$create_time = date("Y-m-d H:i:s", time());
        $author = $data['author'] = $this->input->post('author');        
        $forms_data = array(
               'form_code' => $form_code,
               'create_time' => $create_time,
               'author' => $author
            );
              
		if ($this->forms_model->insert_form($forms_data)) {
            $this->load->view('form', $data);
        }else{
            echo "<p><font color=red>Sorry, Execution fails!</font></p>";
        }       
    }

    public function my_form() {       
        $form_id = $this->input->get('form_id');
        //var_dump($form_id);
        if ( strlen($form_id)==24 )
        {
            $data = array();
            $data['my_form'] = $this->forms_model->my_form($form_id);
            $this->load->view('my_form', $data);
        }
        elseif ( $form_id=="" OR strlen($form_id)!=24 ){
            echo "<p><font color=red>Sorry, The form_id does not meet specifications.</font></p>";
        }   
        else
        {
            echo "<p><font color=red>Sorry, There is something wrong...</font></p>";
        } 
    }

    public function edit_form() {
        $form_id = $this->input->get('form_id');
        $data = array();
        $data['my_form'] = $this->forms_model->my_form($form_id);
        $this->load->view('edit_form', $data);
    }

    public function update_form() {
        $prev_url = $_SERVER['HTTP_REFERER']; 
        $form_id = substr($prev_url, -24 );
        $update_code =  $this->input->post('form_code');
        $data = array();
        $data['update_code'] = $update_code;
        if ($this->forms_model->update_form($form_id,$update_code))
        {
            $this->load->view('form_update', $data);
            //echo "<p><font color=green>Your form was update successfully!</font></p>";
        }
        else {echo "<script>if(confirm('Sorry, Update fails!')==true){location.href='javascript:history.go(-1);'}</script>";}
    }

    public function form_items() {       
        $form_id = $this->input->get('form_id');
        
        if ( strlen($form_id)==24 )
        {
            $data = array();
            $data['my_form'] = $this->forms_model->my_form($form_id);
            $data['form_items'] = $this->forms_model->form_items($form_id);
            $this->load->view('form_items', $data);
        }
        elseif ( $form_id=="" OR strlen($form_id)!=24 ){
            echo "<p><font color=red>Sorry, The form_id does not meet specifications.</font></p>";
        }   
        else { echo "<p><font color=red>Sorry, There is something wrong...</font></p>"; } 
    }

    public function submit_data() {
            $prev_url = $_SERVER['HTTP_REFERER']; 
            $url_array=parse_url($prev_url);
            $url_str = $url_array['query'];
            $temp_str=substr($url_str, 0, 7);
            if ($temp_str=="item_id") {
                $item_id = substr($url_str, -24 );
                $item_arr= $this->forms_model->form_id($item_id);
                $form_id = $item_arr[0][0];
            } elseif ($temp_str=="form_id") {
                $form_id = substr($prev_url, -24 );
            }else {
                echo "<p><font color=red>Sorry, There is something wrong...</font></p>";
            }
            
            $items = $this->input->post();
            array_pop($items); //remove button item
            //$arr_oid = array("form_id"=>$oid);
            array_unshift($items, $form_id);
            $data['items'] = $items;
            if ($this->forms_model->submit_data($items)) {
                $this->load->view('items', $data);
            }else{
                echo "<p><font color=red>Sorry, Form Data submit fails!</font></p>";
            }
    }

    public function my_item(){
            $item_id = $this->input->get('item_id');
            $data = array();
            $iterms = $this->forms_model->my_item($item_id);
            array_shift($iterms[0]); //remove _id item
            $data['my_items'] = $iterms; 
            //print_r($iterms[0]); exit();
            $form_id = $iterms[0][0];
            $data['form_id'] = $form_id;
            $data['my_form'] = $this->forms_model->my_form($form_id);
            $this->load->view('my_items', $data);
    }

    public function search_form() {
            $this->load->library("cimongo/Cimongo");
            $keyword = trim($this->input->get('keyword'));
            $select_option = $this->input->get('select_option');
            if ($select_option == "author") {
                $query=$this->cimongo->where(array('author'=>$keyword))->get("forms");
            } elseif ($select_option == "form_id") {
                $wheres = array("_id"=>new MongoId("$keyword"));
                $query=$this->cimongo->where($wheres)->get("forms");
            } else {
                $wheres=array("form_code"=>new MongoRegex("/.*".$keyword.".*/i"));
                $query=$this->cimongo->where($wheres)->get("forms");
                //$query=$this->cimongo->like('form_code', '$keyword', 'i', FALSE, TRUE)->get("forms");
            }
            $result = $query->result_array();
            //var_dump($result);
            $data = array();
            $data['result_list'] = $result;
            $this->load->view('search_form', $data);
    }

    public function search_item() {
            $this->load->library("cimongo/Cimongo");
            $keyword = trim($this->input->get('keyword'));
            $select_option = $this->input->get('select_option');
            if ($select_option == "form_id") {
                $query=$this->cimongo->where(array(0=>$keyword))->get("items");
            } elseif ($select_option == "item_id") {
                $wheres = array("_id"=>new MongoId("$keyword"));
                $query=$this->cimongo->where($wheres)->get("items");
            } else {
                $where_clause = array(
                        '$or'=>array(
                            array("textinput"=>$keyword),
                            array("passwordinput"=>$keyword),
                            array("searchinput"=>$keyword),
                            array("prependedtext"=>$keyword),
                            array("appendedtext"=>$keyword),
                            array("prependedcheckbox"=>$keyword),
                            array("appendedcheckbox"=>$keyword),
                            array("buttondropdown"=>$keyword),
                            array("radios"=>$keyword),
                            array("checkboxes"=>$keyword),
                            array("selectbasic"=>$keyword),
                            array("selectmultiple"=>$keyword),
                            array("filebutton"=>$keyword),
                            array("textarea"=>new MongoRegex("/.*".$keyword.".*/i"))
                        )
                    );
                $query = $this->cimongo->where($where_clause, TRUE)->get("items");
            }
            $result = $query->result_array();
            //var_dump($result);exit();
            $data = array();
            $data['result_list'] = $result;
            $this->load->view('search_item', $data);
    }
}