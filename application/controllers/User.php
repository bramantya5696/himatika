<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/dashboardheader', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/dashboardfooter');
    }
    public function editprofile()
    {
        $data['title'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim', [
            'required' => 'form ini harus diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('template/dashboardheader', $data);
            $this->load->view('user/editprofile', $data);
            $this->load->view('template/dashboardfooter');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $nrp = $this->input->post('nrp');
            $sti = $this->input->post('sti');

            $this->db->set('name', $name);
            $this->db->set('nrp', $nrp);
            $this->db->set('sti', $sti);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('profil', '<div class="notif alert-success">
            Profil telah diubah
          </div>');
            redirect('user');
        }
    }

    public function changepassword()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current-password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new-password', 'New Password', 'required|trim|min_length[3]|matches[repeat-password]');
        $this->form_validation->set_rules('repeat-password', 'Repeat Password', 'required|trim|matches[new-password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/dashboardheader', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('template/dashboardfooter');
        } else {
            $current_password = $this->input->post('current-password');
            $new_password = $this->input->post('new-password');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('notif-changepassword', '<div class="notif alert-danger">
                Password lama yang dimasukkan salah!
                </div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('notif-changepassword', '<div class="notif alert-danger">
                    Password baru tidak boleh sama dengan password lama 
                    </div>');
                    redirect('user/changepassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('notif-changepassword', '<div class="notif alert-success">
                    Password telah diganti!
                    </div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
