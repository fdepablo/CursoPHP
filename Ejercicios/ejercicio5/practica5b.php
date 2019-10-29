<HTML LANG="es">

<HEAD>
   <TITLE>Conversor de monedas</TITLE>
</HEAD>

<BODY>

<H1>Conversor de monedas</H1>

<!-- Aqui tenemos un fichero que es completamente estatico, siempre es igual -->

<FORM ACTION="practica5b-resultados.php" METHOD="POST">

<P>Cantidad en euros:
<INPUT TYPE="number" NAME="euros">
Convertir a:
<!-- Esta vez no solo vamos a usar el numero de euros, si no que tambien
tenemos que valorar la moneda a la que vamos a convertir
y el parametro moneda
-->
<SELECT NAME="moneda">
   <OPTION VALUE="dólares" SELECTED>Dólares USA
   <OPTION VALUE="libras">Libras esterlinas
   <OPTION VALUE="yenes">Yenes japoneses
   <OPTION VALUE="francos">Francos suizos
</SELECT></P>
<!-- Cuando mandemos el formulario a practicas5b-resultados.php vamos a enviar 2 parametros
el parametro "euros" y el parametro "moneda", que tendremos que recoger en dicha pagina
para procesar -->
<INPUT TYPE="SUBMIT" NAME="enviar" VALUE="convertir">

</FORM>

</BODY>
</HTML>