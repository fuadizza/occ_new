<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cases extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); //function helpper untuk membatasi akses user
    }

    public function index()
    {
        $data['title'] = "Case";

        //mengambil data user dari db dengan menseleksi dengan data id yangs sama dengan id yg di set
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->db->select('case.*'); //mengambil semua case dari database
        $this->db->from('case');
        $data['case'] = $this->db->get()->result_array();


        //var_dump($data['user']);
        //die;

        $this->form_validation->set_rules('case_name', 'Case_name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/cases/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data_to_db = [
                'name' => $this->input->post('case_name'),
            ];
            $this->db->insert('case', $data_to_db);
            $this->session->set_flashdata('add-success', 'Success');
            redirect('admin/cases');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Case";

        $this->form_validation->set_rules('case', 'Case', 'required');

        $this->db->select('*');
        $this->db->from('case');
        $this->db->where('id', $id);
        $data['case'] = $this->db->get()->row_array();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/cases/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('case');

            $this->db->set('name', $name);
            $this->db->where('id', $id);
            $this->db->update('case');
            $this->session->set_flashdata('add-success', 'Success');
            redirect('admin/cases');
        }
    }

    public function delete($id)
    {
        $this->db->delete('case', ['id' => $id]);
        $this->session->set_flashdata('delete', 'Deleted');
        redirect('admin/cases');
    }
}
