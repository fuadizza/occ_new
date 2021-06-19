<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'History Monitoring';

        // $this->db->select('user_log.*, task.task_name, user.name');
        // $this->db->from('user_log');
        // $this->db->join('task', 'user_log.task_id = task.id_task');
        // $this->db->join('user', 'user_log.id_user = user.id');
        // $this->db->where('user_log.log_id', $this->session->userdata('log_id'));
        // $data['user'] = $this->db->get()->row_array();

        //$data['shift'] = $this->session->userdata('shift');

        $this->db->select('dummy_history_job.*,user.name');
        $this->db->from('dummy_history_job');
        $this->db->join('user', 'dummy_history_job.id_user = user.id');
        $data['monitoring'] = $this->db->get()->result_array();

        //$this->db->select('dummy_history_job.*');
        //$this->db->from('dummy_history_job');
        //$this->db->where('user_log', $this->session->userdata('log_id'));
        //$data['user'] = $this->db->get()->row_array();

        $this->form_validation->set_rules('user_log', 'user', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/monitoring/index', $data);
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
            $this->load->view('admin/monitoring/detail', $data);
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
            redirect('admin/history');

            // $this->db->insert('dummy_history_job', $data);
            // $this->session->set_flashdata('add-success', 'Success');
            // redirect('user');
        }
    }
}