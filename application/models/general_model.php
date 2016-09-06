<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class General_model extends CI_Model {
	public function __construct() {
	}
	public function GetIpBanned($IP) {
		if ($this->db->query ( "SELECT * FROM banned_ip WHERE ip = '" . $IP . "'" )->num_rows () > 0) {
			return 1;
		}
	}
}