<?php include("database.php");

if(isset($_POST["enviar"])){
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad = $_POST["edad"];
    $correo = $_POST["email"];
    $error = [];
    if(!is_string($nombre) || !is_string($apellido) || !is_numeric($edad) || $edad < 1){
        array_push($error, 1);
    }

    if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
        array_push($error, 1);
    }

    if(count($error) == 0){
        $query = "INSERT INTO datos(nombre, apellido, edad, correo) VALUES ('$nombre', '$apellido', $edad, '$correo')";
        if(!mysqli_query($db, $query)){
            die("No se puede");
        }
        $_SESSION["mensaje"] = "Datos agregados";
    }else{
        $_SESSION["mensaje"] = "No se agregaron los datos";
    }
    

    header("Location: ../../index.php");
}

