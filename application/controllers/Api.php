<?php
defined('BASEPATH') or exit('No direct script access allowed');
Header('Access-Control-Allow-Origin: *');
class Api extends CI_Controller
{

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $data = array(
            'username' => $username,
            'password' => $password,
        );
        $result = $this->Authentication->login($data);
        if ($result->num_rows() == 0) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode(array(
                    'status' => False,
                    'messages' => 'Username Atau Password salah !'
                )));
        }
        $row = $result->row();
        if ($row->role != 2) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode(array(
                    'status' => False,
                    'messages' => 'Akun ini bukan akun Checker Rampcheck'
                )));
        }
        $params = array(
            'id_user' => $row->id_user,
            'username' => $row->username,
            'nama' => $row->nama,
        );
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                'status' => true,
                'messages' => 'Login Sukses',
                'data' => $params
            )));
    }
    public function dashboard()
    {
        $data = getDashboardAndroid();
        $response = array(
            'data' => $data
        );
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(
                $response
            ));
    }
    public function getAllSopir()
    {
        $data = $this->Global_model->get_all('master_sopir')->result();
        $response = array(
            'data' => $data
        );
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(
                $response
            ));
    }
    public function getAllCheck()
    {
        $data = $this->Global_model->getRampcheck()->result();
        $response = array(
            'data' => $data
        );
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(
                $response
            ));
    }
    public function detailCheck()
    {
        $idRampcheck = $this->input->post('id_rampcheck');
        $where = array(
            'id_rampcheck' => $idRampcheck
        );
        $data = $this->Global_model->getRampcheck($where)->row();
        $response = array(
            'data' => $data
        );
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(
                $response
            ));
    }
    public function detailCheckWebView($idRampcheck)
    {
        $where = array(
            'id_rampcheck' => $idRampcheck
        );
        $data['data'] = $this->Global_model->getRampcheck($where)->row();
        $this->load->view('rampcheck', $data);
    }
    public function scanBarcode()
    {
        $id_bus = $this->input->post('id_bus');
        $where = array(
            'id_bus' => $id_bus
        );
        $result = $this->Global_model->get_by_id('master_bus', $where);
        if ($result->num_rows() == 0) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode(array(
                    'status' => False,
                    'messages' => 'Barcode atau BUS tidak terdaftar !'
                )));
        }
        $response = array(
            'data' => $result->row()
        );
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(
                $response
            ));
    }
    public function insertRampcheck()
    {
        $id_user = $this->input->post('id_user');
        $id_bus = $this->input->post('id_bus');
        $id_sopir = $this->input->post('id_sopir');
        $kartu_uji_stuk = $this->input->post('kartu_uji_stuk');
        $kp_reguler = $this->input->post('kp_reguler');
        $kp_cadangan = $this->input->post('kp_cadangan');
        $sim_pengemudi = $this->input->post('sim_pengemudi');
        $lampu_utama_dekat = $this->input->post('lampu_utama_dekat');
        $lampu_utama_jauh = $this->input->post('lampu_utama_jauh');
        $lampu_sein_depan = $this->input->post('lampu_sein_depan');
        $lampu_sein_belakang = $this->input->post('lampu_sein_belakang');
        $lampu_rem = $this->input->post('lampu_rem');
        $lampu_mundur = $this->input->post('lampu_mundur');
        $rem_utama = $this->input->post('rem_utama');
        $rem_parkir = $this->input->post('rem_parkir');
        $kondisi_kaca_depan = $this->input->post('kondisi_kaca_depan');
        $pintu_utama = $this->input->post('pintu_utama');
        $kondisi_ban_depan = $this->input->post('kondisi_ban_depan');
        $kondisi_ban_belakang = $this->input->post('kondisi_ban_belakang');
        $sabuk_keselamatan_pengemudi = $this->input->post('sabuk_keselamatan_pengemudi');
        $pengukur_kecepatan = $this->input->post('pengukur_kecepatan');
        $penghapus_kaca = $this->input->post('penghapus_kaca');
        $pintu_darurat = $this->input->post('pintu_darurat');
        $jendela_darurat = $this->input->post('jendela_darurat');
        $alat_pemukul_pemecah_kaca = $this->input->post('alat_pemukul_pemecah_kaca');
        $lampu_posisi_depan = $this->input->post('lampu_posisi_depan');
        $lampu_posisi_belakang = $this->input->post('lampu_posisi_belakang');
        $kaca_spion = $this->input->post('kaca_spion');
        $klakson = $this->input->post('klakson');
        $lantai_dan_tangga = $this->input->post('lantai_dan_tangga');
        $jln_tempat_duduk_penumpang = $this->input->post('jln_tempat_duduk_penumpang');
        $ban_cadangan = $this->input->post('ban_cadangan');
        $segitiga_pengaman = $this->input->post('segitiga_pengaman');
        $dongkrak = $this->input->post('dongkrak');
        $pembuka_roda = $this->input->post('pembuka_roda');
        $lampu_senter = $this->input->post('lampu_senter');

        $penguji = getUserById($id_user);
        $nama_penguji = $penguji->nama;
        $nip_penguji = $penguji->nip;
        $penyidik = getPenyidik();
        $nama_penyidik = $penyidik->nama_penyidik;
        $nip_penyidik = $penyidik->nip_penyidik;

        $bus = getBusById($id_bus);
        $nama_po = $bus->nama_po;
        $jenis_angkutan = $bus->jenis_angkutan;
        $trayek = $bus->trayek;
        $sopir = getSopirById($id_sopir);
        $nama_sopir = $sopir->nama_sopir;

        $lampu_dekat = getValueForStatusLampu($lampu_utama_dekat);
        $lampu_jauh = getValueForStatusLampu($lampu_utama_jauh);
        $lampu_sein_depan_detail = getValueForStatusLampu($lampu_sein_depan);
        $lampu_sein_belakang_detail = getValueForStatusLampu($lampu_sein_belakang);
        $lampu_rem_detail = getValueForStatusLampu($lampu_rem);
        $lampu_mundur_detail = getValueForStatusLampu($lampu_mundur);
        $pintu_utama_detail = getValueForStatusPintuUtama($pintu_utama);
        $ban_depan_detail = getValueForStatusKondisiBan($kondisi_ban_depan);
        $ban_belakang_detail = getValueForStatusKondisiBan($kondisi_ban_belakang);
        $lampu_posisi_depan_detail = getValueForStatusLampu($lampu_posisi_depan);
        $lampu_posisi_belakang_detail = getValueForStatusLampu($lampu_posisi_belakang);
        $data = array(
            'id_user' => $id_user,
            'id_bus' => $id_bus,
            'id_sopir' => $id_sopir,
            'kartu_uji_stuk' => getValueForStatusAdministrasi($kartu_uji_stuk),
            'kp_reguler' => getValueForStatusAdministrasi($kp_reguler),
            'kp_cadangan' => getValueForStatusAdministrasi($kp_cadangan),
            'sim_pengemudi' => getValueForStatusSim($sim_pengemudi),
            'lampu_dekat_kanan' => $lampu_dekat['kanan'],
            'lampu_dekat_kiri' => $lampu_dekat['kiri'],
            'lampu_jauh_kanan' => $lampu_jauh['kanan'],
            'lampu_jauh_kiri' => $lampu_jauh['kiri'],
            'lampu_sein_depan_kanan' => $lampu_sein_depan_detail['kanan'],
            'lampu_sein_depan_kiri' => $lampu_sein_depan_detail['kiri'],
            'lampu_sein_belakang_kanan' =>  $lampu_sein_belakang_detail['kanan'],
            'lampu_sein_belakang_kiri' =>  $lampu_sein_belakang_detail['kiri'],
            'lampu_rem_kanan' => $lampu_rem_detail['kanan'],
            'lampu_rem_kiri' => $lampu_rem_detail['kiri'],
            'lampu_mundur_kanan' => $lampu_mundur_detail['kanan'],
            'lampu_mundur_kiri' => $lampu_mundur_detail['kiri'],
            'rem_utama' => getValueForStatusPengereman($rem_utama),
            'rem_parkir' => getValueForStatusPengereman($rem_parkir),
            'kaca_depan' => getValueForStatusKondisiKacaDepan($kondisi_kaca_depan),
            'pintu_utama_depan' => $pintu_utama_detail['depan'],
            'pintu_utama_belakang' => $pintu_utama_detail['belakang'],
            'ban_depan_kanan' => $ban_depan_detail['kanan'],
            'ban_depan_kiri' => $ban_depan_detail['kiri'],
            'ban_belakang_kanan' => $ban_belakang_detail['kanan'],
            'ban_belakang_kiri' => $ban_belakang_detail['kiri'],
            'sabuk_keselamatan' => getValueForStatusPerlengkapan($sabuk_keselamatan_pengemudi),
            'pengukur_kecepatan' =>  getValueForStatusPerlengkapan($pengukur_kecepatan),
            'penghapus_kaca' =>  getValueForStatusPerlengkapan($penghapus_kaca),
            'pintu_darurat' => getValueForStatusPerlengkapan($pintu_darurat),
            'jendela_darurat' =>  getValueForStatusPerlengkapan($jendela_darurat),
            'alat_pemecah_kaca' => getValueForStatusPerlengkapan($alat_pemukul_pemecah_kaca),
            'lampu_posisi_depan_kanan' => $lampu_posisi_depan_detail['kanan'],
            'lampu_posisi_depan_kiri' => $lampu_posisi_depan_detail['kiri'],
            'lampu_posisi_belakang_kanan' => $lampu_posisi_belakang_detail['kanan'],
            'lampu_posisi_belakang_kiri' => $lampu_posisi_belakang_detail['kiri'],
            'kaca_spion' => getValueForStatusKacaSpion($kaca_spion),
            'klakson' => getValueForStatusKlakson($klakson),
            'lantai_dan_tangga' => getValueForStatusLantaiDanTangga($lantai_dan_tangga),
            'jalan_tempat_duduk_penumpang' => getValueForStatusTanggapDarurat($jln_tempat_duduk_penumpang),
            'ban_cadangan' => getValueForStatusBanCadangan($ban_cadangan),
            'segitiga_pengaman' => getValueForStatusPerlengkapan($segitiga_pengaman),
            'dongkrak' => getValueForStatusPerlengkapan($dongkrak),
            'pembuka_roda' => getValueForStatusPerlengkapan($pembuka_roda),
            'lampu_senter' => getValueForStatusLampuSenter($lampu_senter),
            'nama_penguji' => $nama_penguji,
            'nip_penguji' => $nip_penguji,
            'nama_penyidik' => $nama_penyidik,
            'nip_penyidik' => $nip_penyidik,
            'nama_po' => $nama_po,
            'jenis_angkutan' => $jenis_angkutan,
            'trayek' => $trayek,
            'nama_sopir' => $nama_sopir,
        );
        $data['status'] = generateStatusRampcheck($data);
        $data = $this->Global_model->insertcallback('rampcheck', $data);
        $response = array(
            'messages' => 'Data Rampcheck Berhasil di simpan !',
            'id_rampcheck' => $data
        );
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(
                $response
            ));
    }
}
