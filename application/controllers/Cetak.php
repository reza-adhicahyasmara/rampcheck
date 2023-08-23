<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(base_url('auth'));
		}
	}

	public function label()
	{
		$data['data'] = $this->Global_model->get_all('master_bus')->result();
		$this->load->view('cetak/label', $data);
	}
	public function printout_label()
	{
		$item = $this->input->post('item');
		if (sizeof($item) != 0) {
			$data['data'] = $item;
			$this->load->view('cetak/printout_label', $data);
			return;
		}
		echo "<script>alert('GAGAL. Pilih Minimal 1 BUS untuk di cetak labelnya !'); close();</script>";
	}
}
