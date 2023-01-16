<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
        $data = array(
			'title' => 'SMK Tamansiswa',
			'title2' => 'Dashboard',
            'isi' => 'admin/v_home');

		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}
}
