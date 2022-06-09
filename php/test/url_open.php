<?php
include './goBack.php';

$domain = 'www.google.com';
$curl = curl_init();

curl_setopt($curl, option: CURLOPT_URL, value: $domain);
if( $content = curl_exec($curl) ) echo "Go00000000000od Job";

curl_close($curl);



echo '<br/>';


$ip = gethostbyname( hostname: $domain );
echo $ip.'<br/>';

$ip_number = ip2long(ip: $ip);
echo $ip_number;

$ip_address = long2ip(ip: $ip_number);
echo $ip_address;
