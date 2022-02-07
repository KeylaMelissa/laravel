<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Llamado de emergencia</title>
</head>
<body>
    <p>Hola! Se ha reportado un nuevo caso de emergencia a las {{$mensaje->fecha_crea}}.</p>
    <p>Estos son los datos del usuario que ha realizado la denuncia:</p>
    <ul>
        <li>Nombre: {{$mensaje->nombre}}</li>
       
    </ul>
    <p>Y esta es la posición reportada:</p>
    <ul>
        
    
    </ul>
</body>
</html>