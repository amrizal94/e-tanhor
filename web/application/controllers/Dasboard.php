<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasboard extends CI_Controller
{
    public function index()
    {
        $this->data['title'] = 'Dasboard';
        $this->data['user'] = $this->user->user_data($this->session->userdata('id'));
        $this->data['optioncss'] = array('vendor/datatables/dataTables.bootstrap4.min.css');
        $this->data['optionjs'] = array(
            'vendor/datatables/jquery.dataTables.min.js',
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'js/demo/datatables-demo.js',
        );
        $this->load->view('templates/header', $this->data);
        $this->load->view('templates/sidebar', $this->data);
        $this->load->view('templates/topbar', $this->data);
        $this->load->view('dasboard', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
}
