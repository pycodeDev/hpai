<?php
defined('BASEPATH') OR exit('No direct script access alowed');

class Login_model extends CI_Model
{
    private $table = "tb_user";

    public $username;
    public $password;

    public function rules()
    {
        return
        [
            [
                'field' => 'username',
                'label' => 'user',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Silahkan Isi Username'
                ]
            ],

            [
                'field' => 'password',
                'label' => 'pass',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Silahkan Isi Password'
                ]
            ]
        ];
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where($this->table,['username' => $username])->row_array();

        if($user)
        {
            if($user['password'] == md5($password))
            {
                $data = 
                [
                    'username' => $username,
                    'nama' => $user['nama'],
                    'akses' => $user['akses']
                ];
                if($user['akses'] == 'admin')
                {
                    $this->session->set_userdata($data);
                    redirect('admin/dashboard/index');
                }else if($user['akses'] == 'manager'){
                    $this->session->set_userdata($data);
                    redirect('manager/dashboard/index');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf Password Salah !</div>');
                redirect('login');
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf Username tidak Ditemukan !</div>');
            redirect('login');
        }
    }

    public function chg_pass(){
        $post = $this->input->post();

        $cekuser = $this->db->get_where($this->table,['username' => $this->session->set_userdata('username')])->num_rows();

        if ($cekuser>0) {
            $user = $this->db->get_where($this->table,['username' => $this->session->set_userdata('username')])->row_array();
            if (md5($user['password']) == $post['password']) {
                if ($post['pass_baru'] == $post['kon_pass']) {
                    $data = array(
                        'password' => md5($post['pass_baru'])
                    );
                    $this->db->update($this->table, $data, array("username" => $this->session->set_userdata('username')));
                }else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf Password Tidak Sama dengan Username yang sedang login !</div>');
                    redirect(site_url('admin/dashboard/config'));
                }
            }else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf Password Tidak Sama dengan Username yang sedang login !</div>');
                redirect(site_url('admin/dashboard/config'));
            }
        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf Username tidak Ditemukan !</div>');
            redirect(site_url('admin/dashboard/config'));
        }
    }
}