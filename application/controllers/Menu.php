<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Menu Management';
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/head', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('template/footer', $data);
        } else {
            $data = [
                'menu'        => $this->input->post('menu'),
            ];
            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                              Menu Berhasil Ditambahkan!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
            );
            redirect('menu');
        }
    }
    // edit menu
    public function editmenu($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Edit Menu';
        $data['menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('menu/edit_menu', $data);
        $this->load->view('template/footer', $data);
    }
    public function savemenu()
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim');

        $menu = $this->input->post('menu');

        $this->db->set('menu', $menu);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                              Menu Berhasil Diupdate!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
        );
        redirect('menu');
    }
    public function savesubmenu()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('url', 'Url', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');

        $judul = $this->input->post('judul');
        $url = $this->input->post('url');
        $icon = $this->input->post('icon');

        $this->db->set('judul', $judul);
        $this->db->set('url', $url);
        $this->db->set('icon', $icon);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                             Sub Menu Berhasil Diupdate!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
        );
        redirect('menu/submenu');
    }
    public function submenu()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['title'] = 'Sub Menu Management';
        $data['submenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required|trim');
        $this->form_validation->set_rules('url', 'Url', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
        $this->form_validation->set_rules('is_active', 'Active', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/head', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('template/footer', $data);
        } else {
            $data = [
                'judul'        => $this->input->post('judul'),
                'menu_id'      => $this->input->post('menu_id'),
                'url'          => $this->input->post('url'),
                'icon'         => $this->input->post('icon'),
                'is_active'    => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                              Sub Menu Berhasil Ditambahkan!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
            );
            redirect('menu/submenu');
        }
    }
    public function delete_submenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                            <i class="mdi mdi-bullseye-arrow mr-2"></i>
                              Sub Menu Berhasil Dihapus!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
        );
        redirect('menu/submenu');
    }
    public function nonaktif($id)
    {
        $is_active = 0;

        $this->db->set('is_active', $is_active);
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                        Sub Menu Berhasil di Non Aktifkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('menu/submenu');
    }
    public function aktif($id)
    {
        $is_active = 1;

        $this->db->set('is_active', $is_active);
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    <i class="mdi mdi-check-all mr-2"></i>
                        Sub Menu Berhasil di Non Aktifkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
        );
        redirect('menu/submenu');
    }
    public function editsubmenu($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Edit Sub Menu';
        $this->load->model("Menu_model");
        $data['sub'] = $this->Menu_model->SubMenu($id);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('template/head', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('menu/edit_sub_menu', $data);
        $this->load->view('template/footer', $data);
    }
}
