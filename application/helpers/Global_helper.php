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
        if ($res==1) {
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
