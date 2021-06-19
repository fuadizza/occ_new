<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct(); 
		is_logged_in(); //function helpper untuk membatasi akses user
	}

	public function index()
	{
		$data['title'] = "Dashboard";

		$data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function user()
	{
		$data['title'] = "User";
		$this->db->select('*');
        $this->db->from('user');
        $this->db->order_by("level");
        $data['users'] = $this->db->get()->result_array();

		$this->form_validation->set_rules('level', 'Level', 'required|trim');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
			'is_unique' => 'this username has already registered!'
		]);
		$this->form_validation->set_rules('gender', 'Gender', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/user/index', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'level'				=> $this->input->post('level'),
				'name'				=> $this->input->post('name'),
				'username'			=> $this->input->post('username', true),
				'gender'			=> $this->input->post('gender'),
				'password'			=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'is_active'			=> 1
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('add-success', 'Success');
			redirect('admin/user');
		}
	}

	public function userEdit($id)
    {
        $data['title'] = "Edit User";

        $this->form_validation->set_rules('level', 'Level', 'required|trim');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
			'is_unique' => 'this username has already registered!'
		]);
		$this->form_validation->set_rules('gender', 'Gender', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password1]');

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        $data['user'] = $this->db->get()->row_array();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/user/edit', $data);
            $this->load->view('templates/footer');
        } else {
        	$level 		= $this->input->post('level');
        	$name 		= $this->input->post('name');
        	$username 	= $this->input->post('username', true);
        	$gender 	= $this->input->post('gender');
        	$password 	= password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

            $data = [
				'level'				=> $level,
				'name'				=> $name,
				'username'			=> $username,
				'gender'			=> $gender,
				'password'			=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'is_active'			=> 1
			];

            $this->db->set('level', $level);
            $this->db->set('name', $name);
            $this->db->set('username', $username);
            $this->db->set('gender', $gender);
            $this->db->set('password', $password);
            $this->db->where('id', $id);
            $this->db->update('user');
            $this->session->set_flashdata('add-success', 'Success');
            redirect('admin/user');
        }
    }

	public function userDelete($id)
	{
        $this->db->delete('user', ['id' => $id]);
        $this->session->set_flashdata('delete', 'Deleted');
        redirect('admin/user');
	}

	// public function userAdd()
	// {
	// 	$data['title'] = "Add New User";
	// 	$data['users'] = $this->db->get('user')->result_array();

	// 	$this->form_validation->set_rules('level', 'Level', 'required|trim');
	// 	$this->form_validation->set_rules('name', 'Name', 'required|trim');
	// 	$this->form_validation->set_rules('username', 'Username', 'required|trim|valid_email|is_unique[user.email]', [
	// 		'is_unique' => 'this email has already registered!'
	// 	]);
	// 	$this->form_validation->set_rules('gender', 'Gender', 'required|trim');
	// 	$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]');
	// 	$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password1]');

	// 	if ($this->form_validation->run() == FALSE) {
	// 		$this->load->view('templates/header', $data);
	// 		$this->load->view('templates/sidebar', $data);
	// 		$this->load->view('admin/user/add', $data);
	// 		$this->load->view('templates/footer');
	// 	} else {
	// 		$data = [
	// 			'level'				=> $this->input->post('level'),
	// 			'name'				=> $this->input->post('name'),
	// 			'gender'			=> $this->input->post('gender'),
	// 			'email'				=> $this->input->post('email', true),
	// 			'password'			=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
	// 			'is_active'			=> 1
	// 		];
	// 		$this->db->insert('user', $data);
	// 		$this->session->set_flashdata('add-success', 'Success');
	// 		redirect('admin/user');
	// 	}
	// }
}
