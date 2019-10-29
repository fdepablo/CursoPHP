<?php


//creamos una funcion que compruebe si un numero es mayor que cero
function comprobarNumeroPositivo($number) {
  if($number < 0) {
    //con la palabra throw podemos arrojar excepciones que son
    //objetos de la clase Exception, y se le puede pasar 
    //un mensaje a mostrar
    throw new Exception("El valor debe ser mayor que cero");
  }
  //devolvemos true y no arrojamos excepcion
  return true;
}
//Si algo arroja una excepción se deja de ejecutar el programa
//comprobarNumeroPositivo(-2);//aqui se arroja una excepcion y si no se controla se acaba el programa
//las excepciones siempre se tiene que hacer alguien cargo de ellas, si no se para el programa
//echo "este mensaje no se va a mostrar";

//si tienes un metodo que arroja excepciones (tanto si lo has creado tu como 
//si lo estas usando de una libreria de terceros)
//debes capturarlas con un bloque try-catch
try {
  comprobarNumeroPositivo(2);
  //Si la excepcion ocurre no llegaremos a ejecutar el codigo de abajo
  //y pasaremos directamente al bloque catch
  echo 'Seguimos ejecutando el codigo... El numero es correcto ' . "<br/>";
}catch(Exception $e) {
  echo 'Mensaje: ' .$e->getMessage().'<br/>';
}
//ahora lo bueno es que no se va a parar el programa y se ejecutara 
//esta linea
echo 'fin de programa';
//notese que capturar excepciones solo hace que el programa no se rompa su ejecución
//ya que es posible que si no hacemos nada más el programa puede no funcionar
//como debería
?> 

