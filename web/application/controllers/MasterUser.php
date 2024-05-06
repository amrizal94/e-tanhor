<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterUser extends CI_Controller
{
    public function index()
    {
        $this->data['sub_title'] = 'User';
        $this->data['title'] = 'Master ' . $this->data['sub_title'];
        $this->data['optioncss'] = array(
            base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css'),
            'https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.bootstrap4.css',
            'https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap4.css',
        );
        $this->data['optionjs'] = array(
            base_url('assets/vendor/datatables/jquery.dataTables.min.js'),
            base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'),
            'https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.js',
            'https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.js',
        );
        $this->load->view('templates/header', $this->data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $this->data);
        $this->load->view('master/user', $this->data);
        $this->load->view('templates/footer', $this->data);
    }

    public function list()
    {
        if (!$this->input->is_ajax_request()) {
            redirect('auth');
        }

        $this->data['list_users'] = $this->user->list_users($this->data['user']['level_user_id']);
        $response = [
            'data' => $this->load->view('master/user/table_user_list', $this->data, true)
        ];
        echo json_encode($response);
    }

    public function modaluseradd()
    {
        if (!$this->input->is_ajax_request()) {
            redirect('auth');
        }
        if ($this->session->userdata('expired') < time()) {
            $response = [
                'data' => "reload"
            ];
            echo json_encode($response);
        } else {
            $this->data['sub_title'] = 'User';
            $this->data['list_level_user'] = $this->db->get('level_user');
            $this->data['list_directorate'] = $this->db->get('directorate');
            $response = [
                'data' => $this->load->view('master/user/modal_user_add', $this->data, true)
            ];
            echo json_encode($response);
        }
    }

    public function save()
    {

        if (!$this->input->is_ajax_request()) {
            redirect('auth');
        }
        $this->data['sub_title'] = 'User';
        $this->data['list_level_user'] = $this->db->get('level_user');
        $this->data['list_directorate'] = $this->db->get('directorate');
        $response = [
            'data' => $this->load->view('master/user/modal_user_add', $this->data, true)
        ];
        echo json_encode($response);
    }
}
