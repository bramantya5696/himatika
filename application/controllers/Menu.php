<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Manajemen Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/dashboardheader', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('template/dashboardfooter');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('menu', '<div class="notif alert-success">
                    Menu baru telah ditambahkan
                </div>');
            redirect('menu');
        }
    }
    public function deletemenu($menu_id)
    {
        $this->db->where('id', $menu_id);
        $this->db->delete('user_menu');
        $this->session->set_flashdata('menu', '<div class="notif alert-success">
                    Menu telah dihapus
                </div>');
        redirect('menu');
    }
    public function submenu()
    {
        $data['title'] = 'Manajemen Sub Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('template/dashboardheader', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('template/dashboardfooter');
        } else {
            if ($this->input->post('is_active')) {
                $is_active = 1;
            } else {
                $is_active = 0;
            }
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $is_active
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('submenu', '<div class="notif alert-success">Sub Menu sudah ditambahkan</div>');
            redirect('menu/submenu');
        }
    }
    public function deletesubmenu($submenu_id)
    {
        $this->db->where('id', $submenu_id);
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata('submenu', '<div class="notif alert-success">
                    Submenu telah dihapus
                </div>');
        redirect('menu/submenu');
    }

    public function editsubmenu($submenu_id)
    {
        $data['title'] = 'Edit Sub Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['submenu_id'] = $submenu_id;

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['selected_sm'] = $this->db->get_where('user_sub_menu', ['id' => $submenu_id])->row_array();

        // $this->form_validation->set_rules('title', 'Title', 'required');
        // $this->form_validation->set_rules('url', 'URL', 'required');
        // $this->form_validation->set_rules('icon', 'Icon', 'required');

        $this->load->view('template/dashboardheader', $data);
        $this->load->view('menu/editsubmenu', $data);
        $this->load->view('template/dashboardfooter');

        // if ($this->input->post('is_active')) {
        //     $is_active = 1;
        // } else {
        //     $is_active = 0;
        // }
        // $title = $this->input->post('title');
        // $menu = $this->input->post('menu_id');
        // $url = $this->input->post('url');
        // $icon = $this->input->post('icon');
        // $is_active = $this->input->post('is_active');

        // $this->db->set('title', $title);
        // $this->db->set('menu_id', $menu);
        // $this->db->set('url', $url);
        // $this->db->set('icon', $icon);
        // $this->db->set('is_active', $is_active);
        // $this->db->where('id', $submenu_id);
        // $this->db->update('user_sub_menu');
        // $this->session->set_flashdata('submenu', '<div class="notif alert-success">
        //         Submenu telah diubah
        //     </div>');
        // redirect('menu/submenu');

    }

    public function changesubmenu()
    {
        if ($this->input->post('is_active')) {
            $is_active = 1;
        } else {
            $is_active = 0;
        }
        $submenu_id = $this->input->post('submenu_id');
        $title = $this->input->post('title');
        $menu = $this->input->post('menu_id');
        $url = $this->input->post('url');
        $icon = $this->input->post('icon');

        $this->db->set('title', $title);
        $this->db->set('menu_id', $menu);
        $this->db->set('url', $url);
        $this->db->set('icon', $icon);
        $this->db->set('is_active', $is_active);
        $this->db->where('id', $submenu_id);
        $this->db->update('user_sub_menu');
        $this->session->set_flashdata('submenu', '<div class="notif alert-success">
                Submenu telah diubah
            </div>');
        redirect('menu/submenu');
    }
}
