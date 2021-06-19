<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in(); //function helpper untuk membatasi akses user
	}

	public function index()
	{
		$this->db->select('user_log.*, task.task_name, user.name');
		$this->db->from('user_log');
		$this->db->join('task', 'user_log.task_id = task.id_task');
		$this->db->join('user', 'user_log.id_user = user.id');
		$this->db->where('user_log.log_id', $this->session->userdata('log_id'));
		$data['user'] = $this->db->get()->row_array();

		$data['title'] = "Dashboard User";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function monitoring()
	{
		$data['title'] = "Monitoring";

		$this->db->select('user_log.*, task.task_name, user.name');
		$this->db->from('user_log');
		$this->db->join('task', 'user_log.task_id = task.id_task');
		$this->db->join('user', 'user_log.id_user = user.id');
		$this->db->where('user_log.log_id', $this->session->userdata('log_id'));
		$data['user'] = $this->db->get()->row_array();


		$this->db->select('case.name, job.id, job.sub_case_id');
		$this->db->from('job');
		$this->db->join('case', 'case.id = job.case_id');
		$this->db->join('sub_case', 'sub_case.id = job.sub_case_id');
		$this->db->where('job.task_id', $this->session->userdata('task'));

		$data['job'] = $this->db->get()->result_array();

		$data['shift'] = $this->session->userdata('shift');

		$this->form_validation->set_rules('user_log', 'user', 'required');
		$this->form_validation->set_rules('id_user', 'id user', 'required');
		$this->form_validation->set_rules('task', 'task', 'required');
		$this->form_validation->set_rules('shift', 'shift', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('user/monitoring/index', $data);
			$this->load->view('templates/footer');
		} else {

			$value = serialize($this->input->post('value'));

			$data = [
				'user_log' => $this->input->post('user_log'),
				'id_user' => $this->input->post('id_user'),
				'task' => $this->input->post('task'),
				'shift' => $this->input->post('shift'),
				'job_id' => implode(', ', $this->input->post('job', TRUE)),
				//'value' => implode(', ', $this->input->post('value', TRUE))
				'value' => $value,
				'noted' => $this->input->post('noted')
			];
			$this->db->insert('dummy_history_job', $data);
			$this->session->set_flashdata('add-success', 'Success');
			redirect('user');
		}
	}

	public function history()
	{
		$data['title'] = 'History Monitoring';

		// $this->db->select('user_log.*, task.task_name, user.name');
		// $this->db->from('user_log');
		// $this->db->join('task', 'user_log.task_id = task.id_task');
		// $this->db->join('user', 'user_log.id_user = user.id');
		// $this->db->where('user_log.log_id', $this->session->userdata('log_id'));
		// $data['user'] = $this->db->get()->row_array();

        $data['shift'] = $this->session->userdata('shift');

        $this->db->select('*');
		$this->db->from('dummy_history_job');
		$this->db->where('id_user', $this->session->userdata('id'));
		$data['monitoring'] = $this->db->get()->result_array();

        $this->db->select('dummy_history_job.*');
        $this->db->from('dummy_history_job');
        $this->db->where('user_log', $this->session->userdata('log_id'));
        $data['user'] = $this->db->get()->row_array();

		$this->form_validation->set_rules('user_log', 'user', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/monitoring/history', $data);
            $this->load->view('templates/footer');
        } else {

            $value = serialize($this->input->post('value'));

			$data = [
				'user_log' => $this->input->post('user_log'),
				'job_id' => implode(', ', $this->input->post('job', TRUE)),
				//'value' => implode(', ', $this->input->post('value', TRUE))
				'value' => $value,
				'noted' => $this->input->post('noted')
			];
			$this->db->insert('dummy_history_job', $data);
			$this->session->set_flashdata('add-success', 'Success');
			redirect('user');
        }
	}

	public function detail($id)
	{
		$data['title'] = 'History Monitoring';

		// $this->db->select('user_log.*, task.task_name, user.name');
		// $this->db->from('user_log');
		// $this->db->join('task', 'user_log.task_id = task.id_task');
		// $this->db->join('user', 'user_log.id_user = user.id');
		// $this->db->where('user_log.log_id', $this->session->userdata('log_id'));
		// $data['user'] = $this->db->get()->row_array();

        $data['shift'] = $this->session->userdata('shift');

  //       $this->db->select('*');
		// $this->db->from('dummy_history_job');
		// $this->db->where('id_user', $this->session->userdata('id'));
		// $data['monitoring'] = $this->db->get()->result_array();

        $this->db->select('dummy_history_job.*');
        $this->db->from('dummy_history_job');
        $this->db->where('id', $id);
        $data['user'] = $this->db->get()->row_array();

		$this->form_validation->set_rules('noted', 'Noted', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/monitoring/detail', $data);
            $this->load->view('templates/footer');
        } else {

            $value = serialize($this->input->post('value'));
            $noted = $this->input->post('noted');

			$data = [
				'value' => $value,
				'noted' => $noted
			];

			$this->db->set('value', $value);
			$this->db->set('noted', $noted);
            $this->db->where('id', $id);
            $this->db->update('dummy_history_job');
            $this->session->set_flashdata('add-success', 'Success');
            redirect('user/history');

			// $this->db->insert('dummy_history_job', $data);
			// $this->session->set_flashdata('add-success', 'Success');
			// redirect('user');
        }
	}

	public function noted()
	{
		$data['title'] = "Catatan Monitoring";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('user/monitoring/noted', $data);
		$this->load->view('templates/footer');
	}
}
