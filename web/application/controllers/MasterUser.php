<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterUser extends CI_Controller
{
    public function index()
    {
        $this->data['sub_title'] = 'User';
        $this->data['title'] = 'Master ' . $this->data['sub_title'];
        $this->data['list_users'] = $this->user->list_users($this->data['user']['level_user_id']);
        $this->data['list_level_user'] = $this->db->get('level_user');
        $this->data['list_directorate'] = $this->db->get('directorate');
        $this->data['cdncss'] = array(
            'https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.bootstrap4.css',
            'https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap4.css',
        );
        $this->data['optioncss'] = array(
            'vendor/datatables/dataTables.bootstrap4.min.css',
        );
        $this->data['cdnjs'] = array(
            'https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.js',
            'https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.js',
        );
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
