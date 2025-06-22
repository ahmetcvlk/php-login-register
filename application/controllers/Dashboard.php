<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
        // Eğer session'da user_id yoksa giriş sayfasına yönlendir
        if (!$this->session->userdata('user_id')) {
            redirect('/login');
        }

        // Giriş varsa hoşgeldin mesajı göster
        $data['user_name'] = $this->session->userdata('user_name');
        $this->load->view('dashboard_view', $data);
    }
}
