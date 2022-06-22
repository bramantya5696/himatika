<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/dashboardheader', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/dashboardfooter');
    }
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/dashboardheader', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('template/dashboardfooter');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('role', '<div class="notif alert-success">
                    Role baru telah ditambahkan
                </div>');
            redirect('admin/role');
        }
    }

    public function deleterole($role_id)
    {
        $this->db->where('id', $role_id);
        $this->db->delete('user_role');
        $this->session->set_flashdata('role', '<div class="notif alert-success">
                    Role telah dihapus
                </div>');
        redirect('admin/role');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Akses Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $this->db->where('id !=',  1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('template/dashboardheader', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('template/dashboardfooter');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('access-changed', '<div class="notif alert-success">
        Akses diubah
      </div>');
    }

    public function listmember()
    {
        $data['title'] = 'List Member';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $query = "SELECT user.* , user_role.role
            FROM user JOIN user_role
            ON user.role_id = user_role.id";

        $data['member'] = $this->db->query($query)->result_array();

        $this->load->view('template/dashboardheader', $data);
        $this->load->view('admin/listmember', $data);
        $this->load->view('template/dashboardfooter');
    }

    public function deleteuser($user_id)
    {
        $this->db->where('id', $user_id);
        $this->db->delete('user');

        $this->session->set_flashdata('listmember', '<div class="notif alert-success">
                    Member telah dihapus
                </div>');
        redirect('admin/listmember');
    }

    public function editmember($user_id)
    {
        $data['title'] = 'Edit Member';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['member'] = $this->db->get_where('user', ['id' => $user_id])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('template/dashboardheader', $data);
        $this->load->view('admin/editmember', $data);
        $this->load->view('template/dashboardfooter');
    }

    public function setmember()
    {
        $member_id = $this->input->post('id');
        $role_id = $this->input->post('role-id');

        $this->db->set('role_id', $role_id);
        $this->db->where('id', $member_id);
        $this->db->update('user');
        $this->session->set_flashdata('listmember', '<div class="notif alert-success">
        Member telah diperbarui
      </div>');
        redirect('admin/listmember');
    }

    public function article()
    {
        $data['title'] = 'List Artikel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $query = "SELECT base_articles_list.* , base_articles.artcs_topic
            FROM base_articles_list JOIN base_articles
            ON base_articles_list.artc_id = base_articles.id";

        $data['articles'] = $this->db->query($query)->result_array();

        $this->load->view('template/dashboardheader', $data);
        $this->load->view('admin/article', $data);
        $this->load->view('template/dashboardfooter');
    }
    public function createarticle()
    {
        $data['title'] = 'Buat Artikel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['article'] = $this->db->get('base_articles')->result_array();
        $new_image = 'default.png';

        $this->form_validation->set_rules('artctitle', 'Article Title', 'required|trim');
        $this->form_validation->set_rules('publisher', 'Publisher', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/dashboardheader', $data);
            $this->load->view('admin/createarticle', $data);
            $this->load->view('template/dashboardfooter');
        } else {
            $upload_artc_image = $_FILES['mainimagefile']['name'];
            if ($upload_artc_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/himatika/article/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('mainimagefile')) {
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = [
                'artc_id' => $this->input->post('artcid'),
                'artc_title' => $this->input->post('artctitle'),
                'artc_image' => $new_image,
                'artc_description' => $this->input->post('description'),
                'artc_publisher' => $this->input->post('publisher'),
                'artc_date_created' => time(),
                'artc_publisher_link' => $this->input->post('publisherlink'),
            ];
            $this->db->insert('base_articles_list', $data);
            $this->session->set_flashdata('createarticle', '<div class="notif alert-success">
        Artikel telah dibuat
      </div>');
            redirect('admin/createarticle');
        }
    }
    public function deletearticle($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('base_articles_list');

        $this->session->set_flashdata('article', '<div class="notif alert-success">
                    Artikel telah dihapus
                </div>');
        redirect('admin/article');
    }
    public function editarticle($id)
    {
        $data['title'] = 'Edit Artikel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['sel_article'] = $this->db->get_where('base_articles_list', ['id' => $id])->row_array();
        $data['article'] = $this->db->get('base_articles')->result_array();

        $this->load->view('template/dashboardheader', $data);
        $this->load->view('admin/editarticle', $data);
        $this->load->view('template/dashboardfooter');
    }
    public function changearticle()
    {
        $id = $this->input->post('id');
        $data['sel_article'] = $this->db->get_where('base_articles_list', ['id' => $id])->row_array();
        $artc_title = $this->input->post('artctitle');
        $artc_id = $this->input->post('artcid');
        $artc_description = $this->input->post('description');
        $artc_publisher = $this->input->post('publisher');
        $artc_publisher_link = $this->input->post('publisherlink');
        $upload_artc_image = $_FILES['mainimagefileedit']['name'];
        if ($upload_artc_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/himatika/article/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('mainimagefileedit')) {
                $old_image = $data['sel_article']['artc_image'];
                $new_image = $this->upload->data('file_name');
                var_dump($new_image);
                die;
                if ($old_image != 'default.svg') {
                    unlink(FCPATH . 'assets/himatika/article/' . $old_image);
                }
                $this->db->set('artc_image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('artc_title', $artc_title);
        $this->db->set('artc_id', $artc_id);
        $this->db->set('artc_description', $artc_description);
        $this->db->set('artc_publisher', $artc_publisher);
        $this->db->set('artc_publisher_link', $artc_publisher_link);
        $this->db->where('id', $id);
        $this->db->update('base_articles_list');
        $this->session->set_flashdata('article', '<div class="notif alert-success">
                Artikel telah diubah
            </div>');
        redirect('admin/article');
    }
}
