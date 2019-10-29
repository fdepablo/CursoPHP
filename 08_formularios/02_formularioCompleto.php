<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<form action="02_recibirFormularioCompleto.php"><!-- si no decimos nada se envia por GET -->
		<p><!-- etiqueta de parrafo, placeholder es el texto que aparecera antes de clickerar, luego se ira
			required es un atributo que hace que si no esta relleno, no podemos mandar la información -->
			<label>Nombre de cliente: <input name="name" placeholder="Nombre" required="required"/></label>
		</p>
		<p>
			<!-- type text tiene subconjuntos, como por ejemplo type=number que hacer que solo podamos
		poner aqui numeros-->
			<label>Telephone: <input type="number" name="telephone"/></label>
		</p>
		<p>
			<!-- type email tiene que cumplir que sea con formato de email -->
			<label>E-mail: <input type="email" name="mail"/></label>
		</p>
		<!-- Estamos haciendo un pedido de una pizza -->
		<fieldset>
			<legend> Tamaño de Pizza </legend>
			<!-- Como solo podemos escoger un tamaña, de tipo radio -->
			<p>
				<label> <input type=radio name=size value="small"/>
					pequeña
				</label>
			</p>
			<p>
				<label> <input type=radio name=size value="medium"/>
					Mediana
				</label>
			</p>
			<p>
				<label> <input type=radio name=size value="large">
					Grande
				</label>
			</p>
		</fieldset>
		<fieldset>
			<legend> Ingredientes de la Pizza </legend>
			<!-- como los ingredientes de la pizza pueden ser varios, de tipo checkbox -->
			<p>
				<label> <input type=checkbox name="topping[]" value="bacon">
				<!-- fijaos como el valor que mando al servidor es diferente al valor que le muestro
					al usuario -->
					Bacon
				</label>
			</p>
			<p>
				<label> <input type=checkbox name="topping[]" value="cheese">
					Extra de queso
				</label>
			</p>
			<p>
				<label> <input type=checkbox name="topping[]" value="onion">
					Cebolla
				</label>
			</p>
			<p>
				<label> <input type=checkbox name="topping[]" value="mushroom">
					Champiñon
				</label>
			</p>
		</fieldset>

		<p>
			<label>Instrucciones al repartidor: <textarea name="comments"></textarea></label>
		</p>

		<input type="submit" name="botonSubmit"value="Enviar Pedido"></input>
	</form>
</body>
</html>
