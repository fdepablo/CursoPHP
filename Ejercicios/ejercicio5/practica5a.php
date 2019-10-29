<HTML LANG="es">
<!-- seria un html normal, de hecho la extension podria ser perfectamente .html
en vez de php, lo que pasa es que no se ahora mismo si mi apache esta configurado
para procesar htmls, así que lo dejo en php -->
<HEAD>
   <TITLE>Conversor de euros a pesetas</TITLE>
</HEAD>

<BODY>

<H1>Conversor de euros a pesetas</H1>

<!-- aqui le decimos a donde vamos a ir y al metodo, post -->
<FORM ACTION="practica5a-resultados.php" METHOD="POST">

<P>Cantidad en euros:
<INPUT TYPE="number" NAME="euros" SIZE="10">
<INPUT TYPE="SUBMIT" NAME="enviar" VALUE="convertir"></P>

</FORM>

</BODY>
</HTML>