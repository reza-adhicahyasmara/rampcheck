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
WHERE date_range.date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)
GROUP BY date_range.date
ORDER BY date_range.date;
        ")->result();
    }
}
