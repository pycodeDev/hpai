<?php

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("login_model");
		$this->load->library("form_validation");
	}

	public function index()
	{
		$login = $this->login_model;
		$validation = $this->form_validation;
		$validation->set_rules($login->rules());

		if ($validation->run() == false)
		{
			$data['title'] = 'Sistem Prediksi - Login';
			$this->load->view('login',$data);	
		}else{
			$login->login();
		}
	}

	public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('akses');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Sudah Berhasil Logout</div>');
        redirect('login');
    }
}
