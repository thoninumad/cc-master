<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_new extends CI_Model {
	
	function dir_data(){
        $table = 'direktorat';
		return $this->db->get($table)->result();
	}
	
}