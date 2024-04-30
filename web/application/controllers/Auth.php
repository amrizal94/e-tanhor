<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id') && $this->router->method != 'logout') {
            redirect('dasboard');
        }
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->data['title'] = 'Login';
            $this->load->view('templates/auth_header', $this->data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $input = [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
            ];

            $user = $this->db->get_where('user', [
                'username' => $input['username']
            ])->row_array();

            if (!$user) {
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                    Username not registered!
                </div>');
                redirect('auth');
            }
            if ($user['is_active'] == 0) {
                $this->session->set_flashdata('username', $input['username']);
                $this->session->set_flashdata('message', '
                <div class="alert alert-warning" role="alert">
                your account is inactive!
                </div>');
                redirect('auth');
            }
            if (!password_verify($input['password'], $user['password'])) {
                $this->session->set_flashdata('username', $input['username']);
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                    Wrong password!
                </div>');
                redirect('auth');
            }
            $this->db->set('is_login', 1);
            $this->db->where('id', $user['id']);
            $this->db->update('user');
            $this->session->set_userdata([
                'id' => $user['id']
            ]);
            if ($this->session->userdata('last_url')) {
                redirect($this->session->userdata('last_url'));
            }
            redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[repassword]', [
            'matches' => 'The Password field does not match',
            'min_lenght' => 'The Password too short'
        ]);
        $this->form_validation->set_rules('repassword', 'Repeat Password', 'matches[password]');
        if ($this->form_validation->run()) {
            $username = htmlspecialchars($this->input->post('username', true));
            $data = [
                'username' => $username,
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];
            $token = urldecode(base64_encode(random_bytes(32)));
            $user_token = [
                'username' => $username,
                'token' => $token,
                'created_at' => date("Y-m-d H:i:s", now())
            ];
            $this->db->insert('user_token', $user_token);
            $this->db->insert('user', $data);
            $this->_sendEmail($token, 'activate');
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Congratulation! your account has been created. Please activate your account
            </div>');
            redirect('auth');
        }
        $this->data['title'] = 'Register';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/register');
        $this->load->view('templates/auth_footer');
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'arimrizal94@gmail.com',
            'smtp_pass' => 'sxnhxupepesfpmhq',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->from('noreply@etanhor.com', 'E-Tanhor');
        $this->email->to('arimrizal95@gmail.com');
        if ($type == 'activate') {
            $subject = 'activation account ' . $this->input->post('username');
            $this->email->subject($subject);
            $this->email->message('Click this link to activate your account: <a href="' . base_url() . 'auth/activate?username=' . $this->input->post('username') . '&token=' . $token . '">Activate</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
        }
    }

    public function activate()
    {
        $username = $this->input->get('username');
        $token = htmlspecialchars($this->input->get('token', true));
        $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
        if ($user_token) {
            if ((time() - strtotime($user_token['created_at'])) < hours(7)) {
                $this->db->set('is_active', 1);
                $this->db->where('username', $username);
                $this->db->update('user');
                $this->db->delete('user_token', ['username' => $username, 'token' => $token]);
                $this->session->set_flashdata('message', '
                <div class="alert alert-success" role="alert">
                    Congratulation! your account has been activated.
                </div>');
                redirect('auth');
            } else {
                $this->db->delete('user', ['username' => $username]);
                $this->db->delete('user_token', ['username' => $username, 'token' => $token]);
                $this->session->set_flashdata('message', '
            <div class="alert alert-danger" role="alert">
                Account activation failed!. Token is expired
            </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger" role="alert">
                Account activation failed!. Incorrect credentials
            </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $data = array(
            'last_logout' =>  date("Y-m-d H:i:s", now()),
            'is_login' => 0,
        );
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('user', $data);
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('expired');
        $this->session->unset_userdata('last_url');
        $this->session->set_flashdata('message', '
            <div class="alert alert-info" role="alert">
                You have been logout!
            </div>');
        redirect('auth');
    }
}
