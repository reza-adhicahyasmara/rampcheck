<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(base_url('auth'));
		}
	}

	public function rampcheck()
	{
		$this->load->view('laporan/rampcheck');
	}
	public function sopir()
	{
		$data['sopir'] = $this->Global_model->get_all('master_sopir')->result();
		$this->load->view('laporan/sopir', $data);
	}
	public function bus()
	{
		$data['bus'] = $this->Global_model->get_all('master_bus')->result();
		$this->load->view('laporan/bus', $data);
	}
}
