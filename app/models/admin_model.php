<?php
/*
Filename: entry_model.php
Created : 2014-6-20
Author  : Shawnless.xie@gmail.com
Function: the model for the administrators. 
*/
class Admin_model extends Model {

	public function __construct(){
		parent::__construct();
	}	

	public function get_hash($username){
		$data = $this->_db->select("SELECT password FROM ".PREFIX."admin WHERE username = :username", array(':username' => $username));
		return $data[0]->password;
	}
}
