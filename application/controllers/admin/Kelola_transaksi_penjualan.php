<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_transaksi_penjualan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('date_lib');
    }

    public function index(){
        redirect(site_url('admin/dashboard/kelola_transaksi_penjualan'));
    }

    public function detail_transaksi_penjualan($id=null){
        if ($this->session->userdata('username') == false) {
			redirect('login');
		} else {
			$trx = $this->trx_model;
			$data['title'] = 'Detail Transaksi Penjualan';
			$data['title_kc'] = 'Detail Transaksi Penjualan';
			$data['kc'] = 'detail transaksi penjualan';
			$data["det_trx"] = $this->produk_model->getById($id);
			$data["trx"] = $trx->getDataId($id);
			$data['det'] = $this->date_lib->trx($data['trx']);

			$data['content'] = $this->load->view('admin/content/detail_transaksi_penjualan',$data,TRUE);
			$this->load->view('admin/index',$data);
		}
	}
	
	public function tambah_transaksi_penjualan($id=null){
		if ($this->session->userdata('username') == false) {
			redirect('login');
		} else {
			$tpm = $this->produk_model;
			$data['title'] = 'Tambah Data Transaksi Penjualan';
			$data['title_kc'] = 'Tambah Data Transaksi Penjualan';
			$data['kc'] = 'tambah transaksi penjualan';
			$data["det_prd"] = $tpm->getById($id);

		
			$data['content'] = $this->load->view('admin/content/tambah_transaksi_penjualan',$data,TRUE);
			$this->load->view('admin/index',$data);
		}
	}

	public function ptk(){
		$trx = $this->trx_model;
		$validation = $this->form_validation;
		$validation->set_rules($trx->rules_trx());
		$post = $this->input->post();
		if ($trx) {
			$trx->save_trx_keluar();
			$this->session->set_flashdata('success','Berhasil Disimpan');
			redirect(site_url('admin/dashboard/kelola_transaksi_penjualan'));
		}else {
			$this->tambah_transaksi_penjualan($post['id_prim']);
		}
	}

	public function delete($id,$id_trx){
        if (!isset($id)) show_404();

        if ($this->trx_model->delete($id,$id_trx)) {
            redirect(site_url('admin/dashboard/kelola_transaksi_penjualan'));
        }
    }
}