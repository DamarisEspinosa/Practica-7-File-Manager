# Practica-7-File-Manager (Parte 2 del File Manager)
## Registro de nuevos usuarios
**[X]** Crear una página para que los nuevos usuarios puedan registrarse, esto es pedir los datos necesarios para su registro: nombre, apellidos, username (que para nuestro caso debe ser una dirección de correo electrónico), password, confirmación del password, genero (M = Masculino, F = Femeninio, X = Prefiero no especificar) y fecha de nacimiento. 

**[X]** Cabe mencionar que el username tiene que se un correo electrónico, por lo que hay que validar que se haya ingresado una dirección de correo; puede ser una validación básica, es decir que solo se valide si el valor que se ingresó tiene un '@' y también que el texto después del @ contenga un '.' (punto). 

Además al momento de registrarse se tiene que validar que no exista otro usuario con el mismo username.

- **[X]** Todos los campos son obligatorios, así que tiene que validar tanto del lado del cliente || como del lado del servidor (código PHP). 
- Además que los campos que son cadenas de texto (username, nombre, apellidos) se debe validar que no se ingresen puros caracteres de espacios en blanco ' '. 
- Al momento de guardar los datos en la base de datos, se debe hacer un trim() para quitar los espacios en blanco que al usuario se le hayan podido haber ido por accidente.

- **[X]** Es importante que al momento de guardar en base de datos los datos del usuario, el password del usuario se guarde cifrado de la siguiente forma: generar el password salt (64 caracteres aleatorios), al password en texto plano concatenarle al final el salt generado, al password en texto plano concatenado con el salt generarle el SHA512 y este será el password_encrypted.

## Cambiar contraseña
-**[X]** Agregar una opción para que una vez que el usuario ya haya iniciado sesión, este pueda cambiar la contraseña. Recordando que la contraseña en base de datos se guarda cifrada.

## Modificar datos personales
-**[X]** El usuario también debe poder modificar sus datos personales: nombre, apellidos, genero y fecha de nacimiento. Tenga en cuanta que todos los datos son obligatorios, además que se tienen que validar tanto del lado del cliente como del lado del servidor (código PHP); además así como en el registro de nuevos usuarios, también se debe validar que no se hayan ingresado puros caracteres de espacios en blanco (' ') y al guardar hacer trim() para quitar los espacios en blanco que se hayan ido de más.

## Hacer Público/Privado un archivo
En index, se tiene el listado de los archivos más recientes subidos por el usuario, aquí se pide que se imlpemente la funcionalidad de los archivos que muestran ahí hacerlos públicos o privados según sea el caso. Para esto tendrá que implementar una llamada AJAX para ejecutar esta funcionalidad, puesto que ya está medio implementado además de diseñado para que sea con llamada AJAX la modificación del registro del archivo en DB para modificar el campo de es_publico.