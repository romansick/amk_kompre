<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pimpinan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');
        $data['tipe'] = $this->Admin_model->countRumah();
        // $data['lokasi'] = $this->Admin_model->countRumahByLokasi();
        $data['lokasi'] = $this->db->get('lokasi_rumah')->result_array();
        $data['konsumen'] = $this->Admin_model->konsumen();
        $data['rumah'] = $this->Admin_model->rumah();
        $data['transaksi'] = $this->Admin_model->transaksi();
        $data['title'] = 'Dashboard';

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pimpinan/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function rumah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

        $data['title'] = 'Data Rumah';
        $data['kategori'] = $this->db->get('tipe_rumah')->result_array();
        $data['lokasi'] = $this->db->get('lokasi_rumah')->result_array();
        $data['list'] = $this->db->get('list_rumah')->result_array();
        $data['rumah'] = $this->Admin_model->getRumah();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pimpinan/rumah', $data);
        $this->load->view('template/footer', $data);
    }
    public function detailrumah($id)
    {
        $data['title'] = 'Detail Rumah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');
        $data['rumah'] = $this->Admin_model->countRumahById($id);

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pimpinan/detail_rumah', $data);
        $this->load->view('template/footer', $data);
    }
    public function user()
    {
        $data['title'] = 'User Management';
        $this->load->model('Admin_model');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['getuser'] = $this->Admin_model->getUserNew();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pimpinan/user', $data);
        $this->load->view('template/footer', $data);
    }
    public function transaksi()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model');
        $data['bayar'] = $this->Admin_model->getTransaksi();


        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pimpinan/transaksi', $data);
        $this->load->view('template/footer', $data);
    }
    public function konsumen()
    {
        $data['title'] = 'Data Konsumen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model');
        $data['konsumen'] = $this->db->get_where('user', ['role_id' => 3])->result_array();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pimpinan/konsumen', $data);
        $this->load->view('template/footer', $data);
    }
    public function view_invoice($id)
    {
        $data['title'] = 'Invoice';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model');
        $data['invoice'] = $this->Admin_model->getInvoice($id);

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pimpinan/invoice', $data);
        $this->load->view('template/footer', $data);
    }
    public function aktif_user($id)
    {
        $is_active = 0;

        $this->db->set('is_active', $is_active);
        $this->db->where('id', $id);
        $this->db->update('user');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                        User Berhasil di Non Aktifkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('pimpinan/user');
    }
    public function non_aktif_user($id)
    {
        $is_active = 1;

        $this->db->set('is_active', $is_active);
        $this->db->where('id', $id);
        $this->db->update('user');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                        User Berhasil di Aktifkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('pimpinan/user');
    }

    public function bank()
    {
        $data['title'] = 'Bank';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['bank'] = $this->db->get('bank')->result_array();

        $this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'required');
        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required|trim');
        $this->form_validation->set_rules('nama_bank', 'Bank', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/head', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('pimpinan/bank', $data);
            $this->load->view('template/footer', $data);
        } else {
            $data = [
                'no_rek' => $this->input->post('no_rek'),
                'nama_pemilik' => $this->input->post('nama_pemilik'),
                'nama_bank' => $this->input->post('nama_bank'),
                'is_active' => 1,
            ];
            $this->db->insert('bank', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                               Bank Berhasil Ditambahkan!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                </div>'
            );
            redirect('pimpinan/bank');
        }
    }
    public function edit_bank($id)
    {
        $data['title'] = 'Edit Bank';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['bank'] = $this->db->get_where('bank', ['id' => $id])->row_array();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pimpinan/edit_bank', $data);
        $this->load->view('template/footer', $data);
    }
    public function savebank()
    {
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required|trim');
        $this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'required|trim');
        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required|trim');

        $nama_bank = $this->input->post('nama_bank');
        $no_rek = $this->input->post('no_rek');
        $nama_pemilik = $this->input->post('nama_pemilik');

        $this->db->set('no_rek', $no_rek);
        $this->db->set('nama_pemilik', $nama_pemilik);
        $this->db->set('nama_bank', $nama_bank);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('bank');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                              Data Bank Berhasil Diupdate!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
        );
        redirect('pimpinan/bank');
    }
    public function delete_bank($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('bank');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                               Bank Berhasil Dihapus!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                </div>'
        );
        redirect('pimpinan/bank');
    }
    public function nonaktif($id)
    {
        $is_active = 0;

        $this->db->set('is_active', $is_active);
        $this->db->where('id', $id);
        $this->db->update('bank');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                       Bank Berhasil di Non Aktifkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('pimpinan/bank');
    }
    public function aktif($id)
    {
        $is_active = 1;

        $this->db->set('is_active', $is_active);
        $this->db->where('id', $id);
        $this->db->update('bank');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                       Bank Berhasil di Aktifkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('pimpinan/bank');
    }
}
