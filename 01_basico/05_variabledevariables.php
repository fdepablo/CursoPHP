<?php
$var1 = 'HOLA';
$var2 = 'QUE';

//La siguiente variable se llama 'QUE' porque
//establece el nombre de la variable $$var
//como el contenido de la variable $var2 (QUE)
//es decir, $$var2 seria como poner '$QUE'
$$var2 = 'TAL';//creando la variable en tiempo de ejecucion

echo $var1.'<br/>';//muestra 'HOLA'
echo $var2.'<br/>';//muestra 'QUE'

echo $QUE.'<p/>';//muestra 'TAL'

echo $$var2;//muestra 'TAL', equivalente a $QUE


?>
