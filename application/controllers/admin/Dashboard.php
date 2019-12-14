<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('date_lib');
		$this->load->library('pdf');
	}

	public function index()
	{
		if ($this->session->userdata('username') == false and $this->session->userdata('akses') != 'admin') {
			redirect('login');
		} else {
			$data['title'] = 'Dashboard Admin';
			$data['title_kc'] = 'Selamat Datang di Sistem Prediksi Penjualan PT HPAI BC 4 Pekanbaru';
			$data['kc'] = 'dashboard';
		
			$data['content'] = $this->load->view('admin/content/dashboard',NULL,TRUE);
			$this->load->view('admin/index',$data);
		}
	}

	public function profil(){
		if ($this->session->userdata('username') == false and $this->session->userdata('akses') != 'admin') {
			redirect('login');
		} else {
			$kp = $this->produk_model;
			$data['title'] = 'Profile';
			$data['title_kc'] = 'Profile';
			$data['kc'] = 'profil';
			$data['variable'] = $kp->getAll();

			$data['content'] = $this->load->view('admin/content/profil',$data,TRUE);
			$this->load->view('admin/index',$data);
		}
	}

	// kelola produk {Start}
	public function kelola_produk(){
		if ($this->session->userdata('username') == false and $this->session->userdata('akses') != 'admin') {
			redirect('login');
		} else {
			$kp = $this->produk_model;
			$data['title'] = 'Kelola Produk';
			$data['title_kc'] = 'Kelola Data Produk';
			$data['kc'] = 'kelola produk';
			$data['variable'] = $kp->getAll();

			$data['content'] = $this->load->view('admin/content/kelola_produk',$data,TRUE);
			$this->load->view('admin/index',$data);
		}
	}
	// kelola produk {End}
	
	// kelola stok produk {Start}
	public function stok_produk(){
		if ($this->session->userdata('username') == false and $this->session->userdata('akses') != 'admin') {
			redirect('login');
		} else {
			$sp = $this->produk_model;
			$data['title'] = 'Kelola Stock Produk';	
			$data['title_kc'] = 'Kelola Stock Produk';
			$data['kc'] = 'stok produk';
			$data['variable'] = $this->db->get_where("produk", ["status" => 'Aktif'])->result();;
		
			$data['content'] = $this->load->view('admin/content/stok_produk',$data,TRUE);
			$this->load->view('admin/index',$data);
		}
	}
	// kelola Stok Produk {End}

	// kelola produk masuk {Start}
	public function kelola_produk_masuk(){
		if ($this->session->userdata('username') == false and $this->session->userdata('akses') != 'admin') {
			redirect('login');
		} else {
			$prd = $this->produk_model;
			$data['title'] = 'Kelola Produk Masuk';
			$data['title_kc'] = 'Kelola Produk Masuk';
			$data['kc'] = 'kelola produk masuk';
			$data['prd'] = $prd->getAll();
		
			$data['content'] = $this->load->view('admin/content/kelola_produk_masuk',$data,TRUE);
			$this->load->view('admin/index',$data);
		}
	}

	// kelola produk masuk {End}

	// kelola transaksi penjualan {Start} 
	public function kelola_transaksi_penjualan(){
		if ($this->session->userdata('username') == false and $this->session->userdata('akses') != 'admin') {
			redirect('login');
		} else {
			$data['title'] = 'Kelola Transaksi';
			$data['title_kc'] = 'Kelola Transaksi Penjualan';
			$data['kc'] = 'kelola transaksi penjualan';
			$data['variable'] = $this->produk_model->getAll();
			$data['content'] = $this->load->view('admin/content/kelola_transaksi_penjualan',$data,TRUE);
			$this->load->view('admin/index',$data);
		}
	}

	// kelola transaksi penjualan {end}

	public function prediksi_penjualan(){
		if ($this->session->userdata('username') == false and $this->session->userdata('akses') != 'admin') {
			redirect('login');
		} else {
			$data['title'] = 'Kelola Prediksi Penjualan';
			$data['title_kc'] = 'Kelola Prediksi Penjualan';
			$data['kc'] = 'prediksi penjualan';
		
			$data['content'] = $this->load->view('admin/content/prediksi_penjualan',NULL,TRUE);
			$this->load->view('admin/index',$data);
		}
	}
	public function test(){
		if ($this->session->userdata('username') == false and $this->session->userdata('akses') != 'admin') {
			redirect('login');
		} else {
			$data['title'] = 'Kelola Prediksi Penjualan';
			$data['title_kc'] = 'Kelola Prediksi Penjualan';
			$data['kc'] = 'prediksi penjualan';
			// $data["det_prd"] = $this->produk_model->delete(2,16);
			// $data["produk"] = $this->produk_model->getDataId(2);
			// $prd = $this->produk_model;
			// $data["produk"] = $prd->getDataId(3);
			// $data['det'] = $this->date_lib->prd_masuk($data['produk']);
			$data['coba'] = $this->db->select("id_prim")->get("produk")->result_array();
			
			
			$data['content'] = $this->load->view('admin/content/test',$data,TRUE);
			$this->load->view('admin/index',$data);
		}
	}

	public function config(){
		if ($this->session->userdata('username') == false and $this->session->userdata('akses') != 'admin') {
			redirect('login');
		} else {
			$data['title'] = 'Pengaturan Password';
			$data['title_kc'] = 'Pengaturan password';
			$data['kc'] = 'config';
			
			$data['content'] = $this->load->view('admin/content/config',NULL,TRUE);
			$this->load->view('admin/index',$data);
		}
	}

	// public function config(){
	// 	if ($this->session->userdata('username') == false and $this->session->userdata('akses') != 'admin') {
	// 		redirect('login');
	// 	} else {
	// 		$data['title'] = 'Pengaturan Password';
	// 		$data['title_kc'] = 'Pengaturan password';
	// 		$data['kc'] = 'config';
			
	// 		$data['content'] = $this->load->view('admin/content/config',NULL,TRUE);
	// 		$this->load->view('admin/index',$data);
	// 	}
	// }

	// laporan produk {start}
	public function laporan_produk(){
		if ($this->session->userdata('username') == false and $this->session->userdata('akses') != 'admin') {
			redirect('login');
		} else {
			$kp = $this->produk_model;
			$data['title'] = 'Laporan Produk';
			$data['title_kc'] = 'Laporan Data Produk';
			$data['kc'] = 'laporan produk';
			$data['variable'] = $kp->getAll();

			$data['content'] = $this->load->view('admin/content/lap_produk',$data,TRUE);
			$this->load->view('admin/index',$data);
		}
	}

	public function lap_produk(){
		$image1 = base_url("assets/img/logo.png");

		$pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(210,9,'PT HERBA PENAWAR ALWAHIDA INDONESIA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(210,9,'Sistem Prediksi Transaksi Penjualan pada PT HPAI',0,1,'C');
        $pdf->Cell(210,9,'Business Center 4, Jl. Melati No. 35 Pekanbaru, Riau',0,1,'C');
        $pdf->Cell(200,9,'',0,1,'C');
        $pdf->Cell( 10, 20, $pdf->Image($image1, 21, 15, 30), 0, 0, 'l', false );
        $pdf->Cell(10,7,'',0,1);
        $pdf->Line(20, 45, 210-20, 45);
        
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(30,6,'Tanggal :',0,0);
        $pdf->Cell(50,6,date("d-m-Y"),0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',20);

        $data = $this->db->get("produk")->result_array();
		$pdf->Cell(0,9,'Laporan Data Produk ',0,1,'C');
		$pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(15,6,'No ',1,0,'C');
        $pdf->Cell(30,6,'ID Produk',1,0,'C');
        $pdf->Cell(127,6,'Nama Produk',1,0,'C');
        $pdf->Cell(23,6,'Status',1,1,'C');

        $pdf->SetFont('Arial','',13);
		//prediksi 
		$no =1;
        foreach($data as $item){
            $pdf->Cell(15,6,$no++,1,0,'C');
            $pdf->Cell(30,6,$item['id_produk'],1,0,'C');
            $pdf->Cell(127,6,$item['nama_produk'],1,0,'C');
            $pdf->Cell(23,6,$item['status'],1,1,'C');
        }

        $pdf->Output();
	}
	// laporan produk {end}

	// laporan stok produk {start}
	public function laporan_stok_produk(){
		if ($this->session->userdata('username') == false and $this->session->userdata('akses') != 'admin') {
			redirect('login');
		} else {
			$sp = $this->produk_model;
			$data['title'] = 'Laporan Stok Produk';
			$data['title_kc'] = 'Laporan Data Stok Produk';
			$data['kc'] = 'laporan stok produk';
			$data['variable'] = $sp->getAll();

			$data['content'] = $this->load->view('admin/content/lap_stok_produk',$data,TRUE);
			$this->load->view('admin/index',$data);
		}
	}

	public function lap_stok_produk($id){
		$image1 = base_url("assets/img/logo.png");

		$pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(210,9,'PT HERBA PENAWAR ALWAHIDA INDONESIA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(210,9,'Sistem Prediksi Transaksi Penjualan pada PT HPAI',0,1,'C');
        $pdf->Cell(210,9,'Business Center 4, Jl. Melati No. 35 Pekanbaru, Riau',0,1,'C');
        $pdf->Cell(200,9,'',0,1,'C');
        $pdf->Cell( 10, 20, $pdf->Image($image1, 21, 15, 30), 0, 0, 'l', false );
        $pdf->Cell(10,7,'',0,1);
        $pdf->Line(20, 45, 210-20, 45);
		
		$pr = $this->db->get_where("produk", ["id_prim" => $id])->row();
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(30,6,'Tanggal',0,0);
        $pdf->Cell(50,6,': '.date("d-m-Y"),0,1);
        $pdf->Cell(10,7,'',0,1);
		$pdf->Cell(10,7,'',0,1);
		$pdf->Cell(30,6,'Id Produk',0,0);
        $pdf->Cell(50,6,': '.$pr->id_produk,0,1);
		$pdf->Cell(30,6,'Nama Produk',0,0);
		$pdf->Cell(50,6,': '.$pr->nama_produk,0,1);
		$pdf->Cell(30,6,'Stok Produk',0,0);
		$pdf->Cell(50,6,': '.$pr->stok,0,1);
		$pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',20);

		$data = $this->produk_model->getDataId($id);
		$produk = $this->date_lib->prd_masuk($data);
		$pdf->Cell(0,9,'Laporan Produk Masuk '.$pr->nama_produk,0,1,'C');
		$pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(20,6,'No ',1,0,'C');
        $pdf->Cell(50,6,'ID Produk',1,0,'C');
        $pdf->Cell(30,6,'Tahun',1,0,'C');
        $pdf->Cell(50,6,'Bulan',1,0,'C');
        $pdf->Cell(40,6,'Quantity',1,1,'C');

        $pdf->SetFont('Arial','',13);
		//prediksi 
		$no =1;
        for($i=0; $i < sizeof($produk); $i++){
            $pdf->Cell(20,6,$no++,1,0,'C');
            $pdf->Cell(50,6,$pr->id_produk,1,0,'C');
            $pdf->Cell(30,6,$produk[$i]['tahun'],1,0,'C');
            $pdf->Cell(50,6,$produk[$i]['bulan'],1,0,'C');
            $pdf->Cell(40,6,$produk[$i]['QTY'],1,1,'C');
        }

        $pdf->Output();
	}
	// laporan stok produk {end}

	public function laporan_transaksi_penjualan(){
		if ($this->session->userdata('username') == false and $this->session->userdata('akses') != 'admin') {
			redirect('login');
		} else {
			$kp = $this->trx_model;
			$data['title'] = 'Laporan Transaksi Penjualan';
			$data['title_kc'] = 'Laporan Data Transaksi Penjualan';
			$data['kc'] = 'laporan transaksi penjualan';
			$data['variable'] = $kp->data_lap();

			$data['content'] = $this->load->view('admin/content/lap_transaksi_penjualan',$data,TRUE);
			$this->load->view('admin/index',$data);
		}
	}

	public function lap_transaksi_penjualan($id){
		$image1 = base_url("assets/img/logo.png");

		$pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(210,9,'PT HERBA PENAWAR ALWAHIDA INDONESIA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(210,9,'Sistem Prediksi Transaksi Penjualan pada PT HPAI',0,1,'C');
        $pdf->Cell(210,9,'Business Center 4, Jl. Melati No. 35 Pekanbaru, Riau',0,1,'C');
        $pdf->Cell(200,9,'',0,1,'C');
        $pdf->Cell( 10, 20, $pdf->Image($image1, 21, 15, 30), 0, 0, 'l', false );
        $pdf->Cell(10,7,'',0,1);
        $pdf->Line(20, 45, 210-20, 45);
		
		$pr = $this->db->get_where("produk", ["id_prim" => $id])->row();
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(30,6,'Tanggal',0,0);
        $pdf->Cell(50,6,': '.date("d-m-Y"),0,1);
        $pdf->Cell(10,7,'',0,1);
		$pdf->Cell(10,7,'',0,1);
		$pdf->Cell(30,6,'Id Produk',0,0);
        $pdf->Cell(50,6,': '.$pr->id_produk,0,1);
		$pdf->Cell(30,6,'Nama Produk',0,0);
		$pdf->Cell(50,6,': '.$pr->nama_produk,0,1);
		$pdf->Cell(30,6,'Stok Produk',0,0);
		$pdf->Cell(50,6,': '.$pr->stok,0,1);
		$pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',20);
		
		$data = $this->trx_model->getDataId($id);
		$produk = $this->date_lib->trx($data);
		$pdf->Cell(0,9,'Laporan Transaksi Produk '.$pr->nama_produk,0,1,'C');
		$pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(20,6,'No ',1,0,'C');
        $pdf->Cell(50,6,'ID Produk',1,0,'C');
        $pdf->Cell(30,6,'Tahun',1,0,'C');
        $pdf->Cell(50,6,'Bulan',1,0,'C');
        $pdf->Cell(40,6,'Quantity',1,1,'C');

        $pdf->SetFont('Arial','',13);
		//prediksi 
		$no =1;
        for($i=0; $i < sizeof($produk); $i++){
            $pdf->Cell(20,6,$no++,1,0,'C');
            $pdf->Cell(50,6,$pr->id_produk,1,0,'C');
            $pdf->Cell(30,6,$produk[$i]['tahun'],1,0,'C');
            $pdf->Cell(50,6,$produk[$i]['bulan'],1,0,'C');
            $pdf->Cell(40,6,$produk[$i]['QTY'],1,1,'C');
        }

        $pdf->Output();
	}
}
