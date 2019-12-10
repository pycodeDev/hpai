<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prediksi_penjualan extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Prediksi';
		$data["prd"] = $this->dataprd_model->getAll();
		$this->load->view('admin/prediksi/index',$data);
	}
	
	public function grafik_prediksi($id)
	{
		if ($this->session->userdata('username') == false) {
			redirect('login');
		} else {
			$data['title'] = 'Grafik Prediksi Penjualan';
			$data['title_kc'] = 'Grafik Prediksi Penjualan';
			$data['kc'] = 'grafik prediksi';
			$data['id'] = $id;
			$data['content'] = $this->load->view('admin/content/graph',$data,TRUE);
			$this->load->view('admin/index',$data);
		}
	}
}
