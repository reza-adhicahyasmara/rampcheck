<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function bus()
	{
        $data['data']=$this->Global_model->get_all('master_bus')->result();
		$this->load->view('master/bus',$data);
	}
}
