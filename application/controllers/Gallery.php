<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function __construct()
    {
     parent::__construct();
     $this->load->model('m_gallery');
    }

	public function index()
	{
        $data = array(
            'title'     => 'Web Sekolah',
            'title2'    => 'Gallery Foto',
            'gallery'   => $this->m_gallery->lists(),
            'isi'       => 'admin/gallery/v_list');

		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}
}
