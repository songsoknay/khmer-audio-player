<?php
class Misc extends Zcontroller {
    function __construct() {
        parent::__construct();
    }
    
    function homepage() {
    	
        $this->load->template("templates/general","misc/homepage", "Zuka");
    }
}