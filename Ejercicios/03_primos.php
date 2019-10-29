<?php

$numero = 23;

$esPrimo = true;
for($a=2; $a<$numero; $a++){
	if($numero % $a == 0){
		$esPrimo = false;
		break;
	}
}

if($esPrimo){
	echo '<h2>$numero es primo</h2>';
} else {
	echo '<h2>$numero no es primo</h2>';
}
?>
