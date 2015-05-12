<?php
require_once 'php-webdriver';
$wd = new WebDriver();
$session = $wd->session();

function cookies_contain($cookies, $name) {
    foreach ($cookies as $arr) {
        if ($arr['name'] == $name) {
            return true;
        }
    }
    return false;
}

function get_cookie($cookies, $name) {
    foreach ($cookies as $arr) {
        if ($arr['name'] == $name) {
            return $arr;
        }
    }
    return false;
}

function alert_present($session) {
    try {
        $session->alert_text();
        return true;
    } catch (NoAlertOpenWebDriverError $e) {
       return false;
    }
}

function split_keys($toSend){
    $payload = array("value" => preg_split("//u", $toSend, -1, PREG_SPLIT_NO_EMPTY));
    return $payload;
}

$session->open("http://www.google.com/");

$session->close();
?>