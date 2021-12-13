<html><head></head><body>
<?php

//Visitas

$archi = 'contador';
$auxi = fopen($archi, 'rb');
$Visitas = fgets($auxi, 10);
$Visitas++;
fclose($auxi);

$auxi = fopen($archi, 'wb');
fwrite($auxi, $Visitas);
fclose($auxi);

// ip, fechahora, referido, isp

$ip=$_SERVER['REMOTE_ADDR'];

if (getenv("HTTP_X_FORWARDED_FOR")) {
$ip = getenv("HTTP_X_FORWARDED_FOR");
} else {
$ip = getenv("REMOTE_ADDR");
}

setlocale(LC_ALL,'spanish');
$zone=3600*2 ;
$fechahora=gmdate("j/m/y H:i:s", time() + $zone);
$referido=$_SERVER['HTTP_REFERER'] ;
$isp=gethostbyaddr("$REMOTE_ADDR") ;


$todo=$ip." ".$fechahora." ".$referido." ".$isp." ".$Visitas."\n" ;

$archi = 'Reg.txt';
$auxi = fopen($archi, 'a');
fwrite($auxi, $todo);
fclose($auxi);


?>

</body></html>