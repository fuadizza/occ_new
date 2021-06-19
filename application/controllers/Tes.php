<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tes extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('case', 'form case', 'required');
        $this->form_validation->set_rules('subcase', 'form subcase', 'required');

    	if ($this->form_validation->run() == FALSE) {
    		$data['title'] = 'tes';
	 		$this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('tes', $data);
            $this->load->view('templates/footer');
		} else {

    	$data = [
            'case' => $this->input->post('case'),
            'sub_case' => $this->input->post('subcase'),
            'value' => implode(', ', $this->input->post( 'value' , TRUE ))
        ];
            $this->db->insert('tbl_thor', $data);
            $this->session->set_flashdata('add-success', 'Success');
            redirect('user');
		}
    }

}