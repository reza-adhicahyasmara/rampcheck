<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

	public function bus()
	{
		$data['data'] = $this->Global_model->get_all('master_bus')->result();
		$this->load->view('master/bus', $data);
	}
	public function add_bus()
	{
		$nomor_plat_kendaraan = $this->input->post('nomor_plat_kendaraan');
		$jenis_angkutan = $this->input->post('jenis_angkutan');
		$nama_po = $this->input->post('nama_po');
		$trayek = $this->input->post('trayek');
	}
}
