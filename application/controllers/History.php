<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{

    public function index()
    {
        $this->db->select('user_log.*, task.task_name, user.name');
        $this->db->from('user_log');
        $this->db->join('task', 'user_log.task_id = task.id_task');
        $this->db->join('user', 'user_log.id_user = user.id');
        $this->db->where('user_log.log_id', $this->session->userdata('log_id'));
        $data['user'] = $this->db->get()->row_array();
        
        $this->db->select('dummy_history_job.*');
        $this->db->from('dummy_history_job');
        $this->db->where('user_log', $this->session->userdata('log_id'));
        $data['user'] = $this->db->get()->row_array();

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'tes';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('history', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'case' => $this->input->post('case'),
                'sub_case' => $this->input->post('subcase'),
                'value' => implode(', ', $this->input->post('value', TRUE))
            ];
            $this->db->insert('tbl_thor', $data);
            $this->session->set_flashdata('add-success', 'Success');
            redirect('user');
        }
    }
}
