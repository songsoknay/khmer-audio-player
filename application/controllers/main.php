<?php

class main extends Zcontroller {
        
	public function index()
	{   
        $this->load->helper('url_helper');
        $this->load->model("m_songs");
            
        $data["songs"]=$this->m_songs->get_songs();
        $data["song_cat"]=$this->m_songs->get_song_cat();
        $this->load->template("templates/general","index","Music Player", $data);
    }
    
}
?>
