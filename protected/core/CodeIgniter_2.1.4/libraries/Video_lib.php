<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CI_Video_lib {

    var $source_video = NULL;
    var $dimension = NULL;
    var $dest_image = NULL;
    var $thumbnail = NULL;
    var $library_path = NULL;
    var $error_msg = array();

    public function __construct($props = array()) {
        if (count($props) > 0) {
            $this->initialize($props);
        }
    }

    function initialize($props = array()) {
        if (count($props) > 0) {
            foreach ($props as $key => $val) {
                $this->$key = $val;
            }
        }

        if ($this->source_video == '') {
            $this->set_error('videolib_source_video_required');
            return FALSE;
        }

        if (function_exists('realpath') AND @ realpath($this->source_video) !== FALSE) {
            $this->source_video = str_replace("\\", "/", realpath($this->source_video));
        }
        if (!$this->dest_image) {
            $sec = pathinfo($this->source_video);
            $this->thumbnail = $sec['filename'] . '.jpg';
            $this->dest_image = $sec['dirname'] . '/' . $sec['filename'] . '.jpg';
        } else {
            $sec = pathinfo($this->dest_image);
            $this->thumbnail = $sec['filename'] . '.' . $sec['extension'];
        }

        return TRUE;
    }

    function capture() {
        if ($this->library_path == '') {
            $this->set_error('videolib_libpath_invalid');
            return FALSE;
        }

        $cmd = $this->library_path . ' -i ' . $this->source_video . ' -f image2 -t 0.001 ';
        if ($this->dimension) {
            $cmd .= (' -s ' . $this->dimension . ' ');
        }
        $cmd .= $this->dest_image;
        
        $retval = 1;
        exec($cmd, $output, $retval);

        if ($retval > 0) {
            $this->set_error('videolib_process_failed');
            return FALSE;
        }

        return TRUE;
    }

    function set_error($msg) {
        $CI = & get_instance();
        $CI->lang->load('videolib');

        if (is_array($msg)) {
            foreach ($msg as $val) {

                $msg = ($CI->lang->line($val) == FALSE) ? $val : $CI->lang->line($val);
                $this->error_msg[] = $msg;
                log_message('error', $msg);
            }
        } else {
            $msg = ($CI->lang->line($msg) == FALSE) ? $msg : $CI->lang->line($msg);
            $this->error_msg[] = $msg;
            log_message('error', $msg);
        }
    }

    function display_errors($open = '<p>', $close = '</p>') {
        $str = '';
        foreach ($this->error_msg as $val) {
            $str .= $open . $val . $close;
        }

        return $str;
    }

}
