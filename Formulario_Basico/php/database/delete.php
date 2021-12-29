<?php include("database.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM datos WHERE id = $id";
        if(!mysqli_query($db, $query)){
            die("no se pudo carnal");
        }
    }

    $_SESSION["mensaje"] = "Dato eliminado";

    header("Location: /../../index.php");