<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_produk_masuk extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('date_lib');
    }

    public function index(){
		redirect(site_url('admin/dashboard/kelola_produk_masuk'));
    }

	public function detail_produk_masuk($id=null){
		if ($this->session->userdata('username') == false) {
			redirect('login');
		} else {
			$prd = $this->produk_model;
			$data['title'] = 'Detail Produk Masuk';
			$data['title_kc'] = 'Detail Produk Masuk';
			$data['kc'] = 'detail produk masuk';
			$data["det_prd"] = $prd->getById($id);
			$data["produk"] = $prd->getDataId($id);
			$data['det'] = $this->date_lib->prd_masuk($data['produk']);

			$data['content'] = $this->load->view('admin/content/detail_produk_masuk',$data,TRUE);
			$this->load->view('admin/index',$data);
		}
	}
	
	public function tambah_produk_masuk($id=null){
		if ($this->session->userdata('username') == false) {
			redirect('login');
		} else {
			$tpm = $this->produk_model;
			$data['title'] = 'Tambah Data Produk Masuk';
			$data['title_kc'] = 'Tambah Data Produk Masuk';
			$data['kc'] = 'tambah produk masuk';
			$data["det_prd"] = $tpm->getById($id);

		
			$data['content'] = $this->load->view('admin/content/tambah_produk_masuk',$data,TRUE);
			$this->load->view('admin/index',$data);
		}
	}

	public function ptm(){
		$tpm = $this->produk_model;
		$validation = $this->form_validation;
		$validation->set_rules($tpm->rules_tpm());
		$post = $this->input->post();
		if ($tpm) {
			$tpm->save_prd_masuk();
			$this->session->set_flashdata('success','Berhasil Disimpan');
			redirect(site_url('admin/dashboard/kelola_produk_masuk'));
		}else {
			$this->tambah_produk_masuk($post['id_prim']);
		}
	}

	public function delete($id){
		if (!isset($id)) show_404();

        if ($this->produk_model->delete($id,$id_pm)) {
            redirect(site_url('admin/dashboard/kelola_produk_masuk'));
        }
	}
}