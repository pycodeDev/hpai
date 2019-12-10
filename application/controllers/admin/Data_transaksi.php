<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// use Phpml\Regression\LeastSquares;

class Data_transaksi extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Data Transaksi';
		$data['trx'] = $this->datatrx_model->data();
		$this->load->view('admin/data_transaksi/index',$data);
	}
	
	public function tambah()
	{
		$datatrx = $this->datatrx_model;
		$validation = $this->form_validation;
		$validation->set_rules($datatrx->rules());

		if ($validation->run()){
			$datatrx->save();
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
			redirect(site_url('admin/data_transaksi'));
		}else{
			$data['title'] = 'Tambah Data';
			$data['prd'] = $this->datatrx_model->prd();
			$this->load->view('admin/data_transaksi/tambah',$data);
		}
	}

	public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/data_transaksi');

        $datatrx = $this->datatrx_model;
        $validation = $this->form_validation;
        $validation->set_rules($datatrx->rules());

        if ($validation->run()) {
            $datatrx->update();
            $this->session->set_flashdata('success_edit', 'Berhasil Diedit');
            redirect(site_url('admin/data_transaksi'));
        }else{
            $data["title"] = "Edit Data";
			$data["trx"] = $datatrx->getById($id);
			$data['prd'] = $this->datatrx_model->prd();
            if (!$data["trx"]) show_404();

            $this->load->view("admin/data_transaksi/edit", $data);
        }
	}
	
	public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if ($this->datatrx_model->delete($id)) {
            redirect(site_url('admin/data_transaksi'));
        }
    }
}
