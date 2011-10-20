<?php
class m_songs extends Zmodel{
	
    function __construct() {
   	    parent::__construct();
    }
    
    function get_songs(){
    	$sql = "SELECT song_id,
					  song_title,
					  song_artist_id,
					  album_id,
					  album_pic,
					  file_path,
					  file_play,
					  file_name,
					  file_size,
					  length,
					  bit_rate,
					  song_lang_id,
					  production_id,
					  date_post,
					  hit_id
    	FROM songs 
    	ORDER BY song_id asc";
    	return $this->db->query($sql);
    }
    
    function get_songs_back(){
    	$sql = "SELECT song_id,
					  song_title,
					  song_artist_id,
					  album_id,
					  album_pic,
					  file_path,
					  file_play,
					  file_name,
					  file_size,
					  length,
					  bit_rate,
					  song_lang_id,
					  production_id,
					  date_post,
					  hit_id
    	FROM songs 
    	ORDER BY date_post asc";
    	return $this->db->query($sql);
    }
    
    function get_songs_id($id){
    	$sql = "SELECT song_id,
					  song_title,
					  song_artist_id,
					  album_id,
					  album_pic,
					  file_path,
					  file_play,
					  file_name,
					  file_size,
					  length,
					  bit_rate,
					  song_lang_id,
					  production_id,
					  date_post,
					  hit_id
    	FROM songs 
    	WHERE song_id=".$id." ORDER BY date_post asc";
        $query = $this->db->query($sql);
        if ($query->num_rows() <= 0) {
                return null;
        } else {
            	return $query->row_array();
        }
    }
    
    function get_production() {
    	$sql = "SELECT production_id,
    	         	   production_name
    	        FROM productions 
    	        ORDER BY production_name asc";
    	return $this->db->query($sql);
    }
    
    function get_language() {
    	$sql = "SELECT song_lang_id,
    	         	   song_lang_name
    	        FROM song_lang ";
    	return $this->db->query($sql);
    }
    
    function get_album() {
    	$sql = "SELECT album_id,
    	         	   album_name
    	        FROM albums ";
    	return $this->db->query($sql);
    }
    
    function get_artist() {
    	$sql = "SELECT song_artist_id,
    	         	   song_artist_name
    	        FROM artists";
    	return $this->db->query($sql);
    }
    
    function get_song_cat(){
    	$sql = "SELECT song_cat_id,
    	         	   song_cat_name
    	        FROM song_cat
    	        ORDER BY song_cat_id ASC";
    	return $this->db->query($sql);
    }
	
    public function quote_smart($value) {
		   // Stripslashes
		   if (get_magic_quotes_gpc()) {
		
		       $value = stripslashes($value);
		
		   }
		   // Quote if not integer
		
		   if (!is_numeric($value) || $value[0] == '0') {
		
		       $value = "'" . mysql_real_escape_string($value) . "'";
		
		   }
		
		   return $value;
		
	}
		
    function insert_songs($song_title,
					  $song_artist_id,
					  $album_id,
					  $album_pic,
					  $file_path,
					  $file_play,
					  $file_name,
					  $file_size,
					  $length,
					  $bit_rate,
					  $song_lang_id,
					  $production_id){
			//$song_id = $this->get_next_id("songs_song_id_seq");
        	$sql = "INSERT INTO songs(
					  song_title,
					  song_artist_id,
					  album_id,
					  album_pic,
					  file_path,
					  file_play,
					  file_name,
					  file_size,
					  length,
					  bit_rate,
					  song_lang_id,
					  production_id,
					  date_post)
				VALUES('".mysql_real_escape_string($song_title)."',
				      ".$song_artist_id.",
				      '".mysql_real_escape_string($album_id)."',
				      '".mysql_real_escape_string($album_pic)."',
				      '".mysql_real_escape_string($file_path)."',
				      '".mysql_real_escape_string($file_play)."',
				      '".mysql_real_escape_string($file_name)."',
				      '".mysql_real_escape_string($file_size)."',
				      '".mysql_real_escape_string($length)."',
				      '".mysql_real_escape_string($bit_rate)."',
				      ".$song_lang_id.",
				      ".$production_id.",
				      CURRENT_TIMESTAMP)";
			return $this->db->query($sql);
    		
    }
    
   function update_songs($song_id,
   					  $song_title,
					  $song_artist_id,
					  $album_id,
					  $album_pic,
					  $file_path,
					  $file_play,
					  $file_name,
					  $file_size,
					  $length,
					  $bit_rate,
					  $song_lang_id,
					  $production_id){
			//$song_id = $this->get_next_id("songs_song_id_seq");
        	$sql = "UPDATE songs
					SET song_title='".mysql_real_escape_string($song_title)."',
					  song_artist_id=".$song_artist_id.",
					  album_id='".mysql_real_escape_string($album_id)."',
					  album_pic='".mysql_real_escape_string($album_pic)."',
					  file_path='".mysql_real_escape_string($file_path)."',
					  file_play='".mysql_real_escape_string($file_play)."',
					  file_name='".mysql_real_escape_string($file_name)."',
					  file_size='".mysql_real_escape_string($file_size)."',
					  length='".mysql_real_escape_string($length)."',
					  bit_rate='".mysql_real_escape_string($bit_rate)."',
					  song_lang_id=".$song_lang_id.",
					  production_id=".$production_id.",
					  date_post=CURRENT_TIMESTAMP
        			WHERE song_id=".$song_id."";

			return $this->db->query($sql);
    		
    }
    
    function get_next_pro_id(){
    	    	$sql = "SELECT production_id
    	         		FROM productions
    	         		ORDER BY production_id DESC 
    	         		LIMIT 1";
    		$query = $this->db->query($sql);
            if ($query->num_rows() <= 0) {
                return null;
            } else {
            	return $query->row_array();
            }			 
    }
    
    function insert_production($pro_id,$pro_name,$pro_pic){
			$sql = "INSERT INTO productions(production_id,
						  production_name,
						  production_pic)
					VALUES(".$pro_id.",
					'".mysql_real_escape_string($pro_name)."',
					'".mysql_real_escape_string($pro_pic)."')";
			return $this->db->query($sql);
    }
    
 }       