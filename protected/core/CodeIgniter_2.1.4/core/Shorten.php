<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once(BASEPATH . 'database/DB.php');

    $db = & DB();
    $query = $db->get_where('shorten', array('id' => $RTR->fetch_class()));
    $routing = ($query->num_rows > 0) ? $query->row_array() : NULL;
    $db->close();