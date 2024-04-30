<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterUser extends CI_Controller
{
    public function index()
    {
        $this->data['sub_title'] = 'User';
        $this->data['title'] = 'Master ' . $this->data['sub_title'];
        $this->data['user'] = $this->user->user_data($this->session->userdata('id'));
        $this->data['list_users'] = $this->user->list_users($this->data['user']['level_user_id']);
        $this->data['optioncss'] = array('vendor/datatables/dataTables.bootstrap4.min.css');
        $this->data['optionjs'] = array(
            'vendor/datatables/jquery.dataTables.min.js',
            'vendor/datatables/dataTables.bootstrap4.min.js',
            'js/demo/datatables-demo.js',
        );
        $this->load->view('templates/header', $this->data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $this->data);
        $this->load->view('master/user', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
}
