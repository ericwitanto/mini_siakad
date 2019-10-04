<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('M_login', 'login');
    }
 
    public function index(){
        if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
        redirect('dashboard');

        $this->load->view('login'); // Load view login.php
    }

    public function login(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        
        $cek_user=$this->login->get_user_role($username);

        if(empty($cek_user)){ // Jika hasilnya kosong / user tidak ditemukan
            $this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata
            redirect('auth');
        }else {
          if ($cek_user['user_password'] == md5($password)) {
            $session = [
                'authenticated' => true, // Buat session authenticated dengan value true
                'role' => $cek_user['role_name'],
                'user_code' => $cek_user['user_code'],  // Buat session kode user
                'nama' => $cek_user['user_name'] // Buat session authenticated
            ];

            $this->session->set_userdata($session); // Buat session sesuai $session
            redirect('dashboard');
          } else {
            $this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
            redirect('auth'); // Redirect ke halaman login
          }
        }
    }
 
    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }
 
}

?>