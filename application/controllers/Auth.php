<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Login HIMATIKA";
            $this->load->view('template/authheader', $data);
            $this->load->view('auth/login');
            $this->load->view('template/authfooter');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Email atau password tidak teregistrasi
                </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email belum diaktivasi
            </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email atau password tidak teregistrasi
            </div>');
            redirect('auth');
        }
    }

    public function register()
    {
        $data['title'] = "Register HIMATIKA";
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has been registered'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[repeat-password]');
        $this->form_validation->set_rules('repeat-password', 'Password', 'required|trim|matches[password]');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/authheader', $data);
            $this->load->view('auth/register');
            $this->load->view('template/authfooter');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Registrasi berhasil, silahkan login!
          </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Anda telah keluar
      </div>');
        redirect('auth');
    }

    public function forgotpassword()
    {
        $data['title'] = 'Lupa Password?';
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/authheader', $data);
            $this->load->view('auth/forgotpassword');
            $this->load->view('template/authfooter');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email])->row_array();
            if ($user) {
                $this->session->set_userdata('resetpassword', $email);
                $this->resetpassword();
            } else {
                $this->session->set_flashdata('forgotpassword', '<div class="alert alert-danger" role="alert">
        Email tidak terdaftar
      </div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetpassword()
    {
        $data['title'] = 'Reset Password';
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[repeat-password]');
        $this->form_validation->set_rules('repeat-password', 'Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/authheader', $data);
            $this->load->view('auth/resetpassword');
            $this->load->view('template/authfooter');
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('resetpassword');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('resetpassword');

            $this->session->set_flashdata('reset-password-success', '<div class="alert alert-success">
        Password telah diganti
      </div>');
            redirect('auth');
        }
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
