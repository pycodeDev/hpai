<?php
defined('BASEPATH') OR exit('No direct script access alowed');

class Trx_model extends CI_Model
{
    private $_table = "transaksi_penjualan";

    public function rules_trx()
    {
        return 
        [
            [
                'field' => 'tangal',
                'label' => 'tanggal',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Silahkan Isi tanggal'
                ]
            ],

            [
                'field' => 'QTY',
                'label' => 'QTY',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Silahkan Isi Qty'
                ]
            ]
        ];
    }

    public function getDataByid(){
        return $this->db->query('SELECT * FROM transaksi_penjualan tp left join produk p on tp.id_prim=p.id_prim GROUP BY tp.id_prim ORDER by tp.id_prim asc')->result();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getNum()
    {
        return $this->db->get($this->_table)->num_rows();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_prim" => $id])->row();
    }

    public function getDataId($id)
    {
        return $this->db->get_where("transaksi_penjualan", ["id_prim" => $id])->result_array();
    }

    public function save_trx_keluar()
    {   
        $post = $this->input->post();
        $data = array(
            'id_prim' => $post['id_prim'],
            'tanggal' => $post['tanggal'],
            'QTY' => $post['QTY']
        );
        $this->db->insert('transaksi_penjualan', $data);
    }

    public function delete($id,$id_trx)
    {
        $del = $this->db->get_where('transaksi_penjualan', ["id_transaksi" => $id_trx])->row();
        if ($this->val_d($del->tanggal) == date("Y-m")) {
            $prd = $this->db->get_where('produk', ["id_prim" => $id])->row();
            $data = array(
                'stok' => $prd->stok + $del->QTY
            );
            $this->db->update("produk", $data, array("id_prim" => $id));
            $this->db->delete("transaksi_penjualan", array("id_transaksi" => $id_trx));
            redirect(site_url('admin/dashboard/kelola_transaksi_penjualan'));
        }else{
            $this->db->delete("transaksi_penjualan", array("id_transaksi" => $id_trx));
            redirect(site_url('admin/dashboard/kelola_transaksi_penjualan'));
        }
    }

    public function val_d($tgl){
        $a = explode("-",$tgl);
        $ym = implode("-",array($a[0],$a[1]));
        return $ym;
    }

    //cara pertama untuk menanggulangi hapus data
    public function cara1($id,$id_trx){
        $tgl = $this->db->select('tanggal')->limit(1)->order_by('id_transaksi','desc')->get_where('transaksi_penjualan', ["id_prim" => $id])->row();
        $del = $this->db->get_where('transaksi_penjualan', ["id_transaksi" => $id_trx])->row();
        if ($del->tanggal == $tgl->tanggal) {
            $prd = $this->db->get_where('produk', ["id_prim" => $id])->row();
            $data = array(
                'stok' => $prd->stok + $del->QTY
            );
            $this->db->update("produk", $data, array("id_prim" => $id));
            $this->db->delete("transaksi_penjualan", array("id_transaksi" => $id_trx));
            redirect(site_url('admin/dashboard/kelola_transaksi_penjualan'));
        }else{
            $this->db->delete("transaksi_penjualan", array("id_transaksi" => $id_trx));
            redirect(site_url('admin/dashboard/kelola_transaksi_penjualan'));
        }
    }

    public function data_lap(){
        $id_prim = $this->db->select("id_prim,nama_produk")->get("produk")->result_array();
        $hasil = array();
        for ($i=0; $i < sizeof($id_prim) ; $i++) { 
            $getData = $this->db->select("tp.*,p.nama_produk")->join("produk p","tp.id_prim=p.id_prim","left")->where("tp.id_prim=".$id_prim[$i]['id_prim'])->order_by("tp.id_transaksi","desc")->limit(1)->get("transaksi_penjualan tp")->row();
            if ($getData == null) {
                array_push($hasil, array(
                    "id_transaksi" => "Belum ada Transaksi",
                    "id_prim" => "Belum ada Transaksi",
                    "bulan" => "Belum ada Transaksi",
                    "tahun" => "Belum ada Transaksi",
                    "QTY" => "Belum ada Transaksi",
                    "nama_produk" => $id_prim[$i]['nama_produk']
                ));
            }else {
                array_push($hasil, array(
                    "id_transaksi" => $getData->id_transaksi,
                    "id_prim" => $getData->id_prim,
                    "bulan" => $this->bulan($getData->tanggal),
                    "tahun" => $this->tahun($getData->tanggal),
                    "QTY" => $getData->QTY,
                    "nama_produk" => $getData->nama_produk
                ));
            }
        };
        return $hasil;
    }

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

    public function bulan($tgl){
        $a = explode("-",$tgl);
        $bulan = $this->bulan[$a[1]];
        return $bulan;
    }
    
    public function tahun($tgl){
        $a = explode("-",$tgl);
        $tahun = $a[0];
        return $tahun;
    }
}