<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Login - OCC Monitoring LinkAja";

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		//Pengecekan apakah sudah login atau belum
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/layout/header', $data);
			$this->load->view('auth/index', $data);
			$this->load->view('auth/layout/footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username'); //inisiasi email
		$password = $this->input->post('password'); // inisiasi password

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		// jika data user sudah ada
		if ($user) {
			// cek password dari user
			if (password_verify($password, $user['password'])) {


				//menyimpan id dan level dari data user kedalam array data
				$data = [
					'id' => $user['id'],
					'level' => $user['level'],
				];

				$this->session->set_userdata($data); //setdata ke sesion

				if ($user['level'] == 1) {
					redirect('admin');
				} else {
					redirect('auth/task', $data);
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">password salah! </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> email belum terdaftar! </div>');
			redirect('auth');
		}
	}

	public function task()
	{
		$data['title'] = "Login sebagai member - OCC Monitoring LinkAja";
		$id = $this->session->userdata('id');
		$user = $this->db->get_where('user', ['id' => $id])->row_array();
		$data['task'] = $this->db->get('task')->result_array(); //memngambil data task di database
		//nilai 1 untuk thor, 2 untuk thanos, 3 untuk spiderman
		//data disimpan di array data

		$this->form_validation->set_rules('shift', 'Shift', 'required|trim');
		$this->form_validation->set_rules('task', 'Task', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/layout/header', $data);
			$this->load->view('auth/task', $data);
			$this->load->view('auth/layout/footer');
		} else {

			$log_id = time();
			$level = $user['level'];
			$shift = $this->input->post('shift');
			$task_id = $this->input->post('task');

			$data_to_user_log = [
				'log_id' => $log_id,
				'id_user' => $id,
				'task_id' => $task_id,
				'shift' => $shift
			];

			$data = [
				'log_id' => $log_id,
				'id' => $id,
				'level' => $level,
				'shift' => $shift,
				'task' => $task_id
			];

			$this->db->insert('user_log', $data_to_user_log);

			$this->session->set_userdata($data);
			$this->session->set_flashdata('message', 'berhasil');
			redirect('user', 'refresh');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('shift');
		$this->session->unset_userdata('task');
		$this->session->sess_destroy();
		redirect('auth', 'refresh');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
