<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
	{
        $this->template->load('template', 'dashboard');
    }  
    
    public function profile()
    {
        $this->template->load('template', 'profile');
    }

    public function d_matkul()
    {
        $this->template->load('template', 'daftarmatkul');
    }

    public function d_dosen()
    {
        $this->template->load('template', 'daftardosen');
    }

    public function d_mahasiswa()
    {
        $this->template->load('template', 'daftarmahasiswa');
    }

    public function d_jadwal()
    {
        $this->template->load('template', 'daftarjadwal');
    }
}