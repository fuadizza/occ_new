<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function getUser() 
	{
		$this->db->select('user.*, task.*');
		$this->db->from('user');
		$this->db->join('task', 'user.task = task.id_task');

		$query = $this->db->get();

		return $query->result_array();
	}

}

