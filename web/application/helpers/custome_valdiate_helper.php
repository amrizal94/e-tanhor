<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('custome_valdiate')) {
    function custome_valdiate($input, $label, $rules, $errors)
    {

        $ci = get_instance();
        if ($ci->session->userdata('expired') < time()) {
            $ci->session->set_flashdata('message', '
            <div class="alert alert-info" role="alert">
                Your session is expired!, please login again.
            </div>
            ');
            $response = [
                'status' => 'expired',
                'data' => $ci->load->view('master/user/modal_relog', $ci->data, true)
            ];
            return $response;
        }
        if (!$ci->session->userdata('expired')) {
            $ci->session->set_flashdata('message', '
            <div class="alert alert-warning" role="alert">
                Please login first!
            </div>
            ');
            $response = [
                'status' => 'reload',
            ];
            echo json_encode($response);
            return $response;
        }
        $ci->form_validation->set_rules($input, $label, $rules, $errors);
        if (!$ci->form_validation->run()) {
            $response = [
                'error' => form_error($input)
            ];
            return $response;
        } else {
            $response = [
                'status' => 200,
            ];
            return $response;
        }
    }
}
