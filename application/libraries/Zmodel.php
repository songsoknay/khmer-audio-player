<?php
class Zmodel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
	/**
	 * getting the next sequence id
	 * @param $seq_name the name of sequence
	 * @author Sokha RUM
	 */
	function get_next_id($seq_name) {
		$sql = "SELECT nextval('".$seq_name."') AS next_id";
		 
		$query = $this->db->query($sql);
        $nb_rows = $query->num_rows();
        if ($nb_rows < 1) {
            return NULL;
        } else {
            $row = $query->row_array();
            return $row["next_id"];
        }
	}
}