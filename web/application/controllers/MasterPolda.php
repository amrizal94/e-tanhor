<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterPolda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Polda_model', 'polda');
    }
    public function index()
    {
        $this->data['sub_title'] = 'Polda';
        $this->data['title'] = 'Master ' . $this->data['sub_title'];
        $this->data['list_polda'] = $this->polda->list_polda($this->data['user']['level_user_id']);
        $this->data['optioncss'] = array('vendor/datatables/dataTables.bootstrap4.min.css');
        $this->data['optionjs'] = array(
            'vendor/datatables/jquery.dataTables.min.js',
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'js/demo/datatables-demo.js',
        );
        $this->load->view('templates/header', $this->data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $this->data);
        $this->load->view('master/polda', $this->data);
        $this->load->view('templates/footer', $this->data);
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name of Polda', 'required');
    }
}
