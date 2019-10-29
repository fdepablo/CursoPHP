<HTML LANG="es">

<!-- tambien vamos a generar un html para mostrarselo al cliente -->
<HEAD>
   <TITLE>Conversor de euros a pesetas. Resultados del formulario</TITLE>
</HEAD>

<BODY>

<H1>Conversor de euros a pesetas</H1>

<?PHP
   //esta parte va a ser dependiente de lo que se envie de la pagina anterior
   //por lo tanto no puede ser estatica, le damos dinamismo gracias a php
   define ("EUROPTS", 166.386);//defino el cambio

   //podemos poner $_REQUEST o $_POST en este caso
   $euros = $_REQUEST['euros'];//capturo de la request entrate el parametro con name euros
   if ($euros == "")//si los euros estan vacios, le digo que necesito que los ponga
      print ("<P>Debe introducir una cantidad</P>\n");
   else
   {//en caso contrario puedo calcular el valor
      $pesetas = $euros*EUROPTS;
      print ("<P>$euros euro(s) equivale(n) a $pesetas pesetas</P>\n");
   }
?>
<!-- en ambos casos le mando a la anterior pagina, se puede hacer con javascript -->
<P>[ <A HREF='javascript:history.back()'>Volver</A> ]</P>
<!-- tambien de un modo mas sencillo con html normal -->
<P>[ <A HREF='practica5a.php'>Volver</A> ]</P>
</BODY>
</HTML>