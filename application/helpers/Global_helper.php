<?php

if (!function_exists('isPlatExist')) {
    function isPlatExist($platNomor)
    {
        $ci = &get_instance();
        $res = $ci->db->query("SELECT count(id_bus) as res from master_bus where nomor_plat_kendaraan='$platNomor'")->row()->res;
        if ($res) {
            return true;
        }
        return false;
    }
}
if (!function_exists('isUsernameExist')) {
    function isUsernameExist($username)
    {
        $ci = &get_instance();
        $res = $ci->db->query("SELECT count(id_user) as res from user where username='$username'")->row()->res;
        if ($res) {
            return true;
        }
        return false;
    }
}
if (!function_exists('isAdminLeftOne')) {
    function isAdminLeftOne()
    {
        $ci = &get_instance();
        $res = $ci->db->query("SELECT count(id_user) as res from user where role=1")->row()->res;
        if ($res == 1) {
            return true;
        }
        return false;
    }
}
if (!function_exists('responseOK')) {
    function responseOK($message = null, $data = null)
    {
        $ci = &get_instance();
        return $ci->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                'messages' => $message,
                'data' => $data
            )));
    }
}
if (!function_exists('responseBAD')) {
    function responseBAD($message = null)
    {
        $ci = &get_instance();
        return $ci->output
            ->set_content_type('application/json')
            ->set_status_header(500)
            ->set_output(json_encode(array(
                'messages' => $message,
            )));
    }
}
function vigenereCipher($inputText,  $mode = 'encrypt')
{
    $key = VIGENERE_CIPHER_KEY;
    $result = '';
    $inputText = strtoupper($inputText);
    $key = strtoupper($key);
    $keyLength = strlen($key);
    $inputLength = strlen($inputText);

    for ($i = 0; $i < $inputLength; $i++) {
        $inputChar = ord($inputText[$i]);
        $keyChar = ord($key[$i % $keyLength]);

        if ($inputChar >= 65 && $inputChar <= 90) {
            if ($mode === 'encrypt') {
                $encryptedChar = ($inputChar + $keyChar - 130) % 26 + 65;
            } else {
                $encryptedChar = ($inputChar - $keyChar + 26) % 26 + 65;
            }
            $result .= chr($encryptedChar);
        } else {
            $result .= $inputText[$i];
        }
    }
    return removeNonAlphanumeric($result);
}
function removeNonAlphanumeric($inputString)
{
    $cleanedString = preg_replace('/[^a-zA-Z0-9]/', '', $inputString);
    return $cleanedString;
}
function calculateAge($birthdate)
{
    $birthDate = new DateTime($birthdate);
    $currentDate = new DateTime();
    $ageInterval = $currentDate->diff($birthDate);
    return $ageInterval->y;
}
if (!function_exists('getDetailBus')) {
    function getDetailBus($id_bus)
    {
        $ci = &get_instance();
        return $ci->db->query("SELECT * from master_bus where id_bus='$id_bus'")->row();
    }
}
if (!function_exists('convertStatusRampcheck')) {
    function convertStatusRampcheck($status)
    {
        if ($status == 1) {
            return '<span class="badge badge-success">Laik Jalan</span>';
        }
        if ($status == 2) {
            return '<span class="badge badge-warning">Peringatan / Perbaiki</span>';
        }
        if ($status == 3) {
            return '<span class="badge badge-danger">Dilarang Operasional</span>';
        }
        if ($status == 4) {
            return '<span class="badge badge-danger">Tilang & Dilarang Operasional</span>';
        }
    }
}
if (!function_exists('convertStatusRampchecktoText')) {
    function convertStatusRampchecktoText($status)
    {
        if ($status == 1) {
            return 'Laik Jalan';
        }
        if ($status == 2) {
            return 'Peringatan / Perbaiki';
        }
        if ($status == 3) {
            return 'Dilarang Operasional';
        }
        if ($status == 4) {
            return 'Tilang & Dilarang Operasional';
        }
    }
}
if (!function_exists('limitText')) {
    function limitText($text)
    {
        $limit = 15;
        if (strlen($text) <= $limit) {
            return $text;
        } else {
            $text = substr($text, 0, $limit) . '...';
            return $text;
        }
    }
}
if (!function_exists('getTotalBus')) {
    function getTotalBus()
    {
        $ci = &get_instance();
        return $ci->db->query("SELECT count(id_bus) as res from master_bus")->row()->res;
    }
}
if (!function_exists('getTotalSopir')) {
    function getTotalSopir()
    {
        $ci = &get_instance();
        return $ci->db->query("SELECT count(id_sopir) as res from master_sopir")->row()->res;
    }
}
if (!function_exists('getTotalRampcheck')) {
    function getTotalRampcheck()
    {
        $ci = &get_instance();
        return $ci->db->query("SELECT count(id_rampcheck) as res from rampcheck")->row()->res;
    }
}
if (!function_exists('getTotalCheckerAndroid')) {
    function getTotalCheckerAndroid()
    {
        $ci = &get_instance();
        return $ci->db->query("SELECT count(id_user) as res from user where role=2")->row()->res;
    }
}
if (!function_exists('getGrafikDonat')) {
    function getGrafikDonat()
    {
        $ci = &get_instance();
        return $ci->db->query("SELECT SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS satu, SUM(CASE WHEN status = 2 THEN 1 ELSE 0 END) AS dua, SUM(CASE WHEN status = 3 THEN 1 ELSE 0 END) AS tiga, SUM(CASE WHEN status = 4 THEN 1 ELSE 0 END) AS empat FROM rampcheck;")->row();
    }
}
if (!function_exists('getGrafikChart')) {
    function getGrafikChart()
    {
        $ci = &get_instance();
        return $ci->db->query("
        SELECT
    date_range.date AS tanggal,
    COALESCE(COUNT(rampcheck.tanggal_pemeriksaan), 0) AS jumlah_data
FROM (
    SELECT CURDATE() - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY AS date
    FROM (
        SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
    ) AS a
    CROSS JOIN (
        SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
    ) AS b
    CROSS JOIN (
        SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
    ) AS c
) AS date_range
LEFT JOIN rampcheck ON DATE(rampcheck.tanggal_pemeriksaan) = date_range.date
WHERE date_range.date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
GROUP BY date_range.date
ORDER BY date_range.date;
        ")->result();
    }
}
if (!function_exists('convertStatusAdministrasi')) {
    function convertStatusAdministrasi($status)
    {
        if ($status == 1) {
            return '<span class="badge badge-success">Ada, Berlaku</span>';
        }
        if ($status == 2) {
            return '<span class="badge badge-danger">Tidak Berlaku</span>';
        }
        if ($status == 3) {
            return '<span class="badge badge-danger">Tidak Ada</span>';
        }
        if ($status == 4) {
            return '<span class="badge badge-danger">Tidak Sesuai Fisik</span>';
        }
        return '<span class="badge badge-secondary">Belum di isi</span>';
    }
}
if (!function_exists('convertStatusSim')) {
    function convertStatusSim($status)
    {
        if ($status == 11) {
            return '<span class="badge badge-success">A Umum</span>';
        }
        if ($status == 12) {
            return '<span class="badge badge-success">B1 Umum</span>';
        }
        if ($status == 13) {
            return '<span class="badge badge-success">B2 Umum</span>';
        }
        if ($status == 2) {
            return '<span class="badge badge-danger">SIM Tidak Sesuai</span>';
        }
        return '<span class="badge badge-secondary">Belum di isi</span>';
    }
}
if (!function_exists('convertLampu')) {
    function convertLampu($status)
    {
        if ($status == 1) {
            return '<span class="badge badge-success">Menyala</span>';
        }
        if ($status == 2) {
            return '<span class="badge badge-danger">Tidak Menyala</span>';
        }
        return '<span class="badge badge-secondary">Belum di isi</span>';
    }
}
if (!function_exists('convertRem')) {
    function convertRem($status)
    {
        if ($status == 1) {
            return '<span class="badge badge-success">Berfungsi</span>';
        }
        if ($status == 2) {
            return '<span class="badge badge-danger">Tidak Berfungsi</span>';
        }
        return '<span class="badge badge-secondary">Belum di isi</span>';
    }
}
if (!function_exists('convertKaca')) {
    function convertKaca($status)
    {
        if ($status == 1) {
            return '<span class="badge badge-success">Baik</span>';
        }
        if ($status == 2) {
            return '<span class="badge badge-danger">Buruk</span>';
        }
        return '<span class="badge badge-secondary">Belum di isi</span>';
    }
}
if (!function_exists('convertBan')) {
    function convertBan($status)
    {
        if ($status == 1) {
            return '<span class="badge badge-success">Laik</span>';
        }
        if ($status == 2) {
            return '<span class="badge badge-danger">Tidak Laik</span>';
        }
        return '<span class="badge badge-secondary">Belum di isi</span>';
    }
}
if (!function_exists('convertSabuk')) {
    function convertSabuk($status)
    {
        if ($status == 1) {
            return '<span class="badge badge-success">Ada dan Fungsi</span>';
        }
        if ($status == 2) {
            return '<span class="badge badge-danger">Tidak Fungsi</span>';
        }
        if ($status == 3) {
            return '<span class="badge badge-danger">Tidak Ada</span>';
        }
        return '<span class="badge badge-secondary">Belum di isi</span>';
    }
}
if (!function_exists('convertDarurat')) {
    function convertDarurat($status)
    {
        if ($status == 1) {
            return '<span class="badge badge-success">Ada</span>';
        }
        if ($status == 2) {
            return '<span class="badge badge-danger">Tidak Ada</span>';
        }
        return '<span class="badge badge-secondary">Belum di isi</span>';
    }
}
if (!function_exists('convertSpion')) {
    function convertSpion($status)
    {
        if ($status == 1) {
            return '<span class="badge badge-success">Sesuai</span>';
        }
        if ($status == 2) {
            return '<span class="badge badge-danger">Tidak Sesuai</span>';
        }
        return '<span class="badge badge-secondary">Belum di isi</span>';
    }
}

if (!function_exists('convertLantai')) {
    function convertLantai($status)
    {
        if ($status == 1) {
            return '<span class="badge badge-success">Baik</span>';
        }
        if ($status == 2) {
            return '<span class="badge badge-danger">Keropos/Berlubang</span>';
        }
        return '<span class="badge badge-secondary">Belum di isi</span>';
    }
}
if (!function_exists('convertBanCadangan')) {
    function convertBanCadangan($status)
    {
        if ($status == 1) {
            return '<span class="badge badge-success">Ada dan Laik</span>';
        }
        if ($status == 2) {
            return '<span class="badge badge-danger">Tidak Laik</span>';
        }
        if ($status == 3) {
            return '<span class="badge badge-danger">Tidak Ada</span>';
        }
        return '<span class="badge badge-secondary">Belum di isi</span>';
    }
}
if (!function_exists('getDashboardAndroid')) {
    function getDashboardAndroid()
    {
        $ci = &get_instance();
        return $ci->db->query("SELECT 
        SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS satu, 
        SUM(CASE WHEN status = 2 THEN 1 ELSE 0 END) AS dua, 
        SUM(CASE WHEN status = 3 THEN 1 ELSE 0 END) AS tiga, 
        SUM(CASE WHEN status = 4 THEN 1 ELSE 0 END) AS empat,
        (SELECT COUNT(id_rampcheck) FROM rampcheck) AS res 
    FROM rampcheck;")->row();
    }
}
if (!function_exists('getUserById')) {
    function getUserById($id_user)
    {
        $ci = &get_instance();
        return $ci->db->query("SELECT * FROM user where id_user=$id_user")->row();
    }
}
if (!function_exists('getPenyidik')) {
    function getPenyidik()
    {
        $ci = &get_instance();
        return $ci->db->query("SELECT * FROM master_struktural where id_struktural=1")->row();
    }
}
if (!function_exists('getBusById')) {
    function getBusById($id_bus)
    {
        $ci = &get_instance();
        return $ci->db->query("SELECT * FROM master_bus where id_bus=$id_bus")->row();
    }
}
if (!function_exists('getSopirById')) {
    function getSopirById($id_sopir)
    {
        $ci = &get_instance();
        return $ci->db->query("SELECT * FROM master_sopir where id_sopir=$id_sopir")->row();
    }
}
if (!function_exists('generateStatusRampcheck')) {
    function generateStatusRampcheck($data)
    {
    }
}
if (!function_exists('getValueForStatusAdministrasi')) {
    function getValueForStatusAdministrasi($string)
    {
        $mapping = [
            'Ada, Berlaku' => 1,
            'Tidak Berlaku' => 2,
            'Tidak Ada' => 3,
            'Tidak Sesuai Fisik' => 4
        ];

        return $mapping[$string] ?? null;
    }
}
if (!function_exists('getValueForStatusSim')) {
    function getValueForStatusSim($string)
    {
        $mapping = [
            'A UMUM' => 11,
            'B1 UMUM' => 12,
            'B2 UMUM' => 13,
            'SIM Tidak Sesuai' => 2
        ];

        return $mapping[$string] ?? null;
    }
}
if (!function_exists('getValueForStatusLampu')) {
    function getValueForStatusLampu($string)
    {
        if ($string == 'Semua Menyala') {
            $result = [
                'kanan' => 1,
                'kiri' => 1
            ];
            return $result;
        }
        if ($string == 'Kanan Tidak Menyala') {
            $result = [
                'kanan' => 2,
                'kiri' => 1
            ];
            return $result;
        }
        if ($string == 'Kiri Tidak Menyala') {
            $result = [
                'kanan' => 1,
                'kiri' => 2
            ];
            return $result;
        }
        if ($string == 'Kiri dan Kanan Tidak Menyala') {
            $result = [
                'kanan' => 2,
                'kiri' => 2
            ];
            return $result;
        }
        $result = [
            'kanan' => null,
            'kiri' => null
        ];
        return $result;
    }
}
if (!function_exists('getValueForStatusPengereman')) {
    function getValueForStatusPengereman($string)
    {
        $mapping = [
            'Berfungsi' => 1,
            'Tidak Berfungsi' => 2,
        ];
        return $mapping[$string] ?? null;
    }
}
if (!function_exists('getValueForStatusKondisiKacaDepan')) {
    function getValueForStatusKondisiKacaDepan($string)
    {
        $mapping = [
            'Baik' => 1,
            'Buruk' => 2,
        ];
        return $mapping[$string] ?? null;
    }
}
if (!function_exists('getValueForStatusPintuUtama')) {
    function getValueForStatusPintuUtama($string)
    {
        if ($string == 'Semua Berfungsi') {
            $result = [
                'depan' => 1,
                'belakang' => 1
            ];
            return $result;
        }
        if ($string == 'Depan Tidak Berfungsi') {
            $result = [
                'depan' => 2,
                'belakang' => 1
            ];
            return $result;
        }
        if ($string == 'Belakang Tidak Berfungsi') {
            $result = [
                'depan' => 1,
                'belakang' => 2
            ];
            return $result;
        }
        if ($string == 'Depan dan Belakang Tidak Berfungsi') {
            $result = [
                'depan' => 2,
                'belakang' => 2
            ];
            return $result;
        }
        $result = [
            'depan' => null,
            'belakang' => null
        ];
        return $result;
    }
}
if (!function_exists('getValueForStatusKondisiBan')) {
    function getValueForStatusKondisiBan($string)
    {
        if ($string == 'Semua Laik') {
            $result = [
                'kanan' => 1,
                'kiri' => 1
            ];
            return $result;
        }
        if ($string == 'Kanan Tidak Laik') {
            $result = [
                'kanan' => 2,
                'kiri' => 1
            ];
            return $result;
        }
        if ($string == 'Kiri Tidak Laik') {
            $result = [
                'kanan' => 1,
                'kiri' => 2
            ];
            return $result;
        }
        if ($string == 'Kiri dan Kanan Tidak Laik') {
            $result = [
                'kanan' => 2,
                'kiri' => 2
            ];
            return $result;
        }
        $result = [
            'kanan' => null,
            'kiri' => null
        ];
        return $result;
    }
}
if (!function_exists('getValueForStatusPerlengkapan')) {
    function getValueForStatusPerlengkapan($string)
    {
        $mapping = [
            'Ada dan Fungsi' => 1,
            'Tidak Berfungsi' => 2,
            'Tidak Ada' => 3,
        ];
        return $mapping[$string] ?? null;
    }
}
if (!function_exists('getValueForStatusTanggapDarurat')) {
    function getValueForStatusTanggapDarurat($string)
    {
        $mapping = [
            'Ada' => 1,
            'Tidak Ada' => 2,
        ];
        return $mapping[$string] ?? null;
    }
}
if (!function_exists('getValueForStatusKacaSpion')) {
    function getValueForStatusKacaSpion($string)
    {
        $mapping = [
            'Sesuai' => 1,
            'Tidak Sesuai' => 2,
        ];
        return $mapping[$string] ?? null;
    }
}
if (!function_exists('getValueForStatusKlakson')) {
    function getValueForStatusKlakson($string)
    {
        $mapping = [
            'Ada' => 1,
            'Tidak Berfungsi' => 2,
            'Tidak Ada' => 3,
        ];
        return $mapping[$string] ?? null;
    }
}
if (!function_exists('getValueForStatusLantaiDanTangga')) {
    function getValueForStatusLantaiDanTangga($string)
    {
        $mapping = [
            'Baik' => 1,
            'Keropos/Berlubang' => 2,
        ];
        return $mapping[$string] ?? null;
    }
}
if (!function_exists('getValueForStatusBanCadangan')) {
    function getValueForStatusBanCadangan($string)
    {
        $mapping = [
            'Ada dan Laik' => 1,
            'Tidak Laik' => 2,
            'Tidak Ada' => 3
        ];
        return $mapping[$string] ?? null;
    }
}
if (!function_exists('getValueForStatusLampuSenter')) {
    function getValueForStatusLampuSenter($string)
    {
        $mapping = [
            'Ada' => 1,
            'Tidak Berfungsi' => 2,
            'Tidak Ada' => 3
        ];
        return $mapping[$string] ?? null;
    }
}
