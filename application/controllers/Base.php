<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Base extends CI_Controller
{

    public function index()
    {
        $data['title'] = "HIMATIKA ITS";
        $this->load->view('template/basenavbar', $data);
        $this->load->view('base/index');
        $this->load->view('template/basefooter');
    }
    public function about()
    {
        $data['title'] = "Tentang HIMATIKA ITS";
        $this->load->view('template/basenavbar', $data);
        $this->load->view('base/about');
        $this->load->view('template/basefooter');
    }
    public function calendar()
    {
        $data['title'] = "Kalender HIMATIKA ITS";
        $this->load->view('template/basenavbar', $data);
        $this->load->view('base/calendar');
        $this->load->view('template/basefooter');
    }
    public function contact()
    {
        $data['title'] = "Kontak HIMATIKA ITS";
        $this->load->view('template/basenavbar', $data);
        $this->load->view('base/contact');
        $this->load->view('template/basefooter');
    }
    public function eksploraksi()
    {
        $data['title'] = "Eksploraksi";
        $this->load->view('template/basenavbar', $data);
        $this->load->view('base/eksploraksi');
        $this->load->view('template/basefooter');
    }
    public function karsabakti()
    {
        $data['title'] = "Karsa Bakti";
        $this->load->view('template/basenavbar', $data);
        $this->load->view('base/karsabakti');
        $this->load->view('template/basefooter');
    }
    public function griyarekasa()
    {
        $data['title'] = "Griya Rekasa";
        $this->load->view('template/basenavbar', $data);
        $this->load->view('base/griyarekasa');
        $this->load->view('template/basefooter');
    }
    public function bahteracipta()
    {
        $data['title'] = "Bahtera Cipta";
        $this->load->view('template/basenavbar', $data);
        $this->load->view('base/bahteracipta');
        $this->load->view('template/basefooter');
    }
    public function baraaksi()
    {
        $data['title'] = "Bara Aksi";
        $this->load->view('template/basenavbar', $data);
        $this->load->view('base/baraaksi');
        $this->load->view('template/basefooter');
    }
    public function sinergihimatika()
    {
        $data['title'] = "Sinergi HIMATIKA";
        $this->load->view('template/basenavbar', $data);
        $this->load->view('base/sinergihimatika');
        $this->load->view('template/basefooter');
    }
    public function generatorhimatika()
    {
        $data['title'] = "Generator HIMATIKA";
        $this->load->view('template/basenavbar', $data);
        $this->load->view('base/generatorhimatika');
        $this->load->view('template/basefooter');
    }
    public function nyalapelitahimatika()
    {
        $data['title'] = "Nyala Pelita HIMATIKA";
        $this->load->view('template/basenavbar', $data);
        $this->load->view('base/nyalapelitahimatika');
        $this->load->view('template/basefooter');
    }
    public function kabinetbersahabat()
    {
        $data['title'] = "Kabinet Bersahabat";
        $this->load->view('template/basenavbar', $data);
        $this->load->view('base/kabinetbersahabat');
        $this->load->view('template/basefooter');
    }
    public function kabinetharmonis()
    {
        $data['title'] = "Kabinet Harmonis";
        $this->load->view('template/basenavbar', $data);
        $this->load->view('base/kabinetharmonis');
        $this->load->view('template/basefooter');
    }
    public function articles()
    {
        $data['title'] = "Artikel";
        $data['articles'] = $this->db->get('base_articles_list')->result_array();

        $this->load->view('template/basenavbar', $data);
        $this->load->view('base/articles', $data);
        $this->load->view('template/basefooter');
    }

    public function viewarticle($id)
    {
        $data['article'] = $this->db->get_where('base_articles_list', ['id' => $id])->row_array();
        $data['title'] = $data['article']['artc_title'];

        $this->load->view('template/basenavbar', $data);
        $this->load->view('base/viewarticle', $data);
        $this->load->view('template/basefooter');
    }
}
