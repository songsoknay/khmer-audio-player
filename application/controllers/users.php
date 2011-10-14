<?php

class users extends Zcontroller {
	function __construct() {
		parent::__construct();
		$Z_USER = Zsession::getUserFromSession();
	}
	
		public function index()
		{   
			
            $this->load->helper('url_helper'); 
            $Z_USER = Zsession::getUserFromSession(); 
            if(isset($Z_USER["user_login"]) && $Z_USER["user_login"]!=""){
            	$this->load->template('templates/general', 'misc/homepage', 'Home Page Cpanel');
            }else {
            	
            	$this->load->template("templates/general","users/login","User sign in"); 
            }
            
     	}

        function authentication(){
            $this->load->model("m_users");
            $data["page"]="signin"; 
			if(isset($_POST['userlogin']) && $_POST['userlogin']==""){
            		$data['error_message']='<b>Please re-enter your user</b><br/>The User you entered inccorrect. Please try again (make sure your caps lock is off).';
            		$this->load->template("templates/general","login","User sign in",$data);
            }else if(isset($_POST['userpwd']) && $_POST['userpwd']==""){
            		$data['error_message']='<b>Please re-enter your password</b><br/>The Password you entered inccorrect. Please try again (make sure your caps lock is off).';
	            	$this->load->template("templates/general","users/login","User sign in",$data); 
            }else {
            	$user = $this->m_users->authentication($_POST["userlogin"], $_POST["userpwd"]);
	       	    $success=FALSE;    
	            if($user != null){
	                $success=TRUE;
	                Zsession::setUserToSession($user);
	                $this->load->template('templates/general', 'misc/homepage', 'Home Page Cpanel');
	                //redirect($_REQUEST["current_url"]);
	            } else {
	            	// Alert message user/password not correct
	            	$data['error_message']='<b>Please re-enter your password</b><br/>The Password you entered incorrect. Please try again (make sure your caps lock is off).';
	            	$this->load->template("templates/general","users/login","User sign in",$data); 
	            	
	            }
             }
        }
        function homeuser(){
        	 $this->load->model("m_users");
        	 $data["all_users"]=$this->m_users->get_users();
        	 $this->load->template("templates/general","users/home", "Zuka",$data);
        }
        
        

        
        //Home------------------------------------------------------------------------
        
        function logout() {
        	Zsession::destroySession();
            //redirect($_SERVER['HTTP_REFERER']); 
            redirect("users");       
        }
        
		function gotoregister(){
        	$this->load->model("m_users");
        	$data =array();
        	$data["txtfname"]="";
        	$data["txtlname"]="";
        	$data["txtloginname"]="";
        	$data["txtemail"]="";
        	$data["txtpwd"]="";
        	$data["txtconfirmpwd"]="";
        	$data["error_message"] ="";
        	 $data["usergroup"]=$this->m_users->get_user_group();
        	 $this->load->template("templates/general","users/addnew_user", "Zuka",$data);
        }
        
        
		function addnewUser(){
        	$this->load->model("m_users");
        	$this->load->helper('email');
        	$data =array();
        	$fname=trim($_POST['txtfname']);
        	$lname=trim($_POST['txtlname']);
        	$loginname=trim($_POST['txtloginname']);
        	$email=trim($_POST['txtemail']);
        	$pwd=trim($_POST['txtpwd']);
        	$confirmpwd=trim($_POST['txtconfirmpwd']);
        	$tf=FALSE;
        	$error_message = "";
        	if ($loginname == "") {
        	    $error_message = "Login name is required";	
        	}elseif ($pwd == ""){
        		$error_message = "Password is required";	
        	}elseif ($confirmpwd == ""){
        		$error_message = "Confirm password is required";	
        	}elseif ($confirmpwd != $pwd){
        		$error_message = "Confirm and Password are not matched.";	
        	}else{
        		if ($email!='' && !valid_email($email)){
        			$error_message="Email is not valid.";
        		}
        	}
			
        	if ($error_message != "") {
        		$tf=TRUE;
        	}
        	$isloginexist = $this->m_users->get_user_by_login($loginname);
        	if($isloginexist != null){//when login name already exist
        		$error_message = "Login name already exists.";
        		$tf=TRUE;
        	}
			if($tf==TRUE){
        		$data["txtfname"] = $fname; 
        		$data["txtlname"] = $lname;
        		$data["txtloginname"]=$loginname;
        		$data["txtemail"]=$email;
        		$data["txtpwd"]=$pwd;
        		$data["txtconfirmpwd"]=$confirmpwd;
        		$data["error_message"] = $error_message;
        		$data["usergroup"]=$this->m_users->get_user_group();
        		$this->load->template("templates/general","users/addnew_user", "Zuka",$data);
        		return;
        	}
        	$this->m_users->insert_user($fname,
							        	$lname,
							        	$loginname,
							        	$email,
							        	sha1($pwd),
							        	$_POST['cbousergroup']);
		redirect(site_url("users/homeuser"));
        }
        function gotoupdateuser($uid){
        	$this->load->model("m_users");
        	$data["error_message"] ="";
        	$data["userdata"]=$this->m_users->get_user_by_id($uid);
        	 $data["usergroup"]=$this->m_users->get_user_group();
        	 $this->load->template("templates/general","users/update_user", "Zuka",$data);
        }
        function updateuser($uid){
        	$this->load->model("m_users");
        	$this->load->helper('email');
        	$data =array();
        	$fname=trim($_POST['txtfname']);
        	$lname=trim($_POST['txtlname']);
        	$loginname=trim($_POST['txtloginname']);
        	$email=trim($_POST['txtemail']);
        	$error_message = "";
        	$tf=FALSE;
        	if ($loginname == "") {
        	    $error_message = "Login name is required";	
        	}else{
        	if ($email!='' && !valid_email($email)){
        			$error_message="Email is not valid.";
        		}
        	}
        	
        	//check if user login name exists
       		 $data['allusers'] = $this->m_users->get_user_by_login_id();
       		 foreach ($data['allusers']->result() as $users):
        			if($users->user_id != $uid && $users->user_login==$loginname){
	       		 		$tf=TRUE;
	       		 	}
       		 endforeach;
       		 if($tf==TRUE){
       		 	$error_message="User login already exists.";
       		 }
        	if ($error_message != "") {
        		$data["error_message"] = $error_message;
        		$data["userdata"]=$this->m_users->get_user_by_id($uid);
        	 	$data["usergroup"]=$this->m_users->get_user_group();
        	 	$this->load->template("templates/general","users/update_user", "Zuka",$data);
        		return;
        	}
        	//update_user($ufname,$ulname,$userlogin,$uemail,$upwd,$ugroupid,$uid)
        	$this->m_users->update_user($fname,
							        	$lname,
							        	$loginname,
							        	$email,
							        	$_POST['cbousergroup'],
							        	$uid);
			redirect(site_url("users/homeuser"));
        }
        function deleteuser($deleteloginname){
        	$this->load->model("m_users");
        	$this->m_users->delete_user($deleteloginname);
			redirect(site_url("users/homeuser"));
        }
        function gotochangepwd($ulogin){
        	$this->load->model("m_users");
        	$data =array();
        	$data["txtoldpwd"]="";
        	$data["txtnewpwd"]="";
        	$data["txtconfirmpwd"]="";
        	$data["error_message"] = "";
        	$data["uloginname"]=$ulogin;
        	$this->load->template("templates/general","users/change_pwd", "Zuka",$data);
        }
        function savechangepwd(){
        	$this->load->model("m_users");
        	$data =array();
        	$ulogin=trim($_POST['txtloginname']);
        	$oldpwd=trim($_POST['txtoldpwd']);
        	$newpwd=trim($_POST['txtnewpwd']);
        	$confirmpwd=trim($_POST['txtconfirmpwd']);
        	$error_message = "";
        	if ($oldpwd == "") {
        	    $error_message = "Old password is required.";	
        	}elseif ($newpwd==""){
        		$error_message = "New password is required.";	
        	}elseif ($confirmpwd==""){
        		$error_message = "Confirm password is required.";	
        	}elseif ($newpwd!=$confirmpwd){
        		$error_message = "New and Confirm passwordPassword are not matched.";	
        	}else{//validate the old pwd n userlogin
	        	$user = $this->m_users->authentication($ulogin,$oldpwd);
	            if($user == null){//when old password is wrong.
	            	$error_message = "Old password is wrong.";	
	            }
        	}
        	if ($error_message != "") {
        		$data["txtoldpwd"]=$oldpwd;
        		$data["txtnewpwd"]=$newpwd;
        		$data["txtconfirmpwd"]=$confirmpwd;
        		$data["error_message"] = $error_message;
        		$data["uloginname"]=$ulogin;
        		$this->load->template("templates/general","users/change_pwd", "Zuka",$data);
        		return;
        	}
        	$this->m_users->change_pwd($newpwd,$ulogin);
			redirect(site_url("users/homeuser"));
        }
}
?>
