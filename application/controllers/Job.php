<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Job extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); //function helpper untuk membatasi akses user
    }

    public function index()
    {
        $data['title'] = "Job";

        //mengambil data user dari db dengan menseleksi dengan data id yangs sama dengan id yg di set
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->db->select('job.*');
        $this->db->from('job');
        $data['jobs'] = $this->db->get()->result_array();

        $data['tasks'] = $this->db->get('task')->result_array();
        $data['cases'] = $this->db->get('case')->result_array();
        $data['sub_cases'] = $this->db->get('sub_case')->result_array();

        $this->form_validation->set_rules('task', 'Task', 'required');
        $this->form_validation->set_rules('case', 'Case', 'required');
        $this->form_validation->set_rules('sub_case', 'Sub_case', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/job/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data_to_db = [
                'task_id' => $this->input->post('task'),
                'case_id' => $this->input->post('case'),
                'sub_case_id' => $this->input->post('sub_case'),
            ];
            $this->db->insert('job', $data_to_db);
            $this->session->set_flashdata('add-success', 'Success');
            redirect('admin/job');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Job";

        $this->form_validation->set_rules('task', 'Task', 'required');
        $this->form_validation->set_rules('case', 'Case', 'required');
        $this->form_validation->set_rules('sub_case', 'Sub Case', 'required');

        $this->db->select('*');
        $this->db->from('job');
        $this->db->where('id', $id);
        $data['job'] = $this->db->get()->row_array();

        $data['task_list'] = $this->db->get_where('task')->result_array();
        $data['case_list'] = $this->db->get_where('case')->result_array();
        $data['sub_case_list'] = $this->db->get_where('sub_case')->result_array();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/job/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $task = $this->input->post('task');
            $case = $this->input->post('case');
            $sub_case = $this->input->post('sub_case');

            $this->db->set('task_id', $task, 'case_id', $case, 'sub_case_id', $sub_case);
            $this->db->where('id', $id);
            $this->db->update('job');
            $this->session->set_flashdata('add-success', 'Success');
            redirect('admin/job');
        }
    }

    public function delete($id)
    {
        $this->db->delete('job', ['id' => $id]);
        $this->session->set_flashdata('delete', 'Deleted');
        redirect('admin/job');
    }
}
