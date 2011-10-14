<?php
/**
 * Zuka Controller
 * @author Sros
 */
class Zcontroller extends CI_Controller {
	/**
	 * Constructor of this controller
	 */
    function __construct() {
    	parent::__construct();
    	$this->initController();
    }
    
    private function initController() {
        	$CI =& get_instance();
		define("CHAR_SET", $CI->config->item("charset"));
		$this->load->helper("html");
		date_default_timezone_set('Asia/Manila');
        $this->load->helper('url_helper');
        $this->load->helper('zuka_helper');
        require_once BASEPATH.'core/Model.php';
        require_once APPPATH.'libraries/Zmodel.php';
        require_once APPPATH.'libraries/Zsession.php';
        require_once APPPATH.'libraries/Zencryption.php';
        
        session_start();
        if (!isset($_SESSION[Zsession::SESSION_KEY])) {
            $_SESSION[Zsession::SESSION_KEY] = array();
            $_SESSION[Zsession::SESSION_KEY][Zsession::SESSION_DATA_KEY] = array();
        }
        
        
    }
}