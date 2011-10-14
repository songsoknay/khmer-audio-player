<?php
class m_users extends Zmodel{
    function __construct() {
   	    parent::__construct();
    }
    
    function authentication($users, $pwd) {
    	$this->load->database();
    	$sql = "SELECT u.user_id,
    	               u.user_login,
    	               u.user_email,
    	               u.user_pwd,
    	               u.user_group_id,
    	               u.city_id,
    	               u.date_create,
    	               gr.user_group_code,
    	               gr.user_group_desc
				FROM users u 
				LEFT JOIN user_group gr on(gr.user_group_id = u.user_group_id)
    	        WHERE u.user_login='".pg_escape_string($users)."' AND 
    	              u.user_pwd='".strtolower(sha1($pwd))."' AND
    	              u.user_group_id = 1";
        $query = $this->db->query($sql);
        $nb_rows = $query->num_rows();
        if ($nb_rows < 1) {
            return NULL;
        } else {
            return $query->row_array();
        }
    }
    
    
		function get_user_group(){
            $this->load->database();
            $sql="SELECT user_group_id,
            			 user_group_desc 
            		FROM user_group 
            	   WHERE user_group_desc<>'Member User'";
            return $this->db->query($sql);
    	}

    	function get_users(){
            $this->load->database();
            $sql="SELECT u.user_id,
                         u.user_fname,
                         u.user_lname,
                         u.user_login,
                         u.user_email,
                         g.user_group_desc
                    FROM users AS u 
              INNER JOIN user_group AS g 
              		  ON u.user_group_id=g.user_group_id";
            return $this->db->query($sql);
    	}
    
    
    
    
		function get_user_by_id($uid){
            $this->load->database();
            $sql="SELECT u.user_id,
                         u.user_fname,
                         u.user_lname,
                         u.user_login,
                         u.user_email,
                         g.user_group_desc
                    FROM users AS u 
              INNER JOIN user_group AS g 
              		  ON u.user_group_id=g.user_group_id
              	   WHERE u.user_id=".$uid;
			 $query = $this->db->query($sql);
            if ($query->num_rows() <= 0) {
                return null;
            } else {
            	return $query->row_array();
            }
    	}
    	
    	function get_user_by_login($ulogin){
	    	 $this->load->database();
	            $sql="SELECT user_id
	                    FROM users
	              	   WHERE user_login='".pg_escape_string($ulogin)."'";
				 $query = $this->db->query($sql);
	            if ($query->num_rows() <= 0) {
	                return null;
	            } else {
	            	return $query->row_array();
	            }
    	}
		
    	function get_user_by_login_id(){
	    	 $this->load->database();
	         $sql="SELECT user_id,
	            			 user_login
	                    FROM users ";
	         return $this->db->query($sql);
    	}
    	
    function get_user_by_email($uemail,$upwd){
        $this->load->database();
            $sql="SELECT * FROM users 
            			  WHERE user_email='".$uemail."' AND 
            			  		user_pwd='".$upwd."'";
    $query = $this->db->query($sql);
            if ($query->num_rows() <= 0) {
                return null;
            } else {
            	return $query->row_array();
            }
    }
    function insert_user($user_fname,$user_lname,$userlogin,$user_email,$user_pwd,$user_group_id){
            $this->load->database();
            $sql="INSERT INTO users(
            				  user_fname,
            				  user_lname,
            				  user_login,
            				  user_email,
            				  user_pwd,
            				  user_group_id,
            				  date_create) 
            	  VALUES('".pg_escape_string($user_fname)."',
		            	  '".pg_escape_string($user_lname)."',
		            	  '".pg_escape_string($userlogin)."',
		            	  '".pg_escape_string($user_email)."',
		            	  '".pg_escape_string($user_pwd)."',
		            	  ".$user_group_id.",
		            	  CURRENT_TIMESTAMP)";
            $this->db->query($sql);
   }
   function update_user($ufname,$ulname,$userlogin,$uemail,$ugroupid,$uid){
            $this->load->database();
            $sql="UPDATE users SET user_fname='".pg_escape_string($ufname)."',
            					   user_lname='".pg_escape_string($ulname)."',
            					   user_login='".pg_escape_string($userlogin)."',
            					   user_email='".pg_escape_string($uemail)."',
            					   user_group_id=".$ugroupid.",
            					   date_update=CURRENT_TIMESTAMP 
            			     WHERE user_id=".$uid;
             $this->db->query($sql);
  }
  function delete_user($deleteid){
            $this->load->database();
            //$sql="DELETE FROM users 
            //			WHERE user_id=".$deleteloginname." AND 
            //				  user_login<>'admin'";
            $sql="DELETE FROM users 
            			WHERE user_id=".$deleteid;				  
            $this->db->query($sql);
  }
  function change_pwd($upwd,$ulogin){
  		$this->load->database();
            $sql="UPDATE users SET user_pwd='".sha1($upwd)."'
            			     WHERE user_login='".pg_escape_string($ulogin)."'";
             $this->db->query($sql);
  }
    
    
   
	 
}