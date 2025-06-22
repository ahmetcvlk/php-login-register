<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property User_model $User_model
 */

class Login extends CI_Controller
{

    public function Index()
    {
        $this->load->view('login_view');
    }

    public function register()
    {
        $this->load->view('register_view');
    }

    public function register_submit()
    {
        // Form verilerini al
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Şifreyi hash'le (güvenlik için)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Veri tabanına kayıt için model çağrısı yapacağız (önce model ekleyeceğiz)
        $this->load->model('User_model');

        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => $hashed_password,
            'role' => 'user'
        );

        $insert = $this->User_model->insert_user($data);

        if ($insert) {
            $data['message'] = "Kayıt başarılı!";
        } else {
            $data['message'] = "Kayıt sırasında hata oluştu.";
        }

        // register_view sayfasını tekrar göster ve mesajı da gönder
        $this->load->view('register_view', $data);
    }

    public function login_submit()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->load->model('User_model');
        $user = $this->User_model->get_user_by_email($email);

        if ($user && password_verify($password, $user->password)) {
            // Giriş başarılı → Session başlat
            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_userdata('user_name', $user->name);

            redirect('dashboard'); // Giriş başarılıysa dashboard sayfasına yönlendir
        } else {
            // Giriş başarısız
            $data['error'] = "E-posta veya şifre hatalı.";
            $this->load->view('login_view', $data);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/login');
    }


}


?>