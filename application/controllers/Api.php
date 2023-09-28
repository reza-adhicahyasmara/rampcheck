<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Header('Access-Control-Allow-Origin: *');
class Api extends CI_Controller  {

    public function login(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $data=array(
            'username'=>$username,
            'password'=>$password,
        );
        $result=$this->Authentication->login($data);
        if($result->num_rows() == 0){
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(500)
            ->set_output(json_encode(array(
                    'status' => False,
                    'messages' => 'Username Atau Password salah !'
            )));
        }
         $row=$result->row();
         if($row->role !=2){
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(500)
            ->set_output(json_encode(array(
                    'status' => False,
                    'messages' => 'Akun ini bukan akun Checker Rampcheck'
            )));
         }
            $params=array(
                'id_user'=>$row->id_user,
                'username'=>$row->username,
                'nama'=>$row->nama,
            );
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                    'status' => true,
                    'messages' => 'Login Sukses',
                    'data'=>$params
            )));
    }   
    public function dashboard(){
            $data=getDashboardAndroid();
           return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data
            ));
    }
    public function getAllCheck(){
        $data=$this->Global_model->getRampcheck()->result();
        $response=array(
            'data'=>$data
        );
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($response
            ));
    }
    public function detailCheck(){
        $idRampcheck=$this->input->post('id_rampcheck');
        $where = array(
			'id_rampcheck' => $idRampcheck
		);
		$data = $this->Global_model->getRampcheck($where)->row();
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode($data
        ));
    }
    public function detailCheckWebView($idRampcheck){
        $where = array(
			'id_rampcheck' => $idRampcheck
		);
		$data['data'] = $this->Global_model->getRampcheck($where)->row();
        $this->load->view('rampcheck',$data);
    }
    public function scanBarcode(){
        $id_bus=$this->input->post('id_bus');
        $where=array(
            'id_bus'=>$id_bus
        );
        $result=$this->Global_model->get_by_id('master_bus',$where);
        if($result->num_rows()==0){
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(500)
            ->set_output(json_encode(array(
                    'status' => False,
                    'messages' => 'Barcode atau BUS tidak terdaftar !'
            )));
        }
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode(
            $result->row()
        ));
    }
    public function insertRampcheck(){
        $id_bus = $this->input->post('id_bus');
        $id_sopir = $this->input->post('id_sopir');
        $kartu_uji_stuk = $this->input->post('kartu_uji_stuk');
        $kp_reguler = $this->input->post('kp_reguler');
        $kp_cadangan = $this->input->post('kp_cadangan');
        $sim_pengemudi = $this->input->post('sim_pengemudi');
        $lampu_dekat_kanan = $this->input->post('lampu_dekat_kanan');
        $lampu_dekat_kiri = $this->input->post('lampu_dekat_kiri');
        $lampu_jauh_kanan = $this->input->post('lampu_jauh_kanan');
        $lampu_jauh_kiri = $this->input->post('lampu_jauh_kiri');
        $lampu_sein_depan_kanan = $this->input->post('lampu_sein_depan_kanan');
        $lampu_sein_depan_kiri = $this->input->post('lampu_sein_depan_kiri');
        $lampu_sein_belakang_kanan = $this->input->post('lampu_sein_belakang_kanan');
        $lampu_sein_belakang_kiri = $this->input->post('lampu_sein_belakang_kiri');
        $lampu_rem_kanan = $this->input->post('lampu_rem_kanan');
        $lampu_rem_kiri = $this->input->post('lampu_rem_kiri');
        $lampu_mundur_kanan = $this->input->post('lampu_mundur_kanan');
        $lampu_mundur_kiri = $this->input->post('lampu_mundur_kiri');
        $rem_utama = $this->input->post('rem_utama');
        $rem_parkir = $this->input->post('rem_parkir');
        $kaca_depan = $this->input->post('kaca_depan');
        $pintu_utama_depan = $this->input->post('pintu_utama_depan');
        $pintu_utama_belakang = $this->input->post('pintu_utama_belakang');
        $ban_depan_kanan = $this->input->post('ban_depan_kanan');
        $ban_depan_kiri = $this->input->post('ban_depan_kiri');
        $ban_belakang_kanan = $this->input->post('ban_belakang_kanan');
        $ban_belakang_kiri = $this->input->post('ban_belakang_kiri');
        $sabuk_keselamatan = $this->input->post('sabuk_keselamatan');
        $pengukur_kecepatan = $this->input->post('pengukur_kecepatan');
        $penghapus_kaca = $this->input->post('penghapus_kaca');
        $pintu_darurat = $this->input->post('pintu_darurat');
        $jendela_darurat = $this->input->post('jendela_darurat');
        $alat_pemecah_kaca = $this->input->post('alat_pemecah_kaca');
        $lampu_posisi_depan_kanan = $this->input->post('lampu_posisi_depan_kanan');
        $lampu_posisi_depan_kiri = $this->input->post('lampu_posisi_depan_kiri');
        $lampu_posisi_belakang_kanan = $this->input->post('lampu_posisi_belakang_kanan');
        $lampu_posisi_belakang_kiri = $this->input->post('lampu_posisi_belakang_kiri');
        $kaca_spion = $this->input->post('kaca_spion');
        $klakson = $this->input->post('klakson');
        $lantai_dan_tangga = $this->input->post('lantai_dan_tangga');
        $jalan_tempat_duduk_penumpang = $this->input->post('jalan_tempat_duduk_penumpang');
        $ban_cadangan = $this->input->post('ban_cadangan');
        $segitiga_pengaman = $this->input->post('segitiga_pengaman');
        $dongkrak = $this->input->post('dongkrak');
        $pembuka_roda = $this->input->post('pembuka_roda');
        $lampu_senter = $this->input->post('lampu_senter');
        $nama_penguji = $this->input->post('nama_penguji');
        $nip_penguji = $this->input->post('nip_penguji');
        $nama_penyidik = $this->input->post('nama_penyidik');
        $nip_penyidik = $this->input->post('nip_penyidik');
        $nama_po = $this->input->post('nama_po');
        $jenis_angkutan = $this->input->post('jenis_angkutan');
        $trayek = $this->input->post('trayek');
        $nama_sopir = $this->input->post('nama_sopir');
        $tanggal_pemeriksaan = $this->input->post('tanggal_pemeriksaan');
        $status = $this->input->post('status');

        $data = array(
            'id_bus' => $id_bus,
            'id_sopir' => $id_sopir,
            'kartu_uji_stuk' => $kartu_uji_stuk,
            'kp_reguler' => $kp_reguler,
            'kp_cadangan' => $kp_cadangan,
            'sim_pengemudi' => $sim_pengemudi,
            'lampu_dekat_kanan' => $lampu_dekat_kanan,
            'lampu_dekat_kiri' => $lampu_dekat_kiri,
            'lampu_jauh_kanan' => $lampu_jauh_kanan,
            'lampu_jauh_kiri' => $lampu_jauh_kiri,
            'lampu_sein_depan_kanan' => $lampu_sein_depan_kanan,
            'lampu_sein_depan_kiri' => $lampu_sein_depan_kiri,
            'lampu_sein_belakang_kanan' => $lampu_sein_belakang_kanan,
            'lampu_sein_belakang_kiri' => $lampu_sein_belakang_kiri,
            'lampu_rem_kanan' => $lampu_rem_kanan,
            'lampu_rem_kiri' => $lampu_rem_kiri,
            'lampu_mundur_kanan' => $lampu_mundur_kanan,
            'lampu_mundur_kiri' => $lampu_mundur_kiri,
            'rem_utama' => $rem_utama,
            'rem_parkir' => $rem_parkir,
            'kaca_depan' => $kaca_depan,
            'pintu_utama_depan' => $pintu_utama_depan,
            'pintu_utama_belakang' => $pintu_utama_belakang,
            'ban_depan_kanan' => $ban_depan_kanan,
            'ban_depan_kiri' => $ban_depan_kiri,
            'ban_belakang_kanan' => $ban_belakang_kanan,
            'ban_belakang_kiri' => $ban_belakang_kiri,
            'sabuk_keselamatan' => $sabuk_keselamatan,
            'pengukur_kecepatan' => $pengukur_kecepatan,
            'penghapus_kaca' => $penghapus_kaca,
            'pintu_darurat' => $pintu_darurat,
            'jendela_darurat' => $jendela_darurat,
            'alat_pemecah_kaca' => $alat_pemecah_kaca,
            'lampu_posisi_depan_kanan' => $lampu_posisi_depan_kanan,
            'lampu_posisi_depan_kiri' => $lampu_posisi_depan_kiri,
            'lampu_posisi_belakang_kanan' => $lampu_posisi_belakang_kanan,
            'lampu_posisi_belakang_kiri' => $lampu_posisi_belakang_kiri,
            'kaca_spion' => $kaca_spion,
            'klakson' => $klakson,
            'lantai_dan_tangga' => $lantai_dan_tangga,
            'jalan_tempat_duduk_penumpang' => $jalan_tempat_duduk_penumpang,
            'ban_cadangan' => $ban_cadangan,
            'segitiga_pengaman' => $segitiga_pengaman,
            'dongkrak' => $dongkrak,
            'pembuka_roda' => $pembuka_roda,
            'lampu_senter' => $lampu_senter,
            'nama_penguji' => $nama_penguji,
            'nip_penguji' => $nip_penguji,
            'nama_penyidik' => $nama_penyidik,
            'nip_penyidik' => $nip_penyidik,
            'nama_po' => $nama_po,
            'jenis_angkutan' => $jenis_angkutan,
            'trayek' => $trayek,
            'nama_sopir' => $nama_sopir,
            'tanggal_pemeriksaan' => $tanggal_pemeriksaan,
            'status' => $status
        );
        $data = $this->Global_model->insertcallback('rampcheck',$data);
        $response=array(
            'messages'=>'Data Rampcheck Berhasil di simpan !',
            'id_rampcheck'=>$data
        );
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode($response
        ));
    }
}

