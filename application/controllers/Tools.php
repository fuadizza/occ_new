<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tools extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Tools';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tool/index', $data);
        $this->load->view('templates/footer');
    }
}