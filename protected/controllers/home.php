<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Home extends T_Controller{
    
    function index(){
        echo L('home_sayhello') . ", It is working...";
    }
}