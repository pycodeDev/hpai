<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_produk extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('date_lib');
    }

    public function index(){
        redirect(site_url('admin/dashboard/kelola_produk'));
    }

    public function tambah_produk(){
        if ($this->session->userdata('username') == false) {
			redirect('login');
		} else {
			$tambah_produk = $this->produk_model;
			$validation = $this->form_validation;
			$validation->set_rules($tambah_produk->rules());
			if ($validation->run()) {
				$tambah_produk->save_prd();
				$this->session->set_flashdata('success','Berhasil Disimpan');
				redirect(site_url('admin/dashboard/kelola_produk'));
			}else {
				$data['title'] = 'Tambah Produk';
				$data['title_kc'] = 'Tambah Data Produk';
				$data['kc'] = 'tambah produk';
			
				$data['content'] = $this->load->view('admin/content/tambah_produk',NULL,TRUE);
				$this->load->view('admin/index',$data);
			}
		}
    }

    public function edit_data($id=null){
        if ($this->session->userdata('username') == false) {
			redirect('login');
		} else {
			$prd = $this->produk_model;
			$validation = $this->form_validation;
			$validation->set_rules($prd->rules());
			if ($validation->run()) {
				$prd->update_prd();
				$this->session->set_flashdata('success','Berhasil Disimpan');
				redirect(site_url('admin/dashboard/kelola_produk'));
			}else {
				$data['title'] = 'Edit Produk';
				$data['title_kc'] = 'Edit Data Produk';
				$data['kc'] = 'edit data';
                $data['prd'] = $prd->getById($id);

				$data['content'] = $this->load->view('admin/content/edit_produk',$data,TRUE);
				$this->load->view('admin/index',$data);
			}
		}
    }

    public function delete($id=null){
        if (!isset($id)) show_404();

        if ($this->produk_model->delete_prd($id)) {
            redirect(site_url('admin/dashboard/kelola_produk'));
        }
    }
}