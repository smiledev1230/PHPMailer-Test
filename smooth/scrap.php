<?php

$user = '278733';
$pass = '245145';
$url = 'http://www.angieslist.com/Login.aspx';

$ch = login();
$html = downloadUrl('http://search.angieslist.com/', $ch);
var_dump($html);

function downloadUrl($Url, $ch) {
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch, CURLOPT_REFERER, "http://www.google.com/");
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    var_dump($ch);
    exit();
    $output = curl_exec($ch);
    return $output;
}

function login() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://www.angieslist.com/Login.aspx'); //login URL
    curl_setopt($ch, CURLOPT_POST, 1);
    $postData = '
    _VIEWSTATE_KEY=805d4611-d531-47b4-a767-b21f61a71845&
    ctl00%24ContentPlaceMainHolderMainContent%24LoginControl%24UserNameTextbox=278733&
    ctl00%24ContentPlaceMainHolderMainContent%24LoginControl%24UserPasswordTextbox=245145&
    ctl00%24ContentPlaceMainHolderMainContent%24LoginControl%24LoginButton=Sign+In&
    ctl00%24ContentPlaceMainHolderMainContent%24LoginControl%24UserClientTime=Sun%2C+14+Jul+2013+10%3A38%3A16+GMT&
    ctl00%24ContentPlaceMainHolderMainContent%24LoginControl%24UserClientTimeZoneOffset=-420
    ';
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $store = curl_exec($ch);
    return $ch;
}