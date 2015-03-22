<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

abstract class T_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->init();

        $lang = $this->get_preferred_language();
        $this->load->language('core', $lang);
        $this->load->vars('LOCALE', $lang);
        
        if(!defined('LOCALE')){
            define('LOCALE', $lang);
        }
        $this->init_culture();
    }

    protected function init() {
        
    }

    protected function init_culture() {
        $this->load->language(strtolower(get_class($this)), $this->load->get_var('LOCALE'), $this->module);
    }


    protected function get_preferred_language() {
        $locales = $this->config->item('locales');

        $selected = $this->input->get('locale', true);
        if ($selected && in_array($selected, $locales)) {
            $this->input->set_cookie('locale', $selected, 84600);
            return $selected;
        }

        $selected = $this->input->cookie('locale', true);
        if ($selected && in_array($selected, $locales)) {
            return $selected;
        }

        return $this->input->get_preferred_language($locales);
    }

}
