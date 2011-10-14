<?php

class songs extends Zcontroller {
	function __construct() {
		parent::__construct();
		$Z_USER = Zsession::getUserFromSession();
	}
	
		public function index()
		{ 
			
		}
		
		function ext_check1(){
	        $allowedExt = array("jpg","jpeg","gif","png");
			$obj_name = "image1";
			if (isset($_FILES) && isset($_FILES[$obj_name]) && isset($_FILES[$obj_name]["tmp_name"]) && $_FILES[$obj_name]["tmp_name"]!= "") {
				$file_ext = next(explode(".", $_FILES[$obj_name]["name"]));
				if (!in_array($file_ext, $allowedExt)) {
					$this->form_validation->set_message('ext_check1', 'The %s (<font color=#333>'.$_FILES[$obj_name]["name"].'</font>) is not an image file.'); 
					return false;
				}
			}
			return true;
        }
        
		function ext_check2(){
			$allowedExt = array("mp3","m4a","wav","ogg");
			$obj_name = "image2";
			if (isset($_FILES) && isset($_FILES[$obj_name]) && isset($_FILES[$obj_name]["tmp_name"]) && $_FILES[$obj_name]["tmp_name"]!= "") {
				$file_ext = next(explode(".", $_FILES[$obj_name]["name"]));
				if (!in_array($file_ext, $allowedExt)) {
					$this->form_validation->set_message('ext_check2', 'The %s (<font color=#333>'.$_FILES[$obj_name]["name"].'</font>) is not an music file.'); 
					return false;
				}
			}
			return true;
        }
        

		function addsongs(){
			$this->load->model("m_songs");
			$this->load->library('form_validation'); 
			
			require_once "getid30/getid3/getid3.php";
			
			if(isset($Z_USER["user_login"]) && $Z_USER["user_login"]!=""){
            	redirect(site_url("users"));
            }else {
            	if(isset($_POST["btnadd"]) && $_POST["btnadd"]!=""){

            		$this->form_validation->set_rules('txtTitle', 'Title song', 'required');
            		$this->form_validation->set_rules('txtAlbum', 'Album name', 'required');
            		$this->form_validation->set_rules('cboArtist', 'Artist song', '');
            		$this->form_validation->set_rules('cboLang', 'Language song', 'required');
            		$this->form_validation->set_rules('cboPro', 'Production', '');
            		$this->form_validation->set_rules('txtLenght', 'Lenght', '');
            		$this->form_validation->set_rules('image1', 'Picture Album', "callback_ext_check1");	
		     		$this->form_validation->set_rules('image2', 'Song', 'callback_ext_check2');

					if ($this->form_validation->run() == FALSE)
					{			
						$data['message_errors'] = validation_errors();
						$data["production"]=$this->m_songs->get_production();
	            		$data["language"]=$this->m_songs->get_language();
	            		$data["album"]=$this->m_songs->get_album();
	            		$data["artist"]=$this->m_songs->get_artist();
	            		$this->load->template("templates/general","administrator/add_songs","Add songs", $data); 
					}
					else{
					      /* Create the config for upload library */
					      /* (pretty self-explanatory) */
					      $date="";
					      //$date=date("His");
					      $patch=FCPATH."/song/".htmlspecialchars($_POST["txtAlbum"])."/"; /* NB! create this dir! */
					      if (!file_exists ($patch)){ mkdir($patch,0700);}
					      $config["upload_path"] = $patch;
					      $config["allowed_types"] = "mp3|m4a|wav|jpg|png";		      
					      $config["image_library"] = "gd2";
					      $config["source_image"] = $patch.htmlspecialchars($_POST["txtAlbum"]);
					      $config["encrypt_name"]  = FALSE;
					      $config["overwrite"]  = TRUE;
					      $config["max_size"]  = "0";
					      $config["max_width"]  = "0";
					      $config["max_height"]  = "0";
			
					      /* Load the upload library */
					      $this->load->library("upload", $config);
					
					      /* Create the config for image library */
					      /* (pretty self-explanatory) */
					      $configThumb = array();
					      $configThumb["image_library"] = "gd2";
					      $configThumb["thumb_marker"] = $date."_Thumb";
					      $configThumb["source_image"] = "";
					      $configThumb["create_thumb"] = TRUE;
					      $configThumb["maintain_ratio"] = TRUE;
	
					      $configThumb["width"] = 68;
					      $configThumb["height"] = 60;
					      /* Load the image library */
					      $this->load->library("image_lib");
							      
					      $filename_arr = array();
					      $filename_big_arr = array();
					      
 
					      for($i = 1; $i <= count($_FILES); $i++) {
					        /* Handle the file upload */
					        $upload = $this->upload->do_upload("image".$i);
					        /* File failed to upload - continue */
					           
					      	if($upload === FALSE) continue;
					        	/* Get the data about the file */
					        	$data = $this->upload->data();
					        
					        	$uploadedFiles[$i] = $data;
					        	/* If the file is an image - create a thumbnail */
						        if($data["is_image"] == 1) {
						          $filename_arr["image1"] = $data["orig_name"];
						
						          //$_FILES["image".$i]['name'];
						          $configThumb["source_image"] = $data["full_path"];     
						          
						          $this->image_lib->initialize($configThumb);
						          $this->image_lib->resize();
						           
						          //echo "<pre>"; var_dump($data); echo "</pre>";
						          $filename = $data["file_path"].$data["raw_name"].$date.$data["file_ext"];
						          //$filename = $data["raw_name"].'_big'.$data['file_ext'];
				
								  rename($data["full_path"], $filename);
						          //rename($data["full_path"], $filename);
						          $filename_big_arr["image1"] = $data["raw_name"].$date.$data["file_ext"];
					  			  			    	  	  
						          $file_path='song/'.htmlspecialchars($_POST["txtAlbum"]).'/';
								  //echo $filename_big_arr["image".$i]."<br/>";		 
 			  
						        }else{
						          							  
						          $filename_arr["image2"] = $data["orig_name"];
						          $filename = $data["file_path"].$data["raw_name"].$date.$data["file_ext"];
						          rename($data["full_path"], $filename);
							      $filename_big_arr["image2"] = $data["raw_name"].$date.$data["file_ext"];
							      //$file_size = $data["file_size"]>= 1024 ? (intval($data["file_size"]) / 1024) : $data["file_size"];
							      //$file_size >= 1024 ? substr($file_size, 0,4)."MB" : substr($file_size, 0,4)."KB"
							      $file_size = intval($data["file_size"]) / 1024;
						          $file_size_mp3 = substr($file_size, 0,4)."MB";						          
						          
						          $getID3 = new getID3;
								  $getID3->encoding = 'UTF-8';
								  $ThisFileInfo = $getID3->analyze($filename);
								  
								  $bitrate = substr($ThisFileInfo['bitrate'], 0,3)."kbps";
								  $lenght = $ThisFileInfo['playtime_string'];
								  
								  echo "File name: ".$ThisFileInfo['filename']."<br />";
								  echo "Bitrate: ".$bitrate."<br />";
								  echo "Length: ".$lenght."<br />";
						      	}//end if $data is image

					        	//echo $filename_big_arr["image".$i]."<br/>";
					        	
					    	 } // FOR LOOP
               					$song_id = $this->m_songs->insert_songs($_POST["txtTitle"],	
													     $_POST["cboArtist"],													     
													     $_POST["txtAlbum"],
														 $filename_big_arr["image1"],
														 $file_path,
														 "",
														 $filename_big_arr["image2"],
														 $file_size_mp3,
														 $lenght,
														 $bitrate,														 
														 $_POST["cboLang"],
														 $_POST["cboPro"]);	
													
						echo "<div style=\"border:#CDCDCD 6px solid;font-family:'Segoe UI Light', 'Segoe UI'; width:328px; padding-top:48px; margin:0 auto; padding-left:50px; height:136px;-webkit-border-radius: 8px;-moz-border-radius: 8px;border-radius: 8px;\"><h2>Song have been inserted sucessfully.</h2></div>";
				 		$auto="<script type=\"text/javascript\">setInterval( \"autosubmit()\", 1600 );function autosubmit(){ document.location=\"".site_url('songs/addsongs')."\";}</script>";
				 		//echo $auto; 
					}				
            					
            	}else {
            		$data["production"]=$this->m_songs->get_production();
            		$data["language"]=$this->m_songs->get_language();
            		$data["album"]=$this->m_songs->get_album();
            		$data["artist"]=$this->m_songs->get_artist();
            		$this->load->template("templates/general","administrator/add_songs","Add songs", $data); 
            	}

            }
		}
		
	function editsongs($song_id){
			$this->load->model("m_songs");
			$this->load->library('form_validation'); 
			
			require_once "getid30/getid3/getid3.php";
			
			if(isset($Z_USER["user_login"]) && $Z_USER["user_login"]!=""){
            	redirect(site_url("users"));
            }else {
            	if(isset($_POST["btnedit"]) && $_POST["btnedit"]!=""){

            		$this->form_validation->set_rules('txtTitle', 'Title song', 'required');
            		$this->form_validation->set_rules('txtAlbum', 'Album name', 'required');
            		$this->form_validation->set_rules('cboArtist', 'Artist song', '');
            		$this->form_validation->set_rules('cboLang', 'Language song', 'required');
            		$this->form_validation->set_rules('cboPro', 'Production', '');
            		$this->form_validation->set_rules('txtLenght', 'Lenght', '');
            		$this->form_validation->set_rules('image1', 'Picture Album', "callback_ext_check1");	
		     		$this->form_validation->set_rules('image2', 'Song', 'callback_ext_check2');
		     		
					$file_size_mp3;
					$filename_big_file;
					$filename_big_img;
					$lenght;
					$bitrate;
					$file_path;
					
					if ($this->form_validation->run() == FALSE)
					{			
						$data['message_errors'] = validation_errors();
						$data["production"]=$this->m_songs->get_production();
	            		$data["language"]=$this->m_songs->get_language();
	            		$data["album"]=$this->m_songs->get_album();
	            		$data["artist"]=$this->m_songs->get_artist();
	            		$data["song_id"]=$this->m_songs->get_songs_id($song_id);
	            		$this->load->template("templates/general","administrator/edit_songs","Edit songs", $data); 
					}
					else{
					      $date="";
					      //$date=date("His");
					      $patch=FCPATH."/song/".htmlspecialchars($_POST["txtAlbum"])."/"; /* NB! create this dir! */
					      if (!file_exists ($patch)){ mkdir($patch,0700);}
					      $config["upload_path"] = $patch;
					      $config["allowed_types"] = "mp3|m4a|wav|jpg|png";		      
					      $config["image_library"] = "gd2";
					      $config["source_image"] = $patch.htmlspecialchars($_POST["txtAlbum"]);
					      $config["encrypt_name"]  = FALSE;
					      $config["overwrite"]  = TRUE;
					      $config["max_size"]  = "0";
					      $config["max_width"]  = "0";
					      $config["max_height"]  = "0";
			
					      /* Load the upload library */
					      $this->load->library("upload", $config);
					
					      /* Create the config for image library */
					      /* (pretty self-explanatory) */
					      $configThumb = array();
					      $configThumb["image_library"] = "gd2";
					      $configThumb["thumb_marker"] = $date."_Thumb";
					      $configThumb["source_image"] = "";
					      $configThumb["create_thumb"] = TRUE;
					      $configThumb["maintain_ratio"] = TRUE;
	
					      $configThumb["width"] = 68;
					      $configThumb["height"] = 60;
					      /* Load the image library */
					      $this->load->library("image_lib");
							      
					      $filename_arr = array();
					      $filename_big_arr = array();
					      
 
					      for($i = 1; $i <= count($_FILES); $i++) {
					        /* Handle the file upload */
					        $upload = $this->upload->do_upload("image".$i);
					        /* File failed to upload - continue */
					           
					      	if($upload === FALSE) continue;
					        	/* Get the data about the file */
					        	$data = $this->upload->data();
					        
					        	$uploadedFiles[$i] = $data;
					        	/* If the file is an image - create a thumbnail */
						        if($data["is_image"] == 1) {
						          $filename_arr["image1"] = $data["orig_name"];
						
						          //$_FILES["image".$i]['name'];
						          $configThumb["source_image"] = $data["full_path"];     
						          
						          $this->image_lib->initialize($configThumb);
						          $this->image_lib->resize();
						           
						          //echo "<pre>"; var_dump($data); echo "</pre>";
						          $filename = $data["file_path"].$data["raw_name"].$date.$data["file_ext"];
						          //$filename = $data["raw_name"].'_big'.$data['file_ext'];
				
								  rename($data["full_path"], $filename);
						          //rename($data["full_path"], $filename);
						          $filename_big_arr["image1"] = $data["raw_name"].$date.$data["file_ext"];
					  			  $filename_big_img = $filename_big_arr["image1"];			    	  	  
						          $file_path='song/'.htmlspecialchars($_POST["txtAlbum"]).'/';
								  //echo $filename_big_arr["image".$i]."<br/>";		 
 			  
						        }else{
						          							  
						          $filename_arr["image2"] = $data["orig_name"];
						          $filename = $data["file_path"].$data["raw_name"].$date.$data["file_ext"];
						          rename($data["full_path"], $filename);
							      $filename_big_arr["image2"] = $data["raw_name"].$date.$data["file_ext"];
							      $filename_big_file = $filename_big_arr["image2"];
							      //$file_size = $data["file_size"]>= 1024 ? (intval($data["file_size"]) / 1024) : $data["file_size"];
							      //$file_size >= 1024 ? substr($file_size, 0,4)."MB" : substr($file_size, 0,4)."KB"
							      $file_size = intval($data["file_size"]) / 1024;
						          $file_size_mp3 = substr($file_size, 0,4)."MB";						          
						          
						          $getID3 = new getID3;
								  $getID3->encoding = 'UTF-8';
								  $ThisFileInfo = $getID3->analyze($filename);
								  
								  $bitrate = substr($ThisFileInfo['bitrate'], 0,3)."kbps";
								  $lenght = $ThisFileInfo['playtime_string'];
								  
								  echo "File name: ".$ThisFileInfo['filename']."<br />";
								  echo "Bitrate: ".$bitrate."<br />";
								  echo "Length: ".$lenght."<br />";
						      	}//end if $data is image

					        	//echo $filename_big_arr["image".$i]."<br/>";
					        	
					    	 } // FOR LOOP
               					$song_id = $this->m_songs->update_songs($song_id,
               											 $_POST["txtTitle"],	
													     $_POST["cboArtist"],													     
													     $_POST["txtAlbum"],
														 $filename_big_img,
														 $file_path,
														 "",
														 $filename_big_file,
														 $file_size_mp3,
														 $lenght,
														 $bitrate,														 
														 $_POST["cboLang"],
														 $_POST["cboPro"]);	
													
						echo "<div style=\"border:#CDCDCD 6px solid;font-family:'Segoe UI Light', 'Segoe UI'; width:328px; padding-top:48px; margin:0 auto; padding-left:50px; height:136px;-webkit-border-radius: 8px;-moz-border-radius: 8px;border-radius: 8px;\"><h2>Song have been inserted sucessfully.</h2></div>";
				 		$auto="<script type=\"text/javascript\">setInterval( \"autosubmit()\", 1600 );function autosubmit(){ document.location=\"".site_url('songs/addsongs')."\";}</script>";
				 		//echo $auto; 
					}				
            					
            	}else {
            		$data["production"]=$this->m_songs->get_production();
            		$data["language"]=$this->m_songs->get_language();
            		$data["album"]=$this->m_songs->get_album();
            		$data["artist"]=$this->m_songs->get_artist();
            		$data["song_id"]=$this->m_songs->get_songs_id($song_id);
            		$this->load->template("templates/general","administrator/edit_songs","edit songs", $data); 
            	}

            }
		}
		
		function add_productions(){
			$this->load->model("m_songs");
			$this->load->library('form_validation');
			
			if(isset($Z_USER["user_login"]) && $Z_USER["user_login"]!=""){
            	redirect(site_url("users"));
            }else {
            	
            	if(isset($_POST["btnaddPro"]) && $_POST["btnaddPro"]!=""){
            		$this->form_validation->set_rules('txtProduction', 'Production name', 'required');
            		if ($this->form_validation->run() == FALSE)
					{			
						$data['message_errors'] = validation_errors();
	            		$this->load->template("templates/general","administrator/add_productions","Add songs", $data); 
					}
					else{
						
					      $date=date("His");
					      $patch=FCPATH."/song/productions/"; /* NB! create this dir! */
					      if (!file_exists ($patch)){ mkdir($patch,0700);}
					      $config["upload_path"] = $patch;
					      $config["allowed_types"] = "jpg|png|gif|JPG|PNG";		      
					      $config["image_library"] = "gd2";
					      $config["source_image"] = $patch;
					      $config["encrypt_name"]  = FALSE;
					      $config["overwrite"]  = TRUE;
					      $config["max_size"]  = "0";
					      $config["max_width"]  = "0";
					      $config["max_height"]  = "0";
			
					      /* Load the upload library */
					      $this->load->library("upload", $config);
					
					      /* Create the config for image library */
					      /* (pretty self-explanatory) */
					      //$configThumb = array();
					      //$configThumb["image_library"] = "gd2";
					      //$configThumb["thumb_marker"] = $date."_Thumb";
					      //$configThumb["source_image"] = "";
					      //$configThumb["create_thumb"] = TRUE;
					      //$configThumb["maintain_ratio"] = TRUE;
	
					      //$configThumb["width"] = 68;
					      //$configThumb["height"] = 60;
					      /* Load the image library */
					      $this->load->library("image_lib");
							      
					      $filename_arr = array();
					      $filename_big_arr = array();
					      
					      for($i = 1; $i <= count($_FILES); $i++) {
					        /* Handle the file upload */
					        $upload = $this->upload->do_upload("image".$i);
					        /* File failed to upload - continue */
					           
					      	if($upload === FALSE) continue;
					        	/* Get the data about the file */
					        	$data = $this->upload->data();
					        
					        	$uploadedFiles[$i] = $data;
					        	/* If the file is an image - create a thumbnail */
						        if($data["is_image"] == 1) {
						          $filename_arr["image1"] = $data["orig_name"];
						
						          //$_FILES["image".$i]['name'];
						          $configThumb["source_image"] = $data["full_path"];     
						          
						          $this->image_lib->initialize($configThumb);
						          $this->image_lib->resize();
						           
						          //echo "<pre>"; var_dump($data); echo "</pre>";
						          $filename = $data["file_path"].$data["raw_name"].$date.$data["file_ext"];
						          //$filename = $data["raw_name"].'_big'.$data['file_ext'];
				
								  rename($data["full_path"], $filename);
						          $filename_big_arr["image1"] = $data["raw_name"].$date.$data["file_ext"];
					  			  			    	  	  
								  //echo $filename_big_arr["image".$i]."<br/>";
						        }
					      }
            				$pro_id = $this->m_songs->get_next_pro_id();
            				$pro_id = intval($pro_id["production_id"]+1); 
            				echo $pro_id;
						    $this->m_songs->insert_production($pro_id,$_POST["txtProduction"],$filename_big_arr["image1"]);
						   
					}
            		
            	}else { 
            		$this->load->template("templates/general","administrator/add_productions","Add productions"); 
            	}           		
            } 
		}
		
		function all(){
			$this->load->model("m_songs");
			$data["songs"]=$this->m_songs->get_songs_back();
			$this->load->template("templates/user_general","administrator/get_songs","View songs", $data);
		}
		
}//end class