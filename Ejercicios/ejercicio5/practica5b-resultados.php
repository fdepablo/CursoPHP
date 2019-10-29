<HTML LANG="es">

<HEAD>
   <TITLE>Conversor de monedas. Resultados del formulario</TITLE>
</HEAD>

<BODY>

<H1>Conversor de monedas</H1>

<?PHP
//se ha creado un array asociativo para obtener la conversion
   $tablaconversion = array (
      "dólares" => 1.488,
      "libras"  => 0.747,
      "yenes"   => 158.339,
      "francos"   => 1.605
      );
   //aqui se obtienen los euros a convertir y la moneda
   $euros = $_REQUEST['euros'];
   $moneda = $_REQUEST['moneda'];
   if ($euros == "")//si no me introduce cantidad, pues nada, no hacemos nada
      print ("<P>Debe introducir una cantidad</P>\n");
   else
   {//en caso contrario, multiplicamos los euros por la tasa de conversion, que la
    //sacamos de nuestra tabla anterior
      $cantidad = $euros * $tablaconversion ["$moneda"];
      print ("<P>$euros euro(s) equivale(n) a $cantidad $moneda</P>\n");
   }
?>

<P>[ <A HREF='javascript:history.back()'>Volver</A> ]</P>

</BODY>
</HTML>