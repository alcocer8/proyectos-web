<?php include("database.php");
include("../includes/header.php"); 

if(isset($_GET["id"])){ 
    $id = $_GET["id"];
    $query = "SELECT * FROM datos WHERE id = $id";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
    ?>

<form action="update.php?id=<?php echo $_GET['id']; ?>" method="POST" id="formualario">
        <legend>Edita tus datos</legend>
        <fieldset>
            <div class="inputs">
                <label for="">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" value="<?php echo $row['nombre'] ?>">
            </div>

            <div class="inputs">
                <label for="">Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Tu apellido" value="<?php echo $row['apellido'] ?>">
            </div>

            <div class="inputs">
                <label for="">Edad</label>
                <input type="number" id="edad" name="edad" placeholder="Tu edad" min="18" value="<?php echo $row['edad'] ?>">
            </div>

            <div class="inputs">
                <label for="">Correo:</label>
                <input type="email" id="email" name="email" placeholder="Tu correo electronico" value="<?php echo $row['correo'] ?>">
            </div>

            <input type="submit" value="Enviar" id="enviar" name="update" class="boton">
        </fieldset>
    </form>

<?php }
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $correo = $_POST['email'];
    $query = "UPDATE datos SET nombre ='$nombre', apellido = '$apellido', edad='$edad', correo='$correo' WHERE id=$id ";

    if(!mysqli_query($db, $query)){
        die("No se pudo ingresar los datos");
    }

    $_SESSION["mensaje"] = "Datos actualizados";
    
    header("Location: ../../index.php");
}



include("../includes/footer.php"); ?>