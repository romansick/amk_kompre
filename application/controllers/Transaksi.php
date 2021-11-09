<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model');
        $data['bayar'] = $this->Admin_model->getTransaksi();


        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function terima($id)
    {
        $status_pembayaran = 'Berhasil';

        $this->db->set('status_pembayaran', $status_pembayaran);
        $this->db->where('id', $id);
        $this->db->update('metode_bayar');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                        Pembayaran Berhasil Dikonfirmasi!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('transaksi'); // Produces: INSERT INTO mytable (`name`) VALUES ('{$name}')
    }
    public function tolak($id)
    {
        $status_pembayaran = 'Gagal';

        $this->db->set('status_pembayaran', $status_pembayaran);
        $this->db->where('id', $id);
        $this->db->update('metode_bayar');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                        Pembayaran Berhasil Ditolak
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('transaksi'); // Produces: INSERT INTO mytable (`name`) VALUES ('{$name}')
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
        $this->load->view('konsumen/invoice', $data);
        $this->load->view('template/footer', $data);
    }
}
