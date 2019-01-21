<?php

function id($token,$jumlah,$wait) {
	$x = 0; 
	while($x < $jumlah) {

	$rand 	= rand(1,99999);
    $ch 	= curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.indkota.com/Content/Content/read?member_token='.$token.'&content_id=$rand&lang=indonesian&device_id=$rand");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    $result = curl_exec($ch);
    curl_close ($ch);
	echo $result."\n";
    sleep($wait);
    $x++;
    flush();
	} 
}  

echo "Token ?\nInput : ";
$token = trim(fgets(STDIN));
echo "Jumlah ?\nInput : ";
$jumlah = trim(fgets(STDIN));
echo "Jeda ?(ex:0)\nInput : ";
$wait = trim(fgets(STDIN));
$submit = id($token,$jumlah,$wait);
print $submit;
?>
