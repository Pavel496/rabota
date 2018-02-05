<?php

function sendsms($phone, $text){
$phone=preg_replace("|^8|","7",$phone);
$src = '<?xml version="1.0" encoding="UTF-8"?>
<SMS>
<operations>
<operation>SEND</operation>
</operations>
<authentification>
<username>89006406370@mail.ru</username>
<password>Olga1991</password>
</authentification>
<message>
<sender>Millenial</sender>';
$src .= '<text>'.$text.'</text>';
$src .= '</message>
<numbers>';
$src .= '<number>'.$phone.'</number>';
$src .= '</numbers>
</SMS>';

$Curl = curl_init();
$CurlOptions = array(
CURLOPT_URL=>'http://api.atompark.com/members/sms/xml.php',
CURLOPT_FOLLOWLOCATION=>false,
CURLOPT_POST=>true,
CURLOPT_HEADER=>false,
CURLOPT_RETURNTRANSFER=>true,
CURLOPT_CONNECTTIMEOUT=>15,
CURLOPT_TIMEOUT=>100,
CURLOPT_POSTFIELDS=>array('XML'=>$src),
);
curl_setopt_array($Curl, $CurlOptions);
if(false === ($Result = curl_exec($Curl))) {
throw new Exception('Http request failed');
}

curl_close($Curl);

return $Result;
}