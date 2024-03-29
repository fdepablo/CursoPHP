![PHP](img/php.svg "Aprende PHP!!")

# PHP

PHP es un lenguaje orientado al desarrollo de aplicaciones web dinámicas con acceso a información
almacenada en una base de datos.

Es considerado un lenguaje facil de aprender, ya que en su desarrollo se
simplificaron distintas especificaciones, como es el caso de la definicion de
las variables primitivas, ejemplo que se hace evidente en el uso de php arrays.

El codigo fuente escrito en PHP es invisible al navegador web y al cliente, ya
que es el servidor el que se encarga de ejecutar el codigo y enviar su
resultado HTML al navegador.

Capacidad de conexion con la mayoria de los motores de base de datos que se
utilizan en la actualidad, destaca su conectividad con MySQL y PostgreSQL.

Capacidad de expandir su potencial utilizando interfaces, herencia y traits.

Posee una amplia documentación en su sitio web oficial, entre la cual se
destaca que todas las funciones del sistema están explicadas y ejemplificadas
en un único archivo de ayuda.

Es libre, por lo que se presenta como una alternativa de facil acceso para
todos.

Permite aplicar técnicas de programación orientada a objetos.

No requiere definición de tipos de variables aunque sus variables se pueden
evaluar también por el tipo que están manejando en tiempo de ejecución.

Tiene manejo de excepciones (desde PHP5).

Si bien PHP no obliga a quien lo usa a seguir una determinada metodología a la
hora de programar, aun haciéndolo, el programador puede aplicar en su trabajo
cualquier técnica de programación o de desarrollo que le permita escribir
código ordenado, estructurado y manejable. Un ejemplo de esto son los
desarrollos que en PHP se han hecho del patrón de diseño Modelo Vista
Controlador (MVC), que permiten separar el tratamiento y acceso a los datos, la
lógica de control y la interfaz de usuario en tres componentes independientes.

Debido a su flexibilidad ha tenido una gran acogida como lenguaje base para las
aplicaciones WEB de manejo de contenido, y es su uso principal.

## Instalar este curso

1. Instalar wamp o xammp (un todo en uno que incluye, Apache, Php y Mysql)

   - En caso de instalar el wamp hay que pegar "CursoPHP" dentro del directorio "www"
    de donde hayamos instalado el wamp.
   - En caso de xammp hay que pegar los fichero php en el directorio
   "C:\xampp\htdocs" de donde hayamos instalado el xammp

2. Descargarse Visual Studio Code, Atom, Eclipse PHP o el IDE preferido. Originalmente
se penso para Visual Studio Code

## Instalación para el ejemplo del 11_misqli y 12_mvc

Es una aplicación que hace un CRUD de alumnos en una misma página web
siguiendo el patron MVC

1. Crear una base de datos Mysql de nombre 'php' (con phpadmin)
2. Crear dentro una tabla de nombre 'alumnos' con los siguientes campos:
   - 'id' clave primaria y autoincremental
   - 'nombre' varchar
   - 'direccion' varchar
   - 'telefono' varchar
   
## Bibliografía

- Manual de referencia php en español (oficial)
[https://www.php.net/manual/es/](https://www.php.net/manual/es/)
