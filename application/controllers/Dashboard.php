<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$data['donat'] = getGrafikDonat();
		$data['line'] = getGrafikChart();
		$this->load->view('dashboard', $data);
	}
}
