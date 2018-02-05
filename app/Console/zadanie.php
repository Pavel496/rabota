<?php
set_time_limit(1200);
ini_set('max_execution_time', 1200);

function curl_redir_exec($ch)
{
static $curl_loops = 0;
static $curl_max_loops = 20;
if ($curl_loops >= $curl_max_loops)
{
$curl_loops = 0;
return false;
}
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
list($header, $data) = explode("\n\n", $data, 2);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($http_code == 301 || $http_code == 302)
{
$matches = array();
preg_match('/Location:(.*?)\n/', $header, $matches);
$url = @parse_url(trim(array_pop($matches)));
if (!$url)
{
$curl_loops = 0;
return $data;
}
$last_url = parse_url(curl_getinfo($ch, CURLINFO_EFFECTIVE_URL));

if (!$url['scheme'])
$url['scheme'] = $last_url['scheme'];
if (!$url['host'])
$url['host'] = $last_url['host'];
if (!$url['path'])
$url['path'] = $last_url['path'];
$new_url = $url['scheme'] . '://' . $url['host'] . $url['path'] . ($url['query']?'?'.$url['query']:'');
//echo $new_url.' —- '.$http_code.'<br>';
curl_setopt($ch, CURLOPT_URL, $new_url);
return array(curl_redir_exec($ch),$new_url);
}
else
{
$curl_loops = 0;
return $data;
}
}

$rabota_script=1;

while($rabota_script){
// 1. инициализация 
$ch = curl_init(); 

$referer="http://board.gatchina.biz/item/33/1/1.html";
$url=$referer;
//myecho "<h1>http://board.gatchina.biz/item/33/1/1.html</h1>";
// 2. указываем параметры, включая url 

$proxy="92.63.195.215:65233";
$user="89006406370";
$pass="zOfwGNQw";
$useragent_arr=array("Mozilla/5.0 (Windows; U; Windows NT 6.0; ru; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13 ( .NET CLR 3.5.30729)", "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.3) Gecko/2008092417 Firefox/3.0.3", "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.0.3) Gecko/2008092417 Firefox/3.0.17", "Mozilla/5.0 (Windows; U; Windows NT 6.0; ru; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13 ( .NET CLR 3.5.30729)", "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.0.17) Gecko/2009122116 Firefox/3.0.17", "Mozilla/5.0 (Windows; U; Windows NT 6.1; ru; rv:1.9.0.17) Gecko/2009122116 Firefox/3.0.17", "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)", "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)", "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.1.5) Gecko/20091102 Firefox/3.5.5 WebMoney Advisor", "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.2.12) Gecko/20101026 Firefox/3.6.12", "Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0", "Mozilla/5.0 (Windows NT 6.1; rv:31.0) Gecko/20100101 Firefox/31.0", "Opera/10.00 (Windows NT 5.1; U; ru) Presto/2.2.0", "Opera/9.00 (Windows NT 5.1; U; ru) Presto/2.2.0", "Opera/8.00 (Windows NT 5.1; U; ru) Presto/2.2.0", "Opera/9.80 (Windows NT 5.1; U; ru) Presto/2.9.168 Version/11.51", "Chrome: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.2 (KHTML, like Gecko) Chrome/22.0.1216.0 Safari/537.2", "Internet Explorer 10: Mozilla/1.22 (compatible; MSIE 10.0; Windows 3.1)", "Internet Explorer 6: Mozilla/4.08 (compatible; MSIE 6.0; Windows NT 5.1)", "IE 11: Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko", "Opera: Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14", "Safari: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.75.14 (KHTML, like Gecko) Version/7.0.3 Safari/7046A194A");

$useragent=$useragent_arr[array_rand($useragent_arr)];
curl_setopt($ch, CURLOPT_REFERER, $referer);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user.":".$pass);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, $useragent); 

// 3. получаем HTML в качестве результата 
$output = iconv('CP1251', 'UTF-8', curl_exec($ch));
// А вдруг ошибочка? 
if ($output === FALSE) { 
//Тут-то мы о ней и скажем 
echo "cURL Error: " . curl_error($ch); 
return; 
} 
//Получаем информацию о запросе 
$info = curl_getinfo($ch); 
//Выводим какую-то инфомрацию 
//echo 'Запрос выполнился за ' . $info['total_time'] . ' сек. к URL: ' . $info['url']."<hr>";

preg_match('|emlAddr=new Array\("([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)"\);emlSrv=new Array\("([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)"\);|i', $output, $arrEmail);

//var_dump($arrEmail);

preg_match_all('|<TABLE class="main5" style="margin\-top:14px;"[^>]+>(.*)</TABLE><HR color=#808080 SIZE=1>|Uis', $output, $arr);

    
    
$collection = collect([]); 
$i=0;
foreach ($arr[1] as $value) {
$i++;
//echo "\n".$value."<br>";


//id gatchina biz

preg_match("|'delmessage','(\d+)\&|i", $value, $matches);
$id_biz = $matches[1];
//echo "\n<hr><hr>".$i.") ID GatchinaBiz: ".$id_biz."<br>";

//Дата
preg_match("|<TR><TD class=\"date\">([^<]+)<\/TD>|i", $value, $matches);
$date = preg_replace("|(\d+)\.(\d+)\.(\d+)|","$3-$2-$1", $matches[1]);
//echo "\nДата: ".$date."<br>";

//Заголовок
preg_match("|<H3>([^<]+)<\/H3>|i", $value, $matches);
$title = $matches[1];
//echo "\nЗаголовок: ".$title."<br>";

//Адрес и тел
preg_match("|<B>Адрес: </B>([^<]+)<BR><B>Тел.: </B>([^<]+)</TD>|i", $value, $matches);
$adres = $matches[1];
$tel = preg_replace("|\D+|", "", $matches[2]);
$tel = preg_replace("|^7|", "8", $tel);

if(strlen($tel)==10){
$tel="8".$tel;
}

//echo "\nАдрес: ".$adres."<br>";
//echo "\nТел: ".$tel."<br>";
//Email
$email="";
if($arrEmail[$i]!=""){
$email=$arrEmail[$i]."@".$arrEmail[$i+15];
//echo "\nEmail: ".$email."<br>";
}

//Текст
preg_match("|<TD colspan=2 class=\"message\"><DIV [^>]+></DIV>([^<]+)|i", $value, $matches);
$text = $matches[1];
//echo $text."<br>";

$collection->push(['title'=>$title, 'text'=>$text, 'wage'=>$email, 'company_address'=>$adres, 'phone_temp'=> $tel]);



}
//print_r($arr);

// 4. закрываем соединение 
curl_close($ch);

$rabota_script=0;

}
?>