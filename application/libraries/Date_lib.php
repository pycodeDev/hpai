<?php
if (!defined('BASEPATH')) exit('No Direct Script Allowed');

class Date_lib
{
	public $bulan= array(
        "01" => "Januari",
        "02" => "Februari",
        "03" => "Maret",
        "04" => "April",
        "05" => "May",
        "06" => "Juni",
        "07" => "Juli",
        "08" => "Agustus",
        "09" => "September",
        "10" => "Oktober",
        "11" => "November",
        "12" => "Desember"
    );

    public function trx($data){
        if ($data == null) {
            $ar_dat = [];
        }else {
            for ($i=0; $i < sizeof($data); $i++) { 
                $a = $this->explod_date($data[$i]['tanggal']);
                $ar_dat[$i] = array(
                    "id_transaksi" => $data[$i]['id_transaksi'],
                    "id_prim" => $data[$i]['id_prim'],
                    "bulan" => $a['Bulan'],
                    "tahun" => $a['Tahun'],
                    "QTY" => $data[$i]['QTY'],
                );
            }
        }
        return $ar_dat;  
    }
    
    public function prd_masuk($data){
        $ar_dat=[];
        for ($i=0; $i < sizeof($data); $i++) { 
            $a = $this->explod_date($data[$i]['tanggal']);
            $ar_dat[$i] = array(
                "id_produk_masuk" => $data[$i]['id_produk_masuk'],
                "id_prim" => $data[$i]['id_prim'],
                "bulan" => $a['Bulan'],
                "tahun" => $a['Tahun'],
                "QTY" => $data[$i]['QTY']
            );
        }
        return $ar_dat;  
    }

    public function explod_date($tgl){
        $a = explode("-",$tgl);
        $b = $this->bulan[$a[1]];
        $t = $a[0];
        $tgl = array(
            "Bulan" => $b,
            "Tahun" => $t
        );
        return $tgl;
    }

	public function lap_trx_penjualan($data){
        $ar_dat=[];
        for ($i=0; $i < sizeof($data); $i++) { 
            $a = $this->explod_date($data[$i]['tanggal']);
            $ar_dat[$i] = array(
                "id_transaksi" => $data[$i]['id_produk_masuk'],
                "id_prim" => $data[$i]['id_prim'],
                "nama_produk" => $data[$i]['nama_produk'],
                "bulan" => $a['Bulan'],
                "tahun" => $a['Tahun'],
                "QTY" => $data[$i]['QTY']
            );
        }
        return $ar_dat; 
    }
}