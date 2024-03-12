<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario Animal</h1>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <label for="nombre">Introduce el nombre del animal</label>
        <input type="text" name="nombre" id="nomre">
        <br><br>
        <label for="especie">Introduce la especie del animal</label>
        <input type="text" name="especie" id="especie">
        <br><br>
        <label for="edad">Introduce la edad del animal</label>
        <input type="number" name="edad" id="edad">
        <br><br>
        <input type="submit" value="Dar de alta">
    </form>
    <?php
        function limpiar($valor){
            $valor = htmlspecialchars($valor);
            $valor = trim($valor);
            return $valor;
        }
        if(!empty($_POST["nombre"])){
            $nombre = limpiar($_POST["nombre"]);
        }else{
            $error[] = "Debes de introducir un nombre";
        }

        if(!empty($_POST["especie"])){
            $especie = limpiar($_POST["especie"]);
        }else{
            $error[] = "Debes de introducir una especie del animal";
        }

        if(!empty($_POST["edad"])){
            $edad = limpiar($_POST["edad"]);
        }else{
            $error[] = "Debes de introducir la edad del animal";
        }

        if(!empty($error)){
            foreach($error as $datos){
                echo $datos;
            }
        }else{
            $conex = new mysqli("localhost", "joel", "ed5.d6T54ro/hYC/", "joel2024");
            if(mysqli_connect_errno()){
                printf("Conexion fallida");
                exit();
            }else{
                $query = "INSERT INTO animal-(nombre, especie, edad) VALUES ('$nombre', '$especie', '$edad')";
                    if($conex->query($query) == TRUE){
                        echo "Se ha añadido a la base de datos";
                    }else{
                        echo "Error";
                    }
            }
        }
    ?>
</body>
</html>