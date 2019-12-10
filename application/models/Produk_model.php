<?php
defined('BASEPATH') OR exit('No direct script access alowed');

class Produk_model extends CI_Model
{
    private $_table = "produk";

    public function rules()
    {
        return
        [
            [
                'field' => 'id_produk',
                'label' => 'Id Produk',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Silahkan Isi ID Produk'
                ]
            ],

            [
                'field' => 'nama_produk',
                'label' => 'nama produk',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Silahkan Isi nama produk'
                ]
            ],

            [
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Silahkan isi Status'
                ]
            ]
        ];
    }
    
    public function rules_tpm()
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

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getDataByid($id){
        return $this->db->query('SELECT * FROM produk_masuk pm left join produk p on pm.id_prim=p.id_prim where id_produk_masuk='.$id.'')->row();
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
        return $this->db->get_where("produk_masuk", ["id_prim" => $id])->result_array();
    }

    //crud
    public function save_prd()
    {
        $post = $this->input->post();
        $data = array(
            'id_produk' => $post["id_produk"],
            'nama_produk' => $post["nama_produk"],
            'status' => $post["status"],
            'stok' => 0
        );
        $this->db->insert($this->_table, $data);
    }

    public function update_prd()
    {
        $post = $this->input->post();
        $data = array(
            'id_produk' => $post['id_produk'],
            'nama_produk' => $post['nama_produk'],
            'status' => $post['status']
        );
        $this->db->update("produk", $data, array("id_prim" => $post["id_prim"]));
    }

    public function delete_prd($id){
        return $this->db->delete("produk", array("id_prim" => $id));
    }

    public function save_prd_masuk()
    {
        $post = $this->input->post();
        $data = array(
            'id_prim' => $post["id_prim"],
            'tanggal' => $post["tanggal"],
            'QTY' => $post["QTY"]
        );
        $this->db->insert("produk_masuk", $data);
    }

    public function delete($id,$id_pm)
    {
        $del = $this->db->get_where('produk_masuk', ["id_produk_masuk" => $id_pm])->row();
        if ($this->val_d($del->tanggal) == date("Y-m") ) {
            $prd = $this->db->get_where('produk', ["id_prim" => $id])->row();
            $data = array(
                'stok' => $prd->stok - $del->QTY
            );
            $this->db->update("produk", $data, array("id_prim" => $id));
            $this->db->delete("produk_masuk", array("id_produk_masuk" => $id_pm));
            redirect(site_url('admin/dashboard/kelola_produk_masuk'));
        }else{
            $this->db->delete("produk_masuk", array("id_produk_masuk" => $id_pm));
            redirect(site_url('admin/dashboard/kelola_produk_masuk'));
        }
        // return $this->val_d($del->tanggal);
    }

    public function val_d($tgl){
        $a = explode("-",$tgl);
        $ym = implode("-",array($a[0],$a[1]));
        return $ym;
    }
}