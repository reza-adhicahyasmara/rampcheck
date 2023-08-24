<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rampcheck extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(base_url('auth'));
		}
	}

	public function index()
	{
		$data['bus'] = $this->Global_model->get_all('master_bus')->result();
		$data['sopir'] = $this->Global_model->get_all('master_sopir')->result();
		$data['data'] = $this->Global_model->getRampcheck()->result();
		$this->load->view('rampcheck/index', $data);
	}
	public function detail($id_rampcheck)
	{
		$where = array(
			'id_rampcheck' => $id_rampcheck
		);
		$data['data'] = $this->Global_model->getRampcheck($where)->row();
		$this->load->view('rampcheck/detail', $data);
	}
}
