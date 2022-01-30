<?php

error_reporting(1);

system("clear");

$Token = "1808062016:AAFSGdtUgtHfwBKGPEKiL2IE45V_WtuHusM";

$Admin = 1484504144;

define('API_KEY',$Token);

function bot($method,$datas=[]){

    $url = "https://api.telegram.org/bot".API_KEY."/".$method;

$ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,$url);

    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);

    $res = curl_exec($ch);

    if(curl_error($ch)){

        var_dump(curl_error($ch));

    }else{

        return json_decode($res);

    }

}

function ValidUser(string $User = null){

return preg_match('/If you have <strong>Telegram<\/strong>, you can contact <a class="tgme_username_link"/',file_get_contents('https://t.me/'.$User));

}

$Array = $ValidUsers = $AnvalidUsers = [];

$i = 0;

while(true){

$i++;

$L1 = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWYZ'),1,1);

$L2 = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWYZ0123456789'),1,2);

$User = $L1.$L2."bot";

if(!in_array($User,$Array)){

if(ValidUser($User)){

system ("clear");

$Array[] = $User;

$ValidUsers[] = $User;

echo "[$i] Valid User : @$User

[+] Valid Users : ".count($ValidUsers)."

[+] All Users : ".count($Array);

bot('sendmessage',[

'chat_id'=>$Admin,

'text'=>"[$i] Valid User : @$User

[+] Valid Users : ".count($ValidUsers)."

[+] All Users : ".count($Array),

]);

}else{

system ("clear");

$Array[] = $User;

$AnvalidUsers[] = $User;

echo "[$i] Anvalid User : @$User

[+] Valid Users : ".count($ValidUsers)."

[+] All Users : ".count($Array);

}

}

}

