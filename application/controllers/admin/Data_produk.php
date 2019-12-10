<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_produk extends CI_Controller {

	private $filename = "import_data";

	function __construct(){
		parent::__construct();
		$this->load->library("excel");
	}

	public function index()
	{
		$dataprd = $this->dataprd_model;
		$data['title'] = 'Data Produk';
		$data['produk'] = $dataprd->getAll();
		$this->load->view('admin/data_produk/index',$data);
	}

	public function tambah()
	{	
		$dataprd = $this->dataprd_model;
		$validation = $this->form_validation;
		$validation->set_rules($dataprd->rules());

		if ($validation->run()){
			$dataprd->save();
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
			redirect(site_url('admin/data_produk'));
		}else{
			$data['title'] = 'Tambah Data';
			$this->load->view('admin/data_produk/tambah',$data);
		}
	}

	public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/data_produk');

        $dataprd = $this->dataprd_model;
        $validation = $this->form_validation;
        $validation->set_rules($dataprd->rules());

        if ($validation->run()) {
            $dataprd->update();
            $this->session->set_flashdata('success_edit', 'Berhasil Diedit');
            redirect(site_url('admin/data_produk'));
        }else{
            $data["title"] = "Edit Data";
            $data["prd"] = $dataprd->getById($id);
            if (!$data["prd"]) show_404();

            $this->load->view("admin/data_produk/edit", $data);
        }
	}
	
	public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if ($this->dataprd_model->delete($id)) {
            redirect(site_url('admin/data_produk'));
        }
	}
	
	public function import(){
		$data = array();
		if(isset($_FILES['file']['name'])){
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
				$id_produk = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
				$nama_produk = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
				$jumlah_produk = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
				$totalNM = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
				$total_sales = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
				array_push($data,array(
					'id_produk' => $id_produk,
					'nama_produk' => $nama_produk,
					'jumlah_produk' => $jumlah_produk,
					'totalNM' => $totalNM,
					'total_sales' => $total_sales
				));
				}
			}
			$this->dataprd_model->insert_multiple($data);
			echo 'Data Imported successfully';
		}
		$this->index();
	}

	public function download($name = null){
		$data = file_get_contents(base_url('admin/data_produk/data/'.$name));
		force_download($name,$data);
	}
}