<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

	public function bus()
	{
		$data['data'] = $this->Global_model->get_all('master_bus')->result();
		$this->load->view('master/bus', $data);
	}
	public function sopir()
	{
		$data['data'] = $this->Global_model->get_all('master_sopir')->result();
		$this->load->view('master/sopir', $data);
	}
	public function add_bus()
	{
		$nomor_plat_kendaraan = $this->input->post('nomor_plat_kendaraan', true);
		$jenis_angkutan = $this->input->post('jenis_angkutan', true);
		$nama_po = $this->input->post('nama_po', true);
		$trayek = $this->input->post('trayek', true);
		if (isPlatExist($nomor_plat_kendaraan)) {
			return responseBAD("Nomor Plat Kendaraan ini '" . $nomor_plat_kendaraan . "' Sudah terpakai !");
		}
		$id_bus = vigenereCipher($nomor_plat_kendaraan, 'encrypt'); // Mengenkrispi dengan Algoritma Vignere Chipper
		$data = array(
			'id_bus' => $id_bus,
			'nomor_plat_kendaraan' => strtoupper($nomor_plat_kendaraan),
			'jenis_angkutan' => $jenis_angkutan,
			'nama_po' => $nama_po,
			'trayek' => $trayek
		);
		$this->Global_model->insert('master_bus', $data);
		$this->load->library('ciqrcode');
		$fill = $id_bus;
		$config['cacheable']    = true;
		$config['cachedir']     = './assets/';
		$config['errorlog']     = './assets/';
		$config['imagedir']     = '.' . QR_PATH;
		$config['quality']      = true;
		$config['size']         = '1024';
		$config['black']        = array(224, 255, 255);
		$config['white']        = array(70, 130, 180);
		$this->ciqrcode->initialize($config);
		$image_name = $id_bus . '.png';
		$params['data'] = $fill;
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH . $config['imagedir'] . $image_name;
		$this->ciqrcode->generate($params);
		responseOK("Berhasil");
	}
	public function delete_bus()
	{
		$id = $this->input->post('id');
		$param = array(
			'id_bus' => $id
		);
		$this->Global_model->delete('master_bus', $param);
		$this->Global_model->delete('rampcheck', $param);
		$QR_NAME = $id;
		if ($QR_NAME && file_exists('.' . QR_PATH . $QR_NAME)) {
			unlink('.' . QR_PATH . $QR_NAME);
		}
		responseOK("Berhasil");
	}
	public function edit_bus()
	{
		$id_bus = $this->input->post('id_bus');
		$nama_po = $this->input->post('nama_po');
		$jenis_angkutan = $this->input->post('jenis_angkutan');
		$trayek = $this->input->post('trayek');

		$where = array(
			'id_bus' => $id_bus
		);
		$data = array(
			'nama_po' => $nama_po,
			'jenis_angkutan' => $jenis_angkutan,
			'trayek' => $trayek
		);
		$this->Global_model->update('master_bus', $where, $data);
		responseOK("Berhasil");
	}
	public function add_sopir()
	{
		$data = array(
			'nama_sopir' => $this->input->post('nama_sopir', true),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'telepon' => $this->input->post('telepon'),
			'alamat' => $this->input->post('alamat'),
		);
		$this->Global_model->insert('master_sopir', $data);
		responseOK("Berhasil");
	}
	public function edit_sopir()
	{
		$data = array(
			'nama_sopir' => $this->input->post('nama_sopir'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'telepon' => $this->input->post('telepon'),
			'alamat' => $this->input->post('alamat'),
		);
		$where = array(
			'id_sopir' => $this->input->post('id_sopir')
		);
		$this->Global_model->update('master_sopir', $where, $data);
		responseOK("Berhasil");
	}
	public function delete_sopir()
	{
		$id = $this->input->post('id');
		$param = array(
			'id_sopir' => $id
		);
		$this->Global_model->delete('master_sopir', $param);
		responseOK("Berhasil");
	}
}
