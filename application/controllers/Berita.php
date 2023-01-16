<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_berita');
    }

	public function index()
	{
        $data = array(
			'title'     => 'SMK Tamansiswa',
            'title2'    => 'Berita',
            'berita'    => $this->m_berita->lists(),
            'isi'       => 'admin/berita/v_list');

		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }
    
    public function add()
	{
        $this->form_validation->set_rules('judul_berita','Judul Berita','required');
        $this->form_validation->set_rules('isi_berita','Isi Berita','required',array('required'=>'Isi Berita Harus diisi'));


        if($this->form_validation->run() == TRUE){
            $config['upload_path']      = './gambar_berita/';
            $config['allowed_types']    = 'gif|jpg|png';
            $config['max_size']         = 2000;
            
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('gambar_berita'))
            {

                    $data = array(
                        'title'  => 'SMK Tamansiswa',
                        'title2' => 'Tambah Berita',
                        'error'  => $this->upload->display_errors(),
                        'isi'    => 'admin/berita/v_add');
            
                    $this->load->view('admin/layout/v_wrapper',$data,FALSE);
            }
            else
            {
                    $upload_data             = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2' ;
                    $config['source_i']      = './gambar_berita/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib',$config);

                    $data = array(
                                    'judul_berita'   => $this->input->post('judul_berita'),
                                    'slug_berita'    => url_title($this->input->post('judul_berita'),'dash',TRUE),
                                    'isi_berita'     => $this->input->post('isi_berita'),
                                    'tgl_berita'     => date('Y-m-d'),
                                    'id_user'        => $this->session->userdata('id_user'),
                                    'gambar_berita'  => $upload_data['uploads']['file_name'],

                    );
                    $this->m_berita->add($data);
                    $this->session->set_flashdata('pesan','Berita berhasil ditambahkan!!');
                    redirect('berita');

            }
              
        }

        $data = array(
			'title'     => 'SMK Tamansiswa',
            'title2'    => 'Tambah Berita',
            'berita'    => $this->m_berita->lists(),
            'isi'       => 'admin/berita/v_add');

		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }
    
    public function edit($id_berita)
	{
        $this->form_validation->set_rules('judul_berita','Judul Berita','required');
        $this->form_validation->set_rules('isi_berita','Isi Berita','required',array('required'=>'Isi Berita Harus diisi'));


        if($this->form_validation->run() == TRUE){
            $config['upload_path']      = './gambar_berita/';
            $config['allowed_types']    = 'gif|jpg|png';
            $config['max_size']         = 2000;
            
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('gambar_berita'))
            {

                    $data = array(
                        'title'  => 'SMK Tamansiswa',
                        'title2' => 'Edit Berita',
                        'error'  => $this->upload->display_errors(),
                        'berita' => $this->m_berita->detail($id_berita),
                        'isi'    => 'admin/berita/v_edit');
            
                    $this->load->view('admin/layout/v_wrapper',$data,FALSE);
            }
            else
            {
                    $upload_data             = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2' ;
                    $config['source_i']      = './gambar_berita/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib',$config);
                    $berita = $this->m_berita->detail($id_berita);
                    //Menghapus file foto lama
                    if ($berita->gambar_berita !="") {
                        unlink('./gambar_berita/'.$berita->gambar_berita);
                    }
                    //End menghapus foto
                    $data = array(
                                    'id_berita'      => $id_berita,
                                    'judul_berita'   => $this->input->post('judul_berita'),
                                    'slug_berita'    => url_title($this->input->post('judul_berita'),'dash',TRUE),
                                    'isi_berita'     => $this->input->post('isi_berita'),
                                    'id_user'        => $this->session->userdata('id_user'),
                                    'gambar_berita'  => $upload_data['uploads']['file_name'],

                    );
                    $this->m_berita->edit($data);
                    $this->session->set_flashdata('pesan','Berita berhasil diperbaharui!!');
                    redirect('berita');

            }
            $data = array(
                'id_berita'      => $id_berita,
                'judul_berita'   => $this->input->post('judul_berita'),
                'slug_berita'    => url_title($this->input->post('judul_berita'),'dash',TRUE),
                'isi_berita'     => $this->input->post('isi_berita'),
                'id_user'        => $this->session->userdata('id_user'),

            );
            $this->m_berita->edit($data);
            $this->session->set_flashdata('pesan','Berita berhasil diperbaharui!!');
            redirect('berita');

                        
            }

        $data = array(
			'title'     => 'SMK Tamansiswa',
            'title2'    => 'Edit Berita',
            'berita'    => $this->m_berita->detail($id_berita),
            'isi'       => 'admin/berita/v_edit');

		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }
    
    public function delete($id_berita){
        //Menghapus file foto
        $berita = $this->m_berita->detail($id_berita);
        if ($berita->gambar_berita !="") {
            unlink('./gambar_berita/'.$berita->gambar_berita);
        }
        //End menghapus foto

        $data = array('id_berita' => $id_berita);
        $this->m_berita->delete($data);
        $this->session->set_flashdata('pesan','Berita berhasil dihapus !!!');
        redirect('berita');
   }
}
