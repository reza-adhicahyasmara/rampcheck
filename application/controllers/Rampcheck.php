<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rampcheck extends CI_Controller {
	function __construct(){
        parent::__construct();
		if(!$this->session->userdata('id_user'))
        {
          redirect(base_url('auth'));
        }
    }

	public function index()
	{
		$this->load->view('rampcheck/index');
	}
}
