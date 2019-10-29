<HTML LANG="es">

<HEAD>
   <TITLE>Tabla de conversión de euros a pesetas</TITLE>
</HEAD>

<BODY>

<H1>Conversión euros/pesetas</H1>

<?PHP

   define ("EUROPTS", "166.386");//definimos la constante

   //la tabla solo se pinta una vez, por eso va fuera del for
   print ("<TABLE WIDTH='200'>\n");//se hace todo por php
   print ("<TR BGCOLOR='#FFEECC'>\n");//seria igual o mejor hacerlo mezclando php y htmls
   print ("   <TH>Euros</TH>\n");
   print ("   <TH>Pesetas</TH>\n");
   print ("</TR>\n");
   $color0 = "#CCCCCC";//definimos el color 0, de las filas pares
   $color1 = "#CCEEFF";//definimos el color 1, de las filas impares
   //por cada iteracion del for pintamos una fila nueva de la tabla
   for ($i=1; $i<=10; $i++)
   {
      $j = $i%2;//para sacar el color que vamos a pintar, hacemos un modulo y su valor
      //nos va a decir si la fila es para =0 o es impar =1
      $colorFila = "color" . $j;//estaos usando variables de variables
      print ("<TR ALIGN='CENTER' BGCOLOR=${$colorFila}>\n");      
      print ("   <TD>$i</TD>\n");
      print ("   <TD>" . $i*EUROPTS . "</TD>\n");
      print ("</TR>\n");
   }
   print ("</TABLE>\n");

?>

</BODY>
</HTML>