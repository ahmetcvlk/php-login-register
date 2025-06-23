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

    public function send_message()
    {
        $message = $this->input->post('message');
        $user_id = $this->session->userdata('user_id');

        if ($message && $user_id) {
            $this->load->model('Message_model');
            $this->Message_model->insert_message($user_id, $message);
            echo json_encode(['success' => true, 'msg' => 'Mesaj kaydedildi']);
        } else {
            echo json_encode(['success' => false, 'msg' => 'Geçersiz veri']);
        }
    }
}
